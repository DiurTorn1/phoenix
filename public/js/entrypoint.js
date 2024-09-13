$(document).ready(function(){  
    // Открыть/Закрыть ОКНО СОЗДАТЬ ENTRY
    $("#add-new-entrypoint").click(function(){
        $("#open-create-entrypoint").addClass('add-price-show'); 
    });
    $("#close-add-entrypoint").click(function(){
        $("#open-create-entrypoint").removeClass('add-price-show'); 
    });

    $("#save_entrypoints").click(function(){
        alert("Save entrypoints!");
    });
});