var array_product = new Array();
var array_product1 = new Array();
var count_product = 0, count_sells = 0;
var users_sells = new Array();
var users_sells1 = new Array();
var public_product_perm2 = new Array();
var key_paint = 0, key_paint1 = 0, key_paint2 = 0, key_sell_user = 0;
var user_global = "";
var user_email = '';


function get_stream_array(){

    user_email = $('#name_user_get').text();
    var count1 = 0;
    $.post('/php/get_product.php', function(data)  {
        var output = $.parseJSON(data);
        //console.log(output);
        var pre_arr = new Array();
        $.each(output,function(i,item){
            pre_arr.push(item.id);
            count1++;
        });
        //pre_arr.push(output.data);
        //console.log(pre_arr);
        for(var i = 0; i < pre_arr.length; i++){
            array_product.push(pre_arr[i]);
            
        }
        //console.log(array_product);
        count_product = count1;
    });
    var count2 = 0; 
    $.post('/php/get_sell_user.php', {user_email:user_email}, function(data)  {
        var output = $.parseJSON(data);
        //console.log(output);
        var pre_arr = new Array();
        if(output){
            $.each(output,function(i,item){
                if(item.user_email == user_email){
                    //console.log(item.product_id);
                    pre_arr.push(item.product_id);
                    count2++;
                }
                
            });
        }
        //$.each(output,function(i,item){
           // pre_arr.push(item.id);
           // count1++;
        //});
        //pre_arr.push(output.data); count_sells
        //console.log(pre_arr);
        for(var i = 0; i < pre_arr.length; i++){
            users_sells.push(pre_arr[i]);
            
        }
        //console.log(array_product);
        count_sells = count2;
    });
    if(!key_paint1){
        for(var i = 0; i < count_product; i++){
            array_product1.push(array_product[i]);           
        }
        if(array_product1[0]){
            for(var i = 0; i < count_product; i ++){
                //if(array_product[i] == users_sells[i]){
                    //console.log(array_product[i]);
                    //console.log(users_sells[i]);
                    $.post('/php/get_product_public.php',{ id:array_product[i] }, function(data)  {
                        var output = $.parseJSON(data);
                        //console.log(output);
                        var prm_prod = output ? output[4]:'';
                        //console.log(prm_prod);
                        //public_product_perm.push(prm_prod);
                        $.post('/php/get_product_table.php',{ table:prm_prod }, function(data1)  {
                            var public_product_perm1 = new Array();
                            var key_product_perm = 0;
                            var output1 = $.parseJSON(data1);

                            $.each(output1,function(i,item1){
                                var struct_prod = {
                                    "table": prm_prod, 
                                    "id_stream": item1.id_stream 
                                };
                                //if(item1.id_stream == id_stream_prod){
                                    //console.log(struct_prod);
                                    public_product_perm1.push(struct_prod);
                                    key_product_perm++;
                                    //key_prod_perm_stream1 = 1;
                                //}
                                //console.log(id_stream_prod);
                            });
                            //console.log(key_prod_perm_stream);
                            for(var i = 0; i < key_product_perm; i++){
                                //console.log(public_product_perm1[i]);
                                public_product_perm2.push(public_product_perm1[i]);
                            }
                            
                        });
                    });
                //}
               
        
            }
            key_paint1 = 1;
        }

    }
    //for(var i = 0; i < count_stream; i++){
    if(array_product[0]!=array_product1[0]){
        //setInterval('paint_element_stream()',100);
        $("#slider1").empty();
        //array_product = [];
        //idch = 0;
        key_paint1 = 0;
    }
    if(!key_paint2){
        for(var i = 0; i < count_sells; i++){
            users_sells1.push(users_sells[i]);           
        }
        if(users_sells1[0]){
            
            //paint_element_product();
            key_paint2 = 1;
        }

    }
    //for(var i = 0; i < count_stream; i++){
    if(users_sells[0]!=users_sells1[0]){
        //setInterval('paint_element_stream()',100);
        //$("#slider1").empty();
        //users_sells = [];
        //idch = 0;
        key_paint2 = 0;
    }
    //}
    //console.log(count_stream);
    //console.log(array_stream);
    //var list = json_product.data;
}


$(document).ready(function() {
    get_stream_array();
    setInterval('get_stream_array()',500);
    var params = new window.URLSearchParams(window.location.search);
    var array_sells_product_btn = new Array();

    $.post('/php/get_stream.php', function(data)  {
        var output = $.parseJSON(data);
        var list = output.data;

        $.each(list,function(i,item){
            if(item.id == params.get('player_stream_id')){
                    //console.log("Video inform:\r\n");
                    console.log(/*"id: " + item.id + "\r\nworkspace_id: " + item.workspace_id + "\r\nparent_id: " + item.parent_id + "\r\nname: " + item.name + "\r\nsubtitle: " + item.subtitle +
                        "\r\ntype: " + item.type + "\r\nstreamkey: " + item.streamkey + "\r\nauto_start: " + item.auto_start + "\r\nprotected: " + item.protected + "\r\ntime_shift: " + item.time_shift*/); 
                    console.log(/*"\r\nRecord: \r\n parent_id: " + item.record.parent_id + "\r\nvideo: \r\n presets: " + item.video.presets + "\r\naudio: \r\n channel_mapping: " + item.audio.channel_mapping + 
                        //"\r\nreconnect_window:" + item.reconnect_window + "\r\nplay_link: " + item.play_link + "\r\nrtmp_link: " + item.rtmp_link + "\r\nscheduled: \r\n time: " + item.scheduled.time*/);
                    //console.log("\r\nstream: \r\n id: " + item.stream.id + "\r\nevent_id: " + item.stream.event_id + "\r\nstatus: " + item.stream.status + "\r\nstarted_at: " + item.stream.started_at +  "\r\nfinished_at: " + item.stream.finished_at);
                    //console.log("\r\nchat_after_stream: " + item.chat_after_stream + "\r\nchat_active: " + item.chat_active + "\r\nchat_preview: " + item.chat_preview + "\r\nshow_members: " + item.show_members +
                        //"\r\ncreated_at" + item.created_at + "\r\nupdated_at: " + item.updated_at + "\r\nlatency_mode: " + item.latency_mode + "\r\nallow_chat_links: " + item.allow_chat_links +
                        //"\r\nmoderators: " + item.moderators);
                    //console.log("\r\nposter \r\nid:" + item.poster.id + "\r\ntype: " + item.poster.type + "\r\nstatus" + item.poster.status + "\r\nactive: " + item.poster.active + "\r\noriginal: " + 
                        //"\r\nmd: " + item.poster.md + "\r\nsm: " + item.poster.sm + "\r\nxs: " + item.poster.xs +"\r\nfrom_time" + item.poster.from_time + "\r\nto_time" + item.poster.to_time);
                    //console.log("autoplay_video_ch:" + item.auto_start + " , chat_video_ch:" + item.chat_active); // autoplay_video_ch  chat_video_ch
                    //$('#admin-input-main').val(item.name);
                    //initial_name = item.name;
                    //rtmp_link_card = item.rtmp_link;
                    var tegs = item.subtitle;
                    var pars = tegs.split("&");
                    sezon = pars[0];
                    kubok = pars[1];
                    weigth = pars[2];
                    vid_sport = pars[3];
                    gorod = pars[4];
                    boss = pars[5];
                    region = pars[6];
                    var opisanie_strima = pars[7];
                    var key_player = 0, key_player1 = 0;
                    
                    //console.log(users_sells1);
                    //console.log(public_product_perm2);
                    if(!user_email){
                        for(var i = 0; i < public_product_perm2.length; i++){
                            var get_var = public_product_perm2[i];
                            if(get_var.id_stream == item.id){
                                key_player1 = 1;
                            }
                        }
                    }else{
                        //console.log(user_email);
                        
                        for(var i = 0; i < public_product_perm2.length; i++){
                            var get_var = public_product_perm2[i];
                            if(get_var.id_stream == item.id){
                                key_player1 = 1;
                                for(var k=0; k<users_sells1.length; k++){
                                    var pars = get_var.table;
                                    var pars1 = pars.split("_");
                                    //console.log(pars1[1]);
                                    if(users_sells1[k] == pars1[1]){
                                        //console.log("You grand");
                                        key_player = 1;
                                    }
                                }
                                var pars2 = get_var.table;
                                var pars3 = pars2.split("_");
                                var struct_sell_btn = {
                                    "type": pars3[0], 
                                    "id_prod": pars3[1] 
                                };
                                //console.log(get_var.id_stream);
                                array_sells_product_btn.push(struct_sell_btn);
                            }
                        }
                    }
                    if(key_player1 == 0 && key_player == 0){
                        $("#player_stream_get").append(
                            '<div class="index-live-item-video-1">' +
                                '<iframe src="' + item.play_link + '" width="100%" height="840" frameborder="0" allow="autoplay; fullscreen; picture-in-picture; encrypted-media; gyroscope; accelerometer; clipboard-write;"></iframe>' +
                            '</div>' +
                            '<div class="index-live-item-text">' +
                            '<a>' + item.name + '</a>' +
                            '</div>' + 
                            '<div class="index-live-item-text">' +
                                '<div class="admin-input-box admin-input-wrap">' +
                                    '<label>Описание</label>' +
                                    '<textarea name="Описание" class="block-admin-input respons-input admin-input" disabled>' + opisanie_strima + '</textarea>' +
                                '</div>' +
                            '</div>'); 
                    } else if(key_player1 == 1 && key_player == 1){
                        $("#player_stream_get").append(
                            '<div class="index-live-item-video-1">' +
                                '<iframe src="' + item.play_link + '" width="100%" height="840" frameborder="0" allow="autoplay; fullscreen; picture-in-picture; encrypted-media; gyroscope; accelerometer; clipboard-write;"></iframe>' +
                            '</div>' +
                            '<div class="index-live-item-text">' +
                            '<a>' + item.name + '</a>' +
                            '</div>' + 
                            '<div class="index-live-item-text">' +
                                '<div class="admin-input-box admin-input-wrap">' +
                                    '<label>Описание</label>' +
                                    '<textarea name="Описание" class="block-admin-input respons-input admin-input" disabled>' + opisanie_strima + '</textarea>' +
                                '</div>' +
                            '</div>'); 

                    } else if(key_player1 == 1 && key_player == 0){
                        var id_ticket = 0, id_subs = 0;

                        for(var i = 0; i < array_sells_product_btn.length; i++){
                            var cycle_prod = array_sells_product_btn[i];
                            if(cycle_prod.type == 'ticket'){
                                id_ticket = cycle_prod.id_prod;
                            }
                            if(cycle_prod.type == 'subscribe'){
                                id_subs = cycle_prod.id_prod;
                            }
                        }
                        //console.log(array_sells_product_btn);
                        $("#player_stream_get").append(
                            '<div class="index-live-item-video-2">' +
                                '<div class="index-live-item-video-3">' +
                                    '<div class="index-live-banner-1">' +
                                        '<button class="top-menu-btn-1" id = "' + id_subs + '">Купить Подписку</button>' +
                                        '<button class="top-menu-btn-2" id = "' + id_ticket + '">Купить билет</button>' +
                                        '<img src="' + item.poster.original + '">' +
                                    '</div>' +
                                '</div>' +
                                //'<iframe src="' + item.play_link + '" width="100%" height="840" frameborder="0" allow="autoplay; fullscreen; picture-in-picture; encrypted-media; gyroscope; accelerometer; clipboard-write;"></iframe>' +
                            '</div>' +
                            '<div class="index-live-item-text">' +
                            '<a>' + item.name + '</a>' +
                            '</div>' + 
                            '<div class="index-live-item-text">' +
                                '<div class="admin-input-box admin-input-wrap">' +
                                    '<label>Описание</label>' +
                                    '<textarea name="Описание" class="block-admin-input respons-input admin-input" disabled>' + opisanie_strima + '</textarea>' +
                                '</div>' +
                            '</div>'); 

                    }
            }
                
        });
    });

    $(document).on('click', '.top-menu-btn-1', function() {
        var id = this.id;
        $('#popup-back-sells').toggle();       
        if(id == 0){
            //console.log(id);
            alert("Стрим не добавлен к подписке. Обратитесь к администратору.");
        } else {
            
        }
        //$("#admin_input_id").val(id);
        //window.location.href='/sell_panel?user_sell='+user_email+ '&id_product_sell='+id;
        //alert("Text: " + this.id);
        //console.log(array_sells_product_btn);
    });
    $(document).on('click', '.top-menu-btn-2', function() {       
        var id = this.id;
        if(id == 0){
            alert("Стрим не добавлен к билету. Обратитесь к администратору.");
        } else {
            console.log(id);
        }
        //$("#admin_input_id").val(id);
        //window.location.href='/sell_panel?user_sell='+user_email+ '&id_product_sell='+id;
        //alert("Text: " + this.id);
        //console.log(array_sells_product_btn);
    });
});
/*				<div class="admin-input-box admin-input-wrap">
					<label>Описание</label>
					<textarea name="Описание" class="block-admin-input respons-input admin-input" id = "opisanie_strima"></textarea>
				</div> */