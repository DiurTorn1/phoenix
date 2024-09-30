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
						<h2 class="popup-title">Карточка покупки</h2>
						<button type="submit" class="top-menu-btn">Оплатить</button>
					</div>
				</div>

				<div class="popup-content-wrap-item is-active" data-content="user-profile"><!-- Вкладка ПРОФИЛЬ ------- -->
					<div class="popup-content-wrap-row">
						<input type="text" placeholder="Имя" class="user-input" title="Ваше имя">
						<input type="text" placeholder="Фамилия" class="user-input" title="Ваша фамилия">
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
			</div>
		</div>
	</div>
	<main class="index-main">
		
	</main>

	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <script type="text/javascript" src = "{{ asset('js/user_menu.js') }}"></script> -->
	

        @endif
    @endforeach
    @endif
@endguest

@endsection