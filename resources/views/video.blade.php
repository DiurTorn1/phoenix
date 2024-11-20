@extends('admin_panel')
@section('title-block') Стримы @endsection
@section('admin_res')
<script type="text/javascript" src = "{{ asset('js/video.js') }}"></script> 
<div class="top-menu-admin admin-back">
			<div class="top-menu-head">
				<h2 class="top-menu-title">Видео</h2>
				<button class="top-menu-btn" onclick="window.location.href = '/video_add';">Добавить видео</button>
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
				<label class="admin-video-check-label" for="admin-video-sort-check" id="inter_stream"></label>
			</div>
			<ul class="admin-video-sort-list">
			<li class="admin-video-sort-item"><button class="admin-video-btn1 " id="public_stream_checkbox">Опубликовать</button></li>
				<li class="admin-video-sort-item"><button class="admin-video-btn2 " id="unpublic_stream_checkbox">Снять с публикации</button></li>
				<li class="admin-video-sort-item"><button class="admin-video-btn3 " id="delete_stream_checkbox">Удалить</button></li>
				<li class="admin-video-sort-item"><button class="admin-video-btn4 " id="add_product_stream_checkbox">Добавить к продукту</button></li>
				<li class="admin-video-sort-item"><button class="admin-video-btn">Добавить к коллекции</button></li>
			</ul>
		</div>

		<ul class="admin-video-list admin-video-sort" id="admin-video-list-ct">

		</ul>

		<div class="block-admin-container soc-container marg-r-0 admin-back">
			<div class="restrem-manage-wrapper">
				<p>Строк на странице:</p>
				<select class="admin-input admin-input-select restream-select">
					<option value="">10</option>
					<option value="">20</option>
				</select>
				<button class="restream-select-btn" title="Назад" id="bottom_list_stream">‹</button>
				<span id="span_select_list"></span>
				<p>из</p>
				<span id="span_select_list_all"></span>
				<button class="restream-select-btn" title="Вперед" id="next_list_stream">›</button>
		</div>
</div>

@endsection