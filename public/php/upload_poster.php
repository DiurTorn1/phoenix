<?php
$token = "179c96f0-a67a-4324-b235-f0b3960baf95";

//setup the request, you can also use CURLOPT_URL
$ch = curl_init('https://uploader.kinescope.io/v2/poster');//https://api.kinescope.io/v1/videos?page=1&per_page=100&order=created_at.desc,title.asc');
//curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_POSTFIELDS, "");
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
//curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
// Returns the data/output as a string instead of raw data
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_POSTFIELDS, "page=1&per_page=100&order=created_at.desc,name.asc");
//Set your auth headers
//$tegs = $_POST['season'] . '&' . $_POST['turnir'] . '&' . $_POST['weigth'] . '&' . $_POST['vid_sporta'] . '&' . ' ' . '&' . ' ' . '&' . $_POST['region'];
$data = 'https://phoenix.tehnodir.ru/img/banners/1vQAJMhfBUE.jpg';
//$postdata = json_encode($data);
//setup the request, you can also use CURLOPT_URL
//$ch = curl_init('https://api.kinescope.io/v2/live/events');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
//curl_setopt($ch, CURLOPT_HTTPHEADER, array(
   //'Authorization: Bearer ' . $token
//));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: text/plain',
    'Authorization: Bearer ' . $token,
    'X-Video-ID: 957651f6-3bec-4f14-8d3d-eceade5d48df',
    'X-Poster-URL: https://kinescopecdn.net/7f637eea-6709-45c0-b754-e7eac8daf3b9/posters/'
));

// get stringified data/output. See CURLOPT_RETURNTRANSFER
$data = curl_exec($ch);

// get info about the request
$info = curl_getinfo($ch);
// close curl resource to free up system resources   763cf3d3-f251-4e89-8a5b-306fe9b83da8   https://api.kinescope.io/v2/live/events/:event_id
curl_close($ch);

echo $data;