$(document).ready(function(){

    var params = new window.URLSearchParams(window.location.search);
    //console.log(params.get('user_email'));

    $.post('/php/users_get_reg.php', { email:params.get('user_email') }, function(data) {
        var output = $.parseJSON(data);
        console.log(output);
    });

    $(document).on('click', '.user-navigation-link', function(){ // Подсветка активного пункта меню админа
        $('.user-navigation-link').removeClass('active-navigation-link-user');
        $(this).addClass('active-navigation-link-user');//Потом добавляем его на текущую кликнутую.
    });

    $('[data-open-block]').on('click', function() {
		const activeCls = 'is-active';
  
		$('[data-content]').removeClass(activeCls);
  		$(`[data-content="${$(this).data('open-block')}"`).addClass(activeCls);
	});
    $('#password_div').toggle();
    $('#password_div_1').toggle();
    $('#password_div_2').toggle();
    $('#password_div_3').toggle();
});
