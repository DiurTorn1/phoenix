$(document).ready(function() {
    //$("#jjj").on('click', function(){/card_stream
    var vid_sport = "";
    var gorod = "";
    var kubok = "";
    var weigth = "";
    var sezon = "";
    var boss = "";
    var region = "";
    var name_card = "";
    var id_card, workspace_id_card, parent_id_card, play_link_card, rtmp_link_card;
        var params = new window.URLSearchParams(window.location.search);
        //console.log("MSG:" + params.get('block-admin-input'));
        $.post('/php/get_stream.php', function(data)  {
            var output = $.parseJSON(data);
            var list = output.data;

            $.each(list,function(i,item){
                if(item.id == params.get('admin_input_id')){
                    console.log("Video inform:\r\n");
                    console.log(/*"id: " + item.id + "\r\nworkspace_id: " + item.workspace_id + "\r\nparent_id: " + item.parent_id + "\r\nname: " + item.name + "\r\nsubtitle: " + item.subtitle +
                        "\r\ntype: " + item.type + */"\r\nstreamkey: " + item.streamkey /*+ "\r\nauto_start: " + item.auto_start + "\r\nprotected: " + item.protected + "\r\ntime_shift: " + item.time_shift*/); 
                    console.log(/*"\r\nRecord: \r\n parent_id: " + item.record.parent_id + "\r\nvideo: \r\n presets: " + item.video.presets + "\r\naudio: \r\n channel_mapping: " + item.audio.channel_mapping + 
                        //"\r\nreconnect_window:" + item.reconnect_window + "\r\nplay_link: " + item.play_link + */"\r\nrtmp_link: " + item.rtmp_link /*+ "\r\nscheduled: \r\n time: " + item.scheduled.time*/);
                    //console.log("\r\nstream: \r\n id: " + item.stream.id + "\r\nevent_id: " + item.stream.event_id + "\r\nstatus: " + item.stream.status + "\r\nstarted_at: " + item.stream.started_at +  "\r\nfinished_at: " + item.stream.finished_at);
                    //console.log("\r\nchat_after_stream: " + item.chat_after_stream + "\r\nchat_active: " + item.chat_active + "\r\nchat_preview: " + item.chat_preview + "\r\nshow_members: " + item.show_members +
                        //"\r\ncreated_at" + item.created_at + "\r\nupdated_at: " + item.updated_at + "\r\nlatency_mode: " + item.latency_mode + "\r\nallow_chat_links: " + item.allow_chat_links +
                        //"\r\nmoderators: " + item.moderators);
                    //console.log("\r\nposter \r\nid:" + item.poster.id + "\r\ntype: " + item.poster.type + "\r\nstatus" + item.poster.status + "\r\nactive: " + item.poster.active + "\r\noriginal: " + 
                        //"\r\nmd: " + item.poster.md + "\r\nsm: " + item.poster.sm + "\r\nxs: " + item.poster.xs +"\r\nfrom_time" + item.poster.from_time + "\r\nto_time" + item.poster.to_time);
                    $('#admin-input-main').val(item.name);
                    name_card = item.card;
                    id_card = item.id;
                    workspace_id_card = item.workspace_id;
                    parent_id_card = item.parent_id; 
                    play_link_card = item.play_link;
                    rtmp_link_card = item.rtmp_link;
                    $('#card_link_play').val(item.play_link);
                    $('#img_poster_card').attr("src", item.poster.sm);
                    var tegs = item.subtitle;
                    var pars = tegs.split("&");
                    sezon = pars[0];
                    kubok = pars[1];
                    weigth = pars[2];
                    vid_sport = pars[3];
                    gorod = pars[4];
                    boss = pars[5];
                    region = pars[6];
                    $("#card_region_select option:selected").text(region);
                    $("#admin_card_season").val(sezon);
                    $("#admin_card_turnir").val(kubok);
                    $("#admin_card_weigth").val(weigth);
                    $("#admin_card_product").val('100%');
                    $("#admin_card_vidsporta option:selected").text(vid_sport);
                    $("#admin_card_minframe option:selected").index(0);
                    var time_get = item.stream.started_at;
                    var pars_time = time_get.split("T");
                    var hour_min_sec = pars_time[1];
                    var hour_min = hour_min_sec.split(":");
                    $("#ditetime_card_start_at").val(pars_time[0] + "T" + hour_min[0] + ":" + hour_min[1]);
                    /*$("#block-admin-left").append(
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
                    '</div>');  */ 
                }
                
            });
        });
        //alert();
        //$('#admin-input-main').appendVal();card_broadcast
    //});upload_stream
    $("#upload_stream").on('click', function(){
        name_card = $('#admin-input-main').val();
        region = $("#card_region_select option:selected").text();
        sezon = $("#admin_card_season").val();
        kubok = $("#admin_card_turnir").val();
        weigth = $("#admin_card_weigth").val();
        //sezon = pars[0];
        //kubok = pars[1];
        //weigth = pars[2];
        //vid_sport = pars[3];
        gorod = " ";//pars[4];
        boss = " ";//pars[5];
        //region = pars[6];
        //$("#admin_card_product").val('100%');
        vid_sport = $("#admin_card_vidsporta option:selected").text();
        var post_time = $("#ditetime_card_start_at").val();
        //alert("Сделайте загадочное лицо! Произошло что-то подозрительное!");
        $.post('/php/upload_stream.php', { id: id_card, workspace_id: workspace_id_card, parent_id:parent_id_card, name:name_card, sezon:sezon, kubok:kubok, weigth:weigth
            ,vid_sport:vid_sport, gorod: gorod, boss:boss, region:region, play_link:play_link_card, rtmp_link:rtmp_link_card, post_time:post_time }, function(data){
            console.log(data);
        });
        //window.location.href='/card_stream?admin_input_id='+params.get('admin_input_id');
    });
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