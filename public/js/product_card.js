$(document).ready(function() {

        /**script tihii */
        $(document).on('click', '.admin-navigation-link', function(){ // Подсветка активного пункта меню админа
            $('.admin-navigation-link').removeClass('active-navigation-link');
            $(this).addClass('active-navigation-link');//Потом добавляем его на текущую кликнутую.
        });
        
        $("#price_toggle").on("click", "button", function() { // Переключатель состояния кнопки БИЛЕТ/ПОДПИСКА
            $("#price_toggle button").removeClass('type-price-active');
            $(this).addClass('type-price-active');
        });
        
        $("#promo_toggle").on("click", "button", function() { // Переключатель состояния кнопки СКИДКА/ТРИАЛ
            $("#promo_toggle button").removeClass('type-price-active');
            $(this).addClass('type-price-active');
        });
        $("#promo_toggle_multi").on("click", "button", function() { // Переключатель состояния кнопки СКИДКА/ТРИАЛ МУЛЬТИ
            $("#promo_toggle_multi button").removeClass('type-price-active');
            $(this).addClass('type-price-active');
        });
    
        // смена кнопки ДОБАВИТЬ ЦЕНУ БИЛЕТА/ПОДПИСКИ
        // По умолчанию показываем первый блок
        $("#add-position-btn-ticket").show();
        $("#add_ticket").click(function(){
            $("#add-position-btn-subscrip").hide();
            $("#add-position-btn-ticket").show();  
        });
        $("#add_subscrip").click(function(){
            $("#add-position-btn-ticket").hide();
            $("#add-position-btn-subscrip").show();
        });
    
        // смена контента ДОБАВИТЬ СКИДКУ/ТРИАЛ
        // По умолчанию показываем первый блок
        $("#discount_subtext").show();
        $("#discount_container").show();
        
        $("#add_discount").click(function(){
            $("#trial_subtext").hide();
            $("#trial_container").hide();
            
            $("#discount_subtext").show();
            $("#discount_container").show();   
        });
        $("#add_trial").click(function(){
            $("#discount_subtext").hide();
            $("#discount_container").hide();
    
            $("#trial_subtext").show();
            $("#trial_container").css('display', 'flex')
        });
    
        // смена контента ДОБАВИТЬ СКИДКУ/ТРИАЛ
        // По умолчанию показываем первый блок
        $("#discount_subtext_multi").show();
        $("#discount_container_multi").show();
        
        $("#add_discount_multi").click(function(){
            $("#trial_subtext_multi").hide();
            $("#trial_container_multi").hide();
            
            $("#discount_subtext_multi").show();
            $("#discount_container_multi").show();   
        });
        $("#add_trial_multi").click(function(){
            $("#discount_subtext_multi").hide();
            $("#discount_container_multi").hide();
    
            $("#trial_subtext_multi").show();
            $("#trial_container_multi").css('display', 'flex')
        });
    
        // Открыть/Закрыть ОКНО ДОБАВИТЬ ЦЕНУ
        $("#add-position-btn-ticket").click(function(){
            $("#add-ticket-price").addClass('add-price-show'); 
        });
        $("#close-add-ticket-price").click(function(){
            $("#add-ticket-price").removeClass('add-price-show'); 
        });
        $("#add-position-btn-subscrip").click(function(){
            $("#add-subscrip-price").addClass('add-price-show'); 
        });
        $("#close-add-subscrip-price").click(function(){
            $("#add-subscrip-price").removeClass('add-price-show'); 
        }); 
        
        // Открыть/Закрыть ОКНО СОЗДАТЬ ПРОМОКОДЫ
        $("#add-new-promocode").click(function(){
            $("#open-create-promocode").addClass('add-price-show'); 
        });
        $("#close-add-promocode").click(function(){
            $("#open-create-promocode").removeClass('add-price-show'); 
        });
        $("#add-multi-promocode").click(function(){
            $("#open-create-multi-promocode").addClass('add-price-show'); 
        });
        $("#close-multi-promocode").click(function(){
            $("#open-create-multi-promocode").removeClass('add-price-show'); 
        }); 
    
        $('.switch-btn').click(function(){ //Переключатель НОВАЯ Промо-кампания
            $(this).toggleClass('switch-on');
            if ($(this).hasClass('switch-on')) {
              $(this).trigger('on.switch');
            } else {
              $(this).trigger('off.switch');
            }
        });
        /**script tihii */

        $('#img_banner_trash').hide();
    var params = new window.URLSearchParams(window.location.search);
    //var pars = params[0].split("=");
    var id = params.get('product_id');
    var id_product = "";
    var type_product = "";
    $('#product_unpublic_user').hide();
    //console.log(id);
    $.post('/php/get_product_public.php', {id:id}, function(data)  {
        //var pars = data.split("&");
        var output = $.parseJSON(data);
        //console.log(pars[0]);
        //console.log(pars[1]);
        var get_id = output ? output[1]: '';
        if(get_id==id){
            $('#product_public_user').hide();
            $('#product_unpublic_user').show();
        }
        //console.log(pars[2]);
        //console.log(pars[3]);
    });
    $.post('/php/get_product_card.php', {id:id}, function(data)  {
        //console.log(data);
        var pars = data.split("&");
        id_product = pars[0];
        //console.log(pars[1]);
        $("#head_name_save").val(pars[1]);
        //console.log(pars[2]);
        var detail_pars = pars[2].split("+");
        $("#detail_save").val(detail_pars[1]);
        type_product = detail_pars[0];
        //console.log(pars[3]);
        var date = pars[3].split(" ");
        $("#start_access_time").val(date[0]);
        //console.log(pars[4]);
        date = pars[4].split(" ");
        $("#stop_access_time").val(date[0]);
        //console.log(pars[5]);
        $("#type_save option:selected").text(pars[5]);
        //console.log(pars[6]);
        //console.log(pars[7]);
        //console.log(pars[8]);
        //console.log(pars[9]);
        //console.log(pars[10]);
        var prob_period = pars[9];
        var price_prob_period = pars[10];
        var region_select_bilet = $("#sive_bilet_region option:selected").text(pars[6]);
        $("#save_days_job_bilet").val(pars[8]);
        var valute_bilet = "";
        var bilet_out = pars[7];
        if(pars[7] == "RUB"){
            valute_bilet ="Российский рубль (RUB)";
        } else if(pars[7] == "KZT"){
            valute_bilet ="Казахский тенге (KZT)";
        } else if(pars[7] == "BYN"){
            valute_bilet ="Белорусский рубль (BYN)";
        } else if(pars[7] == "USD"){
            valute_bilet ="Американский доллар (USD)";
        }
        $("#valute_bilet option:selected").text(valute_bilet);
        //console.log(pars[11]);
        var parse_date1 = pars[11].split(" ");
        var parse_date2 = parse_date1[1].split(":"); 
        $("#date_start_sell_bilet").val(parse_date1[0]+" "+parse_date2[0]+":"+parse_date2[1]);
        //console.log(pars[12]);
        //console.log(pars[13]);
        $("#input_prace_bilet").val(pars[12]);
        var input_old_prace_bilet = $("#input_old_prace_bilet").val(pars[13]);
        //price_bilet = $("#prace_bilet").val();
        var region_out = "";
        //var bilet_out = "";
        //var res_date_start_sell = "";
        //var pars_datae_start = date_start_sell_bilet.split("T");
        //res_date_start_sell = pars_datae_start[0] + " " + pars_datae_start[1] + ":00";
        if(region_select_bilet == "Только Россия (RUB)"){
            region_out ="Только Россия";
        } else if(region_select_bilet == "Только Казахстан (KZT)"){
            region_out ="Только Казахстан";
        } else if(region_select_bilet == "Только Беларусь (BYN)"){
            region_out ="Только Беларусь";
        }
        


        $("#input_buff_product").append(
            '<p class="price-item-bold">' + pars[8] + ' дней</p>' +
			'<p>С <span>'+ parse_date1[0]+" "+parse_date2[0]+":"+parse_date2[1] +'</span>: <span>' + pars[12] + '</span>&#x20;<span>' + bilet_out + '</span></p>' +
			'<p >' + region_out + '</p>' +
            '<p style="display:none;">' + input_old_prace_bilet + '</p>');
        //$('#add-ticket-price').toggle();
        //console.log(pars[14]);
        var parse_date3 = pars[14].split(" ");
        var parse_date4 = parse_date3[1].split(":"); 
        $("#date_start_access_bilet").val(parse_date3[0]+" "+parse_date4[0]+":"+parse_date4[1]);
        
        //console.log(pars[15]);
        var parse_date5 = pars[15].split(" ");
        var parse_date6 = parse_date5[1].split(":"); 
        $("#date_stop_access_bilet").val(parse_date5[0]+" "+parse_date6[0]+":"+parse_date6[1]);
        //console.log(pars[16]);
        var parse_date7 = pars[15].split(" ");
        var parse_date8 = parse_date7[1].split(":"); 
        $("#date_stop_sell_bilet").val(parse_date7[0]+" "+parse_date8[0]+":"+parse_date8[1]);
        
        //console.log(pars[17]);
        //console.log(pars[18]);
        //console.log(pars[19]);
        //console.log(pars[20]);
        //console.log(pars[21]);

    });
    //alert(params);detail_pars  id_product
    $("#product_public_user").on('click', function(){
        var dNow = new Date();
        var localdate= dNow.getFullYear() + '-' + (dNow.getMonth()+1) + '-' + dNow.getDate() + ' ' + dNow.getHours() + ':' + dNow.getMinutes() + ':00';//2024-08-28 15:37:32
        var initial_table = type_product + '_' + id_product;
        $.post('/php/public_product.php', { id_product: id_product, type_product:type_product, initial:initial_table, datetime:localdate }, function(data){
            if(data == "OK"){
                alert("Продукт опубликован");
                $('#product_public_user').hide();
                $('#product_unpublic_user').show();
            }
            //console.log(data);
        });
    });

    $("#product_unpublic_user").on('click', function(){
        $.post('/php/unpublic_product.php', { id_product: id_product}, function(data){
            if(data == "OK"){
                alert("Продукт снят с публикации");
                $('#product_public_user').show();
                $('#product_unpublic_user').hide();
            }
            //console.log(data);
        });
    });

    var main_image;
    var image, image_name = '';
    var r = new Resumable({
        target: '/'
    });
      
      
    r.assignBrowse(document.getElementById('upload_main_banner_product'));
      
    r.on('fileSuccess', function(file){
        console.log('fileSuccess',file);
        console.log(file.file);
        //$('#img_poster_card').attr("src", file.file);
        var reader = new FileReader();
            
        image_name = file.file.name;
        reader.readAsDataURL(file.file);
        //var output = $.parseJSON(file);
        // var form_data = new FormData();
        reader.onloadend = function(e) { 
            //console.log(e.target.result);
            $('#upload_main_banner_product').attr("src", e.target.result);
            //console.log(e.target.result);
            main_image = e.target.result;
            var image_res = e.target.result;
            //console.log(image_res.split(',')[1]);
            image = image_res.split(',')[1];
            $.post('/php/upload_banners_product.php', { image: image, image_name:image_name }, function(data)  {
                console.log(data);
                if(data === 'Successfully Uploaded'){ 
                    //<!--<a href="#" class="remove-preview-tournir" title="Удалить обложку"><img src="{{ asset('img/trash.png') }}" alt="Удалить обложку"></a>-->
                    //$("#banners_turnir").append('<a href="#" class="remove-preview-tournir" title="Удалить обложку"><img src="img/trash.png" alt="Удалить обложку"></a>');
                    $('#img_banner_trash').show();
                }
            });
        };

          
    });
    r.on('fileProgress', function(file){
        console.log('fileProgress', file);
    });
    r.on('fileAdded', function(file, event){
        r.upload();
        console.log('fileAdded...');
        console.log('fileAdded...', event);
        //var output = $.parseJSON(file);
        //console.log(output);
        //console.log(file);
    });
    r.on('filesAdded', function(array){
        r.upload();
        console.log('filesAdded', array);
    });
    r.on('fileRetry', function(file){
        console.log('fileRetry', file);
    });
    r.on('fileError', function(file, message){
        console.log('fileError', file, message);
    });
    r.on('uploadStart', function(){
        console.timeLog('uploadStart');
    });
    r.on('complete', function(){
        console.log('complete');
    });
    r.on('progress', function(){
        console.log('progress');
    });
    r.on('error', function(message, file){
        console.log('error', message, file);
    });
    r.on('pause', function(){
        console.log('pause');
    });
    r.on('cancel', function(){
        console.log('cancel');
    });

    $("#img_banner_trash").on('click', function(){
        $.post('/php/delete_banners_product.php', { image_name:image_name }, function(data)  {
            if(data === 'Successfully delete'){
                alert('Баннер удалён');
                $('#upload_main_banner_product').attr("src", 'img/no-image.jpg');
                $('#img_banner_trash').hide();
            }
        });
    });

    $("#save_product_db").on('click', function(){
        var name = $("#head_name_save").val();
        var detail = type_product + "+" + $("#detail_save").val();
        var datetime_start = $("#start_access_time").val() + " 00:00:00";
        var datetime_stop = $("#stop_access_time").val() + " 00:00:00";
        var type = $("#type_save option:selected").text();
        var country = $("#sive_bilet_region option:selected").text();
        var valute = $("#valute_bilet option:selected").text();
        var valute_bilet = "";
        if(valute == "Российский рубль (RUB)"){
            valute_bilet ="RUB";
        } else if(valute == "Казахский тенге (KZT)"){
            valute_bilet ="KZT";
        } else if(valute == "Белорусский рубль (BYN)"){
            valute_bilet ="BYN";
        } else if(valute == "Американский доллар (USD)"){
            valute_bilet ="USD";
        }
        var period_job = $("#save_days_job_bilet").val();
        var datetime_start_sell = $("#date_start_sell_bilet").val() +":00";
        var price = $("#input_prace_bilet").val();
        var old_price = $("#input_old_prace_bilet").val();
        var datetime_start_access = $("#date_start_access_bilet").val() +":00";
        var datetime_stop_access = $("#date_stop_access_bilet").val() +":00";
        var datetime_stop_sell = $("#date_stop_sell_bilet").val() +":00";
        var img_main = "img/product_banners/" + image_name;
        
        $.post('/php/upload_product.php', { id:id, name:name, detail:detail, datetime_start:datetime_start, datetime_stop:datetime_stop, type:type, country:country,
                                            valute:valute_bilet, period_job:period_job, datetime_start_sell:datetime_start_sell, price:price, old_price:old_price,
                                            datetime_start_access:datetime_start_access, datetime_stop_access:datetime_stop_access, datetime_stop_sell:datetime_stop_sell, img_main:img_main
                                        }, function(data)  {
            if(data === 'OK'){
                alert('Продукт изменён');
                //$('#upload_main_banner_product').attr("src", 'img/no-image.jpg');
                //$('#img_banner_trash').hide();
            }
        });
        //alert("Save product!");
    });


    
});