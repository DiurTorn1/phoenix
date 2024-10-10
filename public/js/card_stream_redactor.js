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
    $('#img_banner_trash').hide();
        var params = new window.URLSearchParams(window.location.search);
        //console.log("MSG:" + params.get('block-admin-input'));

    $.post('/php/get_stream_id.php', { id:params.get('admin_input_id') },  function(data)  {
        var output = $.parseJSON(data);
        var list = output.data;

        //$.each(list,function(i,item){
            //if(item.id == params.get('admin_input_id')){
                    console.log("Video inform:\r\n");
                    console.log(/*"id: " + item.id + "\r\nworkspace_id: " + item.workspace_id + "\r\nparent_id: " + item.parent_id + "\r\nname: " + item.name + "\r\nsubtitle: " + item.subtitle +
                        "\r\ntype: " + item.type + */"\r\nstreamkey: " + list.streamkey /*+ "\r\nauto_start: " + item.auto_start + "\r\nprotected: " + item.protected + "\r\ntime_shift: " + item.time_shift*/); 
                    console.log(/*"\r\nRecord: \r\n parent_id: " + item.record.parent_id + "\r\nvideo: \r\n presets: " + item.video.presets + "\r\naudio: \r\n channel_mapping: " + item.audio.channel_mapping + 
                        //"\r\nreconnect_window:" + item.reconnect_window + "\r\nplay_link: " + item.play_link + */"\r\nrtmp_link: " + list.rtmp_link /*+ "\r\nscheduled: \r\n time: " + item.scheduled.time*/);
                    //console.log("\r\nstream: \r\n id: " + item.stream.id + "\r\nevent_id: " + item.stream.event_id + "\r\nstatus: " + item.stream.status + "\r\nstarted_at: " + item.stream.started_at +  "\r\nfinished_at: " + item.stream.finished_at);
                    //console.log("\r\nchat_after_stream: " + item.chat_after_stream + "\r\nchat_active: " + item.chat_active + "\r\nchat_preview: " + item.chat_preview + "\r\nshow_members: " + item.show_members +
                        //"\r\ncreated_at" + item.created_at + "\r\nupdated_at: " + item.updated_at + "\r\nlatency_mode: " + item.latency_mode + "\r\nallow_chat_links: " + item.allow_chat_links +
                        //"\r\nmoderators: " + item.moderators);
                    //console.log("\r\nposter \r\nid:" + item.poster.id + "\r\ntype: " + item.poster.type + "\r\nstatus" + item.poster.status + "\r\nactive: " + item.poster.active + "\r\noriginal: " + 
                        //"\r\nmd: " + item.poster.md + "\r\nsm: " + item.poster.sm + "\r\nxs: " + item.poster.xs +"\r\nfrom_time" + item.poster.from_time + "\r\nto_time" + item.poster.to_time);
                    //console.log("autoplay_video_ch:" + item.auto_start + " , chat_video_ch:" + item.chat_active); // autoplay_video_ch  chat_video_ch
                    $('#admin-input-main').val(list.name);
                    initial_name = list.name;
                    poster_id_par = list.poster.id;
                    stream_id_par = list.stream.id;
                    parent_id_par = list.record.parent_id;
                    streamkey_par = list.streamkey;
                    name_stream = list.name;
                    name_card = list.card;
                    id_card = list.id;
                    workspace_id_card = list.workspace_id;
                    parent_id_card = list.parent_id; 
                    play_link_card = list.play_link;
                    rtmp_link_card = list.rtmp_link;
                    //https://phoenix.tehnodir.ru/player_stream?player_stream_id=81cd4861-bccc-4d10-bad9-9296e9484652
                    $('#card_link_play').val('https://phoenix.tehnodir.ru/player_stream?player_stream_id='+list.id);//list.play_link);
                    $('#img_poster_card').attr("src", list.poster.original);
                    $('#autoplay_video_ch').attr('checked', list.auto_start);
                    $('#chat_video_ch').attr('checked', list.chat_active);
                    var tegs = list.subtitle;
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
                    $('#player_stream_card_link').attr('src', list.play_link);
                    //$("#admin_card_product").val('100%');
                    $.post('/php/get_product_all.php', function(data)  {
                        //for(var i=0; i<data.length;i++){
                            var output = $.parseJSON(data);
                            $.each(output,function(i,item){
                                if(item.initial){
                                    //console.log(item.initial);
                                    $.post('/php/get_product_table.php', { table:item.initial }, function(data)  {
                                        //console.log(data);
                                        var key_product_get = 0;
                                        var output1 = $.parseJSON(data);
                                        $.each(output1,function(i,item1){
                                            if(item1.id_stream == id_card){
                                                key_product_get = 1;
                                            }
                                            
                                        });
                                        if(key_product_get != 1){
                                            $.post('/php/get_product_card.php', {id:item.id_product}, function(data)  {
                                                var pars = data.split("&");
                                                //console.log(pars[1]);
                                                $('#admin_card_product').append($('<option>', {
                                                    value: 1,
                                                    text: pars[1]
                                                }));
                                            });
        
                                        }
                                    });
                                }



                                //console.log(item.id_product);
                            });
                            
                        //}
                        
                    });
                    /*$.post('/php/entrypoints_stream_get.php', {stream:name_stream}, function(data)  {
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
                    });*/
                    
                    $("#admin_card_vidsporta option:selected").text(vid_sport);
                    $("#admin_card_minframe option:selected").index(0);
                    var time_get = list.stream.started_at;
                    var pars_time = time_get.split("T");
                    var hour_min_sec = pars_time[1];
                    var hour_min = hour_min_sec.split(":");
                    var teme_plus = parseInt(hour_min[0])+3;
                    //console.log(teme_plus);
                    var tttime = '';
                    if(teme_plus <= 9){
                        tttime = '0'+teme_plus;
                    } else if(teme_plus > 9){
                        tttime = teme_plus;
                    }
                    $("#ditetime_card_start_at").val(pars_time[0] + "T" + tttime + ":" + hour_min[1]);
                    $.post('/php/get_stream_public.php', {name_stream:list.name}, function(data)  {
                        var output = $.parseJSON(data);
                        //$.each(output,function(i,item){
                        var pub_name = output? output[1]: '1';
                            if(pub_name==list.name){
                                 $('#public_stream').hide();
                                 $('#unpublic_stream').show();
                             }
                             //console.log(output[2]);
                             //console.log(output[3]);
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
            //}
                
        //});
    });
    var main_image;
    var image, image_name = '';
    var r = new Resumable({
        target: '/'
      });
      
      
      r.assignBrowse(document.getElementById('img_poster_card'));
      
      r.on('fileSuccess', function(file){
            console.log('fileSuccess',file);
            console.log(file.file);
            //$('#img_poster_card').attr("src", file.file);
            var reader = new FileReader();
            
            image_name = file.file.name;
            reader.readAsDataURL(file.file);
            //var output = $.parseJSON(file);
            // var form_data = new FormData();
            reader.onloadend = function(e) { 
                //console.log(e.target.result);
                $('#img_poster_card').attr("src", e.target.result);
                //console.log(e.target.result);
                main_image = e.target.result;
                var image_res = e.target.result;
                //console.log(image_res.split(',')[1]);
                image = image_res.split(',')[1];
                $.post('/php/upload_banners.php', { image: image, image_name:image_name }, function(data)  {
                    //console.log(data);
                    if(data === 'Successfully Uploaded'){ 
                        //<!--<a href="#" class="remove-preview-tournir" title="Удалить обложку"><img src="{{ asset('img/trash.png') }}" alt="Удалить обложку"></a>-->
                        //$("#banners_turnir").append('<a href="#" class="remove-preview-tournir" title="Удалить обложку"><img src="img/trash.png" alt="Удалить обложку"></a>');
                        $('#img_banner_trash').show();
                    }
                });

                //form_data.append('file',image);
                /*$.ajax({
                    url:'/php/upload_banners.php',
                    method:'POST',
                    data:form_data,
                    contentType:false,
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
                });*/
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

    $("#img_banner_trash").on('click', function(){
        $.post('/php/delete_banners.php', { image_name:image_name }, function(data)  {
            if(data === 'Successfully delete'){
                alert('Баннер удалён');
                $('#img_banner_trash').hide();
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
        var post_time1 = $("#ditetime_card_start_at").val();
        var post_time_pars = post_time1.split("T")
        var post_time_pars1 = post_time_pars[1].split(":");
        var teme_plus = parseInt(post_time_pars1[0])-3;
        var post_time = post_time_pars[0] + 'T'+ teme_plus + ':' + post_time_pars1[1];//$("#ditetime_card_start_at").val();
        var name_product = $("#admin_card_product option:selected").text();
        /*var name_entrypoints = $("#admin_card_entrypoint option:selected").text();
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
        });*/
        //if(!name_entrypoints){
            //alert("Entrypoint не выбран!");
        //} else {

        //}
        if(name_product && name_product != "Не добавлять к продукту"){
            $.post('/php/get_product_card_name.php', {name:name_product}, function(data)  {
                var pars = data.split("&");
                //console.log(pars[0]);
                $.post('/php/get_product_public.php', {id:pars[0]}, function(data)  {
                    //var pars = data.split("&");
                    var output = $.parseJSON(data);
                    console.log(output[4]);
                    var dNow1= new Date();
                    var localdate1= dNow1.getFullYear() + '-' + (dNow1.getMonth()+1) + '-' + dNow1.getDate() + ' ' + dNow1.getHours() + ':' + dNow1.getMinutes() + ':00';//2024-08-28 15:37:32
                    $.post('/php/add_table_product.php', {table:output[4], id_stream:id_card, reg_date:localdate1 }, function(data)  {
                        if(data == "OK"){
                            
                            $.post('/php/upload_stream.php', { id: id_card, workspace_id: workspace_id_card, parent_id:parent_id_card, name:name_card, sezon:sezon, kubok:kubok, weigth:weigth
                                ,vid_sport:vid_sport, gorod: gorod, boss:boss, region:region, play_link:play_link_card, rtmp_link:rtmp_link_card, post_time:post_time, streamkey_par:streamkey_par,
                                parent_id_par:parent_id_par, stream_id_par:stream_id_par, poster_id_par:poster_id_par, ch_autoplay:check_autoplay, ch_chat:check_chat }, function(data){
                                var output = $.parseJSON(data);
                                //console.log(output);
                                var list = output.data;
                                if(image_name){
                                    $.post('/php/upload_poster.php',{ image_name:image_name, id:params.get('admin_input_id') }, function(data){
                                        console.log(data);
                                    });
                                }
                                
                                    //console.log("Video inform:\r\n"); UPDATE `product_public_permission` SET `initial`='Raid shadow legends' WHERE `id_product`='34'
                                    //console.log(list.id);// + "\r\nworkspace_id: " + item.workspace_id + "\r\nparent_id: " + item.parent_id + "\r\nname: " + item.name + "\r\nsubtitle: " + item.subtitle +
                                    if(id_card == params.get('admin_input_id')){
                                        alert("Стрим добавлен к продукту: " + name_product + "Редактирование успешно!");
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
            
            $.post('/php/upload_stream.php', { id: id_card, workspace_id: workspace_id_card, parent_id:parent_id_card, name:name_card, sezon:sezon, kubok:kubok, weigth:weigth
                ,vid_sport:vid_sport, gorod: gorod, boss:boss, region:region, play_link:play_link_card, rtmp_link:rtmp_link_card, post_time:post_time, streamkey_par:streamkey_par,
                parent_id_par:parent_id_par, stream_id_par:stream_id_par, poster_id_par:poster_id_par }, function(data){
                var output = $.parseJSON(data);
                //console.log(output);
                //console.log("Image:" + main_image);
                //var parse_img = main_image.split(",");
                if(image_name){
                    $.post('/php/upload_poster.php',{ image_name:image_name, id:params.get('admin_input_id') }, function(data){
                        //console.log(data);
                        var output = $.parseJSON(data);
                        var list2 = output.data;
                        $.each(list2,function(i,item2){
                            if(item2.id == params.get('admin_input_id')){
                                //alert("Постер добавлен к стриму");
                            }
                        });
    
                    });
                }

                if(output.error){
                    alert('Стрим закончен! Редактирование не возможно!');
                    //window.location.href='/stream';
                } else {
                    var list = output.data;
                    //console.log("Video inform:\r\n"); UPDATE `product_public_permission` SET `initial`='Raid shadow legends' WHERE `id_product`='34'
                    //console.log(list.id);// + "\r\nworkspace_id: " + item.workspace_id + "\r\nparent_id: " + item.parent_id + "\r\nname: " + item.name + "\r\nsubtitle: " + item.subtitle +
                    if(id_card == params.get('admin_input_id')){
                        alert("Стрим не добавлен к продукту Редактирование стрима успешно!");
                        window.location.href='/stream';
                    } else {
                        alert("Ошибка редактирования!");
                        console.log(data);
                    }
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
    $("#unpublic_stream").on('click', function(){
        $.post('/php/unpublic_stream.php', { name_stream: name_stream }, function(data){
            if(data == "OK"){
                alert("Продукт снят с публикации");
                $('#public_stream').show();
                $('#unpublic_stream').hide();
            }
            //console.log(data);
        });
    });

    
    $("#copy_serch_link").on('click', function(){
        var $temp = $('#card_link_play').val();
        navigator.clipboard.writeText($temp);
        $('.admin-video-link-copy').hide();
    });
    
});