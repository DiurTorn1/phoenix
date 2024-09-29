var array_product = new Array();
var array_product1 = new Array();
var idch = 0;
var key_main_chack = 0;
var public_stream_list = new Array();
var get_ch_list = 1;
var count_stream = 0, count_product = 0;
var array_stream = new Array();
var array_stream1 = new Array();
var key_paint = 0;

function paint_element_stream(){
    for(var i = 0; i < count_stream; i ++){
        $.post('/php/get_stream_id.php',{ id:array_stream[i] }, function(data)  {
            //console.log(data);
            var output = $.parseJSON(data);
            var list = output.data;
            //console.log(list.id);
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
        });
    }

}

function paint_element_product(){
    for(var i = 0; i < count_product; i ++){
        
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
            });
            
        });*/

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