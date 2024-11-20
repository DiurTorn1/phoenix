$(document).ready(function(){  
    var params = new window.URLSearchParams(window.location.search);

    $("#unpublic_stream").toggle();
    $("#inform_job").toggle();
    var name_video;
    
    $.post('/php/get_video_id.php', { id:params.get('admin_input_id') },  function(data)  {
        var output = $.parseJSON(data);
        //console.log(output);
        var list = output.data;
        console.log(list);
        name_video = list.title;
        $("#video_name").val(list.title);

        $("#img_poster_card").attr('src', list.poster.original);

        $.post('/php/get_video_public.php', {name:list.title}, function(data)  {
            var output = $.parseJSON(data);
            //$.each(output,function(i,item){
            var pub_name = output? output[1]: '1';
                if(pub_name==list.title){
                     $('#public_stream').hide();
                     $('#unpublic_stream').show();
                 }
                 //console.log(output[2]);
                 //console.log(output[3]);
           //});
    
        });
    });

    $("#public_stream").on('click', function(){
        $.post('/php/public_video.php', { name: name_video, type:'' }, function(data){
            if(data == "OK"){
                //alert("Продукт опубликован");
                $("#inform_job").text("Видео опубликованно");
                $('#public_stream').hide();
                $('#unpublic_stream').show();
            }
            //console.log(data);
        });
    });
    $("#unpublic_stream").on('click', function(){
        $.post('/php/unpublic_video.php', { name: name_video }, function(data){
            if(data == "OK"){
                //alert("Продукт снят с публикации");
                $("#inform_job").text("Видео снято с публикации");
                $('#public_stream').show();
                $('#unpublic_stream').hide();
            }
            //console.log(data);
        });
    });
});

/**
 * 
 */