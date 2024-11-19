$(document).ready(function() {
    var params = new window.URLSearchParams(window.location.search);
    var user_arr_sell = new Array();
    var user_arr_product = new Array();


    
    //console.log(params.get('user_email'));
    $.post('/php/get_product_all.php', function(data) {
        var output = $.parseJSON(data);
        //console.log(output);
        $.each(output,function(i,item){
            //console.log(item.id_product);
            user_arr_product.push(item.id_product)
            $.post('/php/get_sell_user_id.php',{product_id:item.id_product}, function(data1) {
                var output1 = $.parseJSON(data1);
                //console.log(output1);
                $.each(output,function(i,item1){
                    //console.log(item1.id_product);
                    user_arr_sell.push({email:params.get('user_email'), id_product:item1.id_product})
                });
            });
        });
    });

    $.post('/php/get_product.php', function(data) {
        var output = $.parseJSON(data);
        //console.log(output);
        console.log(user_arr_product);
        console.log(user_arr_sell);
        $.each(output,function(i,item){
            for(var i=0; i<user_arr_product.length;i++){
                if(item.id == user_arr_product[i]){
                    for(var k=0;k<user_arr_sell.length;k++){
                        var sell_user = user_arr_sell[i];
                        if(item.id == sell_user.id_product){
                            console.log(sell_user.id_product);
                        }
                        
                    }
                }
            }
            //console.log(item.id_product);
            //var int_id = parseInt(item.id_product);
            //user_arr_sell.push({email:params.get('user_email'), id_product:int_id})
        });
    });
});