$(document).ready(function() {
    $("#view-video-btn").on('click', function(){
        //alert("Button clicked!"); // This will display an alert when the button with id "myButton" is clicked
        //$('#popup-back').toggle();

        $.post('/php/kines.php', function(data)  {
            //$('#res-video-text').text(data);
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
                    //});
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