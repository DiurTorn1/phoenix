var array_product = new Array();
var array_stream = new Array();
var idch = 0;
var key_main_chack = 0;
var public_stream_list = new Array();
var get_ch_list = 1;
var key_paint = 0;

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
        //$("#admin-video-list").empty();
        //idch = 0;
        key_paint = 0;
    }
    //}
    //console.log(count_stream);
    //console.log(array_stream);
    //var list = json_product.data;
}

$(document).ready(function() {
    get_stream_array();
    setInterval('get_stream_array()',500);
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