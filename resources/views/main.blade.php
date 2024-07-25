@extends('layouts.app')
@section('title-block') ГЛАВНАЯ - Феникс ТВ @endsection
<main class="index-main">
	    <!-- Главный баннер -->
	    <div class="banner">
		    <picture class="banner-img">
			    <img src="{{ asset('img/banner.png') }}" alt="Феникс ТВ">
		    </picture>
		    <div class="banner-text">
			    <span>Феникс ТВ</span>
			    <h1>Пространство детского спорта</h1>
		    </div>
	    </div>
@include('inc.header')

       

@section('content')

	<!-- Прямая трансляция -->
	<div class="index-live">
		<h2>Прямой эфир</h2>
		<div class="index-live-list">
			<div class="index-live-item">
				<div class="index-live-item-video">
					<!--<a href="#" tabindex="0">
						<span class="label">LIVE</span>
					</a>-->
					<iframe
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
		</div>
	</div>
	<!--<button class="publishBtn" id="publishBtn" value="">{{ __('Auth') }}</button>
	<div id="res_reg"></div>-->
  
@endsection


</main>

@include('inc.footer')