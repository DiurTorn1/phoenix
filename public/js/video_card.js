$(document).ready(function(){  
    var params = new window.URLSearchParams(window.location.search);

    $("#unpublic_stream").toggle();
    
    $.post('/php/get_video_id.php', { id:params.get('admin_input_id') },  function(data)  {
        var output = $.parseJSON(data);
        //console.log(output);
        var list = output.data;
        console.log(list);
        $("#video_name").val(list.title);
        $("#img_poster_card").attr('src', list.postre.original);
    });
});

/**
 * 
 */