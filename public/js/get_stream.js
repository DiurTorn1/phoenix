var array_product = new Array();
var idch = 0;
var key_main_chack = 0;
var public_stream_list = new Array();
var get_ch_list = 1;

function dynamic_checkbox(){
    //video-btn-active 
    //
    var int_ch =0;
    if(key_main_chack){
        if($("#admin-video-sort-check").is(':checked')){//inter_stream
            for(var i = 0; i < idch; i++){
                $("#admin-vl" + i).prop('checked', true);
            }
        }  else {
            for(var i = 0; i < idch; i++){
                $("#admin-vl" + i).prop('checked', false);
            } 
        }
        key_main_chack = 0;
    }
    for(var i = 0; i < idch; i++){
        var ch1 = $("#admin-vl" + i).is(':checked');
        if(ch1){
            int_ch++;
        }
    }
    $('#inter_stream').text('Выбрано ' + int_ch + ' стримов');
    $('#span_select_list').text(get_ch_list);
    if(int_ch != 0){
        $('.admin-video-btn3').addClass('video-btn-active3');
    } else {
        $('.admin-video-btn3').removeClass('video-btn-active3');
    }
}
var count_stream = 0;
var array_stream = new Array();
var array_stream1 = new Array();
var key_paint = 0;
var num_list = 0;
var num_list1 = 5;
var num_list2 = 0;

function paint_element_stream(){
    var all_sel = 0;
    if(count_stream > 5){
        $('#block_select_stream_list').show();
        
        for(var i=0; i < count_stream; i=i+5){
            all_sel++;
        }
        $('#span_select_list_all').text(all_sel);
    }

    num_list2 = all_sel;
    var minus = 0;
    if(num_list1 > count_stream){
        minus = num_list1 - count_stream;
    } else {
        minus = 0;
    }
    var top_list = num_list1-minus;
    console.log(top_list);
    for(var i = num_list; i < top_list; i ++){
        $.post('/php/get_stream_id.php',{ id:array_stream[i] }, function(data)  {
            //console.log(data);
            var output = $.parseJSON(data);
            var list = output.data;
            //console.log(list.id);
            console.log("Video inform:\r\n");
            console.log("id: " + list.id + "\r\nworkspace_id: " + list.workspace_id + "\r\nparent_id: " + list.parent_id + "\r\nname: " + list.name + "\r\nsubtitle: " + list.subtitle +
                "\r\ntype: " + list.type + "\r\nstreamkey: " + list.streamkey + "\r\nauto_start: " + list.auto_start + "\r\nprotected: " + list.protected + "\r\ntime_shift: " + list.time_shift); 
            console.log("\r\nRecord: \r\n parent_id: " + list.record.parent_id + "\r\nvideo: \r\n presets: " + list.video.presets + "\r\naudio: \r\n channel_mapping: " + list.audio.channel_mapping + 
                "\r\nreconnect_window:" + list.reconnect_window + "\r\nplay_link: " + list.play_link + "\r\nrtmp_link: " + list.rtmp_link + "\r\nscheduled: \r\n time: " + list.scheduled.time);
            console.log("\r\nstream: \r\n id: " + list.stream.id + "\r\nevent_id: " + list.stream.event_id + "\r\nstatus: " + list.stream.status + "\r\nstarted_at: " + list.stream.started_at +  "\r\nfinished_at: " + list.stream.finished_at);
            console.log("\r\nchat_after_stream: " + list.chat_after_stream + "\r\nchat_active: " + list.chat_active + "\r\nchat_preview: " + list.chat_preview + "\r\nshow_members: " + list.show_members +
                "\r\ncreated_at" + list.created_at + "\r\nupdated_at: " + list.updated_at + "\r\nlatency_mode: " + list.latency_mode + "\r\nallow_chat_links: " + list.allow_chat_links +
                "\r\nmoderators: " + list.moderators);
            console.log("\r\nposter \r\nid:" + list.poster.id + "\r\ntype: " + list.poster.type + "\r\nstatus" + list.poster.status + "\r\nactive: " + list.poster.active + "\r\noriginal: " + list.poster.original +
                "\r\nmd: " + list.poster.md + "\r\nsm: " + list.poster.sm + "\r\nxs: " + list.poster.xs +"\r\nfrom_time" + list.poster.from_time + "\r\nto_time" + list.poster.to_time);

                var vid_sport = "";
                var gorod = "";
                var kubok = "";
                var weigth = "";
                var sezon = "";
                var boss = "";
                var region = "";
                var tegs = list.subtitle;
                var pars = tegs.split("&");
                sezon = pars[0];
                kubok = pars[1];
                weigth = pars[2];
                vid_sport = pars[3];
                gorod = pars[4];
                boss = pars[5];
                region = pars[6];
                //var product_global = '';
                var time_put, data_put;
                if(list.stream.finished_at === null){
                    //console.log("Трансляцич не закончена.");
                    var parse_start = list.stream.started_at;
                    var res_parstart = parse_start.split("T");
                    var res_parstart1 = res_parstart[0].split("-");
                    var res_parstart2 = res_parstart[1].split(":");
                    //console.log("Начало в: " + res_parstart2[0] + ":" + res_parstart2[1]);
                    time_put = "Начало в: " + res_parstart2[0] + ":" + res_parstart2[1];
                    //console.log(res_parstart1[2] + " " + res_parstart1[1] + " " + res_parstart1[0]);
                    data_put = res_parstart1[2] + " " + res_parstart1[1] + " " + res_parstart1[0];
                } else {
                    //console.log("Трансляция закончена: " + item.stream.finished_at)
                    var parse_start = list.stream.finished_at;
                    var res_parstart = parse_start.split("T");
                    var res_parstart1 = res_parstart[0].split("-");
                    var res_parstart2 = res_parstart[1].split(":");
                    //console.log("Закончено в: " + res_parstart2[0] + ":" + res_parstart2[1]);
                    time_put = "Закончено в: " + res_parstart2[0] + ":" + res_parstart2[1];
                    //console.log(res_parstart1[2] + " " + res_parstart1[1] + " " + res_parstart1[0]);
                    data_put = res_parstart1[2] + " " + res_parstart1[1] + " " + res_parstart1[0];
                }
                var key_post = 0;
                var initial_gl = list.name, pre_name;
                var json_product = $.parseJSON(array_product);
                $.each(json_product,function(i,item1){
                    //console.log(item1.initial);
                    if(item1.initial === initial_gl){
                    //get_product_gl = '<img src="img/rub2.png" alt="" class="admin-video-prev-stik">';
                        key_post = 1;
                        //pre_name = item1.initial;
                        //console.log(pre_name);
                    }
                });
                //console.log(json_product);
                //console.log(pre_name);//array_product);
                if(key_post){
                    pre_name = '<img src="img/rub2.png" alt="" class="admin-video-prev-stik">';
                }else{
                    pre_name = '';
                }
                //console.log("get_product_gl: " + key_post);
                //product_global = '<img src="img/rub2.png" alt="" class="admin-video-prev-stik">';
                $("#admin-video-list").append(
                    '<li class="admin-video-item admin-back" id="' + list.id + '">' + 
                        '<div class="admin-video-sort-wrap">' + 
                            '<input id="admin-vl' + idch +'" class="admin-video-sort-check" type="checkbox">' +
                            '<label class="admin-video-check-label" for="admin-vl' + idch + '"></label>' + 
                        '</div>' + 	
                        '<div class="admin-video-prev" id="poster_rub">' + 
                            '<img src="' + list.poster.original + '" alt="" class="" style="heigth: 100%; width: 100%">' +
                            pre_name +
                            //'<img src="img/rub2.png" alt="" class="admin-video-prev-stik">' +
                            //'<p>Нет потока</p>' + 
                        '</div>' + 
                            '<div class="admin-video-item-header">' + 
                                '<div class="admin-video-item-h-list">' + 
                                    '<span class="admin-video-item-h-date">' + list.name + '</span>' +
                                '</div>' + 
                                '<div class="admin-video-item-h-hashtag">' + 
                                    '<span class="admin-video-hashtag-date">' + sezon + '</span>' + 
                                    '<span class="admin-video-hashtag-kubok">' + kubok + '</span>' +
                                    '<span class="admin-video-hashtag-group">' + weigth + '</span>' +
                                    '<span class="admin-video-hashtag-sport">'+ vid_sport +'</span>' +
                                    '<span class="admin-video-hashtag-city">' + gorod + '</span>' +
                                    '<span class="admin-video-hashtag-org">' + boss + '</span>' +
                                '</div>' +
                            '</div>' +
                            '<div class="admin-video-item-view">' +
                                '<p class="admin-video-item-v-count"><span></span>просмотров: </p>' +
                                '<p class="admin-video-item-v-region">' + region + '</p>' +
                            '</div>' +
                            '<div class="admin-video-item-info admin-video-item-view">' +
                                '<p class="admin-video-item-i-time"><span>' + time_put + '</span></p>' +
                                '<p class="admin-video-item-i-date">' + data_put + '</p>' +
                                '<a href="#" class="admin-video-item-i-link"><img src="img/right-arrow.svg" alt="Поделиться"></a>' +
                            '</div>' + 
                        '</li>');
            //$.each(list,function(i,item){
                /**/
 
                        

                    
                idch++;
            //});
        });
    }

}


function get_stream_array(){
    
    var count = 0;
    $.post('/php/get_stream.php', function(data)  {
        var output = $.parseJSON(data);
        var pre_arr = new Array();
        $.each(output.data,function(i,item){
            pre_arr.push(item.id);
            count++;
        });
        //pre_arr.push(output.data);
        
        for(var i = 0; i < pre_arr.length; i++){
            array_stream.push(pre_arr[i]);
            
        }
        count_stream = count;
    });
    if(!key_paint){
        for(var i = 0; i < count_stream; i++){
            array_stream1.push(array_stream[i]);           
        }
        if(array_stream1[0]){
            paint_element_stream();
            key_paint = 1;
        }

    }
    //for(var i = 0; i < count_stream; i++){
    if(array_stream[0]!=array_stream1[0]){
            //setInterval('paint_element_stream()',100);
        $("#admin-video-list").empty();
        idch = 0;
        key_paint = 0;
    }
    //}
    //console.log(count_stream);
    //console.log(array_stream);
    //var list = json_product.data;
}

$(document).ready(function() {

    $.post('/php/get_product_all.php', function(data){
        //var output1 = $.parseJSON(data);
        array_product.push(data);   
    });

    $('#block_select_stream_list').hide();
    dynamic_checkbox();
    setInterval('dynamic_checkbox()',500);
    get_stream_array();
    setInterval('get_stream_array()',500);

        
        $("#delete_stream_checkbox").on('click', function() {
            for(var i = 0; i < 5; i++){
                var ch1 = $("#admin-vl" + i).is(':checked');
                if(ch1){
                    var id = $("#admin-vl" + i).parent().parent().attr('id');
                    $.post('/php/get_stream_id.php', {id:id}, function(data){
                        var output = $.parseJSON(data);
                        var list = output.data;
                        //console.log(list.name);
                        $.post('/php/get_stream_public.php', {name_stream:list.name}, function(data){
                            var output = $.parseJSON(data);
                            //console.log(output);
                            var initial_get = output? output[1]: ''
                            if(initial_get){
                                console.log(initial_get);
                                $.post('/php/unpublic_stream.php', { name_stream: initial_get }, function(data){
                                    if(data == "OK"){
                                        alert("Продукт снят с публикации");
                                    }
                                    //console.log(data);
                                });
                            }
                            
                        });
                        $.post('/php/get_product_public_name.php', { initial: list.name }, function(data){
                            var output = $.parseJSON(data);
                            //console.log(output);
                            var initial_get = output? output[4]: ''
                            if(initial_get){
                                console.log(initial_get);
                                $.post('/php/upload_product_public1.php', { initial: initial_get, initial_set: ''  }, function(data){
                                    if(data == "OK"){
                                        alert("удалена зависимость стрима и продукта");
                                    }
                                    //console.log(data);
                                });
                            }
                        });
                    });
                    
                    $.post('/php/delete_stream.php', {id:id}, function(data){
                        //console.log("Delete stream: " + data);
                        alert("Стрим удалён!");
                    });
                    
                }
            }
            
        });
    
    $("#bottom_list_stream").on('click', function() {
        if(num_list != 0){
            num_list = num_list-5;
            num_list1 = num_list1-5;
            get_ch_list = get_ch_list - 1;
            $("#admin-video-list").empty();
            key_paint = 0;
            idch = 0;
            console.log(num_list);
            console.log(num_list1);
        }
    });

    $("#next_list_stream").on('click', function() {
        var top_list = 5*num_list2;
        
        if(num_list1 != top_list){
            num_list = num_list+5;
            num_list1 = num_list1+5;
            get_ch_list = get_ch_list + 1;
            console.log(num_list);
            console.log(num_list1);
            $("#admin-video-list").empty();
            idch = 0;
            key_paint = 0;
            //var count_list = 0;
            //for(var i=0; i < num_list1; i=i+5){
                //count_list++;
           // }
           // num_list = (num_list*count_list)-5;
        //}
        //if(num_list1 > count_stream){
           // var num_list2 = num_list1 - count_stream;
           // num_list1 = num_list1 - num_list2;
        }
    });

    $("#admin-video-sort-check").on('click', function() {
        key_main_chack = 1;
    });
    
    $(document).on('dblclick', '.admin-video-item', function() {
        var id = this.id;
        $("#admin_input_id").val(id);
        window.location.href='/card_stream?admin_input_id='+id;
        //alert("Text: " + this.id);count_stream
    });

});