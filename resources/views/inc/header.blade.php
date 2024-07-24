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
            <!--<li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>-->
        @else
            <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
            <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>
            <li><a class="nav-link" href="{{ route('products.index') }}">Manage Product</a></li>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            </li>
            @endguest
			<a href="#" class="search-button"><svg focusable="false" aria-hidden="true" viewBox="0 0 24 24" data-testid="SearchIcon"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path></svg>
			</a>
			<button class="entrance">Вход</button>
	</div>
</header>