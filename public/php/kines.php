<?php
$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
$token = "f49fffe4-42ff-45bb-a03c-3a2eb050226c";
//setup the request, you can also use CURLOPT_URL
$ch = curl_init('https://api.kinescope.io/v1/videos?page=1&per_page=100&order=created_at.desc,title.asc');
//curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_POSTFIELDS, "");
// Returns the data/output as a string instead of raw data
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_POSTFIELDS, "page=1&per_page=100&order=created_at.desc,title.asc&status[]=&folder_id=&project_id=&video_ids[]=&q=&without_folder=true");
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

$decoded_json = json_decode($data, true);

$id = $decoded_json['data'];
echo $data;
//foreach($id as $ids) {
    //echo $id.' vid '.$id['id']'.';
//}

?>