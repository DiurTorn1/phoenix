@extends('admin_panel')
@section('title-block') Продукты @endsection
@section('admin_res')

<div class="top-menu-admin admin-back">
			<div class="top-menu-head">
				<h2 class="top-menu-title">Промокоды</h2>
				<div class="right-heder">
					<a href="#" class="save-st"><img src="img/upload.png" alt="Загрузить промокоды" title="Загрузить промокоды"></a>
		        	<button class="entrance entrance-admin save-st" id="add-multi-promocode">Добавить несколько</button>
		        	<button class="top-menu-btn" id="add-new-promocode">Добавить промокод</button>
		    	</div>
			</div>

			<div class="top-menu-sort block-admin-section">
				<div class="admin-input-box admin-input-width50">
					<input type="text" name="Поиск по названию" class="admin-input block-admin-input block-admin-input-key" placeholder="Найти по названию">
					<a href="#" class="admin-video-link-renew" title="Найти по названию">
						<img class="img-search-admin" src="img/search.png" alt="ОНайти по названию">
					</a>
				</div>
				<div class="admin-input-box admin-input-width50">
					<input type="text" name="Промо-кампании" class="admin-input block-admin-input" placeholder="Промо-кампании">
				</div>
			</div>
		</div>

	<table> <!------------ Список промокодов --------------->
		<tbody class="tbody-wrapper">
		 	<tr class="tr-wrapper admin-video-item admin-back">

		 		<td class="table-one-column-check">
		 			<div class="admin-video-sort-wrap">
						<input id="all-check-promo" class="admin-video-sort-check" type="checkbox">
						<label class="admin-video-check-label" for="all-check-promo"></label>
					</div>
				</td>
		   		<td class="table-one-column">Заголовок</td>
		   		<td>Код</td>
		   		<td>Активаций</td>
		   		<td>Выручка</td>
		   		<td>Создан</td>
			</tr>
			<tr class="tr-wrapper admin-video-item admin-back">
				<td class="table-one-column-check">
		 			<div class="admin-video-sort-wrap">
						<input id="check-promo-1" class="admin-video-sort-check" type="checkbox">
						<label class="admin-video-check-label" for="check-promo-1"></label>
					</div>
				</td>
		    	<th class="table-one-column">Промокод Волей</th>
		    	<td><p class="promo-prew-admin">Wolley2024</p></td>
		    	<td>5</td>
		    	<td>0</td>
		    	<td>05 сентября 2024</td>
			</tr>
		</tbody>
	</table>

		<div class="block-admin-container soc-container admin-back">
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

    <!--------------------------- Создать ПРОМОКОД ---------------------------->	
<div class="product-content-popup" id="open-create-promocode"> <!--------- PopUP --------->
	<div class="admin-content block-admin-left-w650 fix-position">

		<div class="header admin-header">
			<div class="left-header">
				<a href="#" class="close-btn" id="close-add-promocode" title="Закрыть"><img src="img/close.png" alt="Закрыть" width="24" height="24"></a>
				<h2 class="top-menu-title">Создать промокод</h2>
			</div>

			<div class="right-heder">
				<button class="top-menu-btn">Создать</button>
			</div>
		</div>

			<div class="top-menu-sort block-admin-section tr-wrapper-mb admin-back">
				<div class="admin-input-box block-admin-input">
					<input type="text" required title="Заголовок" placeholder="Заголовок *" class="admin-input block-admin-input">
				</div>

				<div class="admin-input-box block-admin-input">
					<input type="text" title="Промо-кампания" placeholder="Промо-кампания" class="admin-input block-admin-input">
				</div>

				<div class="admin-input-box block-admin-input justi-fl-st">
					<div class="switch-btn"></div>
					<p>Новая промо-кампания</p>
				</div>

				<div class="admin-input-box admin-input-wrap">
					<div class="left-header" id="promo_toggle">
						<button class="type-price type-price-left type-price-active" id="add_discount">Скидка</button>
						<button class="type-price type-price-right" id="add_trial">Пробная версия</button>
					</div>
					<p id="discount_subtext">Пользователи получат скиду, используя этот промокод</p>
					<p id="trial_subtext">Новые пользователи подписки получат бесплатную пробную версию, используя промокод</p>
				</div>
			</div>

			<div id="discount_container" class="top-menu-sort block-admin-section tr-wrapper-mb admin-back"> <!-- блок появлятся при выборе СКИДКИ -->
				<div class="admin-input-box admin-input-width50">
					<input type="text" required title="Придумайте код" placeholder="Код *" class="admin-input block-admin-input">
				</div>

				<div class="admin-input-box admin-input-width50">
					<label>Лимит *</label>
					<input type="text" pattern="[0-9]*" required title="Количество купонов. Допускаются только числа" class="admin-input block-admin-input">
				</div>

				<div class="admin-input-box admin-input-width50">
					<label>Скидка в процентах (%)</label>
					<input type="text" pattern="[0-9]*" title="Допускаются только числа" class="admin-input block-admin-input">
				</div>
				<div class="admin-input-box admin-input-width50">
					<label>Сумма скидки</label>
					<input type="text" pattern="[0-9]*" title="Допускаются только числа" class="admin-input block-admin-input">
				</div>
			</div>

			<div id="trial_container" class="top-menu-sort block-admin-section tr-wrapper-mb admin-back"> <!-- блок меняется при выборе ТРИАЛА -->
				<div class="admin-input-box admin-input-width50">
					<input type="text" required title="Придумайте код" placeholder="Код *" class="admin-input block-admin-input">
				</div>

				<div class="admin-input-box admin-input-width50">
					<label>Лимит *</label>
					<input type="text" pattern="[0-9]*" required title="Количество купонов. Допускаются только числа" class="admin-input block-admin-input">
				</div>

				<div class="admin-input-box block-admin-input">
					<input type="text" pattern="[0-9]*" title="Допускаются только числа" placeholder="Пробный период (ДНЕЙ)" class="admin-input block-admin-input">
				</div>
			</div>
			<!-- ---------------------------- -->
		<div class="admin-back">
			<div class="top-menu-sort block-admin-section">
				<div class="admin-input-box block-admin-input">
					<label>Продукт</label>
					<select class="admin-input admin-input-select block-admin-input">
						<option value="">Тестовый продукт 1</option>
						<option value="">Тестовый продукт номер 2</option>
					</select>
				</div>
			</div>

			<div class="top-menu-sort block-admin-section pb-none">
				<p>Срок действия:</p>
			</div>
			
			<div class="top-menu-sort block-admin-section">
				<div class="admin-input-box admin-input-width50">
					<label>Действует с *</label>
					<input class="admin-input admin-input-width-date" required type="datetime-local" title="Дата начала действия промокода">
				</div>

				<div class="admin-input-box admin-input-width50">
					<label>Действует до</label>
					<input class="admin-input admin-input-width-date" required type="datetime-local" title="Дата окончания действи промокода">
				</div>
			</div>
		</div>

	</div>

</div>
<!-------------------------------------------->
<!--------------------------- ДОБАВИТЬ НЕСКОЛЬКО ПРОМОКОДОВ ---------------------------->	
<div class="product-content-popup" id="open-create-multi-promocode"> <!--------- PopUP --------->
	<div class="admin-content block-admin-left-w650 fix-position">

		<div class="header admin-header">
			<div class="left-header">
				<a href="#" class="close-btn" id="close-multi-promocode" title="Закрыть"><img src="img/close.png" alt="Закрыть" width="24" height="24"></a>
				<h2 class="top-menu-title">Создать несколько промокодов</h2>
			</div>

			<div class="right-heder">
				<button class="top-menu-btn">Добавить</button>
			</div>
		</div>

			<div class="top-menu-sort block-admin-section tr-wrapper-mb admin-back">
				<div class="admin-input-box block-admin-input">
					<label>Количество промокодов для создания *</label>
					<input type="text" pattern="[0-9]*" required title="Допускаются только числа" class="admin-input block-admin-input">
				</div>

				<div class="admin-input-box block-admin-input">
					<input type="text" title="Промо-кампания *" required placeholder="Промо-кампания" class="admin-input block-admin-input">
				</div>

				<div class="admin-input-box block-admin-input justi-fl-st">
					<div class="switch-btn"></div>
					<p>Новая промо-кампания</p>
				</div>

				<div class="admin-input-box admin-input-wrap">
					<div class="left-header" id="promo_toggle_multi">
						<button class="type-price type-price-left type-price-active" id="add_discount_multi">Скидка</button>
						<button class="type-price type-price-right" id="add_trial_multi">Пробная версия</button>
					</div>
					<p id="discount_subtext_multi">Пользователи получат скиду, используя этот промокод</p>
					<p id="trial_subtext_multi">Новые пользователи подписки получат бесплатную пробную версию, используя промокод</p>
				</div>
			</div>

			<div id="discount_container_multi" class="top-menu-sort block-admin-section tr-wrapper-mb admin-back"> <!-- блок появлятся при выборе СКИДКИ -->

				<div class="admin-input-box admin-input-width50">
					<label>Лимит *</label>
					<input type="text" pattern="[0-9]*" required title="Количество купонов. Допускаются только числа" class="admin-input block-admin-input">
				</div>

				<div class="admin-input-box admin-input-width50">
					<label>Скидка в процентах (%)</label>
					<input type="text" pattern="[0-9]*" title="Допускаются только числа" class="admin-input block-admin-input">
				</div>
				<div class="admin-input-box admin-input-width50">
					<label>Сумма скидки</label>
					<input type="text" pattern="[0-9]*" title="Допускаются только числа" class="admin-input block-admin-input">
				</div>
			</div>

			<div id="trial_container_multi" class="top-menu-sort block-admin-section tr-wrapper-mb admin-back"> <!-- блок меняется при выборе ТРИАЛА -->
				<div class="admin-input-box admin-input-width50">
					<label>Лимит *</label>
					<input type="text" pattern="[0-9]*" required title="Количество купонов. Допускаются только числа" class="admin-input block-admin-input">
				</div>

				<div class="admin-input-box block-admin-input">
					<input type="text" pattern="[0-9]*" title="Допускаются только числа" placeholder="Пробный период (ДНЕЙ)" class="admin-input block-admin-input">
				</div>
			</div>
			<!-- ---------------------------- -->
		<div class="admin-back">
			<div class="top-menu-sort block-admin-section">
				<div class="admin-input-box block-admin-input">
					<label>Продукт</label>
					<select class="admin-input admin-input-select block-admin-input">
						<option value="">Тестовый продукт 1</option>
						<option value="">Тестовый продукт номер 2</option>
					</select>
				</div>
			</div>
			<div class="top-menu-sort block-admin-section pb-none">
				<p>Срок действия:</p>
			</div>
			<div class="top-menu-sort block-admin-section">
				<div class="admin-input-box admin-input-width50">
					<label>Действует с *</label>
					<input class="admin-input admin-input-width-date" required type="datetime-local" title="Дата начала действия промокода">
				</div>

				<div class="admin-input-box admin-input-width50">
					<label>Действует до</label>
					<input class="admin-input admin-input-width-date" required type="datetime-local" title="Дата окончания действи промокода">
				</div>
			</div>
		</div>

	</div>

</div>
<!-------------------------------------------->


@endsection