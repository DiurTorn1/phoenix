@extends('admin_panel')
@section('title-block') Пользователи @endsection
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
							<input type="text" name="Начало трансляции" class="block-admin-input 		admin-input" placeholder="09 Мая в 08:45">
						</div>
						<div class="admin-input-box admin-input-wrap">
							<label>Дата публикации плеера</label>
							<input type="text" name="Начало трансляции" class="block-admin-input 		admin-input" placeholder="04 Мая в 18:50">
						</div>
					</div>
					<div class="block-admin-sector block-admin-container block-admin-section-item">
						<a href="#" class="add-preview-tournir" title="Загрузиь обложку турнира"><img src="{{ asset('img/ivs4.png') }}" alt="Обложка турнира"></a>
						<div class="edit-preview-tournir">
							<a href="#" class="remove-preview-tournir" title="Удалить обложку"><img src="{{ asset('img/trash.png') }}" alt="Удалить обложку"></a>
						</div>
					</div>	
				</div>
			</div>

			<div class="block-admin-container admin-back">
				<div class="admin-input-box admin-input-wrap">
					<label>Шаблон для доступа региона</label>
					<select class="admin-input admin-input-select block-admin-input">
						<option value="Шаблон 1">Шаблон 1</option>
						<option value="Шаблон 2">Шаблон 2</option>
					</select>
				</div>
				<div class="admin-input-box admin-input-wrap">
					<label>Сезон</label>
					<input type="text" name="Начало трансляции" class="block-admin-input 		admin-input" placeholder=" ">
				</div>
				<div class="admin-input-box admin-input-wrap">
					<label>Турнир</label>
					<input type="text" name="Начало трансляции" class="block-admin-input 		admin-input" placeholder=" ">
				</div>
				<div class="admin-input-box admin-input-wrap">
					<label>Возраст</label>
					<input type="text" name="Начало трансляции" class="block-admin-input 		admin-input" placeholder=" ">
				</div>
				<div class="admin-input-box admin-input-wrap">
					<label>Добавить к продукту</label>
					<input type="text" name="Начало трансляции" class="block-admin-input 		admin-input" placeholder=" ">
				</div>
			</div>

			<div class="block-admin-container admin-back">
				<div class="block-admin-section">
					<div class="block-admin-sector block-admin-container block-admin-section-item">
						<div class="admin-input-box admin-input-wrap">
							<label>Вид спорта</label>
							<select class="admin-input admin-input-select block-admin-input">
								<option value="Баскетбол">Баскетбол</option>
								<option value="Волейбол">Волейбол</option>
							</select>
						</div>
					</div>
					<div class="block-admin-sector block-admin-container block-admin-section-item">
						<div class="admin-input-box admin-input-wrap">
							<label>Задержка сигнала</label>
							<select class="admin-input admin-input-select block-admin-input">
								<option value="">Минимальная (10-15 секунд)</option>
								<option value="">Стандартная (20-25 секунд)</option>
							</select>
						</div>
					</div>
				</div>
			</div>

		</div>

		<div class="block-admin-right"> <!--------------------------------------------Правая панель ------------------>

			<div class="preview-tournir-vis">
				<img src="img/ivs4.png" alt="Заставка трансляции" title="Нет трансляции">
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
					<input type="text" name="Ссылка на трасляцию" class="block-admin-input admin-input" placeholder=" ">
					<a href="#" class="admin-video-link-stream" title="Перейти">
						<img src="img/right-arrow.svg" alt="Перейти">
					</a>
					<a href="#" class="admin-video-link-copy" title="Скопировать ссылку">
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