<?php
$merchantLogin = 'phoenixtv.ru'; // Логин магазина
$outSum = $_POST['summ']; // Сумма платежа
$invoiceID = $_POST['id_new']; // Новый номер счета
$description = $_POST['name_prod']; // Описание
$previousInvoiceID = $_POST['id_Inv']; // Номер первого счета в серии
$secretKey = 'nCWY57iaB1fKog5zr2BK'; // Пароль 1 из Robokassa

// Генерация подписи (без PreviousInvoiceID)
$signatureValue = md5("$merchantLogin:$outSum:$invoiceID:$secretKey");

// Формируем данные для запроса
$requestData = [
    'MerchantLogin' => $merchantLogin,
    'OutSum' => $outSum,
    'InvoiceID' => $invoiceID,
    'Description' => $description,
    'PreviousInvoiceID' => $previousInvoiceID,
    'SignatureValue' => $signatureValue,
];

// Формируем URL для оплаты
$paymentUrl = "https://auth.robokassa.ru/Merchant/Index.aspx?" . http_build_query($requestData);

// Возвращаем URL для оплаты
echo json_encode([
    'success' => true,
    'payment_url' => $paymentUrl,
]);
?>