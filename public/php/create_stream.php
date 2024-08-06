<?php
//$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
$data = array("name" => "Muuuu","subtitle" => "Muuu_title", "type" => "recurring", "auto_start" => true, "protected" => false, "time_shift" => false,
         "parent_id" => "c73909aa-2ebf-4676-bdab-8010ab503075", "reconnect_window" => 1800, "scheduled" => array("time" => "2024-08-06T13:05:41.634922Z"),
         "record" => array("parent_id" => "c21d86ac-7e90-43e7-b825-cbf300951355"),
         "latency_mode" => "standard");
$postdata = json_encode($data);
$token = "f49fffe4-42ff-45bb-a03c-3a2eb050226c";
//setup the request, you can also use CURLOPT_URL
$ch = curl_init('https://api.kinescope.io/v2/live/events');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
   'Content-Type: application/json',
   'Authorization: Bearer ' . $token,
   'Content-Length: ' . strlen($postdata)
));

$result = curl_exec($ch);
curl_close($ch);
//curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_POSTFIELDS, "");
// Returns the data/output as a string instead of raw data
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_POSTFIELDS, "page=1&per_page=100&order=created_at.desc,title.asc&status[]=&folder_id=&project_id=&video_ids[]=&q=&without_folder=true");
//Set your auth headers
//curl_setopt($ch, CURLOPT_HTTPHEADER, array(
   //'Content-Type: application/json',
   //'Authorization: Bearer ' . $token
//));

// get stringified data/output. See CURLOPT_RETURNTRANSFER
//$data = curl_exec($ch);

// get info about the request
//$info = curl_getinfo($ch);
// close curl resource to free up system resources
//curl_close($ch);
echo $result;

?>