$(document).ready(function() {
    var params = new window.URLSearchParams(window.location.search);
    //var pars = params[0].split("=");
    var id = params.get('product_id');
    //console.log(id);
    $.post('/php/get_product_card.php', {id:id}, function(data)  {
        //console.log(data);
        var pars = data.split("&");
        console.log(pars[1]);
        $("#head_name_save").val(pars[1]);
        console.log(pars[2]);
        var date = pars[2].split(" ");
        $("#start_access_time").val(date[0]);
        console.log(pars[3]);
        console.log(pars[4]);
        console.log(pars[5]);
        console.log(pars[6]);
        console.log(pars[7]);
        console.log(pars[8]);
        console.log(pars[9]);
        console.log(pars[10]);
        console.log(pars[11]);
        console.log(pars[12]);
        console.log(pars[13]);
        console.log(pars[14]);
        console.log(pars[15]);
        console.log(pars[16]);
        console.log(pars[17]);
        console.log(pars[18]);
        console.log(pars[19]);
        console.log(pars[20]);
        console.log(pars[21]);

    });
    //alert(params);
    
});