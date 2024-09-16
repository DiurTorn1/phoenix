@extends('card_stream_main')
@section('title-block') Аналитика @endsection
@section('card_stream_res')
	
	<!----------------------------Стрим-контент МОНИТОРИНГ---------------------------------->
	<style type="text/css">
      button.save-st {display: none;}
	  button.non-publish {display: none;}
	  button.yes-publish {display: none;}
    </style>
	<div class="admin-content admin-content-raw"> <!------------------------- Левая панель ------------------->
		<div class="block-admin-left block-admin-left-monitor">
			
			<div class="block-admin-section">
				<div class="block-admin-container admin-back monitor-cart-min">
					<div class="admin-input-wrap">
						<span class="log-titel-min">Разрешение</span>
						<p>1920x1080</p>
					</div>
				</div>
				<div class="block-admin-container admin-back monitor-cart-min">
					<div class="admin-input-wrap">
						<span class="log-titel-min">Видео кодек</span>
						<p>Н264</p>
					</div>
				</div>
				<div class="block-admin-container admin-back monitor-cart-min">
					<div class="admin-input-wrap">
						<span class="log-titel-min">Аудио кодек</span>
						<p>ААС</p>
					</div>
				</div>
				<div class="block-admin-container admin-back monitor-cart-min">
					<div class="admin-input-wrap">
						<span class="log-titel-min">Аудио каналов</span>
						<p>2</p>
					</div>
				</div>
			</div>

			<div class="block-admin-container admin-back monitor-cart-min">
				<div class="admin-input-wrap">
					<span class="log-titel-min">Качество потока</span>
					<p>Нет информации</p>
				</div>
			</div>

			<div class="block-admin-container admin-back monitor-cart-min">
				<div class="admin-input-wrap">
					<span class="log-titel-min">Частота кадров</span>
					<p>Нет информации</p>
				</div>
			</div>

			<div class="block-admin-container admin-back monitor-cart-min">
				<div class="admin-input-wrap">
					<span class="log-titel-min">Битрейт kbit/s</span>
					<p>Нет информации</p>
				</div>
			</div>

		</div>

		<div class="block-admin-right block-admin-right-monitor"> <!--------------Правая панель ------------------>

			<div class="block-admin-container admin-back">
				<span class="admin-choose-cam">Выбрать камеру</span>
				<div class="right-heder">
					<button class="top-menu-btn save-st top-menu-btn-link">Камера 1</button>
				</div>
			</div>

			<div class="block-admin-container admin-back">
				<div class="preview-tournir-vis">
					<img src="img/ivs4.png" alt="Заставка трансляции" title="Нет трансляции">
				</div>
			</div>

			<div class="block-admin-container admin-back">
				<span class="log-titel-min">Лог событий</span>
				<p>Событие 1</p>
				<p>Событие 2</p>
				<p>Событие 3</p>
				<p>Событие 4</p>
			</div>
		
		</div>	
@endsection