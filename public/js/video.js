$(document).ready(function() {
    //$("#view-video-btn").on('click', function(){
        //alert("Button clicked!"); // This will display an alert when the button with id "myButton" is clicked
        //$('#popup-back').toggle();
        var count_ch = 0;
        $.post('/php/kines.php', function(data)  {
            //$('#res-video-text').text(data);
            var output = $.parseJSON(data);
            var list = output.data;

            $.each(list,function(i,item){
                /*console.log("Video inform:\r\n");
                console.log("ID:" + item.id + "\r\nProject_ID:" + item.project_id + "\r\nFolder_ID: " 
                    + item.folder_id + "\r\nPlayer_ID:" + item.player_id + "\r\nVersion:" + item.version
                    + "\r\nTitle: " + item.title + "\r\nSubtitle" + item.subtitle + "\r\nDescriptor: " + item.description
                    + "\r\nStatus: " + item.status + "\r\nProgress:" +item.progress + "\r\nDuration:" + item.duration + "\r\nAssets:\r\n"); 
                    $.each(item.assets,function(k,ass){
                        console.log("ID:"+ ass.id + "\r\nvideo_id: " + ass.video_id + "\r\noriginal_name: " + ass.original_name
                            + "\r\nfile_size: " + ass.file_size + "\r\nmd5:" + ass.md5 + "\r\nfiletype: " + ass.filetype + "\r\nquality: " 
                            + ass.quality + "\r\nresolution: " + ass.resolution + "\r\ncreated_at: " + ass.created_at + "\r\nurl:" + ass.url 
                            + "\r\ndownload_link: " + ass.download_link + "\r\n"
                        );
                        console.log("id: " + ass.id + "\r\nvideo_id:" + ass.video_id + "\r\noriginal_name:" + ass.original_name
                            + "\r\nfile_size:" + ass.file_size + "\r\nfiletype:" + ass.filetype + "\r\nquality:" + ass.quality 
                            + "\r\nresolution:" + ass.resolution + "\r\ncreated_at:" + ass.created_at + "\r\nurl:" + ass.url + "\r\ndownload_link:" + ass.download_link
                        );
                    });
                    $.each(item.chapters,function(c,chap){
                        console.log("\r\nchapters:\r\n" + "\r\nitems:" + chap.items + "\r\nenabled:" + chap.enabled);
                        
                    });
                    console.log("\r\nprivacy_type:" + item.privacy_type);
                    console.log( "\r\nprivacy_domains:" + item.privacy_domains);
                    console.log("\r\nprivacy_share:" + item.privacy_share);
                    console.log("\r\ntags:" + item.tags);
                    //console.log("\r\post:" + item.poster);
                    //$each(item.poster, function(p, post){
                    console.log("\r\nPoster:\r\nid:" + item.poster.id + "\r\ntype:" + item.poster.type + "\r\nmedia_id:" + item.poster.media_id
                            + "\r\nstatus:" + item.poster.status + "\r\nactive:" + item.poster.active + " \r\noriginal:" + item.poster.original
                            + "\r\nmd:" + item.poster.md + "\r\nsm:" + item.poster.sm + "\r\nxs:" + item.poster.xs + "\r\nfrom_time:" + item.poster.from_time + "\r\nto_time:" + item.poster.to_time
                    );

                    console.log("\r\nadditional_materials_enabled:" + item.additional_materials_enabled);
                    console.log("\r\nplay_link:" + item.play_link);
                    console.log("\r\nembed_link:" + item.embed_link);
                    console.log("\r\ncreated_at:" + item.created_at);
                    console.log("\r\nupdated_at:" + item.updated_at);
                    console.log("\r\nsubtitles:" + item.subtitles);
                    console.log("\r\nsubtitles_enabled:" + item.subtitles_enabled);
                    console.log("\r\nshls_link:" + item.hls_link);*/
                    var pars_subtitle = item.subtitle;
                    var pars =  pars_subtitle.split("&");
                    $("#admin-video-list-ct").append(
                        '<li class="admin-video-item admin-back">' +
                            '<div class="admin-video-sort-wrap">' +
                                '<input id="admin-vl' + count_ch + '" class="admin-video-sort-check" type="checkbox">' +
                                '<label class="admin-video-check-label" for="admin-vl' + count_ch + '"></label>' +
                            '</div>' +
                            '<div class="admin-video-prev">' +
                                '<img src="' + item.poster.original + '" alt="" class="" style="heigth: 100%; width: 100%">' +
                            '</div>' +
                            '<div class="admin-video-item-header">' +
                                '<div class="admin-video-item-h-list">' +
                                    '<span class="admin-video-item-h-date">' + item.title + '</span>' +
                                '</div>' +
                                '<div class="admin-video-item-h-hashtag">' +
                                    '<span class="admin-video-hashtag-date">' + pars[0] + '</span>' +
                                    '<span class="admin-video-hashtag-kubok">' + pars[1] + '</span>' +
                                    '<span class="admin-video-hashtag-group">' + pars[2] + '</span>' +
                                    '<span class="admin-video-hashtag-sport">' + pars[3] + '</span>' +
                                    '<span class="admin-video-hashtag-city">' + pars[4] + '</span>' +
                                '</div>' +
                            '</div>' +
                            '<div class="admin-video-item-view">' +
                                //'<p class="admin-video-item-v-count"><span>0</span>просмотров</p>' +
                                //'<p class="admin-video-item-v-region">Все регионы</p>' +
                            '</div>' +
                            '<div class="admin-video-item-info admin-video-item-view">' +
                                '<p class="admin-video-item-i-time">Не опубликовано</p>' +
                            '</div>' +
                    '</li>');
            });
            
        });
    //});
});
/**/ 