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
    var id_card, workspace_id_card, parent_id_card, play_link_card, rtmp_link_card, 
        streamkey_par, parent_id_par, stream_id_par, poster_id_par, initial_name;

    var name_stream = "";
    var type_stream = "";
    $('#unpublic_stream').hide();
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
                    //console.log("autoplay_video_ch:" + item.auto_start + " , chat_video_ch:" + item.chat_active); // autoplay_video_ch  chat_video_ch
                    $('#admin-input-main').val(item.name);
                    initial_name = item.name;
                    poster_id_par = item.poster.id;
                    stream_id_par = item.stream.id;
                    parent_id_par = item.record.parent_id;
                    streamkey_par = item.streamkey;
                    name_stream = item.name;
                    name_card = item.card;
                    id_card = item.id;
                    workspace_id_card = item.workspace_id;
                    parent_id_card = item.parent_id; 
                    play_link_card = item.play_link;
                    rtmp_link_card = item.rtmp_link;
                    $('#card_link_play').val(item.play_link);
                    $('#img_poster_card').attr("src", item.poster.sm);
                    $('#autoplay_video_ch').attr('checked', item.auto_start);
                    $('#chat_video_ch').attr('checked', item.chat_active);
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
                    //$("#admin_card_weigth").val(weigth);
                    $("#admin_card_weigth option:selected").text(weigth);
                    //$("#admin_card_product").val('100%');
                    $.post('/php/get_product_all.php', function(data)  {
                        //for(var i=0; i<data.length;i++){
                            var output = $.parseJSON(data);
                            $.each(output,function(i,item){
                                if(!item.initial){
                                    $.post('/php/get_product_card.php', {id:item.id_product}, function(data)  {
                                        var pars = data.split("&");
                                        //console.log(pars[1]);
                                        $('#admin_card_product').append($('<option>', {
                                            value: 1,
                                            text: pars[1]
                                        }));
                                    });

                                }

                                //console.log(item.id_product);
                            });
                            
                        //}
                        
                    });
                    $.post('/php/entrypoints_stream_get.php', {stream:name_stream}, function(data)  {
                        var output = $.parseJSON(data);
                        var srteam_get = output? output[1]: '1';
                        if(srteam_get == name_stream){
                            console.log("Entrypoints: "+output[2]);
                            $('#admin_card_entrypoint').append($('<option>', {
                                value: 1,
                                text: output[2]
                            }));
                        } else {
                            $.post('/php/entrypoints_get.php', function(data)  {
                                //for(var i=0; i<data.length;i++){
                                    var output = $.parseJSON(data);
                                    //console.log(item.sity);
                                    //console.log(item.zal);
                                    //console.log(item.key_stream);
                                    //console.log(item.create_at);
                                    $.each(output,function(i,item){
                                        $('#admin_card_entrypoint').append($('<option>', {
                                            value: 1,
                                            text: item.sity + '(' + item.zal + ')'
                                        }));
        
                                        //console.log(item.id_product);
                                    });
                                    
                                //}
                                
                            });
                        }
                    });

                    $("#admin_card_vidsporta option:selected").text(vid_sport);
                    $("#admin_card_minframe option:selected").index(0);
                    var time_get = item.stream.started_at;
                    var pars_time = time_get.split("T");
                    var hour_min_sec = pars_time[1];
                    var hour_min = hour_min_sec.split(":");
                    $("#ditetime_card_start_at").val(pars_time[0] + "T" + hour_min[0] + ":" + hour_min[1]);
                    $.post('/php/get_stream_public.php', {name_stream:item.name}, function(data)  {
                        var output = $.parseJSON(data);
                        //$.each(output,function(i,item){
                            if(output[1]==item.name){
                                 $('#public_stream').hide();
                                 $('#unpublic_stream').show();
                             }
                             console.log(output[2]);
                             console.log(output[3]);
                       //});
                
                    });
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
        
        var dNow = new Date();
        var localdate= dNow.getFullYear() + '-' + (dNow.getMonth()+1) + '-' + dNow.getDate() + ' ' + dNow.getHours() + ':' + dNow.getMinutes() + ':00';//2024-08-28 15:37:32
        name_card = $('#admin-input-main').val();
        region = $("#card_region_select option:selected").text();
        sezon = $("#admin_card_season").val();
        kubok = $("#admin_card_turnir").val();
        weigth = $("#admin_card_weigth option:selected").text();//$("#admin_card_weigth").val();
        var check_autoplay = $('#autoplay_video_ch').is(":checked");
        var check_chat = $('#chat_video_ch').is(":checked");
        //console.log("autoplay_video_ch: " + $('#autoplay_video_ch').is(":checked") + " , chat_video_ch: " + $('#chat_video_ch').is(":checked"));
        //sezon = pars[0];
        //kubok = pars[1];
        //weigth = pars[2];$('#check_id').is(":checked")
        //vid_sport = pars[3];
        gorod = " ";//pars[4];
        boss = " ";//pars[5];
        //region = pars[6];
        //$("#admin_card_product").val('100%');
        vid_sport = $("#admin_card_vidsporta option:selected").text();
        var post_time = $("#ditetime_card_start_at").val();
        var name_product = $("#admin_card_product option:selected").text();
        var name_entrypoints = $("#admin_card_entrypoint option:selected").text();
        $.post('/php/entrypoints_stream_get_name.php', {name_entrypoints:name_entrypoints}, function(data)  {
            var output = $.parseJSON(data);
            var entrypoints_get = output? output[2]: '1';
            console.log("Entrypoints: "+entrypoints_get);
            if(entrypoints_get == name_entrypoints){
                alert("Стрим ранее был добавлен к etrypoint");
            } else {
                $.post('/php/entrypoints_stream_add.php', {name_stream:name_stream, name_entrypoints:name_entrypoints, create_at:localdate}, function(data)  {
                    if(data=='OK'){
                        alert("Стрим: " + name_stream + " Добавлен к entrypoint:" + name_entrypoints);
                    } else {
                        alert("Ошибка добавления entrypoint к стриму!");
                    }
                });
            }
        });
        //if(!name_entrypoints){
            //alert("Entrypoint не выбран!");
        //} else {

        //}
        if(name_product){
            $.post('/php/get_product_card_name.php', {name:name_product}, function(data)  {
                var pars = data.split("&");
                //console.log(pars[0]);
                $.post('/php/get_product_public.php', {id:pars[0]}, function(data)  {
                    //var pars = data.split("&");
                    var output = $.parseJSON(data);
                    console.log(output[1]);
                    $.post('/php/upload_product_public.php', {id:output[1], initial:initial_name}, function(data)  {
                        if(data == "OK"){
                            alert("Стрим добавлен к продукту: " + name_product);
                            $.post('/php/upload_stream.php', { id: id_card, workspace_id: workspace_id_card, parent_id:parent_id_card, name:name_card, sezon:sezon, kubok:kubok, weigth:weigth
                                ,vid_sport:vid_sport, gorod: gorod, boss:boss, region:region, play_link:play_link_card, rtmp_link:rtmp_link_card, post_time:post_time, streamkey_par:streamkey_par,
                                parent_id_par:parent_id_par, stream_id_par:stream_id_par, poster_id_par:poster_id_par, ch_autoplay:check_autoplay, ch_chat:check_chat }, function(data){
                                var output = $.parseJSON(data);
                                //console.log(output);
                                var list = output.data;
                                    //console.log("Video inform:\r\n"); UPDATE `product_public_permission` SET `initial`='Raid shadow legends' WHERE `id_product`='34'
                                    //console.log(list.id);// + "\r\nworkspace_id: " + item.workspace_id + "\r\nparent_id: " + item.parent_id + "\r\nname: " + item.name + "\r\nsubtitle: " + item.subtitle +
                                    if(list.id == params.get('admin_input_id')){
                                        alert("Редактирование успешно!");
                                        window.location.href='/stream';
                                    } else {
                                        alert("Ошибка редактирования!");
                                        console.log(data);
                                    }
                                
                            });
                        } else {
                            console.log(data);
                        }
                    });
                });
            });
        }else{
            alert("Стрим не добавлен к продукту");
            $.post('/php/upload_stream.php', { id: id_card, workspace_id: workspace_id_card, parent_id:parent_id_card, name:name_card, sezon:sezon, kubok:kubok, weigth:weigth
                ,vid_sport:vid_sport, gorod: gorod, boss:boss, region:region, play_link:play_link_card, rtmp_link:rtmp_link_card, post_time:post_time, streamkey_par:streamkey_par,
                parent_id_par:parent_id_par, stream_id_par:stream_id_par, poster_id_par:poster_id_par }, function(data){
                var output = $.parseJSON(data);
                //console.log(output);
                var list = output.data;
                    //console.log("Video inform:\r\n"); UPDATE `product_public_permission` SET `initial`='Raid shadow legends' WHERE `id_product`='34'
                    //console.log(list.id);// + "\r\nworkspace_id: " + item.workspace_id + "\r\nparent_id: " + item.parent_id + "\r\nname: " + item.name + "\r\nsubtitle: " + item.subtitle +
                    if(list.id == params.get('admin_input_id')){
                        alert("Редактирование стрима успешно!");
                        window.location.href='/stream';
                    } else {
                        alert("Ошибка редактирования!");
                        console.log(data);
                    }
                
            });
        }

        //alert("Сделайте загадочное лицо! Произошло что-то подозрительное!");

        //window.location.href='/card_stream?admin_input_id='+params.get('admin_input_id');
    });
    $("#public_stream").on('click', function(){
        $.post('/php/public_stream.php', { name_stream: name_stream, type_stream:type_stream }, function(data){
            if(data == "OK"){
                alert("Продукт опубликован");
                $('#public_stream').hide();
                $('#unpublic_stream').show();
            }
            //console.log(data);
        });
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

    var r = new Resumable({
        target: '/'
      });
      
      
      r.assignBrowse(document.getElementById('img_poster_card'));
      
      r.on('fileSuccess', function(file){
            console.log('fileSuccess',file);
            console.log(file.file);
            //$('#img_poster_card').attr("src", file.file);
            var reader = new FileReader();
            var image, image_name = '';
            image_name = file.file.name;
            reader.readAsDataURL(file.file);
            //var output = $.parseJSON(file);
            var form_data = new FormData();
            reader.onloadend = function(e) { 
                //console.log(e.target.result);
                $('#img_poster_card').attr("src", e.target.result);
                //console.log(e.target.result);
                //var image_res = e.target.result;
                //console.log(image_res.split(',')[1]);
                //image = image_res.split(',')[1];
                form_data.append('file',e.target.result);
                $.ajax({
                    url:'/php/upload_banners.php',
                    method:'POST',
                    data:form_data,
                    contentType:'multipart/form-data',
                    cache:false,
                    processData:false,
                    beforeSend:function(){
                      //$('#msg').html('Loading......');
                      console.log('Loading......');
                    },
                    success:function(data){
                        //var output = $.parseJSON(data);
                        console.log(data);
                      //$('#msg').html(data);
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                       console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                    }
                });
            };

          
        });
      r.on('fileProgress', function(file){
          console.log('fileProgress', file);
        });
      r.on('fileAdded', function(file, event){
          r.upload();
          console.log('fileAdded...');
          //console.log('fileAdded...', event);
          //var output = $.parseJSON(file);
          //console.log(output);
          //console.log(file);
        });
      r.on('filesAdded', function(array){
          r.upload();
          //console.log('filesAdded', array);
        });
      r.on('fileRetry', function(file){
          console.log('fileRetry', file);
        });
      r.on('fileError', function(file, message){
          console.log('fileError', file, message);
        });
      r.on('uploadStart', function(){
          console.timeLog('uploadStart');
        });
      r.on('complete', function(){
          console.log('complete');
        });
      r.on('progress', function(){
          console.log('progress');
        });
      r.on('error', function(message, file){
          console.log('error', message, file);
        });
      r.on('pause', function(){
          console.log('pause');
        });
      r.on('cancel', function(){
          console.log('cancel');
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