$(document).ready(function(){  
    // Открыть/Закрыть ОКНО СОЗДАТЬ
    $("#add-new-access_in_count").click(function(){
        $("#open-create-access_in_count").addClass('add-price-show'); 
    });
    $("#close-add-access_in_count").click(function(){
        $("#open-create-access_in_count").removeClass('add-price-show'); 
    });
});