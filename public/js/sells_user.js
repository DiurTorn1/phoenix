$(document).ready(function() {
    var params = new window.URLSearchParams(window.location.search);
    //console.log(params.get('user_email'));
    $.post('/php/get_product_all.php', function(data) {
        var output = $.parseJSON(data);
        //console.log(output);
        $.each(output,function(i,item){
            console.log(item.id_product);
        });
    });
});