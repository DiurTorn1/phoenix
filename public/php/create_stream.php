<?php
//$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
$data = array("name" => $_POST['name'],"subtitle" => "teg1&teg2&teg3&teg4&teg5&teg6", "type" => "one-time", "auto_start" => false, "protected" => false, "time_shift" => true,
         "parent_id" => "a08220b1-2640-4d65-b51b-cd4d2837741e", "reconnect_window" => 600, "scheduled" => array("time" => "2024-08-06T13:05:41.634922Z"),
         "record" => array("parent_id" => "f5d0756d-2ee5-4531-bde4-7baef6ea5baf"),
         "restreams" => array(), "latency_mode" => "standard");
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
echo $result;
//echo $_POST['name'];
//$token = "f49fffe4-42ff-45bb-a03c-3a2eb050226c";
//setup the request, you can also use CURLOPT_URL
//$ch = curl_init('https://api.kinescope.io/v2/live/events?page=1&per_page=100&order=created_at.desc,name.asc');//https://api.kinescope.io/v1/videos?page=1&per_page=100&order=created_at.desc,title.asc');
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

//echo $data;
/*
{
 "meta": {
  "pagination": {
   "page": 1,
   "per_page": 100,
   "total": 1
  },
  "order": {"created_at":"desc","name":"asc"}
 },
 "data": [
  {
   "id": "98054be5-c664-4381-8f11-314c5b640673",
   "workspace_id": "eb7874ed-0833-4b89-b2f1-65d26ea6643f",
   "parent_id": "76be9caa-5ca7-4ac7-947e-4e7042b40632",
   "name": "Новое событие",
   "subtitle": "",
   "type": "one-time",
   "streamkey": "02a85cce1dfd49128800fa34018902bd",
   "auto_start": false,
   "protected": false,
   "time_shift": true,
   "record": {
    "parent_id": "f5d0756d-2ee5-4531-bde4-7baef6ea5baf"
   },
   "video": {
    "presets": null
   },
   "audio": {
    "channel_mapping": null
   },
   "restreams": [],
   "reconnect_window": 600,
   "play_link": "https://kinescope.io/dmY1DEguQjTJFgKxCnTXCN",
   "rtmp_link": "rtmp://rtmp.kinescope.io/live",
   "scheduled": {
    "time": null
   },
   "stream": {
    "id": "9320616a-7d1e-4ada-8d69-d388f4e9dd2b",
    "event_id": "98054be5-c664-4381-8f11-314c5b640673",
    "status": "finished",
    "started_at": "2024-06-28T17:04:33.64827Z",
    "finished_at": "2024-06-28T17:10:07.659397Z"
   },
   "chat_after_stream": true,
   "chat_active": false,
   "chat_preview": true,
   "show_members": true,
   "created_at": "2024-06-28T17:03:45.644714Z",
   "updated_at": "2024-06-28T17:10:07.659397Z",
   "latency_mode": "standard",
   "allow_chat_links": false,
   "moderators": null,
   "poster": {
    "id": "ba335d4b-b2e5-40d3-a37f-25dfaacb66c6",
    "type": "image",
    "status": "done",
    "active": true,
    "original": "https://kinescopecdn.net/eb7874ed-0833-4b89-b2f1-65d26ea6643f/posters/\u003cnil\u003e/ba335d4b-b2e5-40d3-a37f-25dfaacb66c6.jpg",
    "md": "https://kinescopecdn.net/eb7874ed-0833-4b89-b2f1-65d26ea6643f/posters/\u003cnil\u003e/md/ba335d4b-b2e5-40d3-a37f-25dfaacb66c6.jpg",
    "sm": "https://kinescopecdn.net/eb7874ed-0833-4b89-b2f1-65d26ea6643f/posters/\u003cnil\u003e/sm/ba335d4b-b2e5-40d3-a37f-25dfaacb66c6.jpg",
    "xs": "https://kinescopecdn.net/eb7874ed-0833-4b89-b2f1-65d26ea6643f/posters/\u003cnil\u003e/xs/ba335d4b-b2e5-40d3-a37f-25dfaacb66c6.jpg",
    "from_time": 0,
    "to_time": 0
   }
  }
 ]
} */
?>