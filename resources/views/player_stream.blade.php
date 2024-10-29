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
@endguest
</main>
@endsection