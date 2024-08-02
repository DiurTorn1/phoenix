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
                        console.log("ID:"+ ass.id);
                    }
                    /*"assets": [ { "id": "c1f45937-bf14-46d6-9ef3-9691ca380a6d", 
			"video_id": "94c87ffb-ce3c-4685-8016-fbbd284b05d5", 
			"original_name": "original", 
			"file_size": 203485, 
			"md5": "4831d0057562d0fd0b6bdde4c3435519", 
			"filetype": "mp4",
			"quality": "original", 
			"resolution": "320x336", 
			"created_at": "2024-06-25T10:56:33.382677Z",
			"url": "https://kinescopecdn.net/eb7874ed-0833-4b89-b2f1-65d26ea6643f/videos/94c87ffb-ce3c-4685-8016-fbbd284b05d5/assets/c1f45937-bf14-46d6-9ef3-9691ca380a6d/original.mp4?expires=1722526645\u0026sign=faa6bc4db1944edfd8e1614f756185fb", 
			"download_link": "https://s3.kinescope.io/eb7874ed-0833-4b89-b2f1-65d26ea6643f_ec8/videos/94c87ffb-ce3c-4685-8016-fbbd284b05d5/mp4/original?X-Amz-Algorithm=AWS4-HMAC-SHA256\u0026X-Amz-Credential=api%2F20240801%2Fus-west-1%2Fs3%2Faws4_request\u0026X-Amz-Date=20240801T150725Z\u0026X-Amz-Expires=3600\u0026X-Amz-SignedHeaders=host\u0026response-content-disposition=attachment%3B%20filename%3DVID-20210311-WA0006-original.mp4\u0026X-Amz-Signature=56046dbb354a7b7985c80861b56cecf60e5b376e4b5291a7591150114310ef04" }, 
	{ "id": "73d293cd-8eee-4c17-974c-040999dfc09f",
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