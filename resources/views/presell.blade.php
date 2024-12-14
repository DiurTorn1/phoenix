@extends('admin_panel')
@section('title-block') Предоплата @endsection
@section('admin_res')
<script type="text/javascript" src = "{{ asset('js/presell.js') }}"></script> 
<div class="top-menu-admin admin-back">

<div class="top-menu-head">
    <h2 class="top-menu-title">Предоплата</h2>
    <div class="right-heder">
        <a href="#" id="close-paid-sort" class="close-btn marg-r-1r" title="Скрыть фильтры"><img src="img/close.png" alt="Закрыть" width="24" height="24"></a>
        <a href="#" id="open-paid-sort" class="close-btn marg-r-1r add-price-show" title="Открыть фильтры"><img src="img/menu-min.png" alt="Закрыть" width="24" height="24"></a>
        <button id="add-new-tag" class="top-menu-btn">Скачать</button>
    </div>
</div>

<table>
<tbody class="tbody-wrapper" id="presell_list">
     <tr class="tr-wrapper admin-video-item admin-back">
           <td class="admin-video-btn">Сумма</td>
           <td class="admin-video-btn">Поставщик</td>
           <td class="admin-video-btn table-one-column">Пользователь</td>
           <td class="admin-video-btn table-one-column">Продукт</td>
           <td class="admin-video-btn">Продление</td>
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
           <td class="td-item-action">
            <button class="del-button">Удалить</button>
            <button class="del-button">Подтвердить подписку</button>
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
@endsection