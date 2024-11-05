$(document).ready(function() {
    
    $("#add-new-promocode").on('click', function(){
        $('#open-create-promocode').toggle();
    });

    $("#add-multi-promocode").on('click', function(){
        $('#open-create-multi-promocode').toggle();
    });
    
    $("#close-multi-promocode").on('click', function(){
        $('#open-create-multi-promocode').toggle();
    });

    $("#close-add-promocode").on('click', function(){
        $('#open-create-promocode').toggle();
    });

    $("#add_promocode").on('click', function(){
        //console.log("Start");
        var title = $("#title_promocode_top").val();
        if(!title){
            $("#log_promocode_add").text("Графа с заголовком не должна быть пустой.");
        }
    });
});