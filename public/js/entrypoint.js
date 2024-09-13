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
        var localdate= (dNow.getMonth()+1) + '/' + dNow.getDate() + '/' + dNow.getFullYear() + ' ' + dNow.getHours() + ':' + dNow.getMinutes();
        alert("Datetime: " + localdate);
    });
});