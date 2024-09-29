var array_product = new Array();
var array_product1 = new Array();
var idch = 0;
var key_main_chack = 0;
var public_stream_list = new Array();
var get_ch_list = 1;
var count_stream = 0, count_product = 0;
var array_stream = new Array();
var array_stream1 = new Array();
var key_paint = 0, key_paint1 = 0;
var user_global = "";

function paint_element_stream(){
    var key_public = 0;
    var user_email = $('#name_user_get').text();
    //console.log(user_email);
    var name_stream_gl = '';
    for(var i = 0; i < count_stream; i ++){
        $.post('/php/get_stream_id.php',{ id:array_stream[i] }, function(data)  {
            //console.log(data);
            var output = $.parseJSON(data);
            var list = output.data;
            name_stream_gl = list.name;
            
            
            //console.log("Video inform:\r\n");
            //console.log("id: " + list.id + "\r\nworkspace_id: " + list.workspace_id + "\r\nparent_id: " + list.parent_id + "\r\nname: " + list.name + "\r\nsubtitle: " + list.subtitle +
                //"\r\ntype: " + list.type + "\r\nstreamkey: " + list.streamkey + "\r\nauto_start: " + list.auto_start + "\r\nprotected: " + list.protected + "\r\ntime_shift: " + list.time_shift); 
            //console.log("\r\nRecord: \r\n parent_id: " + list.record.parent_id + "\r\nvideo: \r\n presets: " + list.video.presets + "\r\naudio: \r\n channel_mapping: " + list.audio.channel_mapping + 
                //"\r\nreconnect_window:" + list.reconnect_window + "\r\nplay_link: " + list.play_link + "\r\nrtmp_link: " + list.rtmp_link + "\r\nscheduled: \r\n time: " + list.scheduled.time);
            //console.log("\r\nstream: \r\n id: " + list.stream.id + "\r\nevent_id: " + list.stream.event_id + "\r\nstatus: " + list.stream.status + "\r\nstarted_at: " + list.stream.started_at +  "\r\nfinished_at: " + list.stream.finished_at);
            //console.log("\r\nchat_after_stream: " + list.chat_after_stream + "\r\nchat_active: " + list.chat_active + "\r\nchat_preview: " + list.chat_preview + "\r\nshow_members: " + list.show_members +
                //"\r\ncreated_at" + list.created_at + "\r\nupdated_at: " + list.updated_at + "\r\nlatency_mode: " + list.latency_mode + "\r\nallow_chat_links: " + list.allow_chat_links +
                //"\r\nmoderators: " + list.moderators);
            //console.log("\r\nposter \r\nid:" + list.poster.id + "\r\ntype: " + list.poster.type + "\r\nstatus" + list.poster.status + "\r\nactive: " + list.poster.active + "\r\noriginal: " + list.poster.original +
                //"\r\nmd: " + list.poster.md + "\r\nsm: " + list.poster.sm + "\r\nxs: " + list.poster.xs +"\r\nfrom_time" + list.poster.from_time + "\r\nto_time" + list.poster.to_time);
                $.post('/php/get_stream_public.php', {name_stream:list.name}, function(data)  {
                    var output = $.parseJSON(data);
                    //$.each(output,function(i,item){
                    var pub_name = output? output[1]: '1';
                        if(pub_name==name_stream_gl){
                            console.log(pub_name);
                            key_public = 1;
                         }
                         //console.log(output[2]);
                         //console.log(output[3]);
                   //});
            
                });
                console.log("key_public: "+key_public);
                if(key_public){
                    $("#slider").append(
                        '<div class="slide index-live-item" id="' + list.id + '">'+
                            '<div class="index-live-item-video">'+
                                '<a >'+ 
                                    '<div class="index-live-banner">' +
                                        '<img src="' + list.poster.original + '">' +
                                    '</div>' +
                                '</a>' +
                                
                            '</div>'+
                            '<div class="index-live-item-text">'+
                                '<a >' + list.name + '</a>'+
                            '</div>'+
                        '</div>');

                    key_public = 0;
                }

        });
    }

}

function paint_element_product(){
    var user_email = $('#name_user_get').text();
    console.log(user_email);
    for(var i = 0; i < count_product; i ++){
        $.post('/php/get_product_id.php',{ id:array_product[i] }, function(data)  {
            //console.log(data);
            var output = $.parseJSON(data);
            $("#slider1").append(
                '<div class="index-live-item" id="' + output[0] + '">' +
                    '<div class="index-live-item-video">' +
                        '<a href="#">' +
                            '<div class="index-live-banner">' +
                                '<img src="' + output[17] + '">' +
                            '</div> ' +
                        '</a>' +
                    '</div>' +
                    '<div class="index-item-text-wrap">' + 
                        '<a href="#">' + output[1] + '</a>' +
                        '<ul>' +
                            //'<li>Билет на 5 дней</li>' +
                        '</ul>' +
                    '</div>' +
                    '<div class="index-live-item-text">' +
                        //'<a  class="user-button" id="product_price">' + output[12] + ' &#8381;</a>'+
                        '<a  class="user-button" id="product_price">' + output[12] + ' &#8381;</a>'+
                    '</div>' +
                '</div>');
        });
    }
/*
				<div class="index-live-item">
					<div class="index-live-item-video">
						<a href="#">
							<div class="index-live-banner"><!-- БАННЕР ВИДЕО!! -->
								<img src="img/phoenix.png">
							</div>
						</a>
					</div>
					<div class="index-item-text-wrap">
						<a href="#">27.04.2024 Баскетбол ДБЛ "Аврора" Д 2013 Ф г. Окуневка</a>
						<ul>
							<li>Билет на 5 дней</li>
						</ul>
					</div>
					<div class="index-live-item-text"> 
						<a href="#" class="user-button">150 &#8381;</a>
					</div>
				</div>
*/ 
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
        $("#slider").empty();
        //idch = 0;
        key_paint = 0;
    }
    if(!key_paint1){
        for(var i = 0; i < count_product; i++){
            array_product1.push(array_product[i]);           
        }
        if(array_product1[0]){
            
            paint_element_product();
            key_paint1 = 1;
        }

    }
    //for(var i = 0; i < count_stream; i++){
    if(array_stream[0]!=array_stream1[0]){
        //setInterval('paint_element_stream()',100);
        //$("#slider").empty();
        //idch = 0;
        key_paint1 = 0;
    }
    //}
    //console.log(count_stream);
    //console.log(array_stream);
    //var list = json_product.data;
}

$(document).ready(function() {
    get_stream_array();
    setInterval('get_stream_array()',500);
    //console.log(array_stream1);
    //console.log(count_stream);
    
    //$("#admin-video-list-btn").on('click', function(){
        //var main = $('#admin-input-main').val();
        //$.post('/php/get_stream.php', function(data)  {
            //alert("Text:"+data);
            //console.log(data);
           // var output = $.parseJSON(data);
           // var list = output.data;

            //$.each(list,function(i,item){
                //console.log("Video inform:\r\n");
                //console.log(/*"id: " + item.id + "\r\nworkspace_id: " + item.workspace_id + "\r\nparent_id: " + item.parent_id + */"\r\nname: " + item.name /*+ "\r\nsubtitle: " + item.subtitle +
                    //"\r\ntype: " + item.type + "\r\nstreamkey: " + item.streamkey + "\r\nauto_start: " + item.auto_start + "\r\nprotected: " + item.protected + "\r\ntime_shift: " + item.time_shift*/); 
                //console.log(/*"\r\nRecord: \r\n parent_id: " + item.record.parent_id + "\r\nvideo: \r\n presets: " + item.video.presets + "\r\naudio: \r\n channel_mapping: " + item.audio.channel_mapping + 
                    //"\r\nreconnect_window:" + item.reconnect_window + */"\r\nplay_link: " + item.play_link /*+ "\r\nrtmp_link: " + item.rtmp_link + "\r\nscheduled: \r\n time: " + item.scheduled.time);
                //console.log("\r\nstream: \r\n id: " + item.stream.id + "\r\nevent_id: " + item.stream.event_id + "\r\nstatus: " + item.stream.status + "\r\nstarted_at: " + item.stream.started_at +  "\r\nfinished_at: " + item.stream.finished_at*/);
                //console.log("\r\nchat_after_stream: " + item.chat_after_stream + "\r\nchat_active: " + item.chat_active + "\r\nchat_preview: " + item.chat_preview + "\r\nshow_members: " + item.show_members +
                    //"\r\ncreated_at" + item.created_at + "\r\nupdated_at: " + item.updated_at + "\r\nlatency_mode: " + item.latency_mode + "\r\nallow_chat_links: " + item.allow_chat_links +
                    //"\r\nmoderators: " + item.moderators); '<a >'+ '<span class="label">LIVE</span>'+ '</a>' +
                //console.log("\r\nposter \r\nid:" + item.poster.id + "\r\ntype: " + item.poster.type + "\r\nstatus" + item.poster.status + "\r\nactive: " + item.poster.active + "\r\noriginal: " + 
                    //"\r\nmd: " + item.poster.md + "\r\nsm: " + item.poster.sm + "\r\nxs: " + item.poster.xs +"\r\nfrom_time" + item.poster.from_time + "\r\nto_time" + item.poster.to_time);
                    /*$("#slider").append(
                        '<div class="slide index-live-item" id="' + item.id + '">'+
                            '<div class="index-live-item-video">'+
                                '<a >'+ 
                                    '<div class="index-live-banner">' +
                                        '<img src="' + item.poster.original + '">' +
                                    '</div>' +
                                '</a>' +
                                
                            '</div>'+
                            '<div class="index-live-item-text">'+
                                '<a >' + item.name + '</a>'+
                            '</div>'+
                        '</div>');
            });product_price
            
        });*/

        $(document).on('click', '.user-button', function() {
            var id = this.id;
            console.log(id);
            //$("#admin_input_id").val(id);
            //window.location.href='/player_stream?player_stream_id='+id;
            //alert("Text: " + this.id);
        });

        $(document).on('click', '.slide', function() {
            var id = this.id;
            //console.log(id);
            //$("#admin_input_id").val(id);
            window.location.href='/player_stream?player_stream_id='+id;
            //alert("Text: " + this.id);
        });
        var timeList = 600;
        var TimeView = 1000000;
        var RadioBut = true;
      
        var slideNum = 1;
        var slideTime;
        slideCount = $("#slider .slide").length;
      
        var animSlide = function(arrow){
            clearTimeout(slideTime);
      
            if(arrow == "next"){
              if(slideNum == slideCount) { slideNum=1; }
              else{slideNum++}
               translateWidth = -$('#slider').width() * (slideNum - 1);
               //$('#slider').css({'transform': 'translate(' + translateWidth + 'px, 0)'});
               //rotator();
            }
            else if(arrow == "prew")
            {
               if(slideNum == 1) { slideNum=slideCount; }
              else{slideNum-=1}
              translateWidth = -$('#slider').width() * (slideNum - 1);
               //$('#slider').css({'transform': 'translate(' + translateWidth + 'px, 0)'});
            }else{
               slideNum = arrow;
              translateWidth = -$('#slider').width() * (slideNum -1);
               //$('#slider').css({'transform': 'translate(' + translateWidth + 'px, 0)'});
            }
      
            $(".ctrl-select.active").removeClass("active");
            $('.ctrl-select').eq(slideNum - 1).addClass('active');
        }
      
            if(RadioBut){
            var $linkArrow = $('<a id="prewbutton" href="#">&lt;</a><a id="nextbutton" href="#">&gt;</a>')
                .prependTo('#active-slide');
                $('#nextbutton').click(function(){
                   animSlide("next");
                   return false;
                   })
                $('#prewbutton').click(function(){
                   animSlide("prew");
                   return false;
                   })
            }
                var adderSpan = '';
                $('.slide').each(function(index) {
                       adderSpan += '<span class = "ctrl-select">' + index + '</span>';
                   });
                $('<div class ="Radio-But">' + adderSpan +'</div>').appendTo('#slider-wrap');
                $(".ctrl-select:first").addClass("active");
                $('.ctrl-select').click(function(){
                var goToNum = parseFloat($(this).text());
                animSlide(goToNum + 1);
                });
                var pause = false;
                /*var rotator = function(){
                       if(!pause){slideTime = setTimeout(function(){animSlide('next')}, TimeView);}
                       }
                $('#slider-wrap').hover(
                   function(){clearTimeout(slideTime); pause = true;},
                   function(){pause = false; rotator();
                   });*/
      
            var clicking = false;
            var prevX;
            $('.slide').mousedown(function(e){
                clicking = true;
                prevX = e.clientX;
            });
      
            $('.slide').mouseup(function() {
             clicking = false;
            });
      
            $(document).mouseup(function(){
                clicking = false;
            });
      
            $('.slide').mousemove(function(e){
                if(clicking == true)
                 {
                     if(e.clientX < prevX) { animSlide("next"); clearTimeout(slideTime); }
                     if(e.clientX > prevX) { animSlide("prew"); clearTimeout(slideTime); }
                   clicking = false;
                }
            });
            $('.slide').hover().css('cursor', 'pointer');
            //rotator();
});

/*var user_global = "";
var product_global;
var type_sell_global;
$(document).ready(function() {
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
                $.each(list,function(i,item){*/
                    //console.log("Video inform:\r\n");
                    //console.log(/*"id: " + item.id + "\r\nworkspace_id: " + item.workspace_id + "\r\nparent_id: " + item.parent_id + */"\r\nname: " + item.name /*+ "\r\nsubtitle: " + item.subtitle +
                        //"\r\ntype: " + item.type + "\r\nstreamkey: " + item.streamkey + "\r\nauto_start: " + item.auto_start + "\r\nprotected: " + item.protected + "\r\ntime_shift: " + item.time_shift*/); 
                    //console.log(/*"\r\nRecord: \r\n parent_id: " + item.record.parent_id + "\r\nvideo: \r\n presets: " + item.video.presets + "\r\naudio: \r\n channel_mapping: " + item.audio.channel_mapping + 
                        //"\r\nreconnect_window:" + item.reconnect_window + */"\r\nplay_link: " + item.play_link /*+ "\r\nrtmp_link: " + item.rtmp_link + "\r\nscheduled: \r\n time: " + item.scheduled.time);
                    //console.log("\r\nstream: \r\n id: " + item.stream.id + "\r\nevent_id: " + item.stream.event_id + "\r\nstatus: " + item.stream.status + "\r\nstarted_at: " + item.stream.started_at +  "\r\nfinished_at: " + item.stream.finished_at*/);
                    //console.log("\r\nchat_after_stream: " + item.chat_after_stream + "\r\nchat_active: " + item.chat_active + "\r\nchat_preview: " + item.chat_preview + "\r\nshow_members: " + item.show_members +
                        //"\r\ncreated_at" + item.created_at + "\r\nupdated_at: " + item.updated_at + "\r\nlatency_mode: " + item.latency_mode + "\r\nallow_chat_links: " + item.allow_chat_links +
                        //"\r\nmoderators: " + item.moderators);
                    //console.log("\r\nposter \r\nid:" + item.poster.id + "\r\ntype: " + item.poster.type + "\r\nstatus" + item.poster.status + "\r\nactive: " + item.poster.active + "\r\noriginal: " + 
                        //"\r\nmd: " + item.poster.md + "\r\nsm: " + item.poster.sm + "\r\nxs: " + item.poster.xs +"\r\nfrom_time" + item.poster.from_time + "\r\nto_time" + item.poster.to_time);
                        /*name_stream = item.name;
                        
    
                        $.post('/php/get_stream_public.php', {name_stream:item.name}, function(data)  {
                            var output = $.parseJSON(data);
                            //console.log(output);
                            var get_product_id1, get_product_name1;
                            $.post('/php/get_product_all.php', function(data)  {
                                var output = $.parseJSON(data);
                                //console.log(output);
                                $.each(output,function(i,item2){
                                    if(item2.initial == name_stream){
                                        get_product_id1 = item2.id_product;
                                        get_product_name1 = item2.initial;
                                    } 
                                });
                            });
                            if(output[1]){
                                //console.log("get_stream_public_ID:"+output[0]);
                                //console.log("get_stream_public_name:"+output[1]);
                                $.post('/php/get_sell_user.php', {user_email:user_email}, function(data)  {
                                    var output = $.parseJSON(data);
                                    //console.log("get_product_all:" + get_product_id1);
                                    $.each(output,function(i,item1){
                                        if(item1.product_id == get_product_id1){
                                            get_product_id = get_product_id1;
                                            get_product_name = get_product_name1;
                                        }
                                       // $.post('/php/get_product_public.php', {id:item1.product_id}, function(data)  {
                                           // var output = $.parseJSON(data);
                                            //console.log("get_stream_public_name:"+output);
                                            //get_product_id1 = output? output[1]: '1';
                                            //get_product_name1 = output? output[4]: '1';
                                            //if(get_product_id1 == item1.product_id && get_product_name1 == name_stream){
                                               // console.log("res prp"+ ins + ": " + get_product_id1 + " : " + get_product_name1);
                                               // get_product_id = get_product_id1;
                                               // get_product_name = get_product_name1;
                                                //ins = ins + 1;
                                            //}
                                            
                                        //});
                                    });
                                    //console.log("res get: "+ get_product_id + " : " + get_product_name);
                                    if(get_product_id && get_product_name == name_stream){
                                        
                                        // console.log("Оплата найдена");
                                        $("#public_item_stream").append(
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
                                        $("#public_item_stream").append(
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
    
});*/