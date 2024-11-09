@extends('layouts.app')
@section('title-block') Феникс ТВ @endsection


@include('inc.banner')



@include('inc.header')
<script type="text/javascript" src = "https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bcryptjs/2.4.3/bcrypt.min.js"></script>
<script type="text/javascript" src = "{{ asset('js/get_video_nologin.js') }}"></script> 
<div class="index-live" id="index-live">
		<h2>Скоро</h2>
		<div id="slider-wrap">
            <div id="active-slide">
                <div id="slider">
                </div>
            </div>
        </div>
		<div class="index-live-2" id="index-live-2">
		<h2>В эфире</h2>
		<div id="slider-wrap">
         <div id="active-slide">
           <div id="slider-2">
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
@section('content')

</main>
@endsection


