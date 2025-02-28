<?php
$merchantLogin = 'phoenixtv.ru'; // Логин магазина
$outSum = $_POST['summ']; // Сумма платежа
$invoiceID = $_POST['id_new']; // Новый номер счета
$description = $_POST['name_prod']; // Описание
$previousInvoiceID = $_POST['id_Inv']; // Номер первого счета в серии
$secretKey = 'nCWY57iaB1fKog5zr2BK'; // Пароль 1 из Robokassa

//echo $outSum . ' ' . $invoiceID . ' ' . $description . ' ' . $previousInvoiceID;
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

// Возвращаем данные в формате JSON
header('Content-Type: application/json');
echo json_encode($requestData);
?>