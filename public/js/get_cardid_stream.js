$(document).ready(function() {
    $('#unpublic_stream').hide();
    $('#img_banner_trash').hide();
    var params = new window.URLSearchParams(window.location.search);


    $("#card_stream_link").on('click', function(){
        window.location.href='/card_stream?admin_input_id='+params.get('admin_input_id');
    });
    $("#card_broadcast_link").on('click', function(){
        window.location.href='/card_broadcast?admin_input_id='+params.get('admin_input_id');
    });
    $("#card_monitor_link").on('click', function(){
        window.location.href='/card_monitor?admin_input_id='+params.get('admin_input_id');
    });
    $("#analitik_card_link").on('click', function(){
        window.location.href='/analitik_card?admin_input_id='+params.get('admin_input_id');
    });
    $("#card_restream_link").on('click', function(){
        window.location.href='/card_restream?admin_input_id='+params.get('admin_input_id');
    });
    
});
/**
 * "id": "763cf3d3-f251-4e89-8a5b-306fe9b83da8",
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
 */