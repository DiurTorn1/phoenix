@extends('admin_panel')
@section('title-block') Продукты @endsection
@section('admin_res')

<script type="text/javascript" src = "{{ asset('js/product_card.js') }}"></script>

	
	<header class="header admin-header">
		<div class="left-header">
			<!--<a href="#" class="close-btn" title="Закрыть"><img src="img/close.png" alt="Закрыть" width="24" height="24"></a>-->
			<h2 class="top-menu-title">Карточка продукта</h2>
		</div>

		<div class="right-heder">
			<button class="top-menu-btn non-publish" id="product_unpublic_user">Отменить публикацию</button> <!-- Когда все поля заполнены добавляем класс "menu-btn-grey-active" -->
			<button class="top-menu-btn yes-publish" id="product_public_user">Опубликовать</button> <!-- Когда все поля заполнены добавляем класс "menu-btn-grey-active" -->
			<button class="top-menu-btn save-st" id="save_product_db" style="margin-right: 1rem !important;">Сохранить</button><!-- Когда все поля заполнены добавляем класс "menu-btn-grey-active" -->
		</div>
	</header> 
	<!----------------------------Админ-контент---------------------------------->
	<div class="admin-content block-admin-left-w1080">

		<div class="top-menu-admin admin-video-sort admin-back">

			<div class="admin-input-box admin-input-wrap admin-input-mb">
				<label>Заголовок *</label>
				<input type="text" required name="Заголовок" class="block-admin-input admin-input" id="head_name_save">
			</div>

			<div class="block-admin-section admin-input-mb">
				<div class="admin-input-box admin-input-width50">
					<label>Дата начала события</label>
					<input class="admin-input admin-input-width-date" type="Date" value="Дата окончания" id="start_access_time">
				</div>
				<div class="admin-input-box admin-input-width50">
					<label>Дата окончания события</label>
					<input class="admin-input admin-input-width-date" type="Date" value="Дата окончания" id="stop_access_time">
				</div>
			</div>

			<div class="admin-input-box admin-input-wrap admin-input-mb">
				<input type="text" required name="Заголовок" placeholder="Введите описание продукта *" class="block-admin-input admin-input" id="detail_save">
			</div>

		</div>

		<div class="top-menu-admin admin-video-sort admin-back" style="display:none;">

			<ul class="admin-video-list admin-input-box admin-input-wrap"><!-- СПИСОК товарных позиций (сюда добавляются позиции)---------->
				<li class="list-item-wrp">
					<p class="block-admin-input admin-input">Доступ к прямой трансляции</p><!--добавленная позиция-->
					<a href="#" class="remove-preview-tournir" title="Удалить позицию"><img src="img/trash.png" alt="Удалить позицию"></a>
				</li>
			</ul>

			<div class="admin-input-box admin-input-wrap admin-input-mb">
				<label>Выберите товарную позицию</label>
				<select class="admin-input admin-input-select block-admin-input" id="type_save">
					<option value="" disabled="">Выберите товарную позицию</option>
					<option value="">Доступ к прямой трансляции</option>
					<option value="">Доступ к видеозаписи</option>
				</select>
			</div>

			<button type="submit" class="add-position-btn">+&#x20;Добавить товарную позицию</button><!-- При нажатии на кнопку в список выше добавляется товарная позиция -->

		</div>

		<div class="top-menu-admin admin-video-sort admin-back"> <!-- ТИП продукта и добавление прайса -->

			<div class="admin-input-box admin-input-wrap">
				<div class="left-header" id="price_toggle">
					<button class="type-price type-price-left type-price-active" id="add_ticket">Билет</button>
					<button class="type-price type-price-right" id="add_subscrip">Подписка</button><!-- при переключении кнопок добавляется/удаляется класс "type-price-active"-->
				</div>
				<p></p>
			</div>

			<ul class="admin-video-list admin-input-box admin-input-wrap"><!-- СПИСОК сюда добавляются цены ---------->
				<li class="list-item-wrp block-admin-input admin-input bord-none">
					<div class="admin-video-item-header price-item-wrapper" id="input_buff_product">
						
					</div>
					<a href="#" class="edit-price-item" title="Редактировать позицию цены"><img src="img/editw.png" alt="Редактировать позицию цены"></a>
					<a href="#" class="remove-price-item" title="Удалить позицию цены"><img src="img/trash.png" alt="Удалить позицию цены"></a>
				</li>
			</ul>

			<button type="submit" class="add-position-btn" id="add-position-btn-ticket">+&#x20;Добавить цену билета</button>
			<button type="submit" class="add-position-btn" id="add-position-btn-subscrip">+&#x20;Добавить цену на подписку</button>

		</div>

		<div class="admin-video-sort admin-back">
			<div class="block-admin-section block-w100">
				<div class="admin-input-box admin-input-width25">
					<label>Дата начала доступа</label>
					<input class="admin-input admin-input-width-date" type="datetime-local" value="Дата начала действи билета" id="date_start_access_bilet">
				</div>

				<div class="admin-input-box admin-input-width25">
					<label>Дата окончания доступа</label>
					<input class="admin-input admin-input-width-date" type="datetime-local" value="Дата начала действи билета" id="date_stop_access_bilet">
				</div>

				<div class="admin-input-box admin-input-width25">
					<label>Дата окончания продаж</label>
					<input class="admin-input admin-input-width-date" type="datetime-local" value="Дата начала действи билета" id="date_stop_sell_bilet">
				</div>
			</div>
		</div>

		<div class="admin-video-sort justi-sp-b admin-back">
			<div class="block-admin-sector block-admin-container block-admin-section-item">
				
					<!--<a class="preview-product-vis-upload" id="upload_main_banner_product"> <p>Обложка продукта *</p>-->
					<a href="#" class="add-preview-tournir" title="Загрузить обложку продукта"><img src="img/no-image.jpg" alt="Обложка продукта *" id="upload_main_banner_product"></a>
					<div class="edit-preview-tournir" id="banners_turnir">
						<a href="#" class="remove-preview-tournir" title="Удалить обложку" id="img_banner_trash"><img src="{{ asset('img/trash.png') }}" alt="Удалить обложку"></a>
					</div>
					<!--<div class="index-live-banner">
								<img src="img/no-image.jpg">
					</div> </a>-->
				
			</div>
			<div class="admin-input-width50">
				<a href="#" class="preview-product-vis-upload">
					<p>Баннер фона</p>
				</a>
			</div>		
		</div>

		<div class="admin-video-sort justi-sp-b admin-back">
			<div class="admin-input-width50">
				<a href="#" class="preview-product-vis-upload">
					<p>Заставка промо видео</p>
				</a>
			</div>
			<div class="admin-input-width50">
				<video src="https://rutube.ru/play/embed/32968f222f6eb30829babc4e61d1d6c3" width="100%" height="100%" poster="" controls />
			</div>		
		</div>

	</div>

<!--------------------- Создать ЦЕНУ НА БИЛЕТ ------------------------------->
<div class="product-content-popup" id="add-ticket-price"> <!--------- PopUP --------->
	<div class="admin-content block-admin-left-w1080 fix-position">

		<div class="header admin-header">
			<div class="left-header">
				<a href="#" class="close-btn" id="close-add-ticket-price" title="Закрыть"><img src="img/close.png" alt="Закрыть" width="24" height="24"></a>
				<h2 class="top-menu-title">Добавить цену билета</h2>
			</div>

			<div class="right-heder">
				<button class="top-menu-btn" id="save_price_bilet">Сохранить</button>
			</div>
		</div>

			<div class="top-menu-sort block-admin-section tr-wrapper-mb admin-back">
				<div class="admin-input-box block-admin-input">
					<label>Доступен в странах</label>
					<select class="admin-input admin-input-select block-admin-input" id="sive_bilet_region">
						<option value="">Только Россия (RUB)</option>
						<option value="">Только Казахстан (KZT)</option>
						<option value="">Только Беларусь (BYN)</option>
					</select>
				</div>

				<div class="admin-input-box admin-input-width50">
					<label>Срок действия (ДНЕЙ) *</label>
					<input type="text" required pattern="[0-9]*" title="Допускаются только числа" placeholder="Введите число" class="admin-input block-admin-input" id="save_days_job_bilet">
				</div>

				<div class="admin-input-box admin-input-width50">
					<label>Валюта *</label>
					<select required class="admin-input admin-input-select block-admin-input" id="valute_bilet">
						<option value="">Российский рубль (RUB)</option>
						<option value="">Казахский тенге (KZT)</option>
						<option value="">Белорусский рубль (BYN)</option>
						<option value="">Американский доллар (USD)</option>
					</select>
				</div>
			</div>

		<div class="admin-back">
			<div class="top-menu-sort block-admin-section">
				<div class="admin-input-box admin-input-width25">
					<label>Дата и время начала продажи *</label>
					<input class="admin-input admin-input-width-date" required type="datetime-local" value="Дата начала действи билета" id="date_start_sell_bilet">
				</div>

				<div class="admin-input-box admin-input-width25">
					<label>ЦЕНА *</label>
					<input type="text" pattern="[0-9]*" required title="Допускаются только числа" class="admin-input block-admin-input" id="input_prace_bilet">
				</div>

				<div class="admin-input-box admin-input-width25">
					<label>Старая цена</label>
					<input type="text" pattern="[0-9]*" title="Допускаются только числа" class="admin-input block-admin-input" id="input_old_prace_bilet">
				</div>
			</div>
		</div>

		<div class="admin-video-sort top-menu-admin admin-back">
			<button type="submit" class="add-position-btn">+ Добавить период</button><!-- По этой кнопке добавляется ещё строка с такими же полями как выше "Дата и время начала продажи, ЦЕНА, Старая цена"-->
		</div>

	</div>

</div>
<!--------------------------------------------->

<!--------------------- Создать ЦЕНУ НА ПОДПИСКУ ------------------------------->
<div class="product-content-popup" id="add-subscrip-price"> <!--------- PopUP --------->
	<div class="admin-content block-admin-left-w1080 fix-position">

		<div class="header admin-header">
			<div class="left-header">
				<a href="#" class="close-btn" id="close-add-subscrip-price" title="Закрыть"><img src="img/close.png" alt="Закрыть" width="24" height="24"></a>
				<h2 class="top-menu-title">Добавить цену подписки</h2>
			</div>

			<div class="right-heder">
				<button class="top-menu-btn">Сохранить</button>
			</div>
		</div>

			<div class="top-menu-sort block-admin-section tr-wrapper-mb admin-back">
				<div class="admin-input-box block-admin-input">
					<label>Доступен в странах</label>
					<select class="admin-input admin-input-select block-admin-input">
						<option value="">Только Россия (RUB)</option>
						<option value="">Только Казахстан (KZT)</option>
						<option value="">Только Беларусь (BYN)</option>
					</select>
				</div>

				<div class="admin-input-box admin-input-width50">
					<label>Период *</label>
					<select required class="admin-input admin-input-select block-admin-input">
						<option value="">Неделя</option>
						<option value="">1 месяц</option>
						<option value="">3 месяца</option>
						<option value="">6 месяцев</option>
						<option value="">1 год</option>
					</select>
				</div>

				<div class="admin-input-box admin-input-width50">
					<label>Валюта *</label>
					<select required class="admin-input admin-input-select block-admin-input">
						<option value="">Российский рубль (RUB)</option>
						<option value="">Казахский тенге (KZT)</option>
						<option value="">Белорусский рубль (BYN)</option>
						<option value="">Американский доллар (USD)</option>
					</select>
				</div>

				<div class="admin-input-box admin-input-width50">
					<label>Пробный период (ДНЕЙ)</label>
					<input type="text" pattern="[0-9]*" title="Допускаются только числа" placeholder="Введите число" class="admin-input block-admin-input">
				</div>

				<div class="admin-input-box admin-input-width50">
					<label>Цена на пробный период</label>
					<input type="text" pattern="[0-9]*" title="Допускаются только числа" class="admin-input block-admin-input">
				</div>
			</div>

		<div class="admin-back">
			<div class="top-menu-sort block-admin-section">
				<div class="admin-input-box admin-input-width25">
					<label>Дата и время начала продажи *</label>
					<input class="admin-input admin-input-width-date" required type="datetime-local" value="Дата начала действи билета">
				</div>

				<div class="admin-input-box admin-input-width25">
					<label>ЦЕНА *</label>
					<input type="text" pattern="[0-9]*" required title="Допускаются только числа" class="admin-input block-admin-input">
				</div>

				<div class="admin-input-box admin-input-width25">
					<label>Старая цена</label>
					<input type="text" pattern="[0-9]*" title="Допускаются только числа" class="admin-input block-admin-input">
				</div>
			</div>
		</div>

		<div class="admin-video-sort top-menu-admin admin-back">
			<button type="submit" class="add-position-btn">+ Добавить период</button><!-- По этой кнопке добавляется ещё строка с такими же полями как выше "Дата и время начала продажи, ЦЕНА, Старая цена"-->
		</div>

	</div>

</div>
<!--------------------------------------------->

@endsection