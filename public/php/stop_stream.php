<?php
$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
$token = "179c96f0-a67a-4324-b235-f0b3960baf95";

//setup the request, you can also use CURLOPT_URL
$ch = curl_init('https://api.kinescope.io/v2/live/events/' . $_POST['id'] .'/complete');//https://api.kinescope.io/v1/videos?page=1&per_page=100&order=created_at.desc,title.asc');
//curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_POSTFIELDS, "");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
//curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
// Returns the data/output as a string instead of raw data
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_POSTFIELDS, "page=1&per_page=100&order=created_at.desc,name.asc");
//Set your auth headers
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  // 'Content-Type: application/json',
   'Authorization: Bearer ' . $token
));

// get stringified data/output. See CURLOPT_RETURNTRANSFER
$data = curl_exec($ch);

// get info about the request
$info = curl_getinfo($ch);
// close curl resource to free up system resources   763cf3d3-f251-4e89-8a5b-306fe9b83da8   https://api.kinescope.io/v2/live/events/:event_id
curl_close($ch);

echo $data;