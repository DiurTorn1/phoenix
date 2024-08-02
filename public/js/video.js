$(document).ready(function() {
    $("#view-video-btn").on('click', function(){
        //alert("Button clicked!"); // This will display an alert when the button with id "myButton" is clicked
        //$('#popup-back').toggle();

        $.post('/php/kines.php', function(data)  {
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
                        
                    });
                    /*{ "id": "73d293cd-8eee-4c17-974c-040999dfc09f",
	"video_id": "00000000-0000-0000-0000-000000000000", 
	"original_name": "360p.mp4", 
	"file_size": 286851, 
	"filetype": "mp4", 
	"quality": "360p", 
	"resolution": "320x336", 
	"created_at": "2024-06-25T10:56:36.878378Z", 
	"url": "https://kinescopecdn.net/eb7874ed-0833-4b89-b2f1-65d26ea6643f/videos/94c87ffb-ce3c-4685-8016-fbbd284b05d5/mp4/73d293cd-8eee-4c17-974c-040999dfc09f.mp4?expires=1722526645\u0026sign=c53db106e3d17d2fe7bcb4ca55867dde", 
	"download_link": "https://msk-5-storage.kinescope.io/mp4/afa21f17-ffaf-4198-b024-4e92e224c86b?filename=VID-20210311-WA0006-360p.mp4" } ]*/
            });
            //console.log(data);
            //$('#res-video-text').text(data);
            //var k = eval( data );
            //var result = [];k[0].details[0].v
            //$('#res-video-text').text(k[0].data[0].id);

            //$(data).each(function (i, element) {
                //result.push(element.attr.id);
                //$('#res-video-text').text(element.data.id);
        
                //if (element.children && element.children.length > 0) {
                    //var ids = get_all_ids(element.children);
        
                    //result = result.concat(ids); // or $.merge(result, ids);
               // }
            //});
        });
    });
});