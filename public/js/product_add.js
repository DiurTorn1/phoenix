$(document).ready(function() {
    var type_product = "ticket";
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
        type_product = "ticket";  
    });
    $("#add_subscrip").click(function(){
        $("#add-position-btn-ticket").hide();
        $("#add-position-btn-subscrip").show();
        type_product = "subscript";
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




    var region_select_bilet = "";
    var days_job_bilet = "";
    var valute_bilet = "";
    var date_start_sell_bilet = "";
    var input_prace_bilet = "";
    var input_old_prace_bilet = "";
    var input_prob_period_subs = "1";
    var input_price_prob_period_subs = "1";
    var price_bilet = $("#prace_bilet").val();
    $("#save_product_db").on('click', function(){
        var head_name = $("#head_name_save").val();
        var start_access_time = $("#start_access_time").val();
        var stop_access_time = $("#stop_access_time").val();
        var detail_get = $("#detail_save").val();
        var detail_save = type_product + "+" + detail_get;
        var type_save = $("#type_save option:selected").text();
        var date_start_access_bilet = $("#date_start_access_bilet").val();
        var date_stop_access_bilet = $("#date_stop_access_bilet").val();
        var date_stop_sell_bilet = $("#date_stop_sell_bilet").val();
        var valute_db = "";
        if(valute_bilet == "Российский рубль (RUB)"){
            valute_db ="RUB";
        } else if(valute_bilet == "Казахский тенге (KZT)"){
            valute_db ="KZT";
        } else if(valute_bilet == "Белорусский рубль (BYN)"){
            valute_db ="BYN";
        } else if(valute_bilet == "Американский доллар (USD)"){
            valute_db ="USD";
        }
        var res_date_start_sell = "";
        var pars_datae_start = date_start_sell_bilet.split("T");
        res_date_start_sell = pars_datae_start[0] + " " + pars_datae_start[1] + ":00";
        var parse_start_access = date_start_access_bilet.split("T");
        var res_parse_start_access = parse_start_access[0] + " " + parse_start_access[1] + ":00";
        var parse_stop_access = date_stop_access_bilet.split("T");
        var res_parse_stop_access = parse_stop_access[0] + " " + parse_stop_access[1] + ":00";
        var parse_stop_sell_bilet = date_stop_sell_bilet.split("T");
        var res_parse_stop_sell_bilet = parse_stop_sell_bilet[0] + " " + parse_stop_sell_bilet[1] + ":00";
        var int_price_bilet = parseInt(input_prace_bilet);
        var int_old_price_bilet = parseInt(input_old_prace_bilet);
        var int_input_prob_period_subs = parseInt(input_prob_period_subs);
        var int_input_price_prob_period_subs = parseInt(input_price_prob_period_subs);
        //console.log(start_access_tame);
        console.log(head_name + " : " + start_access_time + " : " + stop_access_time + " : " + detail_save + " : " + type_save + " : " + region_select_bilet + " : " + valute_db + " : " + days_job_bilet
                    + " : " + res_date_start_sell + " : " + int_price_bilet + " : " + int_old_price_bilet + " : " + res_parse_start_access + " : " + res_parse_stop_access + " : " + res_parse_stop_sell_bilet
                    + " : " + int_input_prob_period_subs + " : " + int_input_price_prob_period_subs);
        $.post('/php/product_add.php', { head_name: head_name, start_access_time:start_access_time, stop_access_time:stop_access_time, 
                                        detail_save:detail_save, type_save:type_save, region_select_bilet:region_select_bilet, valute_db:valute_db, days_job_bilet:days_job_bilet,
                                        res_date_start_sell:res_date_start_sell, int_price_bilet:int_price_bilet, int_old_price_bilet:int_old_price_bilet, res_parse_start_access:res_parse_start_access,
                                        res_parse_stop_access:res_parse_stop_access, res_parse_stop_sell_bilet:res_parse_stop_sell_bilet, int_input_prob_period_subs:int_input_prob_period_subs,
                                        int_input_price_prob_period_subs:int_input_price_prob_period_subs}, function(data){
            if(data == "OK"){
                alert("Продукт создан");
            }
            //console.log(data);
        });
    });

    $("#save_price_bilet").on('click', function(){
        region_select_bilet = $("#sive_bilet_region option:selected").text();
        days_job_bilet = $("#save_days_job_bilet").val();
        valute_bilet = $("#valute_bilet option:selected").text();
        date_start_sell_bilet = $("#date_start_sell_bilet").val();
        input_prace_bilet = $("#input_prace_bilet").val();
        input_old_prace_bilet = $("#input_old_prace_bilet").val();
        price_bilet = $("#prace_bilet").val();
        var region_out = "";
        var bilet_out = "";
        var res_date_start_sell = "";
        var pars_datae_start = date_start_sell_bilet.split("T");
        res_date_start_sell = pars_datae_start[0] + " " + pars_datae_start[1] + ":00";
        if(region_select_bilet == "Только Россия (RUB)"){
            region_out ="Только Россия";
        } else if(region_select_bilet == "Только Казахстан (KZT)"){
            region_out ="Только Казахстан";
        } else if(region_select_bilet == "Только Беларусь (BYN)"){
            region_out ="Только Беларусь";
        }
        
        if(valute_bilet == "Российский рубль (RUB)"){
            bilet_out ="RUB";
        } else if(valute_bilet == "Казахский тенге (KZT)"){
            bilet_out ="KZT";
        } else if(valute_bilet == "Белорусский рубль (BYN)"){
            bilet_out ="BYN";
        } else if(valute_bilet == "Американский доллар (USD)"){
            bilet_out ="USD";
        }

        $("#input_buff_product").append(
            '<p class="price-item-bold">' + days_job_bilet + ' дней</p>' +
			'<p>С <span>'+ res_date_start_sell +'</span>: <span>' + input_prace_bilet + '</span>&#x20;<span>' + bilet_out + '</span></p>' +
			'<p >' + region_out + '</p>' +
            '<p style="display:none;">' + input_old_prace_bilet + '</p>');
        $('#add-ticket-price').hide();
    });

    $("#save_price_subscript").on('click', function(){
        region_select_bilet = $("#sive_subscript_region option:selected").text();
        var region_out = "";
        if(region_select_bilet == "Только Россия (RUB)"){
            region_out ="Только Россия";
        } else if(region_select_bilet == "Только Казахстан (KZT)"){
            region_out ="Только Казахстан";
        } else if(region_select_bilet == "Только Беларусь (BYN)"){
            region_out ="Только Беларусь";
        }
        var period_select_subs = $("#sive_subscript_region option:selected").text();
        if(period_select_subs == "Неделя"){
            days_job_bilet = 7;
        } else if(period_select_subs == "1 месяц"){
            days_job_bilet = 30;
        } else if(period_select_subs == "3 месяца"){
            days_job_bilet = 90;
        } else if(period_select_subs == "6 месяцев"){
            days_job_bilet = 180;
        } else if(period_select_subs == "1 год"){
            days_job_bilet = 360;
        }
        var valute_bilet = $("#valute_subscript option:selected").text();
        if(valute_bilet == "Российский рубль (RUB)"){
            bilet_out ="RUB";
        } else if(valute_bilet == "Казахский тенге (KZT)"){
            bilet_out ="KZT";
        } else if(valute_bilet == "Белорусский рубль (BYN)"){
            bilet_out ="BYN";
        } else if(valute_bilet == "Американский доллар (USD)"){
            bilet_out ="USD";
        }
        input_prob_period_subs = $("#input_prob_period_subs").val();
        input_price_prob_period_subs = $("#input_price_prob_period_subs").val();
        date_start_sell_bilet = $("#date_start_sell_subs").val();
        var pars_datae_start = date_start_sell_bilet.split("T");
        res_date_start_sell = pars_datae_start[0] + " " + pars_datae_start[1] + ":00";
        input_prace_bilet = $("#input_prace_subs").val();
        input_old_prace_bilet = $("#input_old_prace_subs").val();
        $("#input_buff_product").append(
            '<p class="price-item-bold">' + days_job_bilet + ' дней</p>' +
			'<p>С <span>'+ res_date_start_sell +'</span>: <span>' + input_prace_bilet + '</span>&#x20;<span>' + bilet_out + '</span></p>' +
			'<p >' + region_out + '</p>' +
            '<p style="display:none;">' + input_old_prace_bilet + '</p>');
        $('#add-subscrip-price').hide();
    });

});