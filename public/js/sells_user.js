$(document).ready(function() {
    var params = new window.URLSearchParams(window.location.search);

    $.post('/php/get_sell_user.php',{user_email:params.get('user_email')}, function(data) {
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
            $.post('/php/get_sell_user_id.php',{product_id:item.id_product}, function(data1) {
                var output1 = $.parseJSON(data1);
                console.log(output1);
                //$.each(output,function(i,item){
                    //console.log(item.id_product);
                //});
            });
        });
    });
});