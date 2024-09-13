

$(document).ready(function() {
    //$("#jjj").on('click', function(){/card_stream
        var params = new window.URLSearchParams(window.location.search);
        var stream_key;
        //console.log("MSG:" + params.get('block-admin-input'));
        $.post('/php/get_stream.php', function(data)  {
            var output = $.parseJSON(data);
            var list = output.data;
            var name_stream;

            $.each(list,function(i,item){
                if(item.id == params.get('admin_input_id')){
                    console.log("Video inform:\r\n");
                    console.log(/*"id: " + item.id + "\r\nworkspace_id: " + item.workspace_id + "\r\nparent_id: " + item.parent_id + "\r\nname: " + item.name + "\r\nsubtitle: " + item.subtitle +
                        "\r\ntype: " + item.type + */"\r\nstreamkey: " + item.streamkey /*+ "\r\nauto_start: " + item.auto_start + "\r\nprotected: " + item.protected + "\r\ntime_shift: " + item.time_shift*/); 
                    console.log(/*"\r\nRecord: \r\n parent_id: " + item.record.parent_id + "\r\nvideo: \r\n presets: " + item.video.presets + "\r\naudio: \r\n channel_mapping: " + item.audio.channel_mapping + 
                        //"\r\nreconnect_window:" + item.reconnect_window + */"\r\nplay_link: " + item.play_link + "\r\nrtmp_link: " + item.rtmp_link /*+ "\r\nscheduled: \r\n time: " + item.scheduled.time*/);
                    //console.log("\r\nstream: \r\n id: " + item.stream.id + "\r\nevent_id: " + item.stream.event_id + "\r\nstatus: " + item.stream.status + "\r\nstarted_at: " + item.stream.started_at +  "\r\nfinished_at: " + item.stream.finished_at);
                    //console.log("\r\nchat_after_stream: " + item.chat_after_stream + "\r\nchat_active: " + item.chat_active + "\r\nchat_preview: " + item.chat_preview + "\r\nshow_members: " + item.show_members +
                        //"\r\ncreated_at" + item.created_at + "\r\nupdated_at: " + item.updated_at + "\r\nlatency_mode: " + item.latency_mode + "\r\nallow_chat_links: " + item.allow_chat_links +
                        //"\r\nmoderators: " + item.moderators);
                    //console.log("\r\nposter \r\nid:" + item.poster.id + "\r\ntype: " + item.poster.type + "\r\nstatus" + item.poster.status + "\r\nactive: " + item.poster.active + "\r\noriginal: " + 
                        //"\r\nmd: " + item.poster.md + "\r\nsm: " + item.poster.sm + "\r\nxs: " + item.poster.xs +"\r\nfrom_time" + item.poster.from_time + "\r\nto_time" + item.poster.to_time);
                    $('#player_broadcast').attr('src', item.play_link);
                    name_stream = item.name;
                    $.post('/php/entrypoints_stream_get.php', {stream:name_stream}, function(data)  {
                        var output = $.parseJSON(data);
                        var srteam_get = output? output[1]: '1';
                        if(srteam_get == name_stream){
                            console.log("Entrypoints: "+output[2]);
                            $('#etrypoints_vibor').append($('<option>', {
                                value: 1,
                                text: output[2]
                            }));
                        }
                    });
                    $('#RTMP_url_input').val(item.rtmp_link);
                    stream_key = item.streamkey;
                    $('#RTMP_key_input').val(item.streamkey);
                        /*$('#admin-input-main').val(item.name);id="RTMP_url_input"
                    $("#block-admin-left").append(
                        '<div class="block-admin-container admin-back">' + 
                        '<div class="block-admin-section">' +
                        '<label>Подключите трансляцию</label>' +
                            '<div class="block-admin-sector block-admin-container block-admin-section-item">' +
                                '<div class="admin-input-box admin-input-wrap">' +
                                    '<label>RTMP сервер</label>' +
                                    '<input type="text" name="" class="block-admin-input 		admin-input" placeholder=" " value="' + item.rtmp_link + '">' +
                                '</div>' +
                            '</div>' +
                            '<div class="block-admin-sector block-admin-container block-admin-section-item">' +
                                '<div class="admin-input-box admin-input-wrap">' +
                                    '<label>Ключ потока</label>' +
                                    '<input type="text" name="" class="block-admin-input 		admin-input" placeholder=" " value="' + item.streamkey + '">' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                    '</div>');   */
                }
                
            });
        });
    $("#etrypoints_vibor").change( function() {
        if($("#etrypoints_vibor option:selected").text() == 'Entrypoint по умолчанию'){
            $('#RTMP_key_input').val(item.streamkey);
        } else {
            $('#RTMP_key_input').val('1234');
        }
        //alert($("#etrypoints_vibor option:selected").text() + " / " + stream_key);
    });
});

