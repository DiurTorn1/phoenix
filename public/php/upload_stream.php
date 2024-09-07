<?php


$token = "179c96f0-a67a-4324-b235-f0b3960baf95";

$tegs = $_POST['sezon'] . '&' . $_POST['kubok'] . '&' . $_POST['weigth'] . '&' . $_POST['vid_sport'] . '&' . ' ' . '&' . ' ' . '&' . $_POST['region'];

$data = array( "id" => $_POST['id'], "workspace_id" => $_POST['workspace_id'], "parent_id" => $_POST['parent_id'], 
                "name" => $_POST['name'], "subtitle" => $tegs, "type" => "one-time",
                "streamkey" => $_POST['streamkey_par'], "auto_start" => false, "protected"=> false, "time_shift" => true,
                "record" => array("parent_id" => $_POST['parent_id_par']), "video" => array("presets" => null), "audio" => array("channel_mapping" => null),
                "restreams" => array(), "reconnect_window" => 1800, "play_link"=> $_POST['play_link'], "rtmp_link" => $_POST['rtmp_link'],
                "scheduled" => array("time" => $_POST['post_time']. ':00.000000Z'), "stream" => array( "id" => $_POST['stream_id_par'], "event_id" => $_POST['id'],
                "status" => "pending", "started_at" => $_POST['post_time']. ':00.000000Z', "finished_at" => null), "chat_after_stream" => true, "chat_active" => false, "chat_preview" => true,
                "show_members" => true, "created_at" => "2024-08-14T10:44:42.746261Z", "updated_at" => null, "latency_mode" => "standard", "allow_chat_links" => false, "moderators" => null,
                "poster" => array("id" => "9fb44b89-a4f2-4b24-9bdc-ef34ae865552", "type" => "image", "status" => "done", "active" => true, "original" => "https://nextcloud.tehnodir.ru/index.php/apps/files_sharing/publicpreview/3M57JCrBwTz7tq8?file=/&fileId=1983&x=1920&y=1080&a=true&etag=cbe2366c226f3374946830bd6d5fac9b",
                 "md" => "https://nextcloud.tehnodir.ru/index.php/apps/files_sharing/publicpreview/3M57JCrBwTz7tq8?file=/&fileId=1983&x=1920&y=1080&a=true&etag=cbe2366c226f3374946830bd6d5fac9b", "sm" => "https://nextcloud.tehnodir.ru/index.php/apps/files_sharing/publicpreview/3M57JCrBwTz7tq8?file=/&fileId=1983&x=1920&y=1080&a=true&etag=cbe2366c226f3374946830bd6d5fac9b",
                 "xs" => "https://nextcloud.tehnodir.ru/index.php/apps/files_sharing/publicpreview/3M57JCrBwTz7tq8?file=/&fileId=1983&x=1920&y=1080&a=true&etag=cbe2366c226f3374946830bd6d5fac9b", "from_time" => 0, "to_time" => 0) );
                              
$postdata = json_encode($data);


//setup the request, you can also use CURLOPT_URL
$ch = curl_init('https://api.kinescope.io/v2/live/events/' . $_POST['id']);//https://api.kinescope.io/v1/videos?page=1&per_page=100&order=created_at.desc,title.asc');
//curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_POSTFIELDS, "");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
//curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
// Returns the data/output as a string instead of raw data
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_POSTFIELDS, "page=1&per_page=100&order=created_at.desc,name.asc");
//Set your auth headers
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
   'Content-Type: application/json',
   'Authorization: Bearer ' . $token
));

// get stringified data/output. See CURLOPT_RETURNTRANSFER
$data = curl_exec($ch);

// get info about the request
$info = curl_getinfo($ch);
// close curl resource to free up system resources   763cf3d3-f251-4e89-8a5b-306fe9b83da8   https://api.kinescope.io/v2/live/events/:event_id
curl_close($ch);

echo $data;

/*
curl --location --request PUT 'https://api.kinescope.io/v2/live/events/:event_id' \
--data '{
    "name": "Update event",
    "subtitle": "Update subtitle",
    "auto_start": true,
    "protected": false,
    "time_shift": false,
    "reconnect_window": 1800,
    "chat_after_stream": true,
    "chat_active": true,
    "scheduled": {
        "time": "2023-12-19T00:05:41.634922Z"
    },
    "record": {
        "parent_id": "c21d86ac-7e90-43e7-b825-cbf300951355"
    },
    "latency_mode": "standard",
    "moderators": ["45b48179-a776-479d-9cb4-3d9158be9a56"],
    "show_members": true,
    "chat_preview": true

    "data": {
  "id": "763cf3d3-f251-4e89-8a5b-306fe9b83da8",
  "workspace_id": "eb7874ed-0833-4b89-b2f1-65d26ea6643f",
  "parent_id": "a08220b1-2640-4d65-b51b-cd4d2837741e",
  "name": "Game_2",
  "subtitle": "20.24-2025\u0026МячМячМяч\u0026Ю11\u0026Баскетбол\u0026 \u0026 \u0026Все регионы",
  "type": "one-time",
  "streamkey": "34e411524f98436b9aed3f074d99a2a7",
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
  "play_link": "https://kinescope.io/jhRH4DBNS2SaXzj1D6Bwsq",
  "rtmp_link": "rtmp://rtmp.kinescope.io/live",
  "scheduled": {
   "time": "2024-08-14T13:44:00Z"
  },
  "stream": {
   "id": "9b58495e-f2e3-43f9-8c15-75fb92737257",
   "event_id": "763cf3d3-f251-4e89-8a5b-306fe9b83da8",
   "status": "pending",
   "started_at": "2024-08-14T13:44:00Z",
   "finished_at": null
  },
  "chat_after_stream": true,
  "chat_active": false,
  "chat_preview": true,
  "show_members": true,
  "created_at": "2024-08-14T10:44:42.746261Z",
  "updated_at": null,
  "latency_mode": "standard",
  "allow_chat_links": false,
  "moderators": null,
  "poster": {
   "id": "2da5947f-9131-4b22-aa64-f15d4ee70b0c",
   "type": "image",
   "status": "done",
   "active": true,
   "original": "https://static.kinescopecdn.net/assets/event_default_poster.png",
   "md": "https://static.kinescopecdn.net/assets/event_default_poster.png",
   "sm": "https://static.kinescopecdn.net/assets/event_default_poster.png",
   "xs": "https://static.kinescopecdn.net/assets/event_default_poster.png",
   "from_time": 0,
   "to_time": 0
  }
}' */