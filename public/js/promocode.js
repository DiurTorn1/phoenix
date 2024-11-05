$(document).ready(function() {

    $.post('/php/get_product_all.php', function(data)  {
        //for(var i=0; i<data.length;i++){
            var output = $.parseJSON(data);
            $.each(output,function(i,item){
                if(!item.initial){
                    $.post('/php/get_product_card.php', {id:item.id_product}, function(data)  {
                        var pars = data.split("&");
                        //console.log(pars[1]);
                        $('#product_promocode').append($('<option>', {
                            value: 1,
                            text: pars[1]
                        }));
                    });

                }

                //console.log(item.id_product);
            });
            
        //}
        
    });
    
    $("#add-new-promocode").on('click', function(){
        $('#open-create-promocode').toggle();
    });

    $("#add-multi-promocode").on('click', function(){
        $('#open-create-multi-promocode').toggle();
    });
    
    $("#close-multi-promocode").on('click', function(){
        $('#open-create-multi-promocode').toggle();
    });

    $("#close-add-promocode").on('click', function(){
        $('#open-create-promocode').toggle();
    });

    $("#add_promocode").on('click', function(){
        //console.log("Start");
        $("#log_promocode_add").text("");
        var title = $("#title_promocode_top").val();
        console.log(title);
        if(!title){
            $("#log_promocode_add").text("Графа с заголовком не должна быть пустой.");
        }
        var promo_company = $("#promo_company").val();
        console.log(promo_company);
        var code_promocode = $("#code_promocode").val();
        console.log(code_promocode);
        var limit_promocode = $("#limit_promocode").val();
        var int_limit_promocode = parseInt(limit_promocode);
        if(!int_limit_promocode){
            $("#log_promocode_add").text("Графа с лимитом должна содержить цифру.");
        }
        console.log(int_limit_promocode);
        var sale_in_pers = $("#sale_in_pers").val();
        var int_sale_in_pers = parseInt(sale_in_pers);
        if(!int_sale_in_pers){
            $("#log_promocode_add").text("Графа со скидкой должна содержить цифру.");
        }
        console.log(int_sale_in_pers);
        var sum_sale = $("#sum_sale").val();
        var int_sum_sale = parseInt(sum_sale);
        if(!int_sum_sale){
            $("#log_promocode_add").text("Графа со скидкой должна содержить цифру.");
        }
        console.log(int_sum_sale);
        var product_promocode = $("#product_promocode option:selected").text();
        console.log(product_promocode);

        var datetime_start = $("#datetime_start").val();
        console.log(datetime_start);
        var datetime_stop = $("#datetime_stop").val();
        console.log(datetime_stop);
    });
});