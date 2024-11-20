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
				<li class="admin-video-sort-item"><button class="admin-video-btn1 " id="public_stream_checkbox">Опубликовать</button></li>
				<li class="admin-video-sort-item"><button class="admin-video-btn2 " id="unpublic_stream_checkbox">Снять с публикации</button></li>
				<li class="admin-video-sort-item"><button class="admin-video-btn3 " id="delete_stream_checkbox">Удалить</button></li>
				<li class="admin-video-sort-item"><button class="admin-video-btn4 " id="add_product_stream_checkbox">Добавить к продукту</button></li>
			</ul>
		</div>
		<ul class="admin-video-list admin-video-sort" id="admin-video-list">

		</ul>
		<div class="block-admin-container soc-container admin-back" id="block_select_stream_list">
			<div class="restrem-manage-wrapper">
				<p>Строк на странице:</p>
				<select class="admin-input admin-input-select restream-select" id="select_count_stream">
					<option value="">10</option>
					<option value="">15</option>
					<option value="">20</option>
				</select>
				<span id="span_select_list"></span>
				<p>из</p>
				<span id="span_select_list_all"></span>
				<button class="restream-select-btn" title="Назад" id="bottom_list_stream">‹</button>
				<button class="restream-select-btn" title="Вперед" id="next_list_stream">›</button>
			</div>
		</div>
		<!--<button id="test_sell">Sell</button>-->

<div class="product-content-popup" id="window_ok"> <!--------- PopUP --------->
	<div class="admin-content block-admin-left-w650 fix-position">

		<div class="header admin-header">
			<div class="left-header">
				<a href="#" class="close-btn" id="close-window" title="Закрыть"><img src="img/close.png" alt="Закрыть" width="24" height="24"></a>
				<!--<h2 class="top-menu-title">Создать промокод</h2>-->
			</div>
		</div>
		<div class="admin-back">
			<h3 id="aler_window"></h3>
			<h3 id="aler_window1"></h3>
			<h3 id="aler_window2"></h3>
			<!--<div class="top-menu-sort block-admin-section">
				<div class="admin-input-box block-admin-input">
					<label>Продукт</label>
					<select class="admin-input admin-input-select block-admin-input" id="product_promocode">
						<option value="">Продукт не выбран</option>
					</select>
				</div>
			</div>

			<div class="top-menu-sort block-admin-section pb-none">
				<p>Срок действия:</p>
			</div>
			
			<div class="top-menu-sort block-admin-section">
				<div class="admin-input-box admin-input-width50">
					<label>Действует с *</label>
					<input class="admin-input admin-input-width-date" required type="datetime-local" title="Дата начала действия промокода" id="datetime_start">
				</div>

				<div class="admin-input-box admin-input-width50">
					<label>Действует до</label>
					<input class="admin-input admin-input-width-date" required type="datetime-local" title="Дата окончания действи промокода" id="datetime_stop">
				</div>
			</div>-->
			<div class="right-heder" id="div_button_window">
				<button class="top-menu-btn" id="button_window_OK">OK</button>
			</div>
		</div>

	</div>

</div>
<div class="product-add-popup" id="window_product_pre"> <!--------- PopUP --------->
	<div class="admin-content block-admin-left-w650 fix-position">

		<div class="header admin-header">
			<div class="left-header">
				<a href="#" class="close-btn" id="close-window-prod" title="Закрыть"><img src="img/close.png" alt="Закрыть" width="24" height="24"></a>
				<!--<h2 class="top-menu-title">Создать промокод</h2>-->
			</div>
		</div>
		<div class="admin-back">
			<h3 id="aler_window_prod"></h3>
		</div>
		
		<div class="admin-back" id="product_list_add">
			
		</div>

	</div>

</div>
@endsection