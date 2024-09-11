$(document).ready(function(){  
    // Открыть/Закрыть ОКНО ИНФОРМАЦИИ О КОМПАНИИ
    $("#company_details").click(function(){
        $("#open_company_details").addClass('add-price-show'); 
    });
    $("#close_company_details").click(function(){
        $("#open_company_details").removeClass('add-price-show'); 
    });
});