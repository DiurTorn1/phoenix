@extends('admin_panel')
@section('title-block') Стримы @endsection
@section('admin_res')
<script type="text/javascript" src = "{{ asset('js/video.js') }}"></script> 
<div class="res-video-text" id="res-video-text">
<div class="top-menu-admin admin-back">
			<div class="top-menu-head">
				<h2 class="top-menu-title">Видео</h2>
				<button class="top-menu-btn">Добавить видео</button>
			</div>
			<div class="top-menu-sort">
				<div class="admin-input-box">
					<label>Вид спорта</label>
					<select class="admin-input admin-input-select">
						<option value="Баскетбол">Баскетбол</option>
						<option value="Волейбол">Волейбол</option>
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
				<label class="admin-video-check-label" for="admin-video-sort-check">Выбрано 0 видео</label>
			</div>
			<ul class="admin-video-sort-list">
				<li class="admin-video-sort-item"><button class="admin-video-btn video-btn-active">Публиковать</button></li> <!-- когда активен чекбокс -->
				<li class="admin-video-sort-item"><button class="admin-video-btn">Снять с публикации</button></li>
				<li class="admin-video-sort-item"><button class="admin-video-btn">Удалить</button></li>
				<li class="admin-video-sort-item"><button class="admin-video-btn">Добавить к продукту</button></li>
				<li class="admin-video-sort-item"><button class="admin-video-btn">Добавить к коллекции</button></li>
			</ul>
		</div>

		<ul class="admin-video-list admin-video-sort">
			<li class="admin-video-item admin-back">
				<div class="admin-video-sort-wrap">
					<input id="admin-vl1" class="admin-video-sort-check" type="checkbox">
					<label class="admin-video-check-label" for="admin-vl1"></label>
				</div>
				<div class="admin-video-prev">
					<img src="img/rub2.png" alt="" class="admin-video-prev-stik">
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
					<p class="admin-video-item-v-count"><span>0</span>просмотров</p>
					<p class="admin-video-item-v-region">Все регионы</p>
				</div>
				<div class="admin-video-item-info admin-video-item-view">
					<p class="admin-video-item-i-time">Не опубликовано</p>
				</div>
			</li>

			<li class="admin-video-item admin-back">
				<div class="admin-video-sort-wrap">
					<input id="admin-vl-2" class="admin-video-sort-check" type="checkbox">
					<label class="admin-video-check-label" for="admin-vl-2"></label>
				</div>
				<div class="admin-video-prev">
					<img src="img/rub2.png" alt="" class="admin-video-prev-stik">
				</div>
				<div class="admin-video-item-header">
					<div class="admin-video-item-h-list">
						<span class="admin-video-item-h-date">09.05.2024 Баскетбол Кубок Феникса Ю11 Финал г. Вологда</span>
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
					<p class="admin-video-item-v-count"><span>0</span>просмотров</p>
					<p class="admin-video-item-v-region">Все регионы</p>
				</div>
				<div class="admin-video-item-info admin-video-item-view">
					<p class="admin-video-item-i-time">Не опубликовано</p>
				</div>
			</li>
		</ul>

		<div class="block-admin-container soc-container marg-r-0 admin-back">
			<div class="restrem-manage-wrapper">
				<p>Строк на странице:</p>
				<select class="admin-input admin-input-select restream-select">
					<option value="">10</option>
					<option value="">20</option>
				</select>
				<span>1-2</span>
				<p>из</p>
				<span>2</span>
				<button class="restream-select-btn" title="Назад">‹</button>
				<button class="restream-select-btn" title="Вперед">›</button>
			</div>
		</div>
</div>

@endsection