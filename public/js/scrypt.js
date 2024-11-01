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
        //alert("Button clicked!"); // This will display an alert when the button with id "myButton" is clicked
        $('#popup-back').toggle();
    });
    
    $("#popup-close").on('click', function(){
        //alert("Button clicked!"); // This will display an alert when the button with id "myButton" is clicked
        $('#popup-back').toggle();
    });

    $("#send_mail").on('click',function(){
        var data = "test";
        $.ajax({
            url: '/script/exchange_data',
            type: 'POST',
            data: { data: data },
            success: function(response) {
                console.log('Response from Python: ' + response.output);
            },
            error: function(xhr, status, error) {
                console.log('Error: ' + error);
            }
        });
        //alert("Send email");
    });

    //$("#top-menu-btn").on('click', function(){
        //alert("Button clicked!"); // This will display an alert when the button with id "myButton" is clicked
        //$('#popup-back').toggle();
        //alert("Button clicked!");
    //});
});

window.glist = function(){ 
    alert("Global func");
    return 0;
}