$(document).ready(function() {
    var params = new window.URLSearchParams(window.location.search);

    //console.log(params.get('user_email'));
    $.post('/php/get_product_all.php', function(data) {
        var output = $.parseJSON(data);
        //console.log(output);
        $.each(output,function(i,item){
            //console.log(item.id_product);
            var key_sell = 0;
            (async function() {
                //var globalVariable;
            
                try {
                    const response = await $.ajax({
                        url: '/php/get_sell_user_id.php',
                        method: 'POST',
                        data: { product_id:item.id_product }
                    });
                    var output1 = $.parseJSON(response); 
                    if(output1[2]==params.get('user_email')){
                        key_sell=1;
                    }
                    console.log('Global Variable:', output1);
                } catch (error) {
                    console.error('AJAX Error:', error);
                }
            })();
            console.log(key_sell);
        });
    });
});