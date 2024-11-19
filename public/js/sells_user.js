$(document).ready(function() {
    var params = new window.URLSearchParams(window.location.search);

    //console.log(params.get('user_email'));
    $.post('/php/get_product_all.php', function(data) {
        var output = $.parseJSON(data);
        //console.log(output);
        $.each(output,function(i,item){
            //console.log(item.id_product);
            var key_sell = 0;
            $.post('/php/get_sell_user_id.php',{product_id:item.id_product}, function(data1) {
                var output1 = $.parseJSON(data1);  
                if(output1[2]==params.get('user_email')){
                    key_sell=1;
                    console.log(output1);
                }
                //$.each(output,function(i,item){
                    //console.log(item.id_product);
                //});
            });
            console.log(key_sell);
        });
    });
});