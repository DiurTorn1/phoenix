@extends('layouts.app')
@section('title-block') Феникс ТВ @endsection
@include('inc.header')
@include('inc.banner')

       

@section('content')


@guest

	@else
		@if(!empty(Auth::user()->getRoleNames()))
            @foreach( Auth::user()->getRoleNames() as $v)
				@if($v == "admin")
					<script type="text/javascript" src = "{{ asset('js/get_video.js') }}"></script> 
				@elseif($v == "nullbody")
					<script type="text/javascript" src = "{{ asset('js/get_video_user.js') }}"></script>
					<a id="name_user_get" class="name_user_get">{{ Auth::user()->email }}</a>
				@elseif($v == "operator")
					<script type="text/javascript" src = "{{ asset('js/get_video.js') }}"></script> 
				@endif
            @endforeach
        @endif
@endguest
	<!-- Прямая трансляция -->
	<div class="index-live" id="index-live">
		<h2>Скоро</h2>
		<div id="slider-wrap">
         <div id="active-slide">
           <div id="slider">
           </div>
         </div>
      </div>
		<!--<div class="gallery-wrapper">
			<div class="content">
				<div class="gallery full">
					<div class="swiper-container">
						<div class="swiper-wrapper" id="public_item_stream">

						</div>
					</div>					
				</div>
				
			</div>	
		</div>-->

	
		<!--<h2>В эфире</h2>
		<div class="live_item_stream" id ="live_item_stream" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
			<div class="index-live-item">
				<div class="index-live-item-video">
					<a href="#">
						<span class="label">LIVE</span>

						<div class="index-live-banner">
								<img src="img/phoenix.png">
						</div>
					</a>
				</div>
				<div class="index-live-item-text">
					<a href="#"></a>
				</div>
			</div>
		</div>
		</div>-->

		<div class = "slide_main">
    </div>
		<!--<h2>Прямой эфир</h2>
		<div class="index-live-list">
			<div class="index-live-item">
				<div class="index-live-item-video">-->
					<!--<a href="#" tabindex="0">
						<span class="label">LIVE</span>
					</a>-->
					<!--<iframe
    				src="https://kinescope.io/dmY1DEguQjTJFgKxCnTXCN"
    				width="640"
    				height="360"
    				frameborder="0"
    				allow="autoplay; fullscreen; picture-in-picture; encrypted-media; gyroscope; accelerometer; clipboard-write;"
    				></iframe>
				</div>
				<div class="index-live-item-text">
					<a href="#">Elden Ring в VK Play / Смуту исправили / Новый Battlefield / 6 лет TES6 / Sony должна купить Ubisoft</a>
				</div>
			</div>
		</div>-->
	</div>
	<div class="index-live">
			<h2>Подписка</h2>
			<div class="index-live-list">
				<div id="slider-wrap1">
         			<div id="active-slide1">
           				<div id="slider1">
           			</div>
         		</div>
				<!--<div class="index-live-item">
					<div class="index-live-item-video">
						<a href="#">
							<div class="index-live-banner">
								<img src="img/phoenix.png">
							</div>
						</a>
					</div>
					<div class="index-item-text-wrap">
						<a href="#">27.04.2024 Баскетбол ДБЛ "Аврора" Д 2013 Ф г. Окуневка</a>
						<ul>
							<li>Билет на 5 дней</li>
						</ul>
					</div>
					<div class="index-live-item-text"> 
						<a href="#" class="user-button">150 &#8381;</a>
					</div>
				</div>
				<div class="index-live-item">
					<div class="index-live-item-video">
						<a href="#"></a>
					</div>
					<div class="index-item-text-wrap">
						<a href="#">27.04.2024 Баскетбол ДБЛ "Аврора" Д 2013 Ф г. Окуневка</a>
						<ul>
							<li>Все трансляции кубка</li>
							<li>На всю жизнь</li>
							<li>На всю жизньблаааа блаааа блаа бла бббууубблааааааа бламсс</li>
						</ul>
					</div>
					<div class="index-live-item-text"> 
						<a href="#" class="user-button-ok">куплено</a>
					</div>
				</div>
				<div class="index-live-item">
					<div class="index-live-item-video">
						<a href="#"></a>
					</div>
					<div class="index-item-text-wrap">
						<a href="#">27.04.2024 Баскетбол ДБЛ "Аврора" Д 2012 Ф г. Окуловка</a>
						<ul>
							<li>Все трансляции кубка</li>
							<li>На всю жизнь</li>
						</ul>
					</div>
					<div class="index-live-item-text"> -->
						<!--<a href="#" class="user-button user-button-subs"><span>300 &#8381;<p class="user-button-old-price">500 &#8381;</p></span><p class="user-button-slash">/</p><p class="user-button-text">три месяца</p></a>--><!-- Кнопка с старой ценой и текстом -->
					<!--</div>
				</div>
				<div class="index-live-item">
					<div class="index-live-item-video">
						<a href="#"></a>
					</div>
					<div class="index-item-text-wrap">
						<a href="#">27.04.2024 Баскетбол ДБЛ "Аврора" Д 2012 Ф г. Окуловка</a>
						<ul>
							<li>Все трансляции кубка</li>
							<li>На всю жизнь</li>
						</ul>
					</div>
					<div class="index-live-item-text"> 
						<a href="#" class="user-button user-button-subs"><span>3000 &#8381;<p class="user-button-old-price">5000 &#8381;</p></span><p class="user-button-slash">/</p><p class="user-button-text">полгода</p></a>
					</div>
				</div>-->

			</div>
		</div>
	<!--<button class="publishBtn" id="publishBtn" value="">{{ __('Auth') }}</button>
	<div id="res_reg"></div>-->
</main>  
@endsection



