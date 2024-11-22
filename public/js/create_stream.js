var head_name_gl, opisanie_strima_gl, start_at_gl;
var key_tog = 0, key_price = 0, key_banner = 0, key_load_prod = 0;
function search_int(){
    //console.log("Test");
    var arr_stat = [];
    var head_name = $('#block-admin-inputct').val();
    var opisanie_strima = $("#opisanie_strima").val();
    var start_at = $("#ditetime_start_at").val();

    if(!head_name){ head_name_gl = 0; arr_stat.push(0); } else { head_name_gl = 1; arr_stat.push(1); }
    if(!opisanie_strima){ opisanie_strima_gl = 0; arr_stat.push(0); } else { opisanie_strima_gl = 1; arr_stat.push(1); }
    if(!start_at){ start_at_gl = 0; arr_stat.push(0); } else { start_at_gl = 1; arr_stat.push(1); }
    if( key_banner ) { arr_stat.push(1); } else { arr_stat.push(0); }

    var allEqual = arr_stat.every(function(value, index, arr) {
        //console.log(value);
        //console.log(arr[0]);
        key_pod = value;
        return value === arr[0];
    });

    // Вывод результата
    if (allEqual) {
        if(!key_pod){
            $("#save-st").hide();
            $("#save-st-1").show();
            //console.log(arr_stat);
        } else {
            $("#save-st").show();
            $("#save-st-1").hide();
            key_load_prod = 1;
            //console.log(arr_stat);
        }
    } else {
        $("#save-st").hide();
        $("#save-st-1").show();
        //console.log(arr_stat);
    }
}

$(document).ready(function() {

    $('#img_banner_trash').hide();
    $('#save-st').hide();

    search_int();
    setInterval('search_int()', 500);

    $.post('/php/get_product_all.php', function(data)  {
        //for(var i=0; i<data.length;i++){
            var output = $.parseJSON(data);
            $.each(output,function(i,item){
                if(item.initial){
                    //console.log(item.initial);
                    //$.post('/php/get_product_table.php', { table:item.initial }, function(data)  {
                        //console.log(data);
                        //var key_product_get = 0;
                        //var output1 = $.parseJSON(data);
                        //$.each(output1,function(i,item1){
                            //if(item1.id_stream == id_card){
                                //key_product_get = 1;
                            //}
                            
                        //});
                        //if(key_product_get != 1){
                            $.post('/php/get_product_card.php', {id:item.id_product}, function(data)  {
                                var pars = data.split("&");
                                //console.log(pars[1]);
                                $('#admin_product_seasonct').append($('<option>', {
                                    value: 1,
                                    text: pars[1]
                                }));
                            });

                        //}
                    //});
                }



                //console.log(item.id_product);
            });
            
        //}
        
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
            $.post('/php/upload_banners_product.php', { image: image, image_name:image_name }, function(data)  {
                console.log(data);
                if(data === 'Successfully Uploaded'){ 
                    //<!--<a href="#" class="remove-preview-tournir" title="Удалить обложку"><img src="{{ asset('img/trash.png') }}" alt="Удалить обложку"></a>-->
                    //$("#banners_turnir").append('<a href="#" class="remove-preview-tournir" title="Удалить обложку"><img src="img/trash.png" alt="Удалить обложку"></a>');
                    key_banner = 1;
                    $('#img_banner_trash').show();
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
        console.log('fileAdded...', event);
        //var output = $.parseJSON(file);
        //console.log(output);
        //console.log(file);
    });
    r.on('filesAdded', function(array){
        r.upload();
        console.log('filesAdded', array);
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
        $.post('/php/delete_banners_product.php', { image_name:image_name }, function(data)  {
            if(data === 'Successfully delete'){
                //alert('Баннер удалён');
                key_banner = 0;
                $('#upload_main_banner_product').attr("src", 'img/no-image.jpg');
                $('#img_banner_trash').hide();
            }
        });
    });

    $("#save-st-1").on('click', function(){
        if(!head_name_gl){ $("#block-admin-inputct").addClass("user-input-err"); } else { $("#block-admin-inputct").removeClass("user-input-err"); }
        if(!opisanie_strima_gl){ $("#opisanie_strima").addClass("user-input-err"); } else { $("#opisanie_strima").removeClass("user-input-err"); }
        if(!start_at_gl){ $("#ditetime_start_at").addClass("user-input-err"); } else { $("#ditetime_start_at").removeClass("user-input-err"); }
        //if(!detail_get_gl){ $("#detail_save").addClass("user-input-err"); } else { $("#detail_save").removeClass("user-input-err"); }
        //if(!date_start_access_bilet_gl){ $("#date_start_access_bilet").addClass("user-input-err"); } else { $("#date_start_access_bilet").removeClass("user-input-err"); }
        //if(!date_stop_access_bilet_gl){ $("#date_stop_access_bilet").addClass("user-input-err"); } else { $("#date_stop_access_bilet").removeClass("user-input-err"); }
        //if(!date_stop_sell_bilet_gl){ $("#date_stop_sell_bilet").addClass("user-input-err"); } else { $("#date_stop_sell_bilet").removeClass("user-input-err"); }
        //if(!key_price){ $("#input_buff_product").addClass("user-input-err-1"); } else { $("#input_buff_product").removeClass("user-input-err-1"); }
        if(!key_banner){ $("#img_poster_card").addClass("user-input-err"); } else { $("#img_poster_card").removeClass("user-input-err"); }
    });

    $("#save-st").on('click', function(){
        var main = $('#block-admin-inputct').val();
        var region = $("#admin_region_selectct option:selected").text();
        var season = $("#admin_season_seasonct").val();
        var turnir = $("#admin_turnir_seasonct").val();
        var weigth = $("#admin_weigth_seasonct option:selected").text();//$("#admin_weigth_seasonct").val();
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
        var product = $("#admin_product_seasonct option:selected").text();//$("#admin_product_seasonct").val();
        var vid_sporta = $("#admin_vidsporta_seasonct option:selected").text();
        var minframe = $("#admin_minframe_seasonct option:selected").index();//
        var opisanie_strima = $("#opisanie_strima").val();
        //console.log("Start:" + $("#ditetime_start_at").val() + ", Public:" + $("#ditetime_public_at").val());
        var start_at = $("#ditetime_start_at").val();
        var post_time_pars = start_at.split("T")
        var post_time_pars1 = post_time_pars[1].split(":");
        var teme_plus = parseInt(post_time_pars1[0])-3;
        var post_time = post_time_pars[0] + 'T'+ teme_plus + ':' + post_time_pars1[1];//$("#ditetime_card_start_at").val();
        $.post('/php/create_stream.php',{name: main, region: region, season: season, turnir: turnir, weigth: weigth, opisanie_strima:opisanie_strima, product: product, vid_sporta: vid_sporta, minframe: minframe, start_at: post_time}, function(data)  {  //admin_input_select
            //alert("Text:"+data);admin_input_seasonct   ditetime_start_at
            //console.log(data);
            var output = $.parseJSON(data);
            //console.log(output);
            var list = output.data;
             $('#admin_link_playct').val(list.play_link);
             if(list.play_link){
                //alert("Стрим создан");
                if(image_name){
                    var idiss = list.id;
                    $.post('/php/upload_poster.php',{ image_name:image_name, id:list.id }, function(data){
                        //console.log(data);
                        var output = $.parseJSON(data);
                        var list2 = output.data;
                        $.each(list2,function(i,item2){
                            if(item2.id == idiss){
                                //alert("Постер добавлен к стриму");
                                window.location.href='/stream';
                            }
                        });
    
                    });
                }
             } else {
                //alert("Ошибка создания стрима");
             }
            //$.each(list,function(i,item){
                //console.log("Video inform:\r\n");
                //console.log("data:\r\n" + "id: " + item.id + "\r\nworkspace_id: " + item.workspace_id + "\r\nparent_id: " + item.parent_id + "\r\nname: " + item.name +
                    //"\r\nsubtitle: " + item.subtitle + "\r\ntype: " + item.type + "\r\nstreamkey: " + item.streamkey + "\r\nauto_start: " + item.auto_start + "\r\nprotected: " + item.protected +
                    //"\r\ntime_shift: " + item.time_shift); 
                
            //});
            
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