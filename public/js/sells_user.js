$(document).ready(function() {
    var user_sells = Array();
    var params = new window.URLSearchParams(window.location.search);

    $.post('/php/get_sell_user.php',{email:params.get('user_email')}, function(data) {
        var output = $.parseJSON(data);
        console.log(output);
        //$.each(output,function(i,item){
            //console.log(item.id_product);
        //});
    });

    //console.log(params.get('user_email'));
    $.post('/php/get_product_all.php', function(data) {
        var output = $.parseJSON(data);
        //console.log(output);
        $.each(output,function(i,item){
            console.log(item.id_product);
        });
    });
});