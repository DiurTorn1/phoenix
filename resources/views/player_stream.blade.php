@extends('layouts.app')
@section('title-block') Плеер @endsection

@section('content')

@guest
        <header class="header admin-header">		
		<div class="left-header">
			<a href="/" class="logo"><img src="{{ asset('img/logo.png') }}" alt="Феникс ТВ"></a>
		</div>
	    </header>

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
	    </div>
	<!----------------------------Админ-контент---------------------------------->
	<div class="admin-content">
		    <div class="index-live-list">
			    <div class="index-live-item">
				    <div class="index-live-item-video">
					    <iframe
    				    src=""
    				    width="1024"
    				    height="640"
    				    frameborder="0"
    				    allow="autoplay; fullscreen; picture-in-picture; encrypted-media; gyroscope; accelerometer; clipboard-write;"
    				    ></iframe>
				    </div>
				    <div class="index-live-item-text">
					    <a></a>
				    </div>
			    </div>
		</div>
	</div>	
	</main>
	<!----------------->
        @endif
    @endforeach
    @endif
@endguest

@endsection