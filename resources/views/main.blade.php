@extends('layouts.app')
@section('title-block') ГЛАВНАЯ - Феникс ТВ @endsection
@include('inc.banner')
@include('inc.header')

       

@section('content')


@guest

	@else
		@if(!empty(Auth::user()->getRoleNames()))
            @foreach( Auth::user()->getRoleNames() as $v)
				@if($v == "admin")
					<script type="text/javascript" src = "{{ asset('js/get_video.js') }}"></script> 
				@elseif($v == "nullbody")
					<script type="text/javascript" src = "{{ asset('js/get_video_user.js') }}"></script>
					<a id="name_user_get">{{ Auth::user()->email }}</a>
				@endif
            @endforeach
        @endif
@endguest
	<!-- Прямая трансляция -->
	<div class="index-live" id="index-live">
	
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
	<!--<button class="publishBtn" id="publishBtn" value="">{{ __('Auth') }}</button>
	<div id="res_reg"></div>-->
  
@endsection


</main>
