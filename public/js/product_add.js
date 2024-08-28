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
    $("#save_product_db").on('click', function(){
        var head_name = $("#head_name_save").val();
        var start_access_time = $("#start_access_time").val();
        var stop_access_time = $("#stop_access_time").val();
        var detail_save = $("#detail_save").val();
        //console.log(start_access_tame);
        $.post('/php/product_add.php', { head_name: head_name, start_access_time:start_access_time, stop_access_time:stop_access_time, detail_save:detail_save }, function(data){
            console.log(data);
        });
    });
});