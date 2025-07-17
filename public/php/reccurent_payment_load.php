<?php
header('Content-Type: application/json');
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', 'php_errors.log');

$response = ['success' => false, 'message' => 'Unknown error'];

try {
    // Проверка метода и параметров
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Only POST requests allowed');
    }

    $required = ['summ', 'id_new', 'name_prod', 'id_Inv'];
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            throw new Exception("Missing required field: $field");
        }
    }

    // Параметры магазина
    $merchantLogin = 'phoenixtv.ru';
    $outSum = floatval($_POST['summ']);
    $invoiceID = $_POST['id_new'];
    $description = trim($_POST['name_prod']);
    $previousInvoiceID = $_POST['id_Inv'];
    $secretKey = 'nCWY57iaB1fKog5zr2BK';

    // Валидация
    if ($outSum <= 0) {
        throw new Exception("Payment amount must be greater than 0");
    }

    // Генерация подписи для рекуррентного платежа
    $signatureValue = md5("$merchantLogin:$outSum:$invoiceID:$secretKey");

    // Параметры запроса (упрощенный набор для рекуррента)
    $requestData = [
        'MerchantLogin' => $merchantLogin,
        'OutSum' => $outSum,
        'InvoiceID' => $invoiceID,
        'Description' => $description,
        'SignatureValue' => $signatureValue,
        'PreviousInvoiceID' => $previousInvoiceID,
    ];

    // Удаляем пустые параметры
    $requestData = array_filter($requestData);

    // Отправка запроса
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => 'https://auth.robokassa.ru/Merchant/Recurring',
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query($requestData),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTPHEADER => ['Content-Type: application/x-www-form-urlencoded']
    ]);

    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    if (curl_errno($ch)) {
        throw new Exception('CURL error: ' . curl_error($ch));
    }
    
    curl_close($ch);

    // Проверка ответа
    if (strpos($result, 'ERROR') !== false) {
        throw new Exception("Robokassa error: $result");
    }

    // Успешный ответ
    $response = [
        'success' => true,
        'message' => 'Recurrent payment processed',
        'payment_id' => $invoiceID,
        'receipt_url' => "https://auth.robokassa.ru/Merchant/Office/Invoice/$invoiceID"
    ];

} catch (Exception $e) {
    $response = [
        'success' => false,
        'message' => $e->getMessage(),
        'error_code' => $e->getCode()
    ];
}

// Очистка буфера и вывод
while (ob_get_level()) ob_end_clean();
echo json_encode($response);
exit;
?>