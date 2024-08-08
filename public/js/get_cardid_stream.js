$(document).ready(function() {
    //$("#jjj").on('click', function(){
        var params = new window.URLSearchParams(window.location.search);
        //console.log(params.get('block-admin-input'));
        $.post('/php/get_cardid_stream.php', { param1: params.get('block-admin-input')}, function(data)  {
            console.log(data);
        });
        //alert();
        //$('#admin-input-main').appendVal();
    //});
    
});