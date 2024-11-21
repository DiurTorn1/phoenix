@extends('layouts.app')
@section('title-block') ГЛАВНАЯ - Феникс ТВ @endsection
<main class="index-main">

<header class="header admin-header">		
	<div class="left-header">
		<a href="/" class="logo"><img src="{{ asset('img/logo.png') }}" alt="Феникс ТВ"></a>
	</div>
	<div class="right-heder dropdown">
		@guest
			<button class="entrance" onclick="window.location.href = '/';">Вход</button>

		@else
			<!--<li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
            <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>
            <li class="nav-item dropdown">-->

			<div class="right-heder dropdown">
			<a class="entrance entrance-admin" id="name_main_get">{{ Auth::user()->name }}</a>
			<div class="profile-popup">
				<div class="profile-popup-top">
					<span id="name_get_pars">{{ Auth::user()->name }}</span>
					<p id="email_get_pars">{{ Auth::user()->email }}</p>
				</div>
				<div class="profile-popup-bottom">
					@if(!empty(Auth::user()->getRoleNames()))
                	@foreach( Auth::user()->getRoleNames() as $v)
						@if($v == "admin")
                    		<a href="/stream" class="exit-button"><img src="img/logo_main.png" alt="Профиль">Admin-Panel</a>
						@elseif($v == "nullbody")
							<a href={{'/user_panel?user_email='. Auth::user()->email}} class="exit-button"><img src="img/setting.png" alt="Настройки" title="Настройки пользователя">Настройки</a>
							<a href={{'/sells_user?user_email='. Auth::user()->email}} class="exit-button"><img src="img/cart-min.png" alt="Ваши покупки">Покупки</a>
						@elseif($v == "operator")
						<a href="/abonent_stream" class="exit-button"><img src="img/logo_main.png" alt="Профиль">Панель абонента</a>
						@endif
                	@endforeach
           	 		@endif
					<div>
					<a href="{{ route('logout') }}" class="exit-button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><img src="img/shutdown.png" alt="Выход из панели">Выход</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    		@csrf
                		</form>
            		</div>
					
				</div>
			</div>
		</div>
            <!--</li>-->
		@endguest
        

	</div>
</header>

       

@section('content')


<!-- БЛОК ПОИСКА -->
<script src="{{ asset('js/search.js') }}"></script>
<div class="top-menu-sort block-admin-section mt-1r pr-0 pl-24px">
			<div class="admin-input-box admin-input-wrap">
				<input type="text" name="Поиск по названию" class="user-input block-admin-input block-admin-input-key block-w-avai" placeholder="Поиск">
				<a href="#" class="admin-video-link-renew user-search-btn" title="Найти">
					<img class="img-search-admin" src="img/search.png" alt="Кнопка поиска">
				</a>
			</div>
		</div>
<!--------------------- РЕЗУЛЬТАТ ПОИСКА ---------------------------->
		<div class="index-live">
			<h2 class="search-title">Результаты поиска</h2>
			<div class="index-live-list" id="video_list_search">
				
			</div>
		</div>
</main> 
@endsection


