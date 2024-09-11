$(document).ready(function(){  
    // Открыть/Закрыть ОКНО СОЗДАТЬ TAG
    $("#add-new-tag").click(function(){
        $("#open-create-tag").addClass('add-price-show'); 
    });
    $("#close-add-tag").click(function(){
        $("#open-create-tag").removeClass('add-price-show'); 
    });
});