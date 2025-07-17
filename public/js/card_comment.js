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
    
    $("#close_card_comment").on('click', function(){
        window.location.href='/commentator';
    });
    var params = new window.URLSearchParams(window.location.search);
    //var pars = params[0].split("=");
    var id = params.get('com_input_id');
    //console.log(id);
    var pars_id = id.split('_');
    //console.log(pars_id[1]);
    $.post('/php/get_commentator_user.php', { model_id:pars_id[1] }, function(data_user)  {
        //console.log(data_user);
        var output_user = $.parseJSON(data_user);
        //console.log(output_user);

        //console.log(output_user[1]);
        //console.log(output_user[2]);
        $("#name_com").val(output_user[1]);
        $("#mail_com").val(output_user[2]);
        $.ajax({
            url: '/php/get_list_com.php',
            method: 'POST',
            data: { table_name: id },
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
                                    var key_del = 0;
                                    for(var i = 0; i < data_all.length; i++){
                                        //console.log(data_all[i].id_stream);
                                        if(data_all[i].id_stream == output_pub[0]){
                                            key_del = 1;
                                        }
                                    }
                                    //console.log(str_prod);
                                    if(key_del){
                                        $('#list_stream').append("<li id='idstr_" + output_pub[0] + "'><a>" + str_prod + "</a>" +
                                            "<input id='idstrch_" + output_pub[0] + "'value='Удалить' class='del_com_dym' type='button'>" +
                                            "</li>");
                                    }  else {
                                        $('#list_stream').append("<li id='idstr_" + output_pub[0] + "'><a>" + str_prod + "</a>" +
                                            "<input id='idstrch_" + output_pub[0] + "' class='' type='checkbox'>" +
                                            "</li>");
                                    }

                                }
                                
                            });
                
                        });
                    });
                });

            },
            error: function(jqXHR, textStatus, errorThrown) {
                if (jqXHR.status === 500) {
                    key_com = 0;
                    //console.log('Внутренняя ошибка сервера. Пожалуйста, попробуйте позже.');
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
                                        //console.log(str_prod);  
                                        $('#list_stream').append("<li id='idstr_" + output_pub[0] + "'><a>" + str_prod + "</a>" +
                                            "<input id='idstrch_" + output_pub[0] + "' class='' type='checkbox'></input>" +
                                            "</li>");
                                    }
                                    
                                });
                    
                            });
                        });
                    });
                } else {
                    console.log('Произошла ошибка: ' + textStatus + ', ' + errorThrown);
                }
            }
        });
    });
    $("#save_coment").on('click', function() {
        if(key_com == 0){
            console.log(id);
            $.ajax({
                url: '/php/create_list_com.php',
                method: 'POST',
                data: { table_name: id },
                dataType: 'json',
                success: function(data_list) {
                    key_com = 1;
                    console.log(data_list);
    
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status === 500) {
                        
                        console.log('Внутренняя ошибка сервера. Пожалуйста, попробуйте позже.');
                        
                    } else {
                        console.log('Произошла ошибка: ' + textStatus + ', ' + errorThrown);
                    }
                }
            });
            
        }
        var idarr = $("#list_stream").find("li").map(function() { return this.id; }).get(); //ToArray
        //console.log(idarr);
        for(var i = 0; i < idarr.length; i++){
            //var idparr = $('#' + idarr[i]).find("div.admin-video-sort-wrap").map(function() { return this.id; }).get(); //ToArray
            var idsarr = $('#' + idarr[i]).find("input").map(function() { return this.id; }).get();

            var ch = $("#" + idsarr).is(':checked');
            console.log(ch);
            var pars = idsarr[0].split("_");
            //var id = pars[1];
            if(ch){
                //console.log(pars[1]);
                var dNow1 = new Date();
                var localdate1 = dNow1.getFullYear() + '-' + 
                                (dNow1.getMonth()+1).toString().padStart(2, '0') + '-' + 
                                dNow1.getDate().toString().padStart(2, '0') + ' ' + 
                                dNow1.getHours().toString().padStart(2, '0') + ':' + 
                                dNow1.getMinutes().toString().padStart(2, '0') + ':00';
                
                $.ajax({
                    url: '/php/add_list_com.php',
                    type: 'POST',
                    dataType: 'text', // Ожидаем текстовый ответ
                    data: {
                        table: id,
                        id_stream: pars[1],
                        reg_date: localdate1
                    },
                    success: function(response) {
                        if (response === "OK") {
                            console.log("Data saved successfully");
                        } else {
                            console.error("Server returned error:", response);
                            // Можно показать сообщение пользователю
                            alert("Error: " + response);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX error:", status, error);
                        alert("Server error occurred. Please try again later.");
                    }
                });
            }
        }
            
        
    });
});