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

$(document).ready(function(){ // смена кнопки ДОБАВИТЬ ЦЕНУ БИЛЕТА/ПОДПИСКИ
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
});
$(document).ready(function(){ // смена контента ДОБАВИТЬ СКИДКУ/ТРИАЛ
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
});
$(document).ready(function(){ // смена контента ДОБАВИТЬ СКИДКУ/ТРИАЛ
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
});

$(document).ready(function(){ // Открыть/Закрыть ОКНО ДОБАВИТЬ ЦЕНУ
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
});

$(document).ready(function(){ // Открыть/Закрыть ОКНО СОЗДАТЬ ПРОМОКОДЫ
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
});

$('.switch-btn').click(function(){ //Переключатель НОВАЯ Промо-кампания
  $(this).toggleClass('switch-on');
  if ($(this).hasClass('switch-on')) {
    $(this).trigger('on.switch');
  } else {
    $(this).trigger('off.switch');
  }
});

$(document).ready(function() {
    var region_select_bilet = "";
    var days_job_bilet = "";
    var valute_bilet = "";
    var date_start_sell_bilet = "";
    var input_prace_bilet = "";
    var input_old_prace_bilet = "";
    var price_bilet = $("#prace_bilet").val();
    $("#save_product_db").on('click', function(){
        var head_name = $("#head_name_save").val();
        var start_access_time = $("#start_access_time").val();
        var stop_access_time = $("#stop_access_time").val();
        var detail_save = $("#detail_save").val();
        var type_save = $("#type_save option:selected").text();
        //console.log(start_access_tame);
        $.post('/php/product_add.php', { head_name: head_name, start_access_time:start_access_time, stop_access_time:stop_access_time, 
                                        detail_save:detail_save, type_save:type_save }, function(data){
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
			'<p>С <span>'+ date_start_sell_bilet +'</span>: <span>' + price_bilet + '</span>&#x20;<span>' + input_prace_bilet + '</span></p>' +
			'<p >' + region_out + '</p>' +
            '<p style="display:none;">' + input_old_prace_bilet + '</p>');
        $('#add-ticket-price').toggle();
    });

});