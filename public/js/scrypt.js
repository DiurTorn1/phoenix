$(document).ready(function() {
    //$("#publishBtn").click(function(){
    //});

    $("#publishBtn").on('click', function(){
        //alert("Button clicked!"); // This will display an alert when the button with id "myButton" is clicked
        $.post('/php/verif.php', function(data) {
                
            $('#res_reg').text(data);
        });
    });

    $("#enterranse").on('click', function(){
        alert("Button clicked!"); // This will display an alert when the button with id "myButton" is clicked
        
    });
    
});