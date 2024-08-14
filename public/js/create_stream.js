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
            console.log(data);
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
                $('#admin_link_playct').val(item.play_link);
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