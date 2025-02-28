<?php
// Включение вывода ошибок
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$merchantLogin = 'phoenixtv.ru'; // Логин магазина
$outSum = floatval($_POST['summ']); // Сумма платежа
$invoiceID = $_POST['id_new']; // Новый номер счета
$description = trim($_POST['name_prod']); // Описание
$previousInvoiceID = $_POST['id_Inv']; // Номер первого счета в серии
$secretKey = 'nCWY57iaB1fKog5zr2BK'; // Пароль 1 из Robokassa

// Проверка суммы платежа
if ($outSum <= 0) {
    die("Ошибка: сумма платежа должна быть больше 0.");
}

// Очистка описания
$description = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');

// Генерация подписи (без PreviousInvoiceID)
$signatureValue = md5("$merchantLogin:$outSum:$invoiceID:$secretKey");

// Формируем данные для запроса
$requestData = [
    'MerchantLogin' => $merchantLogin,
    'OutSum' => $outSum,
    'InvoiceID' => $invoiceID,
    'Description' => $description,
    'Recurring' => 'true',
    'PreviousInvoiceID' => $previousInvoiceID,
    'SignatureValue' => $signatureValue,
];

// Логирование параметров запроса
file_put_contents('request_data.txt', print_r($requestData, true));

// Отправка запроса через cURL
$ch = curl_init('https://auth.robokassa.ru/Merchant/Recurring');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($requestData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Логирование cURL
curl_setopt($ch, CURLOPT_VERBOSE, true);
$verbose = fopen('php://temp', 'w+');
curl_setopt($ch, CURLOPT_STDERR, $verbose);

$response = curl_exec($ch);
curl_close($ch);

// Логирование ответа
file_put_contents('robokassa_response.html', $response);

// Логирование cURL
rewind($verbose);
$verboseLog = stream_get_contents($verbose);
fclose($verbose);
file_put_contents('curl_log.txt', $verboseLog);

// Обработка ответа
if ($response) {
    if (strpos($response, 'Оплата успешно выполнена') !== false) {
        echo "Платеж успешно обработан.";
    } else {
        echo "Ошибка при обработке платежа. Ответ сервера: " . htmlspecialchars($response);
    }
} else {
    echo "Ошибка при отправке запроса.";
}
?>