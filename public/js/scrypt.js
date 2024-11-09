

$(document).ready(function() {
    //$("#publishBtn").click(function(){
    //});

    function generateRandomCode(length) {
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var code = '';
        for (var i = 0; i < length; i++) {
            var randomIndex = Math.floor(Math.random() * characters.length);
            code += characters.charAt(randomIndex);
        }
        return code;
    }

    function getIPAddress() {
        $.ajax({
            url: '/php/get_ip.php', // Server-side script
            type: 'GET',
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error('Error getting IP address:', error);
            }
        });
    }
    getIPAddress();

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
    $('#user-input-code').toggle();
    $("#send_mail_reg").toggle();
    $("#send_mail").on('click',function(){
        var email_get = $("#user-input-registr").val();
        if(!email_get){
            $("#details_registr").text("Графа с андресом почты не должно быть пустым");
        } else {
            var key_preregistr;
            $.post('/php/get_preregistr_email.php', {email:email_get}, function(data) {
                var output = $.parseJSON(data);
                //console.log(output);
                if(output){
                    console.log("Find:" + output);
                } else {
                    console.log("No find:" + output);
                }
            });
            var split_email = email_get.split("@");
            console.log(split_email[1]);
            if(!split_email[1]){
                $("#details_registr").text("Адрес почты должен содержать символ @...");
            }else {
                $("#user-input-registr").toggle();
                $("#send_mail").toggle();
                $("#details_registr").text("Отправка сообщения на указанную почту...");
                var code = generateRandomCode(8);
                console.log(code);
                $.post('/php/python_send.php',{mail:email_get}, function(data) {   
                    
                    if(data == 'Error'){
                        $("#details_registr").text("Ошибка отправки сообщения!!!");
                        $("#user-input-registr").toggle();
                        $("#send_mail").toggle();
                    }else{
                        //console.log(data);
                        $("#details_registr").text("Сообщение отправлено! Введите код из сообщения.");
                        $("#user-input-registr").toggle();
                        $('#user-input-code').toggle();
                        $("#send_mail_reg").toggle();
                    }
                });
            }

        }

        //alert("Send email");
    });
    $("#registr_push").on('click', function(){
        $("#details_registr").text("Регистрация пользователя");
        $('#popup-back').toggle();
        $('#popup-back-login').toggle();
    });

    $("#send_mail_reg").on('click',function(){

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