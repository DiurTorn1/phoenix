$(document).ready(function() {


    var params = new window.URLSearchParams(window.location.search);
    //user_sell='+user_email+ '&id_product_sell='+id
    var user_sell = params.get('user_sell');
    var id_product_sell = params.get('id_product_sell');

    //console.log(user_sell);
    $('#user_sell').val(user_sell);
    //console.log(id_product_sell);
    var id_product = id_product_sell.split("_");
    //console.log(id_product[2]);
    var src_product;
    var name_product;
    var price_product;
    $.post('/php/get_product_id.php',{ id:id_product[2] }, function(data)  {
        var output = $.parseJSON(data);
        var id_product = output[0];
        src_product = output[17];
        name_product = output[1];
        price_product = output[12];
        $('#sell_src_img').attr('src', src_product);
        $('#name_product_sell').val(name_product);
        $('#price_product_sell').val(price_product);
    });
    console.log(src_product);
    console.log(name_product);
    console.log(price_product);
});