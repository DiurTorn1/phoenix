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
        $('#open-create-multi-promocode').toggle();
    });
});