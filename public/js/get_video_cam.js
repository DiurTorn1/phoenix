var count_stream = 0;
var array_stream = new Array();
var key_com = 0;

function paint_element_stream(){
    $.post('/php/get_stream.php', function(data)  {
        var output = $.parseJSON(data);
        $.each(output.data,function(i,item){
            $.post('/php/get_stream_id.php',{ id:item.id }, function(data_str)  {
                //console.log(data);
                var output_str = $.parseJSON(data_str);
                var list = output_str.data;
                $.post('/php/get_stream_public.php', {name_stream:list.name}, function(data_pub)  {
                    var output_pub = $.parseJSON(data_pub);
                    var str_prod = output ? output[1]:'';
                    if(str_prod){
                        array_stream.push(output_pub[1]);
                        count_stream++;  
                    }
                    
                });
    
            });
        });
    });

}

$(document).ready(function(){  
    var user_email = $('#name_user_get').text();
    //console.log(user_email);
    $.post('/php/get_cam.php', { email:user_email}, function(data_cam) {
        var output_cam = $.parseJSON(data_cam);
        //console.log(output_cam[0]);
        var table_name = "com_" + output_cam[0];
        $.ajax({
            url: '/php/get_list_com.php',
            method: 'POST',
            data: { table_name: table_name },
            dataType: 'json',
            success: function(data_list) {
                key_com = 1;
                //console.log(data_list);
                //var output_list = $.parseJSON(data_list);
                //console.log(data_list.data);
                var data_all = data_list.data;
                //console.log(data_all);
                $.post('/php/get_stream.php', function(data)  {
                    var output = $.parseJSON(data);
                    $.each(output.data,function(i,item){
                        $.post('/php/get_stream_id.php',{ id:item.id }, function(data_str)  {
                            //console.log(data);
                            var output_str = $.parseJSON(data_str);
                            var list = output_str.data;
                            $.post('/php/get_stream_public.php', {name_stream:list.name}, function(data_pub)  {
                                var output_pub = $.parseJSON(data_pub);
                                var str_prod = output_pub ? output_pub[1]:'';
                                if(str_prod){
                                    var poser = '';
                                    $.post('/php/get_stream.php', function(data)  {
                                        var output = $.parseJSON(data);
                                        $.each(output.data,function(i,item){
                                            if(item.name == output_pub[1]){
                                                for(var i = 0; i < data_all.length; i++){
                                                    //console.log(data_all[i].id_stream);
                                                    if(data_all[i].id_stream == output_pub[0]){
                                                        
                                                        $("#slider").append(
                                                            '<div class="slide cam index-live-item" id="' + item.id + '">'+
                                                            '<div class="index-live-item-video">'+
                                                                '<a >'+ 
                                                                    '<div class="index-live-banner">' +
                                                                        '<img src="' + item.poster.original + '">' +
                                                                    '</div>' +
                                                                '</a>' +
                                                    
                                                            '</div>'+
                                                            '<div class="index-live-item-text">'+
                                                                '<a >' + output_pub[1] + '</a>'+
                                                            '</div>'+
                                                        '</div>');
                                                        //console.log(item.name);
                                                    }
                                                }
                                                
                                            }
                                        });
                                    });

                                }
                                
                            });
                
                        });
                    });
                });

            },
            error: function(jqXHR, textStatus, errorThrown) {
                if (jqXHR.status === 500) {
                    key_com = 0;
                    $("#slider").append(
                        '<div class="slide index-live-item" id="1">'+
                        '<div class="index-live-item-video">'+
                            '<a >'+ 
                                '<div class="index-live-banner">' +
                                    '<img src="{{ asset("img/no_video.jpg") }}">' +
                                '</div>' +
                            '</a>' +
                
                        '</div>'+
                        '<div class="index-live-item-text">'+
                            '<a >Видео не добавленно в ЛК комментатора</a>'+
                        '</div>'+
                    '</div>');
                } else {
                    console.log('Произошла ошибка: ' + textStatus + ', ' + errorThrown);
                }
            }
        });
    });

    $(document).on('click', '.cam', function() {
        var id = this.id;
        //console.log(id);
        //$("#admin_input_id").val(id);
        window.location.href='/player_stream?player_stream_id='+id;
        //alert("Text: " + this.id);
    });
});