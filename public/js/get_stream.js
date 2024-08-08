$(document).ready(function() {
    //$("#admin-video-list-btn").on('click', function(){
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
                console.log("\r\nRecord: \r\n parent_id: " + item.record.parent_id + "\r\nvideo: \r\n presets: " + item.video.presets + "\r\naudio: \r\n channel_mapping: " + item.audio.channel_mapping + 
                    "\r\nreconnect_window:" + item.reconnect_window + "\r\nplay_link: " + item.play_link + "\r\nrtmp_link: " + item.rtmp_link + "\r\nscheduled: \r\n time: " + item.scheduled.time);
                console.log("\r\nstream: \r\n id: " + item.stream.id + "\r\nevent_id: " + item.stream.event_id + "\r\nstatus: " + item.stream.status + "\r\nstarted_at: " + item.stream.started_at +  "\r\nfinished_at: " + item.stream.finished_at);
                console.log("\r\nchat_after_stream: " + item.chat_after_stream + "\r\nchat_active: " + item.chat_active + "\r\nchat_preview: " + item.chat_preview + "\r\nshow_members: " + item.show_members +
                    "\r\ncreated_at" + item.created_at + "\r\nupdated_at: " + item.updated_at + "\r\nlatency_mode: " + item.latency_mode + "\r\nallow_chat_links: " + item.allow_chat_links +
                    "\r\nmoderators: " + item.moderators);
                console.log("\r\nposter \r\nid:" + item.poster.id + "\r\ntype: " + item.poster.type + "\r\nstatus" + item.poster.status + "\r\nactive: " + item.poster.active + "\r\noriginal: " + 
                    "\r\nmd: " + item.poster.md + "\r\nsm: " + item.poster.sm + "\r\nxs: " + item.poster.xs +"\r\nfrom_time" + item.poster.from_time + "\r\nto_time" + item.poster.to_time);
                var vid_sport = "pipez";
                if(item.parent_id == "a3baa3cf-2c8b-4f14-9081-1b84d5930f23"){
                    vid_sport = "Баскетбол";
                } else if(item.parent_id == "f124464a-70eb-4c94-9b14-21d06af7aaf0"){
                    vid_sport = "Волейбол";
                }else if(item.parent_id == "76be9caa-5ca7-4ac7-947e-4e7042b40632"){
                    vid_sport = "Тест";
                } else {
                    vid_sport = "Нет такой группы:" + item.parent_id;
                }
                var d = jQuery.datepicker.parseDate("yy-mm-ddT00:00:00.000Z", item.stream.finished_at);
                console.log(d);
                    $("#admin-video-list").append(
                    '<li class="admin-video-item admin-back" id="' + item.id + '">' + 
                        '<div class="admin-video-sort-wrap">' + 
                            '<input id="admin-vl1" class="admin-video-sort-check" type="checkbox">' +
					        '<label class="admin-video-check-label" for="admin-vl1"></label>' + 
                        '</div>' + 	
                        '<div class="admin-video-prev">' + 
                            '<img src="' + item.poster.sm + '" alt="" class="" style="heigth: 100%; width: 100%">' +
                            '<img src="img/rub2.png" alt="" class="admin-video-prev-stik">' +
					        //'<p>Нет потока</p>' + 
                        '</div>' + 
                        '<div class="admin-video-item-header">' + 
                            '<div class="admin-video-item-h-list">' + 
                            '<span class="admin-video-item-h-date">' + item.name + '</span>' +
					    '</div>' + 
                        '<div class="admin-video-item-h-hashtag">' + 
                            '<span class="admin-video-hashtag-date">2023-2024</span>' + 
                            '<span class="admin-video-hashtag-kubok">Кубок Феникса</span>' +
					        '<span class="admin-video-hashtag-group">Ю11</span>' +
						    '<span class="admin-video-hashtag-sport">'+ vid_sport +'</span>' +
						    '<span class="admin-video-hashtag-city">Псков</span>' +
						    '<span class="admin-video-hashtag-org">ЦРСП "ФЕНИКС"</span>' +
					    '</div>' +
				    '</div>' +
				    '<div class="admin-video-item-view">' +
					    '<p class="admin-video-item-v-count"><span>1342</span>просмотра</p>' +
					    '<p class="admin-video-item-v-region">Все регионы</p>' +
				    '</div>' +
				    '<div class="admin-video-item-info admin-video-item-view">' +
					    '<p class="admin-video-item-i-time">Закончилась в<span>15:19</span></p>' +
					    '<p class="admin-video-item-i-date">' + item.stream.finished_at + '</p>' +
					    '<a href="#" class="admin-video-item-i-link"><img src="img/right-arrow.svg" alt="Поделиться"></a>' +
				    '</div>' + 
                '</li>');
            });
            
        });

        //var month = label.val('month');
        //var year = label.val('year');
        //var text = label.text();
        //alert(text);
        //alert("Button clicked!"); // This will display an alert when the button with id "myButton" is clicked
        //$('#popup-back').toggle();
    //$("li").on('dblclick', function(){    
        //alert("Double penetration");
    //});
    $(document).on('dblclick', '.admin-video-item', function() {
        alert("Text: " + this.id);
    });
});

/**
 * $('.btn').click(function(){
   $('#'+$(this).data('id')).toggle();
});
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