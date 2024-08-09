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
                console.log(/*"id: " + item.id + "\r\nworkspace_id: " + item.workspace_id + "\r\nparent_id: " + item.parent_id + */"\r\nname: " + item.name /*+ "\r\nsubtitle: " + item.subtitle +
                    "\r\ntype: " + item.type + "\r\nstreamkey: " + item.streamkey + "\r\nauto_start: " + item.auto_start + "\r\nprotected: " + item.protected + "\r\ntime_shift: " + item.time_shift*/); 
                console.log(/*"\r\nRecord: \r\n parent_id: " + item.record.parent_id + "\r\nvideo: \r\n presets: " + item.video.presets + "\r\naudio: \r\n channel_mapping: " + item.audio.channel_mapping + 
                    "\r\nreconnect_window:" + item.reconnect_window + */"\r\nplay_link: " + item.play_link /*+ "\r\nrtmp_link: " + item.rtmp_link + "\r\nscheduled: \r\n time: " + item.scheduled.time);
                console.log("\r\nstream: \r\n id: " + item.stream.id + "\r\nevent_id: " + item.stream.event_id + "\r\nstatus: " + item.stream.status + "\r\nstarted_at: " + item.stream.started_at +  "\r\nfinished_at: " + item.stream.finished_at*/);
                //console.log("\r\nchat_after_stream: " + item.chat_after_stream + "\r\nchat_active: " + item.chat_active + "\r\nchat_preview: " + item.chat_preview + "\r\nshow_members: " + item.show_members +
                    //"\r\ncreated_at" + item.created_at + "\r\nupdated_at: " + item.updated_at + "\r\nlatency_mode: " + item.latency_mode + "\r\nallow_chat_links: " + item.allow_chat_links +
                    //"\r\nmoderators: " + item.moderators);
                //console.log("\r\nposter \r\nid:" + item.poster.id + "\r\ntype: " + item.poster.type + "\r\nstatus" + item.poster.status + "\r\nactive: " + item.poster.active + "\r\noriginal: " + 
                    //"\r\nmd: " + item.poster.md + "\r\nsm: " + item.poster.sm + "\r\nxs: " + item.poster.xs +"\r\nfrom_time" + item.poster.from_time + "\r\nto_time" + item.poster.to_time);
                    $("#index-live").append(
                        '<h2>Прямой эфир</h2>' +
                        '<div class="index-live-list">' +
                            '<div class="index-live-item">' +
                                '<div class="index-live-item-video">' +
                                    '<iframe' +
                                    'src="https://kinescope.io/dmY1DEguQjTJFgKxCnTXCN"' +
                                    'width="640"' +
                                    'height="360"' +
                                    'frameborder="0"' +
                                    'allow="autoplay; fullscreen; picture-in-picture; encrypted-media; gyroscope; accelerometer; clipboard-write;"' +
                                    '></iframe>' +
                                '</div>' +
                                '<div class="index-live-item-text">' +
                                    '<a href="#">' + item.name + '</a>' +
                                '</div>' +
                            '</div>' +
                        '</div>');
            });
            
        });
});