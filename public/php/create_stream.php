<?php
//$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
$data = array( "id" => "a5659f1e-bb40-442f-a74b-c1eac915442c", "workspace_id" => "f569dae5-2d36-4558-a28e-d2b7d46f7aa2", "parent_id" => "c73909aa-2ebf-4676-bdab-8010ab503075",
            "name" => "Muu", "subtitle" => "Muu_title", "type" => "recurring", "streamkey" => "a6739c5535504feaa45da338dc62f753", "auto_start" => true, "protected" => false,
            "time_shift" => false, "chat_after_stream"=> true, "chat_active" => false, "record" => array("parent_id" => "c21d86ac-7e90-43e7-b825-cbf300951355"), "video" => array( "presets" => null ), "audio" => array( "channel_mapping" => null ),
            "restreams" => array( "id" => "a4a81173-5e7b-4a98-9d88-0746f920bd09", "event_id" => "a5659f1e-bb40-442f-a74b-c1eac915442c", "name" => "Restream muu", "url" => "rtmp://rtmp.kinescope.dev/live", "key" => "a6739c5535504feaa45da338dc62f753",
            "status" => "disconnected", "enabled"=> true, "description" => "", "created_at" => "2024-08-6T12:25:04.095926Z", "updated_at" => null), "reconnect_window" => 1800, "play_link" => "https://kinescope.dev/200527222",
            "rtmp_link" => "rtmp://rtmp.kinescope.dev/live", "scheduled" => array( "time" => "2022-12-19T00:05:41.634922Z"), "stream" => array( "id" => "a13c213b-912e-4a4a-b4fe-c87475296d2c", "event_id" => "a5659f1e-bb40-442f-a74b-c1eac915442c",
            "status" => "pending", "started_at" => "2022-12-19T00:05:41.634922Z", "finished_at" => null), "created_at" => "2022-11-15T12:25:04.095926Z", "updated_at" => null, "latency_mode" => "standard",
            "poster" => array( "id" => "ad6f2b26-5135-4360-ac2b-c5adb52ec79e", "type" => "image", "status" => "done", "active" => true, "original" => "https://static.kinescopecdn.net/assets/event_default_poster.png",
            "md" => "https://static.kinescopecdn.net/assets/event_default_poster.png", "sm" => "https://static.kinescopecdn.net/assets/event_default_poster.png", "xs" => "https://static.kinescopecdn.net/assets/event_default_poster.png",
            "from_time" => 0, "to_time" => 0));
$postdata = json_encode(array("data"=>$data));
$token = "f49fffe4-42ff-45bb-a03c-3a2eb050226c";
//setup the request, you can also use CURLOPT_URL
$ch = curl_init('https://api.kinescope.io/v2/live/events');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
   'Content-Type: application/json',
   'Authorization: Bearer ' . $token
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
/*
{
  "data": {
   
  }
}*/
?>
