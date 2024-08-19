@extends('admin_panel')
@section('title-block') Продукты @endsection
@section('admin_res')
        <div class="top-menu-admin prod-mr admin-back">
			<div class="top-menu-head">
				<h2 class="top-menu-title">Продукты</h2>
				<button class="top-menu-btn" onclick="window.location.href = '/product_add';">Создать продукт</button>
			</div>

			<div class="top-menu-sort block-admin-section">
				<div class="admin-input-box admin-input-width50">
					<input type="text" name="Поиск по названию" class="admin-input block-admin-input block-admin-input-key" placeholder="Найти по названию">
					<a href="#" class="admin-video-link-renew" title="Найти по названию">
						<img class="img-search-admin" src="img/search.png" alt="ОНайти по названию">
					</a>
				</div>
				<div class="admin-input-box admin-input-width50">
					<label>Доступен в стране</label>
					<select class="admin-input admin-input-select block-admin-input">
						<option value="Шаблон 1">Россия</option>
						<option value="Шаблон 2">Казахстан</option>
					</select>
				</div>
			</div>

			<div class="top-menu-sort block-admin-section">
				<div class="admin-input-box admin-input-width25">
					<label>Дата начала</label>
					<input class="admin-input admin-input-width-date" type="Date" value="Дата окончания">
				</div>
				<div class="admin-input-box admin-input-width25">
					<label>Дата окончания</label>
					<input class="admin-input admin-input-width-date" type="Date" value="Дата окончания">
				</div>
				<div class="admin-input-box admin-input-width25">
					<label>Статус</label>
					<select class="admin-input admin-input-select  block-admin-input">
						<option value="" disabled>Выберите статус</option>
						<option value="">Все</option>
						<option value="">Активный</option>
						<option value="">Опубликован</option>
						<option value="">Не опубликован</option>
						<option value="">На модерации</option>
						<option value="">Завершённый</option>
					</select>
				</div>
				<div class="admin-input-box admin-input-width25">
					<label>Тип</label>
					<select class="admin-input admin-input-select  block-admin-input">
						<option value="" disabled>Выберите тип</option>
						<option value="">Все</option>
						<option value="">Разовый билет</option>
						<option value="">Подписка</option>
						<option value="">Донат</option>
					</select>
				</div>
			</div>
		</div>
		
		<div class="admin-video-sort prod-mr admin-back">
			<div class="admin-video-sort-wrap">
				<input class="admin-video-sort-check" id="admin-prod-sort-check" type="checkbox">
				<label class="admin-video-check-label" for="admin-prod-sort-check">Выбрано 0 продуктов</label>
			</div>
			<ul class="admin-video-sort-list">
				<li class="admin-video-sort-item"><button class="admin-video-btn">Удалить продукт</button></li><!-- При активации чекбокса кнопка становится активной (добавляется класс "video-btn-active")-->
			</ul>
		</div>

		<ul class="admin-video-list admin-video-sort prod-mr">
			@foreach($product_admin as $product)

			@endforeach
			<!--<li class="admin-video-item admin-back">
				<div class="admin-video-sort-wrap">
					<input id="admin-vl1" class="admin-video-sort-check" type="checkbox">
					<label class="admin-video-check-label" for="admin-vl1"></label>
				</div>
				<div class="admin-video-prev">
				</div>
				<div class="admin-video-item-header">
					<div class="admin-video-item-h-list">
						<span class="admin-video-item-h-date">Подписка на год</span>
					</div>
					<div class="admin-video-item-h-hashtag">
						<span class="admin-prod-hashtag">Подписка за 1000 рублей.</span>
					</div>
				</div>
				<div class="admin-video-item-view admin-prod-item-view">
					<p class="admin-video-item-v-count"><span>33</span>продано</p>
					<p class="admin-video-item-v-count"><span>0</span>возвратов</p>
					<p class="admin-video-item-v-count"><span>396</span>стримов</p>
				</div>
				<div class="admin-video-item-info admin-video-item-view">
					<p class="admin-prod-hashtag">Не опубликован</p>
				</div>
			</li>

			<li class="admin-video-item admin-back">
				<div class="admin-video-sort-wrap">
					<input id="admin-vl2" class="admin-video-sort-check" type="checkbox">
					<label class="admin-video-check-label" for="admin-vl2"></label>
				</div>
				<div class="admin-video-prev">
				</div>
				<div class="admin-video-item-header">
					<div class="admin-video-item-h-list">
						<span class="admin-video-item-h-date">Подписка на полгода</span>
					</div>
					<div class="admin-video-item-h-hashtag">
						<span class="admin-prod-hashtag">Подписка за 500 рублей.</span>
					</div>
				</div>
				<div class="admin-video-item-view admin-prod-item-view">
					<p class="admin-video-item-v-count"><span>44</span>продано</p>
					<p class="admin-video-item-v-count"><span>0</span>возвратов</p>
					<p class="admin-video-item-v-count"><span>383</span>стримов</p>
				</div>
				<div class="admin-video-item-info admin-video-item-view">
					<p class="admin-prod-hashtag">Не опубликован</p>
				</div>
			</li>-->

		</ul>

		<div class="block-admin-container soc-container admin-back">
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

@endsection