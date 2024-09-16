@extends('card_stream_main')
@section('title-block') Аналитика @endsection
@section('card_stream_res')
	<!----------------------------Стрим-контент ТРАНСЛЯЦИЯ---------------------------------->
	<script type="text/javascript" src = "{{ asset('js/broadcast_stream.js') }}"></script>
	<style type="text/css">
      button.save-st {display: none;}
    </style>
	<div class="admin-content admin-content-raw">
		<div class="block-admin-left">
			
			<div class="block-admin-container admin-back">
				<!--<div class="preview-tournir-vis">-->
					<!--<img src="img/ivs4.png" alt="Заставка трансляции" title="Нет трансляции">-->
					<iframe src="" width="100%" height="100%" frameborder="0"
    					allow="autoplay; fullscreen; picture-in-picture; encrypted-media; gyroscope; accelerometer; clipboard-write;" id="player_broadcast"></iframe>
				<!--</div>-->
			</div>

			<div class="block-admin-container admin-back soc-container">
				<div class="admin-input-wrap">
					<div class="social-list">
						<a href="#" class="social-list-item"><img src="img/telegram.png" alt="Телеграм"></a>
						<a href="#" class="social-list-item"><img src="img/whatsapp.png" alt="Whatsapp"></a>
						<a href="#" class="social-list-item"><img src="img/facebook.png" alt="Facebook"></a>
						<a href="#" class="social-list-item"><img src="img/twitter.png" alt="Twitter"></a>
					</div>
				</div>
			</div>

		</div>

		<div class="block-admin-right"> <!--------------------------------------------Правая панель ------------------>

			<div class="block-admin-container admin-back">
				<span class="admin-choose-cam">Выбрать камеру</span>
				<div class="right-heder">
					<button class="top-menu-btn save-st top-menu-btn-link">Камера 1</button>
					<button class="menu-btn-grey menu-btn-grey-link">Добавить камеру</button>
				</div>
			</div>

			<div class="block-admin-container admin-back">
				<p class="admin-text-item">1. Настройте потоковый энкодер для передачи потока</p>
				<a class="admin-link-item" href="#" target="_blank">Подробнее о настройках</a>
				<p class="admin-text-item">2. Вставьте URL-адрес потока и ключ потока в соответствующие поля вашего энкодера</p>

				<div class="admin-input-box admin-input-wrap admin-input-mb">
					<label>Entrypoint потока</label>
					<select class="admin-input admin-input-select block-admin-input" id="etrypoints_vibor">
						<option value="">Entrypoint по умолчанию</option>
					</select>
				</div>

				<div class="admin-input-box admin-input-wrap admin-input-mb">
					<label>URL-адрес потока RTMP</label>
					<input type="text" name="URL-адрес потока RTMP" class="block-admin-input admin-input" placeholder=" " id="RTMP_url_input">
					<a href="#" class="admin-video-link-copy" title="Скопировать URL">
						<img src="img/copy.png" alt="Скопировать URL">
					</a>
				</div>

				<div class="admin-input-box admin-input-wrap admin-input-mb">
					<label>Ключ потока RTMP</label>
					<input type="text" name="URL-адрес потока RTMP" class="block-admin-input admin-input block-admin-input-key" placeholder=" " id="RTMP_key_input">
					<a href="#" class="admin-video-link-renew" title="Обновить ключ">
						<img src="img/renew.png" alt="Обновить ключ">
					</a>
					<a href="#" class="admin-video-link-copy" title="Скопировать ключ">
						<img src="img/copy.png" alt="Скопировать ключ">
					</a>
				</div>

				<div class="admin-input-box admin-input-wrap admin-input-mb">
					<label>СТОП Трансляция</label>
					<input type="button" name="STOP STREAM" class="" text="STOP" id="stop_stream_btn">
				</div>

				<p class="admin-text-item">3. Начаните отправку потока с энкодера</p>
				<p class="admin-text-item">4. Нажмите СТАРТ, чтобы начать трансляцию</p>
				<p class="admin-text-item">5. Нажмите СТОП, чтобы завершить трансляцию</p>
				<p class="admin-text-item">6. После обработки запись стрима будет доступна в разделе ВИДЕО</p>

			</div>
		
		</div>	
@endsection