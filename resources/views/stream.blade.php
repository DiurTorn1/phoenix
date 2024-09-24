@extends('admin_panel')
@section('title-block') Стримы @endsection
@section('admin_res')
<script type="text/javascript" src = "{{ asset('js/get_stream.js') }}"></script> 
<div class="top-menu-admin admin-back">
			<div class="top-menu-head">
				<h2 class="top-menu-title">Стримы</h2>
				<button class="top-menu-btn" onclick="window.location.href = '/create_stream';">Создать стрим</button>
			</div>
			<div class="top-menu-sort">
				<div class="admin-input-box">
					<label>Вид спорта</label>
					<select class="admin-input admin-input-select">
						<option value="Баскетбол">Баскетбол</option>
						<option value="Волейбол">Волейбол</option>
						<option value="Тест">Тест</option>
					</select>
				</div>
				<div class="admin-input-box">
					<label>Дата начала</label>
					<input class="admin-input" type="Date" value="Дата начала">
				</div>
				<div class="admin-input-box">
					<label>Дата окончания</label>
					<input class="admin-input" type="Date" value="Дата окончания">
				</div>
				<div class="admin-input-box">
					<label>Тэг</label>
					<select class="admin-input admin-input-select">
						<option value="">Тэг 1</option>
						<option value="">Тэг 2</option>
					</select>
				</div>
			</div>
		</div>
		
		<div class="admin-video-sort admin-back">
			<div class="admin-video-sort-wrap">
				<input class="admin-video-sort-check" id="admin-video-sort-check" type="checkbox">
				<label class="admin-video-check-label" for="admin-video-sort-check" id="inter_stream"><!--Выбрано 0 стримов--></label>
			</div>
			<ul class="admin-video-sort-list">
				<li class="admin-video-sort-item"><button class="admin-video-btn ">Опубликовать</button></li>
				<li class="admin-video-sort-item"><button class="admin-video-btn ">Снять с публикации</button></li>
				<li class="admin-video-sort-item"><button class="admin-video-btn " id="delete_stream_checkbox">Удалить</button></li>
				<li class="admin-video-sort-item"><button class="admin-video-btn ">Добавить к продукту</button></li>
			</ul>
		</div>
		<ul class="admin-video-list admin-video-sort" id="admin-video-list">
			<!--<li class="admin-video-item admin-back">
				<div class="admin-video-sort-wrap">
					<input id="admin-vl1" class="admin-video-sort-check" type="checkbox">
					<label class="admin-video-check-label" for="admin-vl1"></label>
				</div>
				<div class="admin-video-prev">
					<img src="img/rub2.png" alt="" class="admin-video-prev-stik">
					<p>Нет потока</p>
				</div>
				<div class="admin-video-item-header">
					<div class="admin-video-item-h-list">
						<span class="admin-video-item-h-date">09.05.2024 Волейбол Кубок Феникса Ю11 Финал г. Псков</span>
					</div>
					<div class="admin-video-item-h-hashtag">
						<span class="admin-video-hashtag-date">2023-2024</span>
						<span class="admin-video-hashtag-kubok">Кубок Феникса</span>
						<span class="admin-video-hashtag-group">Ю11</span>
						<span class="admin-video-hashtag-sport">Волейбол</span>
						<span class="admin-video-hashtag-city">Псков</span>
						<span class="admin-video-hashtag-org">ЦРСП "ФЕНИКС"</span>
					</div>
				</div>
				<div class="admin-video-item-view">
					<p class="admin-video-item-v-count"><span>1342</span>просмотра</p>
					<p class="admin-video-item-v-region">Все регионы</p>
				</div>
				<div class="admin-video-item-info admin-video-item-view">
					<p class="admin-video-item-i-time">Закончилась в<span>15:19</span></p>
					<p class="admin-video-item-i-date">09 мая 2024</p>
					<a href="#" class="admin-video-item-i-link"><img src="img/right-arrow.svg" alt="Поделиться"></a>
				</div>
			</li>
			<li class="admin-video-item admin-back">
				<div class="admin-video-sort-wrap">
					<input id="admin-vl1" class="admin-video-sort-check" type="checkbox">
					<label class="admin-video-check-label" for="admin-vl1"></label>
				</div>
				<div class="admin-video-prev">
					<img src="img/rub2.png" alt="" class="admin-video-prev-stik">
					<p>Нет потока</p>
				</div>
				<div class="admin-video-item-header">
					<div class="admin-video-item-h-list">
						<span class="admin-video-item-h-date">10.05.2024</span>
						<span class="admin-video-item-h-sport">Баскетбол</span>
						<span class="admin-video-item-h-kubok_name">Кубок Феникса</span>
						<span class="admin-video-item-h-group">Ю11</span>
						<span class="admin-video-item-h-step">Финал</span>
						<span class="admin-video-item-h-city">г. Вологда</span>
					</div>
					<div class="admin-video-item-h-hashtag">
						<span class="admin-video-hashtag-date">2023-2024</span>
						<span class="admin-video-hashtag-kubok">Кубок Феникса</span>
						<span class="admin-video-hashtag-group">Ю11</span>
						<span class="admin-video-hashtag-sport">ВБаскетбол</span>
						<span class="admin-video-hashtag-city">Вологда</span>
						<span class="admin-video-hashtag-org">ЦРСП "ФЕНИКС"</span>
					</div>
				</div>
				<div class="admin-video-item-view">
					<p class="admin-video-item-v-count"><span>1342</span>просмотра</p>
					<p class="admin-video-item-v-region">Все регионы</p>
				</div>
				<div class="admin-video-item-info admin-video-item-view">
					<p class="admin-video-item-i-time">Закончилась в<span>15:19</span></p>
					<p class="admin-video-item-i-date">09 мая 2024</p>
					<a href="#" class="admin-video-item-i-link"><img src="img/right-arrow.svg" alt="Поделиться"></a>
				</div>
			</li>-->
		</ul>
		<!--<button id="test_sell">Sell</button>-->
@endsection