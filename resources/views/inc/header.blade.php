<header class="header">
	<div class="left-header">
		<a href="/" class="logo"><img src="{{ asset('img/logo.png') }}" alt="Феникс ТВ"></a>
		<!-- Меню -->
		<navigation class="top-navigation">
			<ul>
				<li><a href="/" selected>Главная</a></li>
			</ul>
			<ul>
				<li><a href="/bascet">Кубок Феникса</a></li>
			</ul>
			<ul>
				<li><a href="#">Лига "Аврора"</a></li>
			</ul>
			<ul>
				<li><a href="#">ОФБ</a></li>
			</ul>
			<ul>
				<li><a href="#">Космолига</a></li>
			</ul>
			<ul>
				<li><a href="#">Pskov-Volley</a></li>
			</ul>
			<ul>
				<li><a href="#">Архив</a></li>
			</ul>
			<ul>
				<li><a href="#">О нас</a></li>
			</ul>
		</navigation>
	</div>
	<div class="right-heder">
		@guest
			<a href="#" class="search-button"><svg focusable="false" aria-hidden="true" viewBox="0 0 24 24" data-testid="SearchIcon"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path></svg>
			</a>
			<button class="entrance" id="enterranse">Вход</button>

		@else
			<!--<li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
            <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>
            <li class="nav-item dropdown">-->

			<div class="right-heder dropdown">
			<a class="entrance entrance-admin">{{ Auth::user()->name }}</a>
			<div class="profile-popup">
				<div class="profile-popup-top">
					<span>{{ Auth::user()->name }}</span>
					<p>{{ Auth::user()->email }}</p>
				</div>
				<div class="profile-popup-bottom">
					<a href="#" class="exit-button"><img src="img/user1.png" alt="Профиль">Профиль</a>
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
                    <button type="submit" class="top-menu-btn" id="top-menu-btn">
						Войти
                    </button>
				</div>
				<input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="" for="remember">
                        {{ __('Запомни меня, тварь!!!') }}
        		</label>
			</div>
			

        </form>
</div>
<!---->