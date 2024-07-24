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

		@endguest
        

	</div>
</header>