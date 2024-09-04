$(document).ready(function() {
    var params = new window.URLSearchParams(window.location.search);
    var pars = params.split("=");
    var id = pars[1];
    $.post('/php/get_product_card.php', {id:id}, function(data)  {
        console.log(data);
    });
    //alert(params);
    
});