@extends('layouts.app')
@section('title-block') ГЛАВНАЯ - Феникс ТВ @endsection
@include('inc.header')

       

@section('content')
<main class="index-main">

<!------------------ Окно Входа -------------------------->
<div class="popup-back" id="popup-back">
        <form method="POST" action="" class="popup-container">
			<div class="popup-content">
            	@csrf
				<div class="popup-title-wrap">
					<button class="popup-close close-btn" id="popup-close" title="Закрыть"><img src="{{ asset('img/close.png') }}" alt="Закрыть"></button>
					<h2 class="popup-title">Вход</h2>
				</div>
				<div class="popup-content-wrap">
                	<input id="user-input" type="email" placeholder="Телефон или email" class="user-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> 
					@error('email')
                    	<span class="invalid-feedback" role="alert">
                    	<strong>{{ $message }}</strong>
                    	</span>
                	@enderror
				
                	<input id="password" type="password" placeholder="Телефон или email" class="user-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
					@error('password')
                    	<span class="invalid-feedback" role="alert">
                    	<strong>{{ $message }}</strong>
                    	</span>
                	@enderror
					<div class="popup-content-wrap-row remember-wrapper">
						<input class="admin-video-sort-check" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                		<label class="admin-video-check-label" for="remember">
                        	{{ __('Запомнить меня') }}
        				</label>
					</div>
                    <button type="submit" class="top-menu-btn" id="top-menu-btn">
						Войти
                    </button>
					<div class="popup-content-wrap-row register-wrapper">
						<a href="#" class="register-link">Регистрация</a>
						<a href="#" class="mem-password">Забыли пароль?</a>
					</div>
				</div>
			</div>
			

        </form>
</div>
<div class="user-text-wrapper">
			<h3 class="user-h3">Служба технической поддержки </h3>	
			<p class="user-text"><a class="user-link" href="mailto:hellp@ivs-arena.ru">hellp@ivs-arena.ru</a> - Все вопросы с оплатой и работой с личным кабинетом пользователя, доступом к просмотру игр на портале ФЕНИКС-ТВ.</p>
			<br>
			<img src="img/phoenix.png" alt="Открытый турнир «Кубок Феникса»" width="180">
			<p class="user-text">Открытый турнир <b>«Кубок Феникса»</b> проводится в десяти возрастных группах (девушки и юноши) в разных городах России и Республики Беларусь. Туровая система и высокая конкуренция команд позволяют превратить каждый Суперфинал в настоящую «Битву Титанов»</p>
			<p class="user-text">Для участия в турнире присылайте заявку на <a class="user-link" href="mailto:juniorbasket@bk.ru">juniorbasket@bk.ru</a>, информация о ходе турнира текущего сезона на сайте <a class="user-link" href="https://juniorbasket.ru/" target="_blank">juniorbasket.ru</a></p>
			<br>
			<img src="img/cosmos.png" alt="Космолига" width="180">
			<p class="user-text"><b>«Космолига»</b></p>
			<p class="user-text">Соревнования по баскетболу и волейболу на базе ЗСОК «Космос», летние сборы. Подробная информация на сайте «Самарские каникулы» Детский центр "Космос" <a class="user-link" href="https://camp63.ru/" target="_blank">(camp63.ru)</a></p>
			<p class="user-text">Для вопросов по трансляциям игр - <a class="user-link" href="mailto:kosmosstream@camp63.ru">kosmosstream@camp63.ru</a></p>
			<br>
			<img src="img/avrora.png" alt="Детская баскетбольная лига Аврора" width="180"> 
			<p class="user-text">Детская баскетбольная лига <b>«Аврора»</b> (Северо-Запад РФ)  Лига объединяет команды городов Северо-Западного региона России и является открытой для команд других регионов. Основноой локацией туров является г.Череповец, но каждая команда может подать заявку на проведение домашнего тура в своем городе.
			Для вопросов по трансляциям игр лиги - <a class="user-link" href="mailto:info@dbl-aurora.ru">info@dbl-aurora.ru</a></p>
			<br>
			<img src="img/slav.png" alt="Славянская баскетбольная лига" width="180"> 
			<p class="user-text"><b>«Славянская баскетбольная лига»</b> создана в г.Гомель и проводится на территории Республики Беларусь. Помимо трех локаций (ГОК, ГОЦОР и загородная база «Ранчо») туры проводятся в Речице, Калинковичах, Светлогорске. На базе «Ранчо» у реки «СОЖ» командам предлагается возможность организации летних сборов
			Информация по участию в СБЛ – <a class="user-link" href="mailto:RonataMir@yandex.by">RonataMir@yandex.by</a></p>		
</div>
</main>
@endsection


