@extends('admin_panel')
@section('title-block') Стримы @endsection
@section('admin_res')
<script type="text/javascript" src = "{{ asset('js/tags.js') }}"></script>
        <div class="top-menu-admin admin-back">

			<div class="top-menu-head">
				<h2 class="top-menu-title">Теги</h2>
				<button id="add-new-tag" class="top-menu-btn">Создать тег</button>
			</div>

			<div class="top-menu-sort block-admin-section">
				<div class="admin-input-box admin-input-width50">
					<input type="text" name="Поиск по названию" class="admin-input block-admin-input block-admin-input-key" placeholder="Найти по названию">
					<a href="#" class="admin-video-link-renew" title="Найти">
						<img class="img-search-admin" src="img/search.png" alt="Найти">
					</a>
				</div>
				<div class="admin-input-box admin-input-width50">
					<select class="admin-input admin-input-select block-admin-input">
						<option value="">Тип тега</option>
						<option value="">Сезон</option>
						<option value="">Турнир</option>
						<option value="">Возраст</option>
						<option value="">Этап</option>
					</select>
				</div>
			</div>

		</div>
		
		<table>
			<tbody class="tbody-wrapper">
			 	<tr class="tr-wrapper admin-video-item admin-back">

			 		<td class="table-one-column-check">
			 			<div class="admin-video-sort-wrap">
							<input id="all-check-promo" class="admin-video-sort-check" type="checkbox">
							<label class="admin-video-check-label" for="all-check-promo"></label>
						</div>
					</td>
			   		<td class="table-one-column">Название</td>
			   		<td>Тип</td>
			   		<td>Видео</td>
			   		<td>Стримы</td>
			   		<td>Коллекции</td>
			   		<td>Просмотров</td>
			   		<td>Создан</td>
				</tr>
				<tr class="tr-wrapper admin-video-item admin-back">
					<td class="table-one-column-check">
			 			<div class="admin-video-sort-wrap">
							<input id="check-promo-1" class="admin-video-sort-check" type="checkbox">
							<label class="admin-video-check-label" for="check-promo-1"></label>
						</div>
					</td>
			    	<th class="table-one-column">Псков</th>
			    	<td><p class="promo-prew-admin">Этап</p></td>
			    	<td>5</td>
			    	<td>0</td>
			    	<td>0</td>
			    	<td>1245</td>
			    	<td>05.09.2024</td>
				</tr>
				<tr class="tr-wrapper admin-video-item admin-back">
					<td class="table-one-column-check">
			 			<div class="admin-video-sort-wrap">
							<input id="check-promo-1" class="admin-video-sort-check" type="checkbox">
							<label class="admin-video-check-label" for="check-promo-1"></label>
						</div>
					</td>
			    	<th class="table-one-column">Волейбол</th>
			    	<td><p class="promo-prew-admin">Турнир</p></td>
			    	<td>11</td>
			    	<td>5</td>
			    	<td>0</td>
			    	<td>125</td>
			    	<td>10.09.2024</td>
				</tr>
			</tbody>
		</table>

		<div class="block-admin-container mr-none soc-container admin-back">
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