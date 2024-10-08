@extends('card_stream_main')
@section('title-block') Редактировать @endsection
@section('card_stream_res')
	<div class="admin-content admin-content-raw" id="admin-content">
		<div class="block-admin-left" id="block-admin-left">
			<div class="block-admin-container admin-back">
				<div class="admin-input-box admin-input-wrap">
					<label>Заголовок *</label>
					<input type="text" required name="Заголовок" class="block-admin-input admin-input" id="admin-input-main">
				</div>
				<div class="admin-input-box admin-input-wrap">
					<label>Описание</label>
					<textarea name="Описание" class="block-admin-input respons-input admin-input"></textarea>
				</div>
				<div class="admin-input-box admin-input-wrap">
					<textarea name="Описание для премиум клиентов" class="block-admin-prem-input block-admin-input admin-input">Описание для премиум клиентов</textarea>
				</div>
			</div>

			<div class="block-admin-container admin-back">
				<div class="block-admin-section">
					<div class="block-admin-sector block-admin-container block-admin-section-item">
						<div class="admin-input-box admin-input-wrap">
							<label>Начало трансляции</label>
							<input type="datetime-local" name="Начало трансляции" class="block-admin-input 		admin-input" placeholder="01 Января 2000 в 00:00" id="ditetime_card_start_at">
						</div>
						<div class="admin-input-box admin-input-wrap">
							<label>Дата публикации плеера</label>
							<input type="datetime-local" name="Начало трансляции" class="block-admin-input 		admin-input" placeholder="01 Января 2000 в 00:00" id="ditetime_card_public_at">
						</div>
					</div>
					<div class="block-admin-sector block-admin-container block-admin-section-item">
						<a href="#" class="add-preview-tournir" title="Загрузить обложку турнира"><img src="{{ asset('img/ivs4.png') }}" alt="Обложка турнира" id="img_poster_card"></a>
						<div class="edit-preview-tournir" id="banners_turnir">
							<a class="remove-preview-tournir" title="Удалить обложку" id="img_banner_trash"><img src="{{ asset('img/trash.png') }}" alt="Удалить обложку"></a>
						</div>
					</div>	
				</div>
			</div>

			<div class="block-admin-container admin-back">
				<div class="admin-input-box admin-input-wrap">
					<label>Шаблон для доступа региона</label>
					<select class="admin-input admin-input-select block-admin-input" id="card_region_select">
						<option value="Все регионы">Все регионы</option>
					</select>
				</div>
				<div class="admin-input-box admin-input-wrap">
					<label>Сезон</label>
					<input type="text" name="Начало трансляции" class="block-admin-input 		admin-input" placeholder=" " id="admin_card_season">
				</div>
				<div class="admin-input-box admin-input-wrap">
					<label>Турнир</label>
					<input type="text" name="Начало трансляции" class="block-admin-input 		admin-input" placeholder=" " id="admin_card_turnir">
				</div>
				<div class="admin-input-box admin-input-wrap">
					<label>Возраст</label>
					<!--<input type="text" name="Начало трансляции" class="block-admin-input 		admin-input" placeholder=" " id="admin_card_weigth">-->
					<select class="admin-input admin-input-select block-admin-input" id="admin_card_weigth">
						<option value="Д10">Д10</option>
						<option value="Ю10">Ю10</option>
						<option value="Д11">Д11</option>
						<option value="Ю11">Ю11</option>
						<option value="Д12">Д12</option>
						<option value="Ю12">Ю12</option>
						<option value="Д13">Д13</option>
						<option value="Ю13">Ю13</option>
						<option value="Д14">Д14</option>
						<option value="Ю14">Ю14</option>
					</select>
				</div>
				<div class="admin-input-box admin-input-wrap">
					<label>Добавить к продукту</label>
					<!--<input type="text" name="Начало трансляции" class="block-admin-input 		admin-input" placeholder=" " id="admin_card_product">-->
						<select class="admin-input admin-input-select block-admin-input" id="admin_card_product">

						</select>
				</div>
				<!--<div class="admin-input-box admin-input-wrap">
					<label>Добавить к entrypoint</label>
					<input type="text" name="Начало трансляции" class="block-admin-input 		admin-input" placeholder=" " id="admin_card_product">
						<select class="admin-input admin-input-select block-admin-input" id="admin_card_entrypoint">

						</select>
				</div>-->
			</div>

			<div class="block-admin-container admin-back">
				<div class="block-admin-section">
					<div class="block-admin-sector block-admin-container block-admin-section-item">
						<div class="admin-input-box admin-input-wrap">
							<label>Вид спорта</label>
							<select class="admin-input admin-input-select block-admin-input" id="admin_card_vidsporta">
								<option value="Баскетбол">Баскетбол</option>
								<option value="Волейбол">Волейбол</option>
							</select>
						</div>
					</div>
					<div class="block-admin-sector block-admin-container block-admin-section-item">
						<div class="admin-input-box admin-input-wrap">
							<label>Задержка сигнала</label>
							<select class="admin-input admin-input-select block-admin-input" id="admin_card_minframe">
								<option value="">Минимальная (10-15 секунд)</option>
								<option value="">Стандартная (20-25 секунд)</option>
							</select>
						</div>
					</div>
					<div class="admin-input-box admin-input-wrap">
						<label>Авто воспроизведение видео</label>
						<input type="checkbox" name="Начало трансляции" class="block-admin-input 		admin-input" id="autoplay_video_ch">
					</div>
					<div class="admin-input-box admin-input-wrap">
						<label>Чат в видео</label>
						<input type="checkbox" name="Начало трансляции" class="block-admin-input 		admin-input" id="chat_video_ch">
					</div>
				</div>
			</div>

		</div>

		<div class="block-admin-right"> <!--------------------------------------------Правая панель ------------------>

			<div class="preview-tournir-vis" id="player_stream_card">
				<!--<img src="https://nextcloud.tehnodir.ru/index.php/apps/files_sharing/publicpreview/3M57JCrBwTz7tq8?file=/&fileId=1983&x=1920&y=1080&a=true&etag=cbe2366c226f3374946830bd6d5fac9b" alt="Заставка трансляции" title="Нет трансляции">-->
				<iframe src="" width="100%" height="100%" frameborder="0" allow="autoplay; fullscreen; picture-in-picture; encrypted-media; gyroscope; accelerometer; clipboard-write;" id="player_stream_card_link"></iframe>
			</div>

			<div class="block-admin-container admin-back">
				<div class="admin-input-wrap">
					<div class="social-list">
						<a href="#" class="social-list-item"><img src="img/telegram.png" alt="Телеграм"></a>
						<a href="#" class="social-list-item"><img src="img/whatsapp.png" alt="Whatsapp"></a>
						<a href="#" class="social-list-item"><img src="img/facebook.png" alt="Facebook"></a>
						<a href="#" class="social-list-item"><img src="img/twitter.png" alt="Twitter"></a>
					</div>
				</div>
				<div class="admin-input-box admin-input-wrap">
					<label>Ссылка на трасляцию</label>
					<input type="text" name="Ссылка на трасляцию" class="block-admin-input admin-input" placeholder=" " id="card_link_play">
					<a href="#" class="admin-video-link-stream" title="Перейти">
						<img src="img/right-arrow.svg" alt="Перейти">
					</a>
					<a href="#" class="admin-video-link-copy"  id="copy_serch_link" title="Скопировать ссылку">
						<img src="img/copy.png" alt="Скопировать ссылку">
					</a>
				</div>
				<div class="admin-input-box admin-input-wrap">
					<label>Код для вставки на сайт</label>
					<input type="text" name="Код для вставки на сайт" class="block-admin-input admin-input" placeholder=" ">
					<a href="#" class="admin-video-link-stream" title="Перейти">
						<img src="img/right-arrow.svg" alt="Перейти">
					</a>
					<a href="#" class="admin-video-link-copy" title="Скопировать ссылку">
						<img src="img/copy.png" alt="Скопировать ссылку">
					</a>
				</div>
			</div>

		</div>
		
	</div>	

@endsection