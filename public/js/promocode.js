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
        console.log(title);
        if(!title){
            $("#log_promocode_add").text("Графа с заголовком не должна быть пустой.");
        }
        var promo_company = $("#promo_company").val();
        console.log(promo_company);
        var code_promocode = $("#code_promocode").val();
        console.log(code_promocode);
        var limit_promocode = $("#limit_promocode").val();
        var int_limit_promocode = parseInt(limit_promocode);
        if(!int_limit_promocode){
            $("#log_promocode_add").text("Графа с лимитом должна содержить цифру.");
        }
        console.log(int_limit_promocode);
    });
});