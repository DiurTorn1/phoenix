@extends('layouts.app')
@section('title-block') Плеер @endsection

@section('content')
<script type="text/javascript" src = "{{ asset('js/player_stream.js') }}"></script>

@guest
        <!--<header class="header admin-header">		
		<div class="left-header">
			<a href="/" class="logo"><img src="{{ asset('img/logo.png') }}" alt="Феникс ТВ"></a>
		</div>
	    </header>-->
        <header class="header admin-header">		
		<div class="left-header">
			<a href="/" class="logo"><img src="{{ asset('img/logo.png') }}" alt="Феникс ТВ"></a>
		</div>
		<div class="right-heder dropdown">
		</div>
	    </header>
        <main class="admin-container">
	    <!-----------------------Меню админа------------------------------>
	    <div class="admin-menu">
		<div class="admin-menu-header admin-back">
			<!--<div class="admin-tour-logo">
				<img src="{{ asset('img/phoenix1.png') }}" alt="логотип кубка (турнира)">
			</div>
			<span>Открытый турнир "Кубок Феникса"</span>-->
		</div>
	    </div>
	<!----------------------------Админ-контент---------------------------------->
	<div class="admin-content">
		<div class="admin-content admin-content-raw">
		<div class="block-admin-left">
			
			<div class="block-admin-container admin-back">
				<div class="index-live-item" id="player_stream_get">
				</div>
			</div>

			<div class="block-admin-container admin-back soc-container">
				<div class="admin-input-wrap">
					<div class="social-list">
						<a href="#" class="social-list-item"><img src="img/telegram.png" alt="Телеграм"></a>
						<a href="#" class="social-list-item"><img src="img/whatsapp.png" alt="Whatsapp"></a>
						<a href="#" class="social-list-item"><img src="img/facebook.png" alt="Facebook"></a>
						<a href="#" class="social-list-item"><img src="img/twitter.png" alt="Twitter"></a>
					</div>
				</div>
			</div>

		</div>
	</div>
	</div>

@else
        <header class="header admin-header">		
		<div class="left-header">
			<a href="/" class="logo"><img src="{{ asset('img/logo.png') }}" alt="Феникс ТВ"></a>
		</div>
		<div class="right-heder dropdown">
			<a class="entrance entrance-admin">{{ Auth::user()->name }}</a>
			<div class="profile-popup">
                <div class="profile-popup-top">
					<span>{{ Auth::user()->name }}</span>
					<p>{{ Auth::user()->email }}</p>
				</div>
				<div class="profile-popup-bottom">
					@if(!empty(Auth::user()->getRoleNames()))
                	@foreach( Auth::user()->getRoleNames() as $v)
                        @if($v == "admin")
                    		<a href="/stream" class="exit-button"><img src="img/logo_main.png" alt="Профиль">Admin-Panel</a>
						@elseif($v == "nullbody")
							<a href="/user_panel" class="exit-button"><img src="img/setting.png" alt="Настройки" title="Настройки пользователя">Настройки</a>
							<a href="#" class="exit-button"><img src="img/cart-min.png" alt="Ваши покупки">Покупки</a>
						@endif
                	@endforeach
           	 		@endif
					<div>
					<a href="{{ route('logout') }}" class="exit-button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><img src="{{ asset('img/shutdown.png') }}" alt="Выход из панели">Выход</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    		@csrf
                		</form>
            		</div>
					
				</div>
			</div>
		</div>
	    </header>
        <main class="admin-container">
	    <!-----------------------Меню админа------------------------------>
	    <div class="admin-menu">
		<div class="admin-menu-header admin-back">
			<!--<div class="admin-tour-logo">
				<img src="{{ asset('img/phoenix1.png') }}" alt="логотип кубка (турнира)">
			</div>
			<span>Открытый турнир "Кубок Феникса"</span>-->
		</div>
	    </div>
	<!----------------------------Админ-контент---------------------------------->
	<div class="admin-content">
		<div class="admin-content admin-content-raw">
		<div class="block-admin-left">
			<a id="name_user_get" class="name_user_get">{{ Auth::user()->email }}</a>
			<div class="block-admin-container admin-back">
				<div class="index-live-item-1" id="player_stream_get">
				</div>
			</div>

			<div class="block-admin-container admin-back soc-container">
				<div class="admin-input-wrap">
					<div class="social-list">
						<a href="#" class="social-list-item"><img src="img/telegram.png" alt="Телеграм"></a>
						<a href="#" class="social-list-item"><img src="img/whatsapp.png" alt="Whatsapp"></a>
						<a href="#" class="social-list-item"><img src="img/facebook.png" alt="Facebook"></a>
						<a href="#" class="social-list-item"><img src="img/twitter.png" alt="Twitter"></a>
					</div>
				</div>
			</div>

		</div>
	</div>
	</div>
	

	<!----------------->
	<div class="popup-back-sells" id="popup-back">
        <!--<form method="POST" action="" class="popup-container">
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
			

        </form>-->
</div>
@endguest
</main>
@endsection