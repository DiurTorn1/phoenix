$(document).ready(function(){
    $(document).on('click', '.user-navigation-link', function(){ // Подсветка активного пункта меню админа
        $('.user-navigation-link').removeClass('active-navigation-link-user');
        $(this).addClass('active-navigation-link-user');//Потом добавляем его на текущую кликнутую.
    });

    $('[data-open-block]').on('click', function() {
		const activeCls = 'is-active';
  
		$('[data-content]').removeClass(activeCls);
  		$(`[data-content="${$(this).data('open-block')}"`).addClass(activeCls);
	});
});
