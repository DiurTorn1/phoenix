@extends('layouts.app')
@section('title-block') Панель админа-господина @endsection

@section('content')
<header class="header admin-header">
		<div class="left-header">
			<a href="/" class="close-btn" title="Закрыть" ><img src="img/close.png" alt="Закрыть" width="24" height="24"></a>
			<h2 class="top-menu-title">Панель админа-господина</h2>
		</div>
		<div class="right-heder">
		</div>
</header>
<main class="admin-container">
	<!-----------------------Меню админа------------------------------>
	<div class="admin-menu">
		<div class="admin-menu-header admin-back">
			<div class="admin-tour-logo">
				<img src="img/phoenix1.png" alt="логотип кубка (турнира)">
			</div>
			<span>Открытый турнир "Кубок Феникса"</span>
		</div>
		<nav class="admin-navigation">
			<ul class="admin-navigation-list admin-back">
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="img/monitor.png" alt="Монитор">Монитор</a></li>
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="img/analitik.png" alt="Аналитика">Аналитика</a></li>
			</ul>
			<ul class="admin-navigation-list admin-back"> 
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="img/play.png" alt="Видео">Видео</a></li>
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="img/stream.png" alt="Стримы">Стримы</a></li>
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="img/analitik.png" alt="Коллекции">Коллекции</a></li>
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="img/analitik.png" alt="Продукты">Продукты</a></li>
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="img/analitik.png" alt="Баланс">Баланс</a></li>
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="img/analitik.png" alt="Промокоды">Промокоды</a></li>
			</ul>
			<ul class="admin-navigation-list admin-back">
				<li class="admin-navigation-item"><a href="/users_admin" class="admin-navigation-link"><img class="admin-menu-icon" src="img/analitik.png" alt="Пользователи">Пользователи</a></li>
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="img/analitik.png" alt="Виджеты">Виджеты</a></li>
			</ul>
		</nav>
	</div>
	<!----------------------------Админ-контент---------------------------------->
	<div class="admin-content">

        @yield('admin_res')
	</div>	
	</main>
	<!----------------->
@endsection


</main>