$(document).ready(function() {
    $("#jjj").on('click', function(){
        var params = new window.URLSearchParams(window.location.search);
        console.log(params.get('block-admin-input'));
        //alert(window.location.href);
    });
    
});