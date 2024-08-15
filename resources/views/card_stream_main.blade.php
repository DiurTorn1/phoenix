@extends('layouts.app')
@section('title-block') Карточка стрима @endsection

@section('content')

@guest


@else
	@if(!empty(Auth::user()->getRoleNames()))
    @foreach( Auth::user()->getRoleNames() as $v)
		@if($v == "admin")
    <header class="header admin-header">
	<script type="text/javascript" src = "{{ asset('js/get_cardid_stream.js') }}"></script>
		<div class="left-header">
			<a href="/stream" class="close-btn" title="Закрыть" ><img src="{{ asset('img/close.png') }}" alt="Закрыть" width="24" height="24"></a>
			<h2 class="top-menu-title">Карточка стрима</h2>
		</div>
		<div class="right-heder">
			<button class="top-menu-btn save-st" id="upload_stream">Сохранить</button>
			<button class="top-menu-btn">Отменить публикацию</button>
		</div>
	</header>
	<main class="admin-container">
	<!-----------------------Меню стрима------------------------------>
	<div class="admin-menu">
		<nav class="admin-navigation">
			<ul class="stream-navigation admin-navigation-list admin-back">
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link" id="card_stream_link"><img class="admin-menu-icon" src="{{ asset('img/edit.png') }}" alt="Редактировать">Редактировать</a></li>
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link" id="card_broadcast_link"><img class="admin-menu-icon" src="{{ asset('img/broadcast.png') }}" alt="Трансляция">Трансляция</a></li>
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link" id="card_monitor_link"><img class="admin-menu-icon" src="{{ asset('img/monitor.png') }}" alt="Мониторинг">Мониторинг</a></li>
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link" id="analitik_card_link"><img class="admin-menu-icon" src="{{ asset('img/analitik.png') }}" alt="Аналитика">Аналитика</a></li>
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link" id="card_restream_link"><img class="admin-menu-icon" src="{{ asset('img/restream.png') }}" alt="Рестрим">Рестрим</a></li>
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="{{ asset('img/studio.png') }}" alt="Студия">Студия</a></li>
			</ul>
		</nav>
	</div>
	<!----------------------------Стрим-контент---------------------------------->
        @yield('card_stream_res')
	</main>
	<!----------------->
        @endif
    @endforeach
    @endif
@endguest

@endsection