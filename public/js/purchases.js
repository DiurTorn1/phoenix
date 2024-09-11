$(document).ready(function(){  
    // Открыть/Закрыть
    $("#open-paid-sort").click(function(){
        $("#paid-sort").css('display', 'flex');
        $("#close-paid-sort").show();
        $("#open-paid-sort").hide();
    });
    $("#close-paid-sort").click(function(){
        $("#paid-sort").hide();
        $("#close-paid-sort").hide();
        $("#open-paid-sort").show();
    });
});