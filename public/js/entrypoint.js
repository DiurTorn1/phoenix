$(document).ready(function(){  
    // Открыть/Закрыть ОКНО СОЗДАТЬ ENTRY
    $("#add-new-entrypoint").click(function(){
        $("#open-create-entrypoint").addClass('add-price-show'); 
    });
    $("#close-add-entrypoint").click(function(){
        $("#open-create-entrypoint").removeClass('add-price-show'); 
    });

    $("#save_entrypoints").click(function(){
        
        var dNow = new Date();
        var localdate= (dNow.getMonth()+1) + '-' + dNow.getDate() + '-' + dNow.getFullYear() + ' ' + dNow.getHours() + ':' + dNow.getMinutes() + ':00';//2024-08-28 15:37:32
        var sity_entrypoints = $("#sity_entrypoints").val();
        var zal_entrypoints = $("#zal_entrypoints").val();
        var key_entrypoints = $("#key_entrypoints").val();
        //console.log(sity_entrypoints + " = " + zal_entrypoints + " = " + key_entrypoints + " = " + localdate);
        $.post('/php/entrypoints_add.php', {sity_entrypoints:sity_entrypoints, zal_entrypoints:zal_entrypoints, key_entrypoints:key_entrypoints, create_at:localdate}, function(data)  {
            if(data == 'OK'){
                alert('Entrypoint добавлен');
            } else {
                alert('Ошибка добавления');
            }
        });
        //alert("Datetime: " + localdate);
    });
});