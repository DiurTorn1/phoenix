var array_product = new Array();
var array_product1 = new Array();
var idch = 0;
var key_main_chack = 0;
var public_stream_list = new Array();
var get_ch_list = 1;
var count_stream = 0, count_product = 0, count_sells = 0;
var array_stream = new Array();
var array_stream1 = new Array();
var users_sells = new Array();
var users_sells1 = new Array();
var public_product_perm2 = new Array();
var key_paint = 0, key_paint1 = 0, key_paint2 = 0, key_sell_user = 0;
var user_global = "";
var user_email = '';
//

function user_sells(){

    //console.log(user_email);
    
    $.post('/php/get_sell_user.php', {user_email:user_email}, function(data)  {
        var output = $.parseJSON(data);
        if(output){
            $.each(output,function(i,item){
                if(item.user_email == user_email){
                    //console.log(item.product_id);
                    users_sells.push(item.product_id);
                    key_sell_user++;
                }
                
            });
        }
        //var user_sell = output ? output[2]:''; 
        //if(user_sell){
            //console.log(output[1]);
        //}
    });
    //for(var i = 0; i < key_sell_user; i++){
        //console.log(users_sells[i]);
    //}
}

function paint_element_stream(){
    // $('#name_user_get').text();
    //console.log(user_email);
    var name_stream_gl = '';



    var public_product_perm = new Array();
    for(var i = 0; i < count_sells; i ++){
        if(array_product[i] == users_sells[i]){
            $.post('/php/get_product_public.php',{ id:users_sells[i] }, function(data)  {
                    var output = $.parseJSON(data);
                    //console.log(output);
                    var prm_prod = output ? output[4]:'';
                    public_product_perm.push(prm_prod);
            });
        }
           
    
    }


    for(var i = 0; i < count_stream; i ++){
        $.post('/php/get_stream_id.php',{ id:array_stream[i] }, function(data)  {
            //console.log(data);
            var output = $.parseJSON(data);
            var list = output.data;
            var key_sell_product = 0;
            var 
            name_stream_gl = list.name;
            var id_stream_prod = list.id;
            var key_prod_perm_stream = 0;
            for(var i = 0; i < public_product_perm2.length; i++){
                var get_str = public_product_perm2[i];
                console.log(get_str.id_stream);
                if(get_str.id_stream == id_stream_prod){
                    key_prod_perm_stream = 1;
                }
            }
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
                    var pub_name = output? output[1]: '1';
                    var key_sell = 0;
                    if(pub_name==name_stream_gl){

                        for(var i = 0; i < public_product_perm.length; i++){
                            //if(public_product_perm[i] == name_stream_gl){
                                //console.log(public_product_perm.length);
                                console.log(public_product_perm[i]);
                               // key_sell = 1;
                            //}
                        }
                        if(key_prod_perm_stream){
                            $("#slider").append(
                                '<div class="slide bay index-live-item" id="' + list.id + '">'+
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
                        } else {
                            //console.log("Product not bay");
                                $("#slider").append(
                                    '<div class="slide no-bay index-live-item" id="' + list.id + '">'+
                                        '<div class="index-live-item-video">'+
                                            '<a >'+ 
                                                '<div class="index-live-banner">' +
                                                    '<span class="label-block"><img src="img/lock.png" alt="Просмотр заблокирован" title="Просмотр заблокирован. Купите билет."></span>' +
                                                    '<img src="' + list.poster.original + '">' +
                                                '</div>' +
                                            '</a>' +
                                            
                                        '</div>'+
                                        '<div class="index-live-item-text">'+
                                            '<a >' + list.name + '</a>'+
                                        '</div>'+
                                    '</div>');
                        }
                        
                    }
            
                });

        });
    }

}

function paint_element_product(){
    //var user_email = $('#name_user_get').text();
    //console.log(user_email);
    var public_product_perm = new Array();
    if(count_product >= count_sells){
        for(var i = 0; i < count_product; i ++){
            if(array_product[i] == users_sells[i]){
                //console.log(array_product[i]);
                //console.log(users_sells[i]);
                $.post('/php/get_product_public.php',{ id:array_product[i] }, function(data)  {
                    var output = $.parseJSON(data);
                    //console.log(output);
                    var prm_prod = output ? output[1]:'';
                    public_product_perm.push(prm_prod);
                });
            }
           
    
        }
    } else if(count_sells > count_product){
        for(var i = 0; i < count_sells; i ++){
            if(array_product[i] == users_sells[i]){
                //console.log(array_product[i]);
                //console.log(users_sells[i]);
                $.post('/php/get_product_public.php',{ id:array_product[i] }, function(data)  {
                    var output = $.parseJSON(data);
                    //console.log(output);
                    var prm_prod = output ? output[1]:'';
                    public_product_perm.push(prm_prod);
                });
            }
           
    
        }
    }
    for(var i = 0; i < count_product; i ++){
        $.post('/php/get_product_id.php',{ id:array_product[i] }, function(data)  {
            //console.log(data);
            var output = $.parseJSON(data);
            var id_product = output[0];
            var src_product = output[17];
            var name_product = output[1];
            var price_product = output[12];
            $.post('/php/get_product_public.php',{ id:id_product }, function(data)  {
                var output = $.parseJSON(data);
                //console.log(output);
                var prm_prod = output ? output[1]:'';
                
                var key_sell = 0;
                if(prm_prod == id_product){
                    for(var i = 0; i < public_product_perm.length; i++){
                        if(public_product_perm[i] == id_product){
                            //console.log(public_product_perm.length);
                            //console.log(public_product_perm);
                            key_sell = 1;
                        }
                    }
                    if(key_sell){
                        $("#slider1").append(
                            '<div class="slide index-live-item" id="' + id_product + '">' +
                                '<div class="index-live-item-video">' +
                                    '<a href="#">' +
                                        '<div class="index-live-banner">' +
                                            '<img src="' + src_product + '">' +
                                        '</div> ' +
                                    '</a>' +
                                '</div>' +
                                '<div class="index-item-text-wrap">' + 
                                    '<a href="#">' + name_product + '</a>' +
                                    '<ul>' +
                                        //'<li>Билет на 5 дней</li>' +
                                    '</ul>' +
                                '</div>' +
                                '<div class="index-live-item-text">' +
                                    //'<a  class="user-button" id="product_price">' + output[12] + ' &#8381;</a>'+
                                    //'<a  class="user-button" id="product_price">' + price_product + ' &#8381;</a>'+
                                    '<a  class="user-button" >Куплено</a>'+
                                '</div>' +
                            '</div>');
                    }else{
                        $("#slider1").append(
                            '<div class="slide index-live-item" id="' + id_product + '">' +
                                '<div class="index-live-item-video">' +
                                    '<a href="#">' +
                                        '<div class="index-live-banner">' +
                                            '<img src="' + src_product + '">' +
                                        '</div> ' +
                                    '</a>' +
                                '</div>' +
                                '<div class="index-item-text-wrap">' + 
                                    '<a href="#">' + name_product + '</a>' +
                                    '<ul>' +
                                        //'<li>Билет на 5 дней</li>' +
                                    '</ul>' +
                                '</div>' +
                                '<div class="index-live-item-text">' +
                                    //'<a  class="user-button" id="product_price">' + output[12] + ' &#8381;</a>'+
                                    '<a  class="user-button button_sell_user" id="product_price_' +  id_product + '">' + price_product + ' &#8381;</a>'+
                                '</div>' +
                            '</div>');
                    }
                }
            });
            /**/
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

    user_email = $('#name_user_get').text();
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
    if(!key_paint){
        for(var i = 0; i < count_stream; i++){
            array_stream1.push(array_stream[i]);           
        }
        if(array_stream1[0]){
            user_email = $('#name_user_get').text();
            paint_element_stream();
            key_paint = 1;
        }

    }
    //for(var i = 0; i < count_stream; i++){
    if(array_stream[0]!=array_stream1[0]){
            //setInterval('paint_element_stream()',100);
        $("#slider").empty();
        //idch = 0;
        //array_stream = [];
        key_paint = 0;
    }
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
            paint_element_product();
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

    var params = new window.URLSearchParams(window.location.search);
    var OutSum = params.get('OutSum');
    var InvId = params.get('InvId');
    var SignatureValue = params.get('SignatureValue');
    var Culture = params.get('Culture');

    if(OutSum && InvId && SignatureValue && Culture){
        //console.log(OutSum+" : "+InvId+" : "+SignatureValue+" : "+Culture);
        $.post('/php/get_sell_payment.php', {OutSum:OutSum, InvId:InvId, SignatureValue:SignatureValue, Culture:Culture}, function(data){
            //console.log(data);
            if(data=='OK'){
                if(OutSum && InvId && SignatureValue && Culture){
                    user_global = $('#name_user_get').text();
                    var dNow = new Date();
                    var localdate= dNow.getFullYear() + '-' + (dNow.getMonth()+1) + '-' + dNow.getDate() + ' ' + dNow.getHours() + ':' + dNow.getMinutes() + ':00';//2024-08-28 15:37:32
                    $.post('/php/sell_user_add.php', {user_global:user_global, product_global:InvId, create_at:localdate}, function(data)  {
                    if(data == 'OK'){
                        alert("Оплата прошла!");
                        window.location.href="/";
                    }
                    });
                }
            } else {
                alert("Оплата не прошла!");
                window.location.href="/";
            }
        });
    }
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

        $(document).on('click', '.button_sell_user', function() {
            var id = this.id;
            console.log(id);
            //$("#admin_input_id").val(id);
            window.location.href='/sell_panel?user_sell='+user_email+ '&id_product_sell='+id;
            //alert("Text: " + this.id);
        });

        $(document).on('click', '.bay', function() {
            var id = this.id;
            //console.log(id);
            //$("#admin_input_id").val(id);
            window.location.href='/player_stream?player_stream_id='+id;
            //alert("Text: " + this.id);
        });

        $(document).on('click', '.no-bay', function() {
            var id = this.id;
            //console.log(id);
            //$("#admin_input_id").val(id);
            //window.location.href='/player_stream?player_stream_id='+id;
            alert("Это видео не куплено");
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