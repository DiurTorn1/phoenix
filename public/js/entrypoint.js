$(document).ready(function(){ 
    
    $.post('/php/entrypoints_get.php', function(data)  {
        var output = $.parseJSON(data);
        //console.log(output);
        $.each(output,function(i,item){
            console.log(item.sity);
            console.log(item.zal);
            console.log(item.key_stream);
            console.log(item.create_at);
        });
    });
    /*$("#admin-video-list").append(
        '<li class="admin-video-item admin-back" id="' + item.id + '">' + 
            '<div class="admin-video-sort-wrap">' + 
                '<input id="admin-vl' + idch +'" class="admin-video-sort-check" type="checkbox">' +
                '<label class="admin-video-check-label" for="admin-vl' + idch + '"></label>' + 
            '</div>' + 	
            '<div class="admin-video-prev">' + 
                '<img src="' + item.poster.sm + '" alt="" class="" style="heigth: 100%; width: 100%">' +
                '<img src="img/rub2.png" alt="" class="admin-video-prev-stik">' +
                //'<p>Нет потока</p>' + 
            '</div>' + 
            '<div class="admin-video-item-header">' + 
                '<div class="admin-video-item-h-list">' + 
                '<span class="admin-video-item-h-date">' + item.name + '</span>' +
            '</div>' + 
            '<div class="admin-video-item-h-hashtag">' + 
                '<span class="admin-video-hashtag-date">' + sezon + '</span>' + 
                '<span class="admin-video-hashtag-kubok">' + kubok + '</span>' +
                '<span class="admin-video-hashtag-group">' + weigth + '</span>' +
                '<span class="admin-video-hashtag-sport">'+ vid_sport +'</span>' +
                '<span class="admin-video-hashtag-city">' + gorod + '</span>' +
                '<span class="admin-video-hashtag-org">' + boss + '</span>' +
            '</div>' +
        '</div>' +
        '<div class="admin-video-item-view">' +
            '<p class="admin-video-item-v-count"><span></span>просмотра</p>' +
            '<p class="admin-video-item-v-region">' + region + '</p>' +
        '</div>' +
        '<div class="admin-video-item-info admin-video-item-view">' +
            '<p class="admin-video-item-i-time">Закончилась в<span></span></p>' +
            '<p class="admin-video-item-i-date">' + item.stream.finished_at + '</p>' +
            '<a href="#" class="admin-video-item-i-link"><img src="img/right-arrow.svg" alt="Поделиться"></a>' +
        '</div>' + 
    '</li>');*/
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