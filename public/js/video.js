$(document).ready(function() {
    $("#view-video-btn").on('click', function(){
        //alert("Button clicked!"); // This will display an alert when the button with id "myButton" is clicked
        //$('#popup-back').toggle();

        $.post('/php/kines.php', function(data)  {
            $('#res-video-text').text(data);
            var output = $.parseJSON(data);
            var list = output.data;

            $.each(list,function(i,item){
                console.log("ID:" + item.id + "\r\nProject_ID:" + item.project_id + "\r\nFolder_ID: " 
                    + item.folder_id + "\r\nPlayer_ID:" + item.player_id + "\r\nVersion:" + item.version
                    + "\r\nTitle: " + item.title + "\r\nSubtitle" + item.subtitle + "\r\nDescriptor: " + item.description
                    + "\r\nStatus: " + item.status + "\r\nProgress:" +item.progress + "\r\nDuration:" + item.duration + "\r\nAssets:\r\n"); 
                    $.each(item.assets,function(k,ass){
                        console.log("ID:"+ ass.id + "\r\nvideo_id: " + ass.video_id + "\r\noriginal_name: " + ass.original_name
                            + "\r\nfile_size: " + ass.file_size + "\r\nmd5:" + ass.md5 + "\r\nfiletype: " + ass.filetype + "\r\nquality: " 
                            + ass.quality + "\r\nresolution: " + ass.resolution + "\r\ncreated_at: " + ass.created_at + "\r\nurl:" + ass.url + "\r\ndownload_link: " + ass.download_link + "\r\n"
                        );
                        console.log("id: " + ass.id + "\r\nvideo_id:" + ass.video_id + "\r\noriginal_name:" + ass.original_name
                            + "\r\nfile_size:" + ass.file_size + "\r\nfiletype:" + ass.filetype + "\r\nquality:" + ass.quality + "\r\nresolution:" + ass.resolution
                            + "\r\ncreated_at:" + ass.created_at + "\r\nurl:" + ass.url + "\r\ndownload_link:" + ass.download_link
                        );
                    });
                    $.each(item.chapters,function(c,chap){
                        console.log("\r\nchapters:\r\n" + "\r\nitems:" + chap.items + "\r\nenabled:" + chap.enabled
                            + "\r\nprivacy_type:" + chap.privacy_type + "\r\nprivacy_domains:" + chap.privacy_domains
                            + "\r\nprivacy_share:" + chap.privacy_share + "\r\ntags:" + chap.tags
                         );
                         $each(chap.poster, function(p, post){
                            console.log("\r\nPoster:\r\nid:" + post.id + "\r\ntype:" + post.type + "\r\nmedia_id:" + post.media_id
                                + "\r\nstatus:" + post.status + "\r\nactive:" + post.active + " \r\noriginal:" + post.original
                                + "\r\nmd:" + post.md + "\r\nsm:" + post.sm + "\r\nxs:" + post.xs + "\r\nfrom_time:" + post.from_time + "\r\nto_time:" + post.to_time
                            );
                        });
                    });

                    /*console.log("\r\n----------------------------\r\n");
                    console.log("\r\nadditional_materials:" + chap.additional_materials + "\r\nadditional_materials_enabled:" + chap.additional_materials_enabled + "\r\nplay_link:" + chap.play_link
                        + "\r\nembed_link:" + chap.embed_link + "\r\ncreated_at:" + chap.created_at + "\r\nupdated_at:" + chap.updated_at + "\r\nsubtitles:" + chap.subtitles + "\r\nsubtitles_enabled:" + chap.subtitles_enabled + "\r\n"
                    );
                console.log("\n\rhls_link:" + item.hls_link);*/
            });
            
        });
    });
});
/**/ 