@extends('layouts.app')
@section('title-block') Панель админа-господина @endsection

@section('content')

@guest


@else
	@if(!empty(Auth::user()->getRoleNames()))
    @foreach( Auth::user()->getRoleNames() as $v)
		@if($v == "admin")
        <header class="header admin-header">
		<script type="text/javascript" src = "{{ asset('js/get_stream.js') }}"></script> 
		<script type="text/javascript" src = "{{ asset('js/get_card_stream.js') }}"></script> 
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
					<a href="#" class="exit-button"><img src="img/user1.png" alt="Профиль">Профиль</a>
					@if(!empty(Auth::user()->getRoleNames()))
                	@foreach( Auth::user()->getRoleNames() as $v)
						@if($v == "admin")
                    		<a href="/admin_panel" class="exit-button"><img src="img/logo_main.png" alt="Профиль">Admin-Panel</a>
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
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="{{ asset('img/analitik.png') }}" alt="Продукты">Продукты</a></li>
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="{{ asset('img/analitik.png') }}" alt="Баланс">Баланс</a></li>
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="{{ asset('img/analitik.png') }}" alt="Промокоды">Промокоды</a></li>
			</ul>
			<ul class="admin-navigation-list admin-back">
				<li class="admin-navigation-item"><a href="{{ route('users.index') }}" class="admin-navigation-link"><img class="admin-menu-icon" src="{{ asset('img/analitik.png') }}" alt="Пользователи">Пользователи</a></li>
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="{{ asset('img/analitik.png') }}" alt="Виджеты">Виджеты</a></li>
			</ul>
		</nav>
	</div>
	<!----------------------------Админ-контент---------------------------------->
	<div class="admin-content">

		<div class="top-menu-admin admin-back">
			<div class="top-menu-head">
				<h2 class="top-menu-title">Стримы</h2>
				<button class="top-menu-btn" onclick="window.location.href = '/create_stream';">Создать стрим</button>
			</div>
			<div class="top-menu-sort">
				<div class="admin-input-box">
					<label>Вид спорта</label>
					<select class="admin-input admin-input-select">
						<option value="Баскетбол">Баскетбол</option>
						<option value="Волейбол">Волейбол</option>
					</select>
				</div>
				<div class="admin-input-box">
					<label>Дата начала</label>
					<input class="admin-input" type="Date" value="Дата начала">
				</div>
				<div class="admin-input-box">
					<label>Дата окончания</label>
					<input class="admin-input" type="Date" value="Дата окончания">
				</div>
				<div class="admin-input-box">
					<label>Тэг</label>
					<select class="admin-input admin-input-select">
						<option value="">Тэг 1</option>
						<option value="">Тэг 2</option>
					</select>
				</div>
			</div>
		</div>
		
		<div class="admin-video-sort admin-back">
			<div class="admin-video-sort-wrap">
				<input class="admin-video-sort-check" id="admin-video-sort-check" type="checkbox">
				<label class="admin-video-check-label" for="admin-video-sort-check">Выбрано 0 стримов</label>
			</div>
			<ul class="admin-video-sort-list">
				<li class="admin-video-sort-item"><button class="admin-video-btn video-btn-active">Публиковать</button></li>
				<li class="admin-video-sort-item"><button class="admin-video-btn">Снять с публикации</button></li>
				<li class="admin-video-sort-item"><button class="admin-video-btn">Удалить</button></li>
				<li class="admin-video-sort-item"><button class="admin-video-btn">Добавить к продукту</button></li>
			</ul>
		</div>
		<ul class="admin-video-list admin-video-sort" id="admin-video-list">
			<!--<li class="admin-video-item admin-back">
				<div class="admin-video-sort-wrap">
					<input id="admin-vl1" class="admin-video-sort-check" type="checkbox">
					<label class="admin-video-check-label" for="admin-vl1"></label>
				</div>
				<div class="admin-video-prev">
					<img src="img/rub2.png" alt="" class="admin-video-prev-stik">
					<p>Нет потока</p>
				</div>
				<div class="admin-video-item-header">
					<div class="admin-video-item-h-list">
						<span class="admin-video-item-h-date">09.05.2024 Волейбол Кубок Феникса Ю11 Финал г. Псков</span>
					</div>
					<div class="admin-video-item-h-hashtag">
						<span class="admin-video-hashtag-date">2023-2024</span>
						<span class="admin-video-hashtag-kubok">Кубок Феникса</span>
						<span class="admin-video-hashtag-group">Ю11</span>
						<span class="admin-video-hashtag-sport">Волейбол</span>
						<span class="admin-video-hashtag-city">Псков</span>
						<span class="admin-video-hashtag-org">ЦРСП "ФЕНИКС"</span>
					</div>
				</div>
				<div class="admin-video-item-view">
					<p class="admin-video-item-v-count"><span>1342</span>просмотра</p>
					<p class="admin-video-item-v-region">Все регионы</p>
				</div>
				<div class="admin-video-item-info admin-video-item-view">
					<p class="admin-video-item-i-time">Закончилась в<span>15:19</span></p>
					<p class="admin-video-item-i-date">09 мая 2024</p>
					<a href="#" class="admin-video-item-i-link"><img src="img/right-arrow.svg" alt="Поделиться"></a>
				</div>
			</li>
			<li class="admin-video-item admin-back">
				<div class="admin-video-sort-wrap">
					<input id="admin-vl1" class="admin-video-sort-check" type="checkbox">
					<label class="admin-video-check-label" for="admin-vl1"></label>
				</div>
				<div class="admin-video-prev">
					<img src="img/rub2.png" alt="" class="admin-video-prev-stik">
					<p>Нет потока</p>
				</div>
				<div class="admin-video-item-header">
					<div class="admin-video-item-h-list">
						<span class="admin-video-item-h-date">10.05.2024</span>
						<span class="admin-video-item-h-sport">Баскетбол</span>
						<span class="admin-video-item-h-kubok_name">Кубок Феникса</span>
						<span class="admin-video-item-h-group">Ю11</span>
						<span class="admin-video-item-h-step">Финал</span>
						<span class="admin-video-item-h-city">г. Вологда</span>
					</div>
					<div class="admin-video-item-h-hashtag">
						<span class="admin-video-hashtag-date">2023-2024</span>
						<span class="admin-video-hashtag-kubok">Кубок Феникса</span>
						<span class="admin-video-hashtag-group">Ю11</span>
						<span class="admin-video-hashtag-sport">ВБаскетбол</span>
						<span class="admin-video-hashtag-city">Вологда</span>
						<span class="admin-video-hashtag-org">ЦРСП "ФЕНИКС"</span>
					</div>
				</div>
				<div class="admin-video-item-view">
					<p class="admin-video-item-v-count"><span>1342</span>просмотра</p>
					<p class="admin-video-item-v-region">Все регионы</p>
				</div>
				<div class="admin-video-item-info admin-video-item-view">
					<p class="admin-video-item-i-time">Закончилась в<span>15:19</span></p>
					<p class="admin-video-item-i-date">09 мая 2024</p>
					<a href="#" class="admin-video-item-i-link"><img src="img/right-arrow.svg" alt="Поделиться"></a>
				</div>
			</li>-->
		</ul>
	</div>	
	</main>
	<!----------------->
        @endif
    @endforeach
    @endif
@endguest

@endsection