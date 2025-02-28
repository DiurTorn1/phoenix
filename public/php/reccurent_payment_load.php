<?php
$merchantLogin = 'phoenixtv.ru'; // Логин магазина
$outSum = $_POST['summ']; // Сумма платежа
$invoiceID = $_POST['id_new']; // Новый номер счета
$description = $_POST['name_prod']; // Описание
$previousInvoiceID = $_POST['id_new']; // Номер первого счета в серии
$secretKey = 'nCWY57iaB1fKog5zr2BK'; // Пароль 1 из Robokassa

..echo $outSum . ' ' . $invoiceID . ' ' . $description . ' ' . $previousInvoiceID;
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

// Отправка запроса (пример с использованием cURL)
$ch = curl_init('https://auth.robokassa.ru/Merchant/Index.aspx');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($requestData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

// Обработка ответа
if ($response) {
    // Robokassa возвращает HTML-страницу, поэтому парсим её (пример)
    if (strpos($response, 'Оплата успешно выполнена') !== false) {
        echo "Платеж успешно обработан. InvoiceID: $invoiceID";
    } else {
        echo "Ошибка при обработке платежа.";
    }
} else {
    echo "Ошибка при отправке запроса.";
}
?>