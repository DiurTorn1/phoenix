@extends('layouts.app')
@section('title-block') ГЛАВНАЯ - Феникс ТВ @endsection
@include('inc.banner')
@include('inc.header')

       

@section('content')


<!-- БЛОК ПОИСКА -->
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
			<div class="index-live-list">
				<div class="index-live-item">
					<div class="index-live-item-video">
						<a href="#">
							<span class="label">LIVE</span>
						</a>
					</div>
					<div class="index-live-item-text">
						<a href="#">27.04.2024 Баскетбол ДБЛ "Аврора" Д 2012 Ф г. Окуловка</a>
					</div>
				</div>
				<div class="index-live-item"> <!-- С значком ЗАМКА в углу -->
					<div class="index-live-item-video">
						<a href="#">
							<span class="label-block"><img src="img/lock.png" alt="Просмотр заблокирован" title="Просмотр заблокирован. Купите билет."></span> <!-- Вот ТУТ -->
						</a>
					</div>
					<div class="index-live-item-text">
						<a href="#">27.04.2024 Баскетбол ДБЛ "Аврора" Д 2013 Ф г. Окуневка</a>
					</div>
				</div>
			</div>
		</div>
</main> 
@endsection


