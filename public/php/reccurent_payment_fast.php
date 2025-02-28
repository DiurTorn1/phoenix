<?php
// Включение вывода ошибок
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Получаем данные из POST-запроса
$merchantLogin = 'phoenixtv.ru'; // Логин магазина
$outSum = $_POST['summ']; // Сумма платежа
$invoiceID = $_POST['id_new']; // Новый номер счета
$description = $_POST['name_prod']; // Описание
$secretKey = 'nCWY57iaB1fKog5zr2BK'; // Пароль 1 из Robokassa

// Проверка суммы платежа
if ($outSum <= 0) {
    $response = [
        'success' => false,
        'message' => 'Ошибка: сумма платежа должна быть больше 0.'
    ];
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

// Очистка описания
$description = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');

// Генерация подписи
$signatureValue = md5("$merchantLogin:$outSum:$invoiceID:$secretKey");

// Формируем URL для оплаты
$paymentUrl = "https://auth.robokassa.ru/Merchant/Index.aspx?" . http_build_query([
    'MerchantLogin' => $merchantLogin,
    'OutSum' => $outSum,
    'InvoiceID' => $invoiceID,
    'Description' => $description,
    'SignatureValue' => $signatureValue,
]);

// Формируем JSON-ответ
$response = [
    'success' => true,
    'payment_url' => $paymentUrl,
];

// Устанавливаем заголовок JSON
header('Content-Type: application/json');

// Возвращаем JSON-ответ
echo json_encode($response);
?>