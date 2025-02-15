@extends('layouts.app')
@section('title-block') Панель оплаты @endsection

@section('content')

@guest
<script type="text/javascript">window.location.href='/';</script>

@else
	@if(!empty(Auth::user()->getRoleNames()))
    @foreach( Auth::user()->getRoleNames() as $v)
		@if($v == "nullbody")
		<script type="text/javascript" src = "{{ asset('js/sells_user.js') }}"></script>
        <!-------------------------------Окно НАСТРОЕК Пользователя------------------------------->
  	<div class="popup-back-user"> 
		<div class="popup-container">
			<div class="popup-content">
				<div class="popup-title-wrap">
					<button class="popup-close close-btn" title="Закрыть" onclick="window.location.href = '/';"><img src="img/close.png" alt="Закрыть" ></button>

					<div class="popup-title-wrap-row popup-title-none is-active" data-content="user-profile">
						<h2 class="popup-title">Покупки</h2>
						<!--<button type="submit" class="top-menu-btn" id="bay_product">Оплатить</button>-->
					</div>
				</div>

				<div class="popup-content-wrap-item is-active" data-content="user-profile"><!-- Вкладка ПРОФИЛЬ ------- -->
					<div class="popup-content-wrap-row">
						<div class="user-input-box block-w100" id="sell_ticket_user">
						</div>
						<div class="user-input-box block-w100" id="sell_subs_user">

						</div>
					</div>
					<!--<div class="user-input-box block-w100">
						<img id="sell_src_img" src="/img/no-image.jpg">
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
					</div>-->
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