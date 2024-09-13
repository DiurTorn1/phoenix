@extends('admin_panel')
@section('title-block') Доступ по регионам @endsection
@section('admin_res')
<script type="text/javascript" src = "{{ asset('js/entrypoint.js') }}"></script> 
<div class="top-menu-admin admin-back">

<div class="top-menu-head">
    <h2 class="top-menu-title">Entrypoints</h2>
    <button id="add-new-entrypoint" class="top-menu-btn">Создать entrypoint</button>
</div>

<div class="top-menu-sort block-admin-section">
    <div class="admin-input-box block-admin-input">
        <input type="text" name="Поиск" class="admin-input block-admin-input block-admin-input-key" placeholder="Найти">
        <a href="#" class="admin-video-link-renew" title="Найти">
            <img class="img-search-admin" src="img/search.png" alt="Найти">
        </a>
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
           <td class="table-one-column-70">Название</td>
           <td>Статус</td>
           <td>Создан</td>
    </tr>
    <tr class="tr-wrapper admin-video-item admin-back">
        <td class="table-one-column-check">
             <div class="admin-video-sort-wrap">
                <input id="check-promo-1" class="admin-video-sort-check" type="checkbox">
                <label class="admin-video-check-label" for="check-promo-1"></label>
            </div>
        </td>
        <th class="table-one-column-70">Васька(СПб)</th>
        <td><p class="promo-prew-admin">Оffline</p></td>
        <td>05.09.2024</td>
    </tr>
    <tr class="tr-wrapper admin-video-item admin-back">
        <td class="table-one-column-check">
             <div class="admin-video-sort-wrap">
                <input id="check-promo-1" class="admin-video-sort-check" type="checkbox">
                <label class="admin-video-check-label" for="check-promo-1"></label>
            </div>
        </td>
        <th class="table-one-column-70">НеВаська(неСПб)</th>
        <td><p class="promo-prew-admin">Оffline</p></td>
        <td>13.09.2024</td>
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

<!--------- СОЗДАТЬ ENTRYPOINT --------->
<div class="product-content-popup" id="open-create-entrypoint"> <!--------- PopUP --------->
	<div class="admin-content block-admin-left-w650 fix-position">

		<div class="header admin-header">
			<div class="left-header">
				<a href="#" class="close-btn" id="close-add-entrypoint" title="Закрыть"><img src="img/close.png" alt="Закрыть" width="24" height="24"></a>
				<h2 class="top-menu-title">Создать entrypoint</h2>
			</div>

			<div class="right-heder">
				<button class="top-menu-btn" id="save_entrypoints">Сохранить</button>
			</div>
		</div>

		<div class="top-menu-sort block-admin-section tr-wrapper-mb admin-back">
			<div class="admin-input-box block-admin-input">
				<input type="text" required="yes" title="Город" placeholder="Город *" class="admin-input block-admin-input" id="sity_entrypoints">
			</div>

            <div class="admin-input-box block-admin-input">
				<input type="text" required="yes" title="Зал" placeholder="Зал *" class="admin-input block-admin-input" id="zal_entrypoints">
			</div>

			<div class="admin-input-box block-admin-input">
				<label>Ключ потока *</label>
				<input type="text" required="yes" title="Ключ потока" placeholder="название_кубка_придумать_идентификатор" class="admin-input block-admin-input" id="key_entrypoints">
			</div>
		</div>

	</div>
</div>
@endsection   
