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
    var params = new window.URLSearchParams(window.location.search);
    //var pars = params[0].split("=");
    var id = params.get('product_id');
    //console.log(id);
    $.post('/php/get_product_card.php', {id:id}, function(data)  {
        //console.log(data);
        var pars = data.split("&");
        //console.log(pars[1]);
        $("#head_name_save").val(pars[1]);
        //console.log(pars[2]);
        $("#detail_save").val(pars[2]);
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
        var days_job_bilet = $("#save_days_job_bilet").val(pars[8]);
        var valute_bilet = "";
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
        console.log(pars[11]);
        var parse_date1 = pars[11].split(" ");
        var parse_date2 = parse_date1[1].split(":"); 
        var date_start_sell_bilet = $("#date_start_sell_bilet").val(parse_date1[0]+" "+parse_date2[0]+":"+parse_date2[1]);
        //input_prace_bilet = $("#input_prace_bilet").val();
        //input_old_prace_bilet = $("#input_old_prace_bilet").val();
        //price_bilet = $("#prace_bilet").val();
        /*var region_out = "";
        //var bilet_out = "";
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
        


        $("#input_buff_product").append(
            '<p class="price-item-bold">' + days_job_bilet + ' дней</p>' +
			'<p>С <span>'+ res_date_start_sell +'</span>: <span>' + input_prace_bilet + '</span>&#x20;<span>' + bilet_out + '</span></p>' +
			'<p >' + region_out + '</p>' +
            '<p style="display:none;">' + input_old_prace_bilet + '</p>');
        $('#add-ticket-price').toggle();*/
        
        
        console.log(pars[12]);
        console.log(pars[13]);
        console.log(pars[14]);
        console.log(pars[15]);
        console.log(pars[16]);
        console.log(pars[17]);
        console.log(pars[18]);
        console.log(pars[19]);
        console.log(pars[20]);
        console.log(pars[21]);

    });
    //alert(params);
    
});