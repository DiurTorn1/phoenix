$(document).ready(function() {
    $("#admin-video-list-btn").on('click', function(){
        var main = $('#admin-input-main').val();
        $.post('/php/get_stream.php', function(data)  {
            //alert("Text:"+data);
            //console.log(data);
            var output = $.parseJSON(data);
            var list = output.data;

            $.each(list,function(i,item){
                console.log("Video inform:\r\n");
                console.log("id: " + item.id + "\r\nworkspace_id: " + item.workspace_id + "\r\nparent_id: " + item.parent_id + "\r\nname: " + item.name + "\r\nsubtitle: " + item.subtitle +
                            "\r\ntype: " + item.type + "\r\nstreamkey: " + item.streamkey + "\r\nauto_start: " + item.auto_start + "\r\nprotected: " + item.protected + "\r\ntime_shift: " + item.time_shift); 
                console.log("\r\nRecord: \r\n parent_id: " + item.record.parent_id);
                console.log("\r\nvideo: \r\n presets: " + item.video.presets);
                console.log("\r\naudio: \r\n channel_mapping: " + item.audio.channel_mapping);
                console.log("\r\nreconnect_window:" + item.reconnect_window);
                console.log("\r\nplay_link: " + item.play_link);
                console.log("\r\nrtmp_link: " + item.rtmp_link);
                console.log("\r\nscheduled: \r\n time: " + item.scheduled.time);
                console.log("\r\nstream: \r\n id: " + item.stream.id + "\r\nevent_id: " + item.stream.event_id + "\r\nstatus: " + item.stream.status + "\r\nstarted_at: " + item.stream.started_at +  "\r\nfinished_at: " + item.stream.finished_at);
            });
            
        });
        //var month = label.val('month');
        //var year = label.val('year');
        //var text = label.text();
        //alert(text);
        //alert("Button clicked!"); // This will display an alert when the button with id "myButton" is clicked
        //$('#popup-back').toggle();
        
    });
});

/**
 * {
 "data": [
  {
   "id": "67c6bd18-cd33-4287-963a-055d6ee6516c",
   "workspace_id": "eb7874ed-0833-4b89-b2f1-65d26ea6643f",
   "parent_id": "a3baa3cf-2c8b-4f14-9081-1b84d5930f23",
   "name": "Game_3",
   "subtitle": "",
   "type": "one-time",
   "streamkey": "7a4925b9da8a4d2295d89eb24c973c11",
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
   "play_link": "https://kinescope.io/bcsYm3g9eVnEmM4AQJC6MS",
   "rtmp_link": "rtmp://rtmp.kinescope.io/live",
   "scheduled": {
    "time": null
   },
   "stream": {
    "id": "28fcd580-b384-48c5-8941-7155c2566f53",
    "event_id": "67c6bd18-cd33-4287-963a-055d6ee6516c",
    "status": "pending",
    "started_at": "2024-08-07T12:14:08.680775Z",
    "finished_at": null
   },
   "chat_after_stream": true,
   "chat_active": false,
   "chat_preview": true,
   "show_members": true,
   "created_at": "2024-08-07T12:14:08.680775Z",
   "updated_at": null,
   "latency_mode": "standard",
   "allow_chat_links": false,
   "moderators": null,
   "poster": {
    "id": "c0ca572c-64cd-4d37-8f66-84c66df9dedd",
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
  }
  }
 ]
}
 */