$(document).ready(function(){ 
    
    $.post('/php/entrypoints_get.php', function(data)  {
        var output = $.parseJSON(data);
        //console.log(output);
        $.each(output,function(i,item){
            //console.log(item.sity);
            //console.log(item.zal);
            //console.log(item.key_stream);
            //console.log(item.create_at);
            var pars = item.create_at.split(" ");
            $("#entrypoints_view").append(
                '<tr class="tr-wrapper admin-video-item admin-back">'+
                    '<td class="table-one-column-check">' +
                        '<div class="admin-video-sort-wrap">' +
                            '<input id="check-promo-1" class="admin-video-sort-check" type="checkbox">' +
                            '<label class="admin-video-check-label" for="check-promo-1"></label>' +
                        '</div>' +
                    '</td>' +
                    '<th class="table-one-column-70">' + item.sity + '(' + item.zal + ')</th>' +
                    '<td><p class="promo-prew-admin">Оffline</p></td>' +
                    '<td>' + pars[0] + '</td>' +
                '</tr>');
        });
    });
    /**/
    // Открыть/Закрыть ОКНО СОЗДАТЬ ENTRY
    $("#add-new-entrypoint").click(function(){
        $("#open-create-entrypoint").addClass('add-price-show'); 
    });
    $("#close-add-entrypoint").click(function(){
        $("#open-create-entrypoint").removeClass('add-price-show'); 
    });

    $("#save_entrypoints").click(function(){
        
        var dNow = new Date();
        var localdate= dNow.getFullYear() + '-' + (dNow.getMonth()+1) + '-' + dNow.getDate() + ' ' + dNow.getHours() + ':' + dNow.getMinutes() + ':00';//2024-08-28 15:37:32
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