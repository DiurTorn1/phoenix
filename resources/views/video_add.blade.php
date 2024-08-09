@extends('admin_panel')
@section('title-block') Стримы @endsection
@section('admin_res')
<header class="header admin-header">
<script src="{{ asset('js/video_add.js') }}"></script>
		<div class="left-header">
			<a href="#" class="close-btn" title="Закрыть"><img src="img/close.png" alt="Закрыть" width="24" height="24"></a>
			<h2 class="top-menu-title">Добавить видео</h2>
		</div>

		<div class="right-heder">
			<button class="menu-btn-grey save-st">Публиковать</button><!-- Когда все поля заполнены добавляем класс "menu-btn-grey-active" -->
			<button class="menu-btn-grey">Сохранить</button><!-- Когда все поля заполнены добавляем класс "menu-btn-grey-active" -->
		</div>
</header>
<div class="admin-content block-admin-left-w1080">
		<div class="top-menu-admin admin-video-sort admin-back">
			<div class="admin-input-box admin-input-wrap">
				<label>Заголовок *</label>
				<input type="text" required name="Заголовок" class="block-admin-input admin-input">
			</div>

			<div class="admin-input-box admin-input-wrap admin-input-mb">
				<input type="text" name="Описание" placeholder="Введите описание видео" class="block-admin-input admin-input">
			</div>
		</div>

		<div class="top-menu-admin admin-video-sort admin-back">
			<div class="block-admin-section admin-input-mb">
				<div class="admin-input-width50">
					<a href="#" class="preview-product-vis-upload admin-input-mb min-h-58_5" title="Загрузить файл" ></a>
					<input type="text" name="Ссылка на видео" placeholder="Ссылка на видео (FTP, HTTP)" class="block-admin-input admin-input">
				</div>

				<div class="admin-input-width50">
					<a href="#" class="preview-product-vis-upload">
						<p>Превью</p>
					</a>
				</div>
			</div>
		</div>

		<div class="top-menu-admin admin-video-sort admin-back">

			<div class="admin-input-box block-admin-input admin-input-mb">
				<label>Доступен в странах</label>
				<select class="admin-input admin-input-select block-admin-input">
					<option value="">Только Россия (RUB)</option>
					<option value="">Только Казахстан (KZT)</option>
					<option value="">Только Беларусь (BYN)</option>
				</select>
			</div>

			<div class="admin-input-box admin-input-wrap admin-input-mb"> <!-- Здесь идут какие-то теги типа: Сезон, Турнир, Возраст. Как-то видимо это делается -->
				<label>Какие-то теги</label>
				<select class="admin-input admin-input-select block-admin-input">
					<option value="">Пока Не понятно как реализовывать</option>
					<option value="">Тестовый</option>
				</select>
			</div>

			<div class="admin-input-box block-admin-input">
				<label>Продукт</label>
				<select class="admin-input admin-input-select block-admin-input">
					<option value="">Тестовый продукт 1</option>
					<option value="">Тестовый продукт номер 2</option>
				</select>
			</div>
		</div>
	
		<div class="top-menu-admin admin-video-sort admin-back">
			<div class="block-admin-section admin-input-mb">
				<div class="admin-input-box admin-input-width50">
					<label>Дата публикации плеера</label>
					<input class="admin-input" type="datetime-local" title="Дата публикации плеера">
				</div>

				<div class="admin-input-box admin-input-width50">
					<label>Дата доступа к контенту</label>
					<input class="admin-input" type="datetime-local" title="Дата доступа к контенту (видео)">
				</div>
			</div>
			<div class="block-admin-section admin-input-mb">
				<div class="admin-input-box admin-input-width50">
					<label>Вид спорта</label>
					<select class="admin-input admin-input-select block-admin-input">
						<option value="Баскетбол">Баскетбол</option>
						<option value="Волейбол">Волейбол</option>
					</select>
				</div>
			</div>
		</div>

	</div>

@endsection