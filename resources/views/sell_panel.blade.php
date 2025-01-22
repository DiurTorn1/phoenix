@extends('layouts.app')
@section('title-block') Панель оплаты @endsection

@section('content')

@guest


@else
	@if(!empty(Auth::user()->getRoleNames()))
    @foreach( Auth::user()->getRoleNames() as $v)
		@if($v == "nullbody")
		<script type="text/javascript" src = "{{ asset('js/sell_panel.js') }}"></script>
        <!-------------------------------Окно НАСТРОЕК Пользователя------------------------------->
  	<div class="popup-back-user"> 
		<div class="popup-container">
			<div class="popup-content">
				<div class="popup-title-wrap">
					<button class="popup-close close-btn" title="Закрыть" onclick="window.location.href = '/';"><img src="img/close.png" alt="Закрыть" ></button>

					<div class="popup-title-wrap-row popup-title-none is-active" data-content="user-profile">
						<h2 class="popup-title">Карточка покупки</h2>
					</div>
				</div>

				<div class="popup-content-wrap-item is-active" data-content="user-profile"><!-- Вкладка ПРОФИЛЬ ------- -->
					<div class="popup-content-wrap-row">
						<img id="sell_src_img" src="">
					</div>
					<div class="user-input-box block-w100">
						<label>Пользователь</label>
						<input type="text" placeholder="" id="user_sell" class="user-input" title="" disabled>
					</div>
					<div class="user-input-box block-w100">
						<label>Название продукта</label>
						<input type="text" placeholder="" id="name_product_sell" class="user-input" title="" disabled>
					</div>
					<div class="user-input-box block-w100">
						<label>Цена</label>
						<input type="text" placeholder="" id="price_product_sell" class="user-input" title="" disabled>
					</div>
					<div class="user-input-box block-w100">
						<label>Промокод</label>
						<input type="text" placeholder="Введите промокод" id="promocode_product_sell" class="user-input" title="">
					</div>
					<div class="user-input-box block-w100" id="public_ophert">
						<input type="checkbox" id="ophert" name="ophert" />
						<label>Я даю согласие на регулярные списания, на обработку персональных данных и принимаю условия <a class="user-link" id="public_ophert_box">публичной оферты</a></label>
					</div>
					<div class="user-input-box block-w100" >
						<button type="submit" class="top-menu-btn" id="bay_product" >Оплатить</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="popup-back-user"> 
		<div class="popup-container">
			<div class="popup-content">
				<div class="popup-title-wrap">
					<button class="popup-close close-btn" title="Закрыть" ><img src="img/close.png" alt="Закрыть" ></button>

					<!--<div class="popup-title-wrap-row popup-title-none is-active" data-content="user-profile">
						<h2 class="popup-title">Карточка покупки</h2>
					</div>-->
				</div>

				<div class="popup-content-wrap-item is-active" data-content="user-profile"><!-- Вкладка ПРОФИЛЬ ------- -->
					<div class="popup-content-wrap-row">
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