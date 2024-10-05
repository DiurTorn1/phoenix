@extends('abonent_panel')
@section('title-block') Стримы @endsection
@section('abonent_res')
<script type="text/javascript" src = "{{ asset('js/get_abonent_stream.js') }}"></script> 
<div class="top-menu-admin admin-back">
			<div class="top-menu-head">
				<h2 class="top-menu-title">Стримы</h2>
				<button class="top-menu-btn" onclick="window.location.href = '/abonent_create_stream';">Создать стрим</button>
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
				<li class="admin-video-sort-item"><button class="admin-video-btn1 ">Опубликовать</button></li>
				<li class="admin-video-sort-item"><button class="admin-video-btn2 ">Снять с публикации</button></li>
				<li class="admin-video-sort-item"><button class="admin-video-btn3 " id="delete_stream_checkbox">Удалить</button></li>
				<li class="admin-video-sort-item"><button class="admin-video-btn4 ">Добавить к продукту</button></li>
			</ul>
		</div>
		<ul class="admin-video-list admin-video-sort" id="admin-video-list">

		</ul>
		<div class="block-admin-container soc-container admin-back" id="block_select_stream_list">
			<div class="restrem-manage-wrapper">
				<p>Строк на странице:</p>
				<select class="admin-input admin-input-select restream-select">
					<option value="">5</option>
				</select>
				<span id="span_select_list"></span>
				<p>из</p>
				<span id="span_select_list_all"></span>
				<button class="restream-select-btn" title="Назад" id="bottom_list_stream">‹</button>
				<button class="restream-select-btn" title="Вперед" id="next_list_stream">›</button>
			</div>
		</div>
		<!--<button id="test_sell">Sell</button>-->
@endsection