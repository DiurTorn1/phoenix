var promocode, sale, key_promocode = 0, price_product, res_price;
function getPromocode() {
    promocode = $("#promocode_product_sell").val();
    res_price = price_product;
    if(promocode){
        //console.log(promocode);
        $.post('/php/get_promocode_name.php',{ name:promocode }, function(data)  {
            var output = $.parseJSON(data);
            var sale_loc;
            if(output){
                var price = parseInt(price_product);
                var sale = parseInt(output[5]);
                //console.log(price-(sale*0.01*price));
                var res_sale = price-(sale*0.01*price);
                res_price = res_sale;
                $('#price_product_sell').val(res_sale);
                //sale = output[5];
            }
            
            
        });
    }
    
}



$(document).ready(function() {

    getPromocode();
    if(!key_promocode){
        setInterval('getPromocode()',500);
    }
    
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
    //var price_product;
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
    console.log(sale);
    var ip_port;
    function getIPAddress() {
        $.ajax({
            url: '/php/get_ip.php', // Server-side script
            type: 'GET',
            success: function(response) {
                //console.log(response);
                ip_port = response;
            },
            error: function(xhr, status, error) {
                console.error('Error getting IP address:', error);
            }
        });
    }
    getIPAddress();

    $("#bay_product").on('click', function() {
        //console.log(src_product);
        //console.log(name_product);
        //console.log(price_product);
        var dNow = new Date();
        var localdate= dNow.getFullYear() + '-' + (dNow.getMonth()+1) + '-' + dNow.getDate() + ' ' + dNow.getHours() + ':' + dNow.getMinutes() + ':00';//2024-08-28 15:37:32
        console.log(localdate);
        var status = 'load';
        console.log(ip_port + ' ' + user_sell + ' ' + name_product + ' ' + res_price + ' ' + id_product + ' ' + status + ' ' + localdate );
        //$.post('/php/presell_payment.php', {ip_port:ip_port, mail:mail, name_product:name_product, price:price, id_product:id_product, status:status, created_at:localdate}, function(data)  {
            //console.log(data);
           // window.location.href=data;
           // window.location.href="/"; ip_port mail name_product price id_product created_at status
        //});
        //$.post('/php/sell_user_payment.php', {name_product:name_product, price_product:res_price, id_product:id_product}, function(data)  {
            //console.log(data);
           // window.location.href=data;
           // window.location.href="/";
        //});
    });

});