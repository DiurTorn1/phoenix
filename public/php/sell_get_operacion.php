<?php

// Параметры запроса
$merchantLogin = 'phoenixtv.ru';
$invoiceID = 7814822027;
$password2 = 'Z8fL6IuzbiJ7kq8K1xRb'; // Пароль#2 из технических настроек

// Генерация контрольной суммы (Signature)
$signature = md5($merchantLogin . ':' . $invoiceID . ':' . $password2);

// Формирование URL запроса
$url = "https://auth.robokassa.ru/Merchant/WebService/Service.asmx/OpStateExt?MerchantLogin={$merchantLogin}&InvoiceID={$invoiceID}&Signature={$signature}";

// Инициализация cURL сессии
$ch = curl_init();

// Установка URL и других необходимых параметров
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Выполнение запроса и получение ответа
$response = curl_exec($ch);

// Проверка на ошибки
if (curl_errno($ch)) {
    echo 'Ошибка cURL: ' . curl_error($ch);
} else {
    // Вывод ответа
    echo $response;
}

// Закрытие cURL сессии
curl_close($ch);

?>