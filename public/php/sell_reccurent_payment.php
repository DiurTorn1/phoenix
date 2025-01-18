<?php
// Получаем данные из POST-запроса
$mrh_login = "phoenixtv.ru";
$out_summ = $_POST['OutSum'];
$inv_id = $_POST['InvoiceID'];
$inv_desc = $_POST['Description'];
$recurring = 'true';
$mrh_pass1 = "nCWY57iaB1fKog5zr2BK";
// Генерация подписи
$crc = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1");

// Формируем ответ
$response = [
    'success' => true,
    'signature' => $crc,
    'payment_url' => "https://auth.robokassa.ru/Merchant/Index.aspx?" .
        "MerchantLogin=" . urlencode($mrh_login) .
        "&OutSum=" . urlencode($out_summ) .
        "&InvoiceID=" . urlencode($inv_id) .
        "&Description=" . urlencode($inv_desc) .
        "&SignatureValue=" . urlencode($crc) .
        "&Recurring=" . urlencode($recurring)
];

// Возвращаем ответ в формате JSON
header('Content-Type: application/json');
echo json_encode($response);
?>