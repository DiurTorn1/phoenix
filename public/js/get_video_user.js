var user_global = "";
var product_global;
var type_sell_global;
$(document).ready(function() {
    //$("#admin-video-list-btn").on('click', function(){ var params = new window.URLSearchParams(window.location.search);
        var main = $('#admin-input-main').val();
        var user_email = $('#name_user_get').text();
        user_global = user_email;
        console.log(user_email);
        var params = new window.URLSearchParams(window.location.search);
        var OutSum = params.get('OutSum');
        var InvId = params.get('InvId');
        var SignatureValue = params.get('SignatureValue');
        var Culture = params.get('Culture');
        var get_product_id, get_product_name;
        //console.log(OutSum+" : "+InvId+" : "+SignatureValue+" : "+Culture);
        //if(!OutSum && !InvId && !SignatureValue && !Culture){
            $.post('/php/get_stream.php', function(data)  {
                //alert("Text:"+data);
                //console.log(data);
    
                var output = $.parseJSON(data);
                var list = output.data;
                var name_stream = "";
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
                        name_stream = item.name;
                        
    
                        $.post('/php/get_stream_public.php', {name_stream:name_stream}, function(data)  {
                            var output = $.parseJSON(data);
                            //console.log(output);
                            $.post('/php/get_product_public_name.php', {name_stream:output[1]}, function(data)  {
                                var output = $.parseJSON(data);
                                console.log(output);
                            });
                            if(output[1]){
                                //console.log("get_stream_public_ID:"+output[0]);
                                //console.log("get_stream_public_name:"+output[1]);
                                $.post('/php/get_sell_user.php', {user_email:user_email}, function(data)  {
                                    var output = $.parseJSON(data);
                                    var get_product_id1, get_product_name1;
                                    var ins = 0;
                                    $.each(output,function(i,item1){
                                        $.post('/php/get_product_public.php', {id:item1.product_id}, function(data)  {
                                            var output = $.parseJSON(data);
                                            //console.log("get_stream_public_name:"+output);
                                            get_product_id1 = output? output[1]: '1';
                                            get_product_name1 = output? output[4]: '1';
                                            if(get_product_id1 == item1.product_id && get_product_name1 == name_stream){
                                                console.log("res prp"+ ins + ": " + get_product_id1 + " : " + get_product_name1);
                                                get_product_id = get_product_id1;
                                                get_product_name = get_product_name1;
                                                ins = ins + 1;
                                            }
                                            
                                        });
                                    });
                                    //console.log("res get: "+ get_product_id + " : " + get_product_name);
                                    if(get_product_id && get_product_name == name_stream){
                                        
                                        // console.log("Оплата найдена");
                                        $("#index-live").append(
                                            '<div class="index-live-item">'+
                                                '<div class="index-live-item-video">'+
                                                    '<a href="#">'+
                                                    '<span class="label">LIVE</span>'+
                                                    '</a>' +
                                                '</div>'+
                                                '<div class="index-live-item-text">'+
                                                    '<a href="#">' + item.name + '</a>'+
                                                '</div>'+
                                            '</div>');
                                    } else {
                                        $.post('/php/get_product_public_name.php', {initial:name_stream}, function(data)  {
                                            var output = $.parseJSON(data);
                                            //console.log(output[1]);
                                            product_global = output? output[1]: '1';
                                            if(OutSum && InvId && SignatureValue && Culture){
                                                $.post('/php/get_sell_payment.php', {OutSum:OutSum, InvId:InvId, SignatureValue:SignatureValue, Culture:Culture}, function(data){
                                                    //console.log(data);
                                                    if(data=='OK'){
                                                        alert("Оплата прошла!");
                                                        $.post('/php/sell_user_add.php', {user_global:user_global, product_global:product_global}, function(data)  {
                                                            if(data == 'OK'){
                                                                window.location.href="/";
                                                            }
                                                        });
                                                        // 
                                                    } else {
                                                        alert("Оплата не прошла!");
                                                        window.location.href="/";
                                                    }
                                                });
                                            }
                                        });
                                        //console.log("Оплата не найдена");
                                        $("#index-live").append(
                                            '<div class="index-live-item" id="parent_index_sell_div' + name_stream + '">' +
                                                '<div class="index-live-item-video" id="parent_sell_div' + name_stream + '">' +
                                                    '<a id = "sell-' + name_stream + '">' + 
                                                        '<span class="label-block"><img src="img/lock.png" alt="Просмотр заблокирован" title="Просмотр заблокирован. Купите билет."></span>' +
                                                    '</a>' +
                                                '</div>' +
                                                '<div class="index-live-item-text">' +
                                                '<a href="#">' +item.name+'</a>'+
                                                '</div>' +
                                            '</div>');
                                    }
                                });
                            }
                            //console.log(pars[2]);
                            //console.log(pars[3]);
                        });    
                });
                
            });
            //$("#parent_sell_div").on('click', function(){
                //alert("Покупай!!! Покупай!!!");
            //});
        //} else {
            //alert("Оплата прошла!");//console.log(OutSum+" : "+InvId+" : "+SignatureValue+" : "+Culture);

        //}

});

$(document).on('click', '#parent_sell_div', function(){
    //$(this).children("a").attr("id");
    alert($(this).children("a").attr("id"));
});

$(document).on('click', '#bay_ticket', function(){
    console.log(user_global);
    console.log(product_global);
    var name_product, price_product;
    $.post('/php/get_product_card.php', {id:product_global}, function(data)  {
        var pars = data.split("&");
        if(pars[1]){
            name_product = user_global + ":" + pars[1];
            price_product = pars[12];
            //console.log(name_product + " = " + price_product + " RUB");
            $.post('/php/sell_user_payment.php', {name_product:name_product, price_product:price_product}, function(data)  {
                //console.log(data);
                window.location.href=data;
            });
        }
    });
    
});