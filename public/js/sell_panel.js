var promocode, sale, key_promocode = 0, price_product, res_price, id_promocode, limit_promocode, type_product;
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
                var lim = parseInt(output[4]);
                id_promocode = parseInt(output[0]);
                limit_promocode = parseInt(output[4]);
                if(lim != 0){
                    $('#price_product_sell').val(res_sale);
                } else {
                    $("#promocode_product_sell").val("Лимит промокода исчерпан");
                }
                
                //sale = output[5];
            }
            
            
        });
    }
    if(type_product == 'subscript'){
        $('#public_ophert').show();
        if ($('#ophert').is(':checked')){
            //console.log('Включен');
            $('#bay_product').show();
        } else {
            //console.log('Выключен');
            $('#bay_product').hide();
        }
        
    }
}



$(document).ready(function() {

    getPromocode();
    if(!key_promocode){
        setInterval('getPromocode()',500);
    }
    $('#public_ophert').hide();
    $('#ophert_box').hide();
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
        var parse_type = output[2].split("+");
        type_product = parse_type[0];
        $('#sell_src_img').attr('src', src_product_loc);
        $('#name_product_sell').val(name_product_loc);
        $('#price_product_sell').val(price_product_loc);

        src_product = src_product_loc;
        name_product = name_product_loc;
        price_product = price_product_loc;
        id_product = id_product_loc;
    });

    //console.log(sale);
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
    console.log(type_product);

    //public_ophert_box close_box_ophert
    $("#close_box_ophert").on('click', function() {
        //alert("lllllllllllll");
        $('#ophert_box').hide();
    });
    $("#read_box_ophert").on('click', function() {
        //alert("lllllllllllll");
        $('#ophert_box').hide();
    });
    $("#public_ophert_box").on('click', function() {
        //alert("lllllllllllll");
        $('#ophert_box').show();
    });

    $("#bay_product").on('click', function() {
        //console.log(src_product);
        //console.log(name_product);
        //console.log(price_product);
        var dNow = new Date();
        var localdate= dNow.getFullYear() + '-' + (dNow.getMonth()+1) + '-' + dNow.getDate() + ' ' + dNow.getHours() + ':' + dNow.getMinutes() + ':00';//2024-08-28 15:37:32
        //console.log(localdate);
        var status = 'load';
        //console.log(ip_port + ' ' + user_sell + ' ' + name_product + ' ' + res_price + ' ' + id_product + ' ' + status + ' ' + localdate );
                //console.log(concatenatedNumber);
        if(type_product == 'subscript'){
            //console.log(type_product);
            $.post('/php/users_get_reg.php', {email:user_sell}, function(get_reg)  {
                var get_pars = $.parseJSON(get_reg);
                //console.log(get_pars[0]);
                if(get_pars){
                    var id_pay = parseInt(id_product) + parseInt(get_pars[0]);
                    let lo_year = dNow.getFullYear() + ' ' + 0;
                    let year_s = lo_year.split(' ');
                    let con_year = year_s.join('');
                    let year = con_year.substring(3, 4);
                    let day_g = parseInt(dNow.getDate());
                    let day_p = '';
                    if(day_g < 10){
                        day_p = 0 + '' + dNow.getDate();
                    } else { day_p = dNow.getDate();} 
                    let month_g = parseInt((dNow.getMonth() + 1));
                    let month_p = '';
                    if(month_g < 10){
                        month_p = 0 + '' + (dNow.getMonth() + 1);
                    } else { month_p = (dNow.getMonth() + 1);}
                    let localdate_id = id_pay + ' ' + year + ' ' + month_p + ' ' + day_p;
                    let numbersArray = localdate_id.split(' ');
                    let concatenatedNumber = numbersArray.join('');
                    //console.log(id_pay);
                    if(name_product == 'Тестовая на 3 дня'){
                        //window.location.href='https://auth.robokassa.ru/RecurringSubscriptionPage/Subscription/Subscribe?SubscriptionId=9d7a0500-d971-475f-a47a-53ee2aebb080';
                        $.post('/php/presell_payment.php', {ip_port:ip_port, mail:user_sell, name_product:name_product, price:res_price, id_product:concatenatedNumber, status:status, created_at:localdate}, function(data)  {
                            //console.log(data);
                            if(data == 'OK'){
                                $.post('/php/sell_reccurent_payment.php', { OutSum: res_price, InvoiceID: concatenatedNumber, Description: name_product }, function(data){
                                    if(data.success) {
                                        // Перенаправляем пользователя на страницу оплаты
                                        window.location.href = data.payment_url;
                                        //console.log(data.payment_url);
                                    } else {
                                        // Выводим сообщение об ошибке
                                        $('#response').html('Ошибка: ' + data.message);
                                    } 
                                }, 'json');
    
                                //$.post('/php/sell_user_payment.php', function(data)  {
                                    //console.log(data);
                                    //var url_pay = data;
                                    //if(id_promocode){
                                        //var lim_put = limit_promocode - 1;
                                        //$.post('/php/upload_promocode_limit.php', {id:id_promocode, limit:lim_put}, function(data)  {
                                            //if(data == 'OK'){
                                                //window.location.href=url_pay;
                                                //window.location.href="/";
                                            //}
                                        //});
                                   // } else {
                                        //window.location.href=url_pay;
                                        //window.location.href="/";
                                    //}
        
                                //});
                            }
                           // window.location.href=data;
                           // window.location.href="/"; ip_port mail name_product price id_product created_at status
                        });
                    } else {
                        alert("Подписка не утверждена администрацией.");
                    }

                }
            });
        } else if(type_product == 'ticket'){
            $.post('/php/users_get_reg.php', {email:user_sell}, function(get_reg)  {
            var get_pars = $.parseJSON(get_reg);
            //console.log(get_pars[0]);
            if(get_pars){
                var id_pay = parseInt(id_product) + parseInt(get_pars[0]);
                let lo_year = dNow.getFullYear() + ' ' + 0;
                let year_s = lo_year.split(' ');
                let con_year = year_s.join('');
                let year = con_year.substring(3, 4);
                let day_g = parseInt(dNow.getDate());
                let day_p = '';
                if(day_g < 10){
                    day_p = 0 + '' + dNow.getDate();
                } else { day_p = dNow.getDate();} 
                let month_g = parseInt((dNow.getMonth() + 1));
                let month_p = '';
                if(month_g < 10){
                    month_p = 0 + '' + (dNow.getMonth() + 1);
                } else { month_p = (dNow.getMonth() + 1);}
                let localdate_id = id_pay + ' ' + year + ' ' + month_p + ' ' + day_p;
                let numbersArray = localdate_id.split(' ');
                let concatenatedNumber = numbersArray.join('');
                //console.log(id_pay);
                $.post('/php/presell_payment.php', {ip_port:ip_port, mail:user_sell, name_product:name_product, price:res_price, id_product:concatenatedNumber, status:status, created_at:localdate}, function(data)  {
                    //console.log(data);
                    if(data == 'OK'){
                        $.post('/php/sell_user_payment.php', {name_product:name_product, price_product:res_price, id_product:concatenatedNumber}, function(data)  {
                            //console.log(data);
                            var url_pay = data;
                            if(id_promocode){
                                var lim_put = limit_promocode - 1;
                                $.post('/php/upload_promocode_limit.php', {id:id_promocode, limit:lim_put}, function(data)  {
                                    if(data == 'OK'){
                                        window.location.href=url_pay;
                                        //window.location.href="/";
                                    }
                                });
                            } else {
                                window.location.href=url_pay;
                                //window.location.href="/";
                            }

                        });
                    }
                   // window.location.href=data;
                   // window.location.href="/"; ip_port mail name_product price id_product created_at status
                });
            }
            });
        } else {

        }

    });

});