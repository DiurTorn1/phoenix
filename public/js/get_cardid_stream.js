$(document).ready(function() {
    //$("#jjj").on('click', function(){
        var params = new window.URLSearchParams(window.location.search);
        console.log();
        //alert();
        $('#admin-input-main').appendVal(params.get('block-admin-input'));
    //});
    
});