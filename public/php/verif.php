<?php

// URL скрипта авторизации
//$login_url = 'https://api.kinescope.io/v1/videos';
// параметры для отправки запроса - логин и пароль
//$post_data = 'login=diurtorn@gmail.com&password=89340426Gerd!'; 
// создание объекта curl
//$ch = curl_init();  
// используем User Agent браузера
//$agent = $_SERVER["HTTP_USER_AGENT"];
//curl_setopt($ch, CURLOPT_USERAGENT, $agent);  
// задаем URL
//curl_setopt($ch, CURLOPT_URL, $login_url );  
// указываем что это POST запрос
//curl_setopt($ch, CURLOPT_POST, 1 ); 
// задаем параметры запроса
//curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data); 
// указываем, чтобы нам вернулось содержимое после запроса
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
// в случае необходимости, следовать по перенаправлени¤м
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
/*
    Задаем параметры сохранени¤ cookie
    как правило Cookie необходимы для дальнейшей работы с авторизацией
*/  
//curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
//curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
  
// выполняем запрос для авторизации
//$postResult = curl_exec($ch);

$token = "f49fffe4-42ff-45bb-a03c-3a2eb050226c";
//setup the request, you can also use CURLOPT_URL
$ch = curl_init('https://api.kinescope.io/v1/videos');

// Returns the data/output as a string instead of raw data
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Set your auth headers
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
   'Content-Type: application/json',
   'Authorization: Bearer ' . $token
   ));

// get stringified data/output. See CURLOPT_RETURNTRANSFER
$data = curl_exec($ch);

// get info about the request
$info = curl_getinfo($ch);
// close curl resource to free up system resources
curl_close($ch);

echo $data;