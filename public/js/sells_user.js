var user_sells = Array();
var user_gl_name;

function paint_element_stream(){
    $.post('/php/get_sell_user.php',{email:user_gl_name}, function(data) {
        var output = $.parseJSON(data);
        console.log(output);
        user_sells.push(output);
        //$.each(output,function(i,item){
            //console.log(item.id_product);
        //});
    });
}

$(document).ready(function() {
    
    var params = new window.URLSearchParams(window.location.search);
    user_gl_name = params.get('user_email');
    
    paint_element_stream();
    //setInterval('get_stream_array()',500);
    console.log(user_sells);
    //console.log(params.get('user_email'));
    $.post('/php/get_product_all.php', function(data) {
        var output = $.parseJSON(data);
        //console.log(output);
        $.each(output,function(i,item){
            console.log(item.id_product);
        });
    });
});