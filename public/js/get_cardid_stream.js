$(document).ready(function() {
    //$("#jjj").on('click', function(){
        var params = new window.URLSearchParams(window.location.search);
        console.log();
        //alert();
        $('#block-admin-input').val(params.get('block-admin-input'));
    //});
    
});