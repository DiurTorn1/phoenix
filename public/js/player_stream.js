$(document).ready(function() {
    var params = new window.URLSearchParams(window.location.search);
    var user_email = $('#name_user_get').text();
    var array_product = new Array();
    var users_sells = new Array();
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
        //count_product = count1;
    });
    console.log(array_product);
    if(!user_email){
        alert("Продукт запрещён к просмотру незарег польз");
    } else {
        //console.log(user_email);
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
            //count_sells = count2;
        });
        console.log(users_sells);
    }
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
                    var opisanie_strima = pars[7];
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
            }
                
        });
    });
});
/*				<div class="admin-input-box admin-input-wrap">
					<label>Описание</label>
					<textarea name="Описание" class="block-admin-input respons-input admin-input" id = "opisanie_strima"></textarea>
				</div> */