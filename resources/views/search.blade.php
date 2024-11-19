@extends('layouts.app')
@section('title-block') ГЛАВНАЯ - Феникс ТВ @endsection
@include('inc.banner')
@include('inc.header')

       

@section('content')


<!-- БЛОК ПОИСКА -->
<script src="{{ asset('js/search.js') }}"></script>
<div class="top-menu-sort block-admin-section mt-1r pr-0 pl-24px">
			<div class="admin-input-box admin-input-wrap">
				<input type="text" name="Поиск по названию" class="user-input block-admin-input block-admin-input-key block-w-avai" placeholder="Поиск">
				<a href="#" class="admin-video-link-renew user-search-btn" title="Найти">
					<img class="img-search-admin" src="img/search.png" alt="Кнопка поиска">
				</a>
			</div>
		</div>
<!--------------------- РЕЗУЛЬТАТ ПОИСКА ---------------------------->
		<div class="index-live">
			<h2 class="search-title">Результаты поиска</h2>
			<div class="index-live-list" id="video_list_search">
				
			</div>
		</div>
</main> 
@endsection


