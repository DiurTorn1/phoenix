$(document).ready(function() {
    var params = new window.URLSearchParams(window.location.search);
var key_sell = 0;
    //console.log(params.get('user_email'));
    $.post('/php/get_product_all.php', function(data) {
        var output = $.parseJSON(data);
        //console.log(output);
        $.each(output,function(i,item){
            //console.log(item.id_product);
            
            $.post('/php/get_sell_user_id.php',{product_id:item.id_product}, function(data1) {
                var output1 = $.parseJSON(data1);  
                var key_sell1 = 0;
                if(output1[2]==params.get('user_email')){
                    key_sell=1;
                    console.log(output1);
                }else{
                    var key_sell = 0;
                }
                //$.each(output,function(i,item){
                    //console.log(item.id_product);
                //});
                key_sell = key_sell1;
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.error('AJAX Error:', textStatus, errorThrown);
            });
            console.log(key_sell);
        });
    });
});