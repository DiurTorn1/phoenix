$(document).ready(function() {
    $("#save-st").on('click', function(){
        var main = $('#block-admin-inputct').val();
        var region = $("#admin_region_selectct option:selected").text();
        var season = $("#admin_season_seasonct").val();
        var turnir = $("#admin_turnir_seasonct").val();
        var weigth = $("#admin_weigth_seasonct").val();
        var product = $("#admin_product_seasonct").val();
        var vid_sporta = $("#admin_vidsporta_seasonct option:selected").text();
        var minframe = $("#admin_minframe_seasonct option:selected").index();
        //console.log("Start:" + $("#ditetime_start_at").val() + ", Public:" + $("#ditetime_public_at").val());
        var start_at = $("#ditetime_start_at").val();
        $.post('/php/create_stream.php',{name: main, region: region, season: season, turnir: turnir, weigth: weigth, product: product, vid_sporta: vid_sporta, minframe: minframe, start_at: start_at}, function(data)  {  //admin_input_select
            //alert("Text:"+data);admin_input_seasonct   ditetime_start_at
            //console.log(data);
            var output = $.parseJSON(data);
            //console.log(output);
            var list = output.data;
             $('#admin_link_playct').val(list.play_link);
            $.each(list,function(i,item){
                console.log("Video inform:\r\n");
                console.log("data:\r\n" + "id: " + item.id + "\r\nworkspace_id: " + item.workspace_id + "\r\nparent_id: " + item.parent_id + "\r\nname: " + item.name +
                    "\r\nsubtitle: " + item.subtitle + "\r\ntype: " + item.type + "\r\nstreamkey: " + item.streamkey + "\r\nauto_start: " + item.auto_start + "\r\nprotected: " + item.protected +
                    "\r\ntime_shift: " + item.time_shift); 
                
            });
            
        });
        //window.location.href='/stream';//?block-admin-input='+id;
        //var month = label.val('month');
        //var year = label.val('year');
        //var text = label.text();
        //alert(text);
        //alert("Button clicked!"); // This will display an alert when the button with id "myButton" is clicked
        //$('#popup-back').toggle();
        
    });
});
/**
 * "data": {
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
 }
}
 */