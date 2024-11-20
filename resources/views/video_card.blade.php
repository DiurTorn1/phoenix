@extends('admin_panel')
@section('title-block') Стримы @endsection
@section('admin_res')
<header class="header admin-header">
		<div class="left-header">
			<a href="/video" class="close-btn" title="Закрыть"><img src="img/close.png" alt="Закрыть" width="24" height="24"></a>
			<h2 class="top-menu-title">Добавить видео</h2>
		</div>

		<div class="right-heder">
            <button class="top-menu-btn save-st" id="upload_stream">Сохранить</button>
			<button class="top-menu-btn non-publish" id="unpublic_stream">Отменить публикацию</button>
			<button class="top-menu-btn yes-publish" id="public_stream">Опубликовать</button>
			<!-- <button class="menu-btn-grey save-st menu-btn-grey-active">Опубликовать</button> Когда все поля заполнены добавляем класс "menu-btn-grey-active" -->
			<!-- <button class="menu-btn-grey menu-btn-grey-active">Сохранить</button> Когда все поля заполнены добавляем класс "menu-btn-grey-active" -->
		</div>
</header>
<div class="admin-content block-admin-left-w1080">
		<div class="top-menu-admin admin-video-sort admin-back">
			<div class="admin-input-box admin-input-wrap">
				<label>Заголовок *</label>
				<input type="text" required name="Заголовок" id="video_name" class="block-admin-input admin-input">
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
					<a href="#" class="add-preview-tournir" title="Загрузить обложку турнира"><img src="{{ asset('img/ivs4.png') }}" alt="Обложка турнира" id="img_poster_card"></a>
					<div class="edit-preview-tournir" id="banners_turnir">
						<a class="remove-preview-tournir" title="Удалить обложку" id="img_banner_trash"><img src="{{ asset('img/trash.png') }}" alt="Удалить обложку"></a>
					</div>
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

			<div class="admin-input-box admin-input-wrap">
				<label>Добавить к продукту</label>
				<!--<input type="text" name="Начало трансляции" class="block-admin-input 		admin-input" placeholder=" " id="admin_card_product">-->
					<select class="admin-input admin-input-select block-admin-input" id="admin_card_product">
						<option value="Не добавлять к продукту">Не добавлять к продукту</option>
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
    <script src="{{ asset('js/video_card.js') }}"></script>
@endsection