@extends('layouts.app')
@section('title-block') Панель пользователя @endsection

@section('content')

@guest


@else
	@if(!empty(Auth::user()->getRoleNames()))
    @foreach( Auth::user()->getRoleNames() as $v)
		@if($v == "nullbody")
        <!-------------------------------Окно НАСТРОЕК Пользователя------------------------------->
  	<div class="popup-back-user"> 
		<div class="popup-container">
			<div class="popup-content">
				<div class="popup-title-wrap">
					<button class="popup-close close-btn" title="Закрыть" onclick="window.location.href = '/';"><img src="img/close.png" alt="Закрыть" ></button>

					<div class="popup-title-wrap-row popup-title-none is-active" data-content="user-profile">
						<h2 class="popup-title">Профиль</h2>
						<button type="submit" class="top-menu-btn">Сохранить</button>
					</div>

					<div class="popup-title-wrap-row popup-title-none" data-content="user-pay">
						<h2 class="popup-title">Способы оплаты</h2>
					</div>

					<div class="popup-title-wrap-row popup-title-none" data-content="user-promocode">
						<h2 class="popup-title">Промокоды</h2>
					</div>

					<div class="popup-title-wrap-row popup-title-none" data-content="user-gadget">
						<h2 class="popup-title">Устройства</h2>
						<a href="#" class="top-menu-btn">Добавить устройство</a>
					</div>

					<div class="popup-title-wrap-row popup-title-none" data-content="user-autorization">
						<h2 class="popup-title">Авторизация</h2>
					</div>

					<navigation class="top-navigation" id="top-navigation-menu">
						<ul>
							<li><a class="user-navigation-link active-navigation-link-user" data-open-block="user-profile" href="#">Профиль</a></li>
						</ul>
						<ul>
							<li><a class="user-navigation-link" data-open-block="user-pay" href="#">Оплата</a></li>
						</ul>
						<ul>
							<li><a class="user-navigation-link" data-open-block="user-promocode" href="#">Промокоды</a></li>
						</ul>
						<ul>
							<li><a class="user-navigation-link" data-open-block="user-gadget" href="#">Устройства</a></li>
						</ul>
						<ul>
							<li><a class="user-navigation-link" data-open-block="user-autorization" href="#">Авторизация</a></li>
						</ul>
					</navigation>
				</div>

				<div class="popup-content-wrap-item is-active" data-content="user-profile"><!-- Вкладка ПРОФИЛЬ ------- -->
					<div class="popup-content-wrap-row">
						<input type="text" placeholder="Имя" class="user-input" title="Ваше имя">
						<input type="text" placeholder="Фамилия" class="user-input" title="Ваша фамилия">
					</div>
					<div class="popup-content-wrap-row">
						<input type="text" placeholder="Почта" class="user-input" title="Ваша почта">
					</div>
					<div class="user-input-box block-w100">
						<button type="submit" class="top-menu-btn" id="">Обновить пароль</button>
					</div>
					<div class="popup-content-wrap-row-1">
						<input type="text" placeholder="Старый пароль" class="user-input" title="Пароль">
						<input type="text" placeholder="Введите пароль" class="user-input" title="Пароль">
						<input type="text" placeholder="Повторите пароль" class="user-input" title="Пароль">
					</div>
					<div class="user-input-box block-w100">
						<label>Страна*</label>
						<select class="user-input-list admin-input-select">
							<option value="Баскетбол">Россия</option>
							<option value="Волейбол">Казахстан</option>
						</select>
					</div>
					<div class="popup-content-wrap-row">
						<div class="user-input-box">
							<label>Язык</label>
							<select class="user-input-list admin-input-select">
								<option value="Баскетбол">Русский</option>
							</select>
						</div>
						<div class="user-input-box">
							<label>Часовой пояс</label>
							<select class="user-input-list admin-input-select">
								<option value="Баскетбол">Москва</option>
								<option value="Волейбол">Екатеринбург</option>
							</select>
						</div>
					</div>
				</div>

				<div class="popup-content-wrap-item" data-content="user-pay"><!-- Вкладка ОПЛАТА ------- -->
					<div class="user-input-box block-w100">
						<div class="user-input-box-wrap">
							<div class="user-box-no-data">
								<img class="no-data-img" src="img/card.png" alt="Нет способов оплаты">
								<span class="top-menu-title no-data-title">Нет способов оплаты</span>
								<p class="no-data-text">Здесь будут отображаться сохраненные вами способы оплаты</p>
							</div>
						</div>
					</div>
				</div>

				<div class="popup-content-wrap-item" data-content="user-promocode"><!-- Вкладка ПРОМОКОДЫ ------- -->
					<div class="user-input-box block-w100">
						<div class="user-input-box-wrap">
							<div class="user-box-no-data">
								<img class="no-data-img" src="img/promo.png" alt="Нет промокодов">
								<span class="top-menu-title no-data-title">Промокодов нет</span>
								<p class="no-data-text">Полученные промокоды будут отображаться здесь</p>
							</div>
						</div>
					</div>
				</div>

				<div class="popup-content-wrap-item" data-content="user-gadget"><!-- Вкладка УСТРОЙСТВА ------- -->
					<div class="user-input-box block-w100">
						<div class="user-input-box-wrap">
							<div class="user-box-no-data">
								<img class="no-data-img" src="img/gadget.png" alt="Нет устройств">
								<span class="top-menu-title no-data-title">Устройств нет</span>
								<p class="no-data-text">Подключение приложения Смарт ТВ к вашему аккаунту</p>
							</div>
						</div>
					</div>
				</div>

				<div class="popup-content-wrap-item" data-content="user-autorization"><!-- Вкладка АВТОРИЗАЦИЯ------- -->
					<div class="user-input-box block-w100">
						<div class="user-input-box-wrap fl-dir-col">
							<p class="no-data-text">Сервис временно недоступен!</p>
							<ul class="user-box-list">
								<li class="user-box-item">
									<div class="left-header">
										<div class="user-box-item-img">
											<img src="img/vk.png" alt="">
										</div>
										<span>Вконтакте</span>
									</div>
									<div class="right-header">
										<button type="submit" class="top-menu-btn mb-none">Подключить</button>
									</div>
								</li>
								<li class="user-box-item">
									<div class="left-header">
										<div class="user-box-item-img">
											<img src="img/google.png" alt="">
										</div>
										<span>Google</span>
									</div>
									<div class="right-header">
										<button type="submit" class="top-menu-btn mb-none">Подключить</button>
									</div>
								</li>
								<li class="user-box-item">
									<div class="left-header">
										<div class="user-box-item-img">
											<img src="img/apple.png" alt="">
										</div>
										<span>Apple ID</span>
									</div>
									<div class="right-header">
										<button type="submit" class="top-menu-btn mb-none">Подключить</button>
									</div>
								</li>

							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<main class="index-main">
		
	</main>

	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
	<script type="text/javascript" src = "{{ asset('js/user_menu.js') }}"></script> 

        @endif
    @endforeach
    @endif
@endguest

@endsection