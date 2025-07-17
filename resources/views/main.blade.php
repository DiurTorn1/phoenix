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
				@elseif($v == "comment")
					<script type="text/javascript" src = "{{ asset('js/get_video_cam.js') }}"></script> 
					<a id="name_user_get" class="name_user_get">{{ Auth::user()->email }}</a>
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

	</div>
	<div class="index-live-2" id="index-live-2">
		<h2>В эфире</h2>
		<div id="slider-wrap">
         	<div id="active-slide">
           		<div id="slider-2">
           		</div>
         	</div>
    	</div>
	</div>

	<div class = "slide_main">
    </div>

	<div class="index-live">
		<h2>Подписка</h2>
		<div class="index-live-list">
			<div id="slider-wrap1">
         		<div id="active-slide1">
           			<div id="slider1">
           			</div>
				</div>
         	</div>

		</div>
	</div>
	<!--<button class="publishBtn" id="publishBtn" value="">{{ __('Auth') }}</button>
	<div id="res_reg"></div>-->
</main>  
@endsection



