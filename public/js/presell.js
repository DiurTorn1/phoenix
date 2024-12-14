$(document).ready(function(){  
    $.post('/php/get_presells.php', function(data)  {
        var output = $.parseJSON(data);
        //console.log(output);
        $.each(output,function(i,item){
            if(item.status == 'load'){
                console.log(item.id + ' : ' + item.id_product + ' : ' + item.ip_port + ' : ' + item.mail + ' : ' + item.name_product + ' : ' + item.price + ' : ' + item.status + ' : ' + item.created_at);
            }
        });
    });
});