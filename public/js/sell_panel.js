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
    var id_product;
    var src_product;
    var name_product;
    var price_product;
    $.post('/php/get_product_id.php',{ id:id_product[2] }, function(data)  {
        var output = $.parseJSON(data);
        var id_product_loc = output[0];
        var src_product_loc = output[17];
        var name_product_loc = output[1];
        var price_product_loc = output[12];

        $('#sell_src_img').attr('src', src_product_loc);
        $('#name_product_sell').val(name_product_loc);
        $('#price_product_sell').val(price_product_loc);

        src_product = src_product_loc;
        name_product = name_product_loc;
        price_product = price_product_loc;
        id_product = id_product_loc;
    });

    $("#bay_product").on('click', function() {
        //console.log(src_product);
        //console.log(name_product);
        //console.log(price_product);
        $.post('/php/sell_user_payment.php', {name_product:name_product, price_product:price_product, id_product:id_product}, function(data)  {
            //console.log(data);
            window.location.href=data;
        });
    });

});