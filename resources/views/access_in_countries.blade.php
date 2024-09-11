@extends('admin_panel')
@section('title-block') Доступ по регионам @endsection
@section('admin_res')
<script type="text/javascript" src = "{{ asset('js/access_in_countries.js') }}"></script> 
<div class="top-menu-admin admin-back">

<div class="top-menu-head">
    <h2 class="top-menu-title">Шаблоны доступа к странам</h2>
    <button id="add-new-access_in_count" class="top-menu-btn">Создать шаблон</button>
</div>

<div class="top-menu-sort block-admin-section">
    <div class="admin-input-box block-admin-input">
        <label>Шаблон по умолчанию</label>
        <select class="admin-input admin-input-select block-admin-input">
            <option value="">Все страны</option>
            <option value="">Только страны еврозоны использующие Евро</option>
            <option value="">Весь мир кроме EU, РФ и Казахстан (Для оплаты в USD)</option>
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
           <td class="table-one-column admin-video-btn">Название</td>
           <td class="admin-video-btn">Содержание</td>
           <td class="table-one-column admin-video-btn">Страны</td>
           <td class="admin-video-btn">Создан</td>
    </tr>
    <tr class="tr-wrapper admin-video-item admin-back">
        <td class="table-one-column-check">
             <div class="admin-video-sort-wrap">
                <input id="check-promo-1" class="admin-video-sort-check" type="checkbox">
                <label class="admin-video-check-label" for="check-promo-1"></label>
            </div>
        </td>
        <td class="table-one-column">Все страны</td>
        <td>0</td>
        <td class="table-one-column access-country-content"><span class="access-country-content-title">Разрешить просмотр в:</span>Все страны</td>
        <td>05.09.2024</td>
    </tr>
    <tr class="tr-wrapper admin-video-item admin-back">
        <td class="table-one-column-check">
             <div class="admin-video-sort-wrap">
                <input id="check-promo-1" class="admin-video-sort-check" type="checkbox">
                <label class="admin-video-check-label" for="check-promo-1"></label>
            </div>
        </td>
        <td class="table-one-column">Только страны еврозоны использующие Евро</td>
        <td>5</td>
        <td class="table-one-column access-country-content"><span class="access-country-content-title">Разрешить просмотр в:</span> Австрия, Болгария, Венгрия, Германия, Польша, Франция, Испания, Португалия</td>
        <td>05.09.2024</td>
    </tr>
    <tr class="tr-wrapper admin-video-item admin-back">
        <td class="table-one-column-check">
             <div class="admin-video-sort-wrap">
                <input id="check-promo-1" class="admin-video-sort-check" type="checkbox">
                <label class="admin-video-check-label" for="check-promo-1"></label>
            </div>
        </td>
        <td class="table-one-column">Весь мир кроме EU, РФ и Казахстан (Для оплаты в USD)</td>
        <td>14</td>
        <td class="table-one-column access-country-content"><span class="access-country-content-title">Запретить просмотр в:</span> Австрия, Болгария, Венгрия, Германия, Польша, Франция, Испания, Португалия</td>
        <td>05.09.2024</td>
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

<!--------- СОЗДАТЬ --------->
<div class="product-content-popup" id="open-create-access_in_count"> <!--------- PopUP --------->
	<div class="admin-content block-admin-left-w650 fix-position">

		<div class="header admin-header">
			<div class="left-header">
				<a href="#" class="close-btn" id="close-add-access_in_count" title="Закрыть"><img src="img/close.png" alt="Закрыть" width="24" height="24"></a>
				<h2 class="top-menu-title">Создать шаблон</h2>
			</div>

			<div class="right-heder">
				<button class="top-menu-btn">Сохранить</button>
			</div>
		</div>

		<div class="top-menu-sort block-admin-section tr-wrapper-mb admin-back">
			<div class="admin-input-box block-admin-input">
				<input type="text" required="yes" title="Название" placeholder="Название *" class="admin-input block-admin-input">
			</div>

			<div class="admin-input-box block-admin-input">
				<label>Тип доступа к странам *</label>
				<select required="yes" class="admin-input admin-input-select block-admin-input">
					<option value="">Разрешить просмотр во всех странах</option>
					<option value="">Разрешить просмотр в выбранных странах</option>
					<option value="">Запретить просмотр в выбранных странах</option>
				</select>
			</div>

			<div class="admin-input-box block-admin-input"> <!-- Как я понял, этот блок появляется при выборе 2 или 3 пункта в блоке выше -->
				<label>Страны *</label>
				<select class="admin-input admin-input-select block-admin-input">
					<option value="">Россия</option>
					<option value="">Урарту</option>
					<option value="">Бангладеш</option>
				</select>
			</div>
		</div>

	</div>
</div>
@endsection   