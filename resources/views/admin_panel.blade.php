@extends('layouts.app')
@section('title-block') Панель админа-господина @endsection

@section('content')

@guest


@else
	@if(!empty(Auth::user()->getRoleNames()))
    @foreach( Auth::user()->getRoleNames() as $v)
		@if($v == "admin")
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
					<a href="#" class="exit-button"><img src="{{ asset('img/user1.png') }}" alt="Профиль">Профиль</a>
					@if(!empty(Auth::user()->getRoleNames()))
                	@foreach( Auth::user()->getRoleNames() as $v)
						@if($v == "admin")
                    		<a href="/admin_panel" class="exit-button"><img src="{{ asset('img/logo_main.png') }}" alt="Профиль">Admin-Panel</a>
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
		<nav class="admin-navigation">
			<ul class="admin-navigation-list admin-back">
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="{{ asset('img/monitor.png') }}" alt="Монитор">Монитор</a></li>
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="{{ asset('img/analitik.png') }}" alt="Аналитика">Аналитика</a></li>
			</ul>
			<ul class="admin-navigation-list admin-back"> 
				<li class="admin-navigation-item"><a href="/video" class="admin-navigation-link"><img class="admin-menu-icon" src="{{ asset('img/play.png') }}" alt="Видео">Видео</a></li>
				<li class="admin-navigation-item"><a href="/stream" class="admin-navigation-link"><img class="admin-menu-icon" src="{{ asset('img/stream.png') }}" alt="Стримы">Стримы</a></li>
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="{{ asset('img/analitik.png') }}" alt="Коллекции">Коллекции</a></li>
				<li class="admin-navigation-item"><a href="/product_admin" class="admin-navigation-link"><img class="admin-menu-icon" src="{{ asset('img/analitik.png') }}" alt="Продукты">Продукты</a></li>
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="{{ asset('img/analitik.png') }}" alt="Баланс">Баланс</a></li>
				<li class="admin-navigation-item"><a href="/promocode" class="admin-navigation-link"><img class="admin-menu-icon" src="{{ asset('img/analitik.png') }}" alt="Промокоды">Промокоды</a></li>
			</ul>
			<ul class="admin-navigation-list admin-back">
				<li class="admin-navigation-item"><a href="{{ route('users.index') }}" class="admin-navigation-link"><img class="admin-menu-icon" src="{{ asset('img/analitik.png') }}" alt="Пользователи">Пользователи</a></li>
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="img/tag.png" alt="Теги">Теги</a></li>
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="{{ asset('img/analitik.png') }}" alt="Виджеты">Виджеты</a></li>
			</ul>
		</nav>
	</div>
	<!----------------------------Админ-контент---------------------------------->
	<div class="admin-content">

        @yield('admin_res')
	</div>	
	</main>
	<!----------------->
        @endif
    @endforeach
    @endif
@endguest

@endsection