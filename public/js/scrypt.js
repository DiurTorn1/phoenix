

function get_presell_load(){
        // 1. Получаем текущую дату и время
        //var dNow = new Date();
        //let localdate = dNow.getFullYear() + ' ' + (dNow.getMonth() + 1) + ' ' + dNow.getDate() + ' ' + dNow.getHours() + ' ' + dNow.getMinutes() + ' 00' + ' ' + 65;
        //let localdate = dNow.getFullYear() + ' ' + 0;
        //let yyyyy = localdate.split(' ');
        //let concatenatedNumber = yyyyy.join('');
        //let year = concatenatedNumber.substring(2, 4);
        //console.log(year);
        // 2. Разделяем строку на массив чисел
        //let numbersArray = localdate.split(' ');

        /// 3. Объединяем числа в одно длинное число (как строку)
        //let concatenatedNumber = numbersArray.join('');
        //console.log(concatenatedNumber);
    $.post('/php/get_presell_status.php', {status:'load' }, function(data) {
        var output1 = $.parseJSON(data);
        if(output1){
            //console.log(output1);
            $.each(output1,function(i,item1){
                //console.log(item1.created_at);
                //console.log(item1.id_product);
                //console.log(item1.mail);
                var int_id = parseInt(item1.id_product);
                $.post('/php/sell_get_operacion.php', {id_product: int_id}, function(data2) {
                    //console.log(data2);
                    var xmlDoc = $.parseXML(data2);
                    var $xml = $(xmlDoc);
                    //console.log($xml);
                    //console.log(xmlDoc);
                    // Выборка элементов и добавление их в список
                    $xml.find('State').each(function() {
                        var $state = $(this);
                        var code = $state.find('Code').text();
                        //var author = $book.find('author').text();

                        //console.log(code);
                        if(code){
                            $.post('/php/users_get_reg.php', {email:item1.mail}, function(get_reg)  {
                                var get_pars = $.parseJSON(get_reg);
                                //console.log(get_pars[0]);
                                if(get_pars){
                                    if(item1.name_product == 'Тестовая на 3 дня'){
                                        //console.log('Boooom!!!');
                                        let pars_sub = item1.id_product;
                                        let length_id = pars_sub.toString().length;
                                        let id_pars = pars_sub.substring(0, length_id-5);
                                        let year = pars_sub.substring(length_id-5, length_id-4);
                                        let month = pars_sub.substring(length_id-4, length_id-2);
                                        let day = pars_sub.substring(length_id-2, length_id);
                                        //console.log(item1.mail);
                                        let id_prod = id_pars - get_pars[0];
                                        $.post('/php/get_product_id.php', {id:id_prod}, function(data_prod){
                                            var get_prod = $.parseJSON(data_prod);
                                            console.log(get_prod[8]);
                                            $.post('/php/all_subscribe_add.php', {user_email:item1.mail, id_sell:item1.id_product, period:get_prod[8], create_at:item1.created_at}, function(data_sell) {
                                                //console.log(item1.id_product+ " : " + item1.mail + " : " + item1.created_at);
                                                if(data_sell == "OK"){
                                                    // Пример timestamp из базы данных (в формате 'YYYY-MM-DD HH:mm:ss')
                                                    var dbTimestamp = item1.created_at;//"2023-10-25 14:30:00";

                                                    // Преобразуем timestamp в объект Date
                                                    var dateFromDb = new Date(dbTimestamp);

                                                    // Прибавляем 5 дней (можно изменить на нужное количество)
                                                    var daysToAdd = parseInt(get_prod[8]);
                                                    dateFromDb.setDate(dateFromDb.getDate() + daysToAdd);

                                                    // Форматируем новую дату в нужный формат
                                                    let newDate = dateFromDb.getFullYear() + '-' + 
                                                        ('0' + (dateFromDb.getMonth() + 1)).slice(-2) + '-' + 
                                                        ('0' + dateFromDb.getDate()).slice(-2) + ' ' + 
                                                        ('0' + dateFromDb.getHours()).slice(-2) + ':' + 
                                                        ('0' + dateFromDb.getMinutes()).slice(-2) + ':00';

                                                        //console.log("Исходный timestamp: " + dbTimestamp);
                                                        //console.log("Новая дата после добавления " + daysToAdd + " дней: " + newDate);
                                                        var pars_date = newDate.split(' ');
                                                        var par_date2 = pars_date[0].split('-');
                                                        let lo_year = par_date2[0] + ' ' + 0;
                                                        let year_s = lo_year.split(' ');
                                                        let con_year = year_s.join('');
                                                        let year = con_year.substring(3, 4);
                                                        let day_p= par_date2[2];
                                                        let month_p = par_date2[1];
                                                        let localdate_id = id_pars + ' ' + year + ' ' + month_p + ' ' + day_p;
                                                        let numbersArray = localdate_id.split(' ');
                                                        let concatenatedNumber = numbersArray.join('');

                                                    $.post('/php/subscribe_line_add.php', {id_sell:item1.id_product, id_prod:concatenatedNumber, status:'sell', time_end:newDate, create_at:dbTimestamp}, function(data_sl){
                                                        if(data_sl == "OK"){
                                                            $.post('/php/sell_user_add.php', {product_global:id_prod, user_global:item1.mail, create_at:dbTimestamp}, function(data_us) {
                                                                //console.log(item1.id_product+ " : " + item1.mail + " : " + item1.created_at);
                                                                if(data_us == "OK"){
                                                                    $.post('/php/upload_presell_status.php', {id:item1.id, status:'bay'}, function(data_ps) {
                                                                        if(data_ps == "OK"){
                                                                            $.post('/php/python_send.php',{mail:item1.mail, product:item1.name_product}, function(data_send) {   
                                    
                                                                                if (data_send === 'Error') {
                                                                                    console.error('Ошибка при отправке данных');
                                                                                } else {
                                                                                    console.log('Письмо о покупке подписки отправлено:', data_send);
                                                                                    console.log("Success bay");
                                                                                }
                                                                            });
                                                                            //console.log("Success bay");
                                                                        } 
                                                                    });
                                                                }
                                                            });
                                                        } 
                                                    });
                                                    /*$.post('/php/upload_presell_status.php', {id:item1.id, status:'bay'}, function(data) {
                                                        if(data == "OK"){
                                                            console.log("Success bay");
                                                        } 
                                                    });*/
                                                }
                                            });
                                        });

                                        //console.log(202 + year);
                                        //console.log(month);
                                        //console.log(day);
                                        //console.log(id_pars - parseInt(get_pars[0]));
                                        //$.post('/php/create_table_subscribe_line.php', { name: name_table}, function(data){
                                            //if(data == "OK"){
                                                
                                           // }
                                        //});
                                    } else {
                                        //var id_pay = item1.id_product - 1000000000 - parseInt(get_pars[0]);
                                        let pars_sub = item1.id_product;
                                        let length_id = pars_sub.toString().length;
                                        let id_pars = pars_sub.substring(0, length_id-5);
                                        //console.log(id_pay+ " : " + item1.mail + " : " + item1.created_at);
                                        $.post('/php/sell_user_add.php', {product_global:id_pars, user_global:item1.mail, create_at:item1.created_at}, function(data) {
                                            //console.log(item1.id_product+ " : " + item1.mail + " : " + item1.created_at);
                                            if(data == "OK"){
                                                $.post('/php/upload_presell_status.php', {id:item1.id, status:'bay'}, function(data) {
                                                    if(data == "OK"){
                                                        console.log("Success bay");
                                                    } 
                                                });
                                            }
                                        });
                                    }
                                }
                            });
                            //$.post('/php/sell_user_add.php', {product_global:item1.id_product, user_global:item1.mail, create_at:item1.created_at}, function(data) {
                                //console.log(item1.id_product+ " : " + item1.mail + " : " + item1.created_at);
                            //});
                        }
                    });
                });
                
            });
        }
    });
}

function subscribe_line(){
    var user_email = $('#name_user_get').text();
    //"2023-10-25 14:30:00";var dateFromDb = new Date(dbTimestamp);
    var dNow = new Date();
    dNow.setDate(dNow.getDate() + 1);
    let howTime = dNow.getFullYear() + '-' + 
        ('0' + (dNow.getMonth() + 1)).slice(-2) + '-' + 
        ('0' + dNow.getDate()).slice(-2) + ' ' + 
        ('0' + dNow.getHours()).slice(-2) + ':' + 
        ('0' + dNow.getMinutes()).slice(-2) + ':00';
    //console.log(howTime);
    $.post('/php/get_subscribe_line_time.php', {time_end:howTime }, function(data_sl) {
        var res_data = $.parseJSON(data_sl);
        if(res_data){
            //console.log(output1);
            $.each(res_data,function(i,res_item){
                

                var time_end = new Date(res_item.time_end);
                time_end.setDate(time_end.getDate());
                let how_time_end = time_end.getFullYear() + '-' +
                    ('0' + (time_end.getMonth() + 1)).slice(-2) + '-' +
                    ('0' + time_end.getDate()).slice(-2) + ' ' + 
                    ('0' + time_end.getHours()).slice(-2) + ':' +
                    ('0' + time_end.getMinutes()).slice(-2) + ':00';
                
                if(time_end.getFullYear() == dNow.getFullYear() &&
                ('0' + (time_end.getMonth() + 1)).slice(-2) == ('0' + (dNow.getMonth() + 1)).slice(-2) &&
                    ('0' + time_end.getDate()).slice(-2) == ('0' + dNow.getDate()).slice(-2) && res_item.status == 'sell'){
                        //console.log(howTime);
                        //console.log(how_time_end);
                        $.post('/php/get_all_subscribe_id.php', {id_sell:res_item.id_sell }, function(data_all) {
                            var res_subs_all = $.parseJSON(data_all);
                            //console.log(res_subs_all[1]);
                            let length_id_sell = res_item.id_sell;
                            let res_length = length_id_sell.toString().length;
                            let id_res_get = length_id_sell.substring(0, res_length-5);
                            //console.log(id_res_get);
                            $.post('/php/users_get_reg.php', {email: res_subs_all[1]}, function(data_reg) {
                                var output_reg = $.parseJSON(data_reg);
                                //console.log(parseInt(id_res_get) - parseInt(output_reg[0]));
                                let id_prod_fin = parseInt(id_res_get) - parseInt(output_reg[0]);
                                $.post('/php/get_product_id.php', {id:id_prod_fin}, function(data_prod_fin){
                                    var res_prod_fin = $.parseJSON(data_prod_fin);
                                    console.log(res_prod_fin[1]);
                                    /*$.post('/php/python_send.php',{mail:res_subs_all[1], presell:res_prod_fin[1]}, function(data_send) {   
                                    
                                        if (data_send === 'Error') {
                                            console.error('Ошибка при отправке данных');
                                        } else {
                                            console.log('Письмо о информировании отправлено:', data_send);
                                            console.log("Success bay");
                                        }
                                    });*/
                                });
                            });

                        });
                    }
            });
        }
        //if(res_data != null){
            //console.log(res_data);
        //}
        
    });
}

$(document).ready(function() {
    var user_email = $('#name_user_get').text();
    //console.log(user_email);
    //$("#publishBtn").click(function(){ name_get_pars
    //});

    get_presell_load();
    setInterval('get_presell_load()',1000);
    subscribe_line();
    setInterval('subscribe_line()',5000);

    $.post('/php/users_get_reg.php', {email:$("#email_get_pars").text() }, function(data) {
        var output1 = $.parseJSON(data);
        //console.log(output1);
        var pars_name1 = output1 ? output1[1] : '';
        var pars_name = pars_name1.split('&');
        var family = pars_name[1] ? pars_name[1] : '';
        $("#name_main_get").text(family + " " + pars_name[0]);
        $("#name_get_pars").text(pars_name[0]);
    });

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
                //console.log(response);
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
    $('#form_for_reg').toggle();
    $('#send_mail_OK').toggle();
    $("#send_mail").on('click',function(){
       
        var email_get = $("#user-input-registr").val();
        if(!email_get){
            $("#details_registr").text("Графа с андресом почты не должно быть пустым");
        } else {
            $.post('/php/users_get_reg.php', { email:email_get }, function(data1) {
                var output1 = $.parseJSON(data1);
                if(output1){
                    $("#details_registr").text("Пользователь с данной почтой зарегестрирован.");
                    $("#send_mail").toggle();
                    //$("#user-input-registr").toggle();
                    //$("#send_mail_reg").toggle();
                    $("#user-input-registr").toggle();
                    $("#send_mail_OK").toggle();
                }else{
                    $.post('/php/get_preregistr_email.php', {email:email_get}, function(data) {
                        var output = $.parseJSON(data);
                        //console.log(output);
                        if(output){
                            console.log("Find:" + output);
                            $("#details_registr").text("На данную почту уже было отправленно сообщение с кодом регистрации. Проверьте почту или обратитесь к администратору сайта.");
                            $("#send_mail").toggle();
                            //$("#user-input-registr").toggle();
                            $('#user-input-code').toggle();
                            $("#send_mail_reg").toggle();
                        } else {
                            var split_email = email_get.split("@");
                            //console.log(split_email[1]);
                            if(!split_email[1]){
                                $("#details_registr").text("Адрес почты должен содержать символ @...");
                            }else {
                                
                                $("#user-input-registr").toggle();
                                $("#send_mail").toggle();
                                $("#details_registr").text("Отправка сообщения на указанную почту...");
                                var code = generateRandomCode(8);
                                //console.log(code);
                                $.post('/php/python_send.php',{mail:email_get, code:code}, function(data) {   
                                    
                                    if(data == 'Error'){
                                        $("#details_registr").text("Ошибка отправки сообщения!!!");
                                        $("#user-input-registr").toggle();
                                        $("#send_mail").toggle();
                                    }else{
                                        //console.log(data);
                                        var dNow = new Date();
                                        var localdate= dNow.getFullYear() + '-' + (dNow.getMonth()+1) + '-' + dNow.getDate() + ' ' + dNow.getHours() + ':' + dNow.getMinutes() + ':00';//2024-08-28 15:37:32
                                        $.post('/php/create_preregistr.php', {email:email_get, code:code, create_at:localdate }, function(data) {
                                            if(data == 'OK'){
                                                $("#details_registr").text("Сообщение отправлено! Введите код из сообщения.");
                                                $("#user-input-registr").toggle();
                                                $('#user-input-code').toggle();
                                                $("#send_mail_reg").toggle();
                                            }else{
                                                $("#details_registr").text("Ошибка отправки сообщения!!!");
                                                $("#user-input-registr").toggle();
                                                $("#send_mail").toggle();
                                            }
                                            console.log(data);
                                        });
            
                                    }
                                });
                            }
                            
                        }
                    });
                }
            });



        }

        //alert("Send email");
    });
    $("#registr_push").on('click', function(){
        $("#details_registr").text("Регистрация пользователя");
        $('#popup-back').toggle();
        $('#popup-back-login').toggle();
    });

    $("#send_mail_reg").on('click',function(){
        var email_get = $("#user-input-registr").val();
        var code_get = $("#user-input-code").val();
        $.post('/php/get_preregistr_email.php', {email:email_get}, function(data) {
            var output = $.parseJSON(data);
            //console.log(output);
            if(output){
                if(code_get == output[2]){
                    //console.log(output[2]);
                    var split_email = output[1].split("@");
                    //console.log(split_email[0]);
                    //console.log(output[1]);
                    //console.log(output[2]);
                    //console.log(roles);
                    //var hash_passw;

                    $.ajax({
                        url: '/php/hash_pass.php',
                        type: 'POST',
                        data: { pass:output[2] },
                        success: function(response) {
                            //console.log(response);
                            $.post('/php/users_finish_reg.php', { name:split_email[0] ,email:output[1] ,email_verified_at:null ,password:response ,remember_token:null ,created_at:null,updated_at:null }, function(data) {
                                if(data == 'OK'){
                                    //console.log(output[1]);
                                    $.post('/php/users_get_reg.php', { email:output[1] }, function(data) {
                        
                                        var output = $.parseJSON(data);
                                        $.post('/php/users_role_put.php', { model_id:output[0] }, function(data) {
                                            if(data == 'OK'){
                                                $("#details_registr").text("Регистрация завершена.");
                                                $("#user-input-registr").toggle();
                                                $('#user-input-code').toggle();
                                                $("#send_mail_reg").toggle();
                                                $("#send_mail_OK").toggle();
                                                
                                            }
                                        });
                                        //console.log(output[0]);
                                    });
                                }
                                //$.post('/php/users_role_put.php', { name:split_email[0] }, function(data) {});
                                //console.log(data);
                                //$('#popup-back-login').toggle();
                                //$('#popup-back').toggle();
                            });
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr);
                            console.log(status);
                            console.log(error);
                        }
                    });
                } else{
                    $("#details_registr").text("Введите пароль из сообщения.");
                }
            }else{
                $("#details_registr").text("Введите почтовый ящик на который было отправлено сообщение.");
            }
        });
    });

    $("#send_mail_OK").on('click', function(){
        //alert("Button clicked!"); // This will display an alert when the button with id "myButton" is clicked
        //$('#popup-back').toggle();
        //alert("Button clicked!");
        $('#popup-back').toggle();
        $('#popup-back-login').toggle();
    });
});
var params = new window.URLSearchParams(window.location.search);
var OutSum = params.get('OutSum');
var InvId = params.get('InvId');
var SignatureValue = params.get('SignatureValue');
var Culture = params.get('Culture');

if(OutSum && InvId && SignatureValue && Culture){
    //console.log(OutSum+" : "+InvId+" : "+SignatureValue+" : "+Culture);
    $.post('/php/get_sell_payment.php', {OutSum:OutSum, InvId:InvId, SignatureValue:SignatureValue, Culture:Culture}, function(data){
        //console.log(data);
        if(data=='OK'){
            if(OutSum && InvId && SignatureValue && Culture){
                user_global = $('#name_user_get').text();
                var dNow = new Date();
                var localdate= dNow.getFullYear() + '-' + (dNow.getMonth()+1) + '-' + dNow.getDate() + ' ' + dNow.getHours() + ':' + dNow.getMinutes() + ':00';//2024-08-28 15:37:32
                $.post('/php/sell_user_add.php', {user_global:user_global, product_global:InvId, create_at:localdate}, function(data)  {
                if(data == 'OK'){
                    //alert("Оплата прошла!");
                    window.location.href="/";
                }
                });
            }
        } else {
            //alert("Оплата не прошла!");
            //window.location.href="/";
        }
    });
}

window.glist = function(){ 
    alert("Global func");
    return 0;
}