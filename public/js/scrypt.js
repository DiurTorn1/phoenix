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
        var mail = "xxx@mail.ru";
        var email_get = $("#user-input-registr").val();
        if(!email_get){
            $("#details_registr").text("Графа с андресом почты не должно быть пустым");
        } else {
            var split_email = email_get.split("@");
            console.log(split_email[1]);
            if(!split_email[1]){
                $("#details_registr").text("Адрес почты должен содержать символ @...");
            }else {
                $("#user-input-registr").toggle();
                $("#send_mail").toggle();
                $("#details_registr").text("Отправка сообщения на указанную почту...");
                $.post('/php/python_send.php',{mail:mail}, function(data) {   
                    
                    if(data == 'Error'){
                        $("#details_registr").text("Ошибка отправки сообщения!!!");
                        $("#user-input-registr").toggle();
                        $("#send_mail").toggle();
                    }else{
                        console.log(data);
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