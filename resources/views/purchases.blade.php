@extends('admin_panel')
@section('title-block') Покупки @endsection
@section('admin_res')
<script type="text/javascript" src = "{{ asset('js/purchases.js') }}"></script> 
<div class="top-menu-admin admin-back">

<div class="top-menu-head">
    <h2 class="top-menu-title">Покупки</h2>
    <div class="right-heder">
        <a href="#" id="close-paid-sort" class="close-btn marg-r-1r" title="Скрыть фильтры"><img src="img/close.png" alt="Закрыть" width="24" height="24"></a>
        <a href="#" id="open-paid-sort" class="close-btn marg-r-1r add-price-show" title="Открыть фильтры"><img src="img/menu-min.png" alt="Закрыть" width="24" height="24"></a>
        <button id="add-new-tag" class="top-menu-btn">Скачать</button>
    </div>
</div>

<div id="paid-sort" class="top-menu-sort block-admin-section paid-sort-none"><!-- Блок с фильтрами (Открывается/Закрывается) Скрипт работает -->
    <div class="admin-input-box admin-input-width50">
        <label>Начало периода</label>
        <input type="date" name="" class="admin-input block-admin-input">
    </div>
    <div class="admin-input-box admin-input-width50">
        <label>Конец периода</label>
        <input type="date" name="" class="admin-input block-admin-input">
    </div>
    <div class="admin-input-box admin-input-width50">
        <select class="admin-input admin-input-select block-admin-input">
            <option value="">Промокод</option>
            <option value="">Промокод</option>
            <option value="">Промокод</option>
        </select>
    </div>
    <div class="admin-input-box admin-input-width50">
        <select class="admin-input admin-input-select block-admin-input">
            <option value="">Тип продукта</option>
            <option value="">Билет</option>
            <option value="">Подписка</option>
        </select>
    </div>
    <div class="admin-input-box admin-input-width50">
        <select class="admin-input admin-input-select block-admin-input">
            <option value="">Поставщик</option>
            <option value="">ROBOKASSA</option>
        </select>
    </div>
    <div class="admin-input-box admin-input-width50">
        <select class="admin-input admin-input-select block-admin-input">
            <option value="">Валюта</option>
            <option value="">Рубль (RUB)</option>
            <option value="">Доллар (USD)</option>
            <option value="">Тенге (KZT)</option>
        </select>
    </div>
    <div class="admin-input-box admin-input-width50">
        <select class="admin-input admin-input-select block-admin-input">
            <option value="">Тип устройства</option>
            <option value="">Мобильный</option>
            <option value="">Планшет</option>
            <option value="">ПК</option>
            <option value="">TV</option>
        </select>
    </div>
    <div class="admin-input-box admin-input-width50">
        <select class="admin-input admin-input-select block-admin-input">
            <option value="">Операционная система</option>
            <option value="">iOS</option>
            <option value="">Android</option>
            <option value="">Windows</option>
            <option value="">MacOS</option>
            <option value="">Roku</option>
        </select>
    </div>
    <div class="admin-input-box admin-input-width50">
        <select class="admin-input admin-input-select block-admin-input">
            <option value="">Страна</option>
            <option value="">Россия</option>
            <option value="">Казахстан</option>
            <option value="">Беларумь</option>
        </select>
    </div>
    <div class="admin-input-box admin-input-width50">
        <select class="admin-input admin-input-select block-admin-input">
            <option value="">Продукт</option>
            <option value="">Билет на игру такую-то</option>
            <option value="">Подписка такая-то</option>
            <option value="">Билет на игру такую-то</option>
        </select>
    </div>
    <div class="admin-input-box admin-input-width50">
        <select class="admin-input admin-input-select block-admin-input">
            <option value="">Пользователи</option>
            <option value="">Пользователи</option>
            <option value="">Пользователи</option>
        </select>
    </div>
    <div class="admin-input-box admin-input-width50">
        <select class="admin-input admin-input-select block-admin-input">
            <option value="">Ссылки</option>
            <option value="">Ссылки</option>
            <option value="">Ссылки</option>
        </select>
    </div>
    <div class="admin-input-box admin-input-width50">
        <select class="admin-input admin-input-select block-admin-input">
            <option value="">Статус</option>
            <option value="">Активно</option>
            <option value="">Истекло</option>
        </select>
    </div>
    <div class="admin-input-box admin-input-width50">
        <select class="admin-input admin-input-select block-admin-input">
            <option value="">Статус продления</option>
            <option value="">Включено</option>
            <option value="">Выключено</option>
            <option value="">Недоступно</option>
        </select>
    </div>
</div>

</div>

<table>
<tbody class="tbody-wrapper">
     <tr class="tr-wrapper admin-video-item admin-back">
           <td class="admin-video-btn">Сумма</td>
           <td class="admin-video-btn">Поставщик</td>
           <td class="admin-video-btn table-one-column">Пользователь</td>
           <td class="admin-video-btn table-one-column">Продукт</td>
           <td class="admin-video-btn">Продление</td>
           <td class="admin-video-btn">Период</td>
           <td class="admin-video-btn">Создан в</td>
           <td class="admin-video-btn">Истек в</td>
    </tr>
    <tr class="tr-wrapper admin-video-item admin-back">
        <td class="paid-amount">156 &#8381;</td>
           <td class="">ROBOKASSA</td>
           <td class="table-one-column">
               <a href="#" class="paid-users">useritosone@users.com</a>
           </td>
           <td class="table-one-column disp-fl-sb fl-dir-col">Билет на просмотр игр 02-07.07.2024 Ю11 Финал А Город Псков (На 5 дней)
               <span class="pay-per-view-text">Оплата за просмотр</span>
           </td>
           <td class=""></td>
           <td class="">5 дней</td>
           <td>
               <div class="admin-video-item-header price-item-wrapper">
                <p class="price-item-bold">17:36</p>
                <p>1 января 2024</p>
            </div>
        </td>
        <td>
               <div class="admin-video-item-header price-item-wrapper">
                <p class="price-item-bold">17:36</p>
                <p>6 января 2024</p>
            </div>
        </td>
    </tr>
    <tr class="tr-wrapper admin-video-item admin-back">
        <td class="paid-amount">150 &#8381;</td>
           <td class="">ROBOKASSA</td>
           <td class="table-one-column">
               <a href="#" class="paid-users">useritosone@users.com</a>
           </td>
           <td class="table-one-column disp-fl-sb fl-dir-col">Билет на просмотр игр 02-07.07.2024 Ю11 Финал А Город Псков (На 5 дней)
               <span class="pay-per-view-text">Оплата за просмотр</span>
           </td>
           <td class=""></td>
           <td class="">5 дней</td>
           <td>
               <div class="admin-video-item-header price-item-wrapper">
                <p class="price-item-bold">17:36</p>
                <p>1 января 2024</p>
            </div>
        </td>
        <td>
               <div class="admin-video-item-header price-item-wrapper">
                <p class="price-item-bold">17:36</p>
                <p>6 января 2024</p>
            </div>
        </td>
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

<!--------- СОЗДАТЬ ТЕГ --------->
<div class="product-content-popup" id="open-create-tag"> <!--------- PopUP --------->
	<div class="admin-content block-admin-left-w650 fix-position">

		<div class="header admin-header">
			<div class="left-header">
				<a href="#" class="close-btn" id="close-add-tag" title="Закрыть"><img src="img/close.png" alt="Закрыть" width="24" height="24"></a>
				<h2 class="top-menu-title">Создать тег</h2>
			</div>

			<div class="right-heder">
				<button class="top-menu-btn">Сохранить</button>
			</div>
		</div>

		<div class="top-menu-sort block-admin-section tr-wrapper-mb admin-back">
			<div class="admin-input-box block-admin-input">
				<input type="text" required="yes" title="Название тега" placeholder="Название тега *" class="admin-input block-admin-input">
			</div>

			<div class="admin-input-box block-admin-input">
				<label>Тип тега</label>
				<select class="admin-input admin-input-select block-admin-input">
					<option value=""> </option>
					<option value="">Сезон</option>
					<option value="">Турнир</option>
					<option value="">Возраст</option>
					<option value="">Этап</option>
				</select>
			</div>
		</div>

	</div>
</div>
@endsection