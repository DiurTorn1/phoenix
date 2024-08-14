@extends('layouts.app')
@section('title-block') Панель админа-господина @endsection

@section('content')

@guest


@else
	@if(!empty(Auth::user()->getRoleNames()))
    @foreach( Auth::user()->getRoleNames() as $v)
		@if($v == "admin")
    <header class="header admin-header">
	<script type="text/javascript" src = "{{ asset('js/create_stream.js') }}"></script> 
		<div class="left-header">
			<a href="/stream" class="close-btn" title="Закрыть" ><img src="{{ asset('img/close.png') }}" alt="Закрыть" width="24" height="24"></a>
			<h2 class="top-menu-title">Создание стрима</h2>
		</div>
		<div class="right-heder">
			<button class="top-menu-btn save-st" id="save-st">Сохранить</button>
			<button class="top-menu-btn">Отменить публикацию</button>
		</div>
	</header>
	<main class="admin-container">
	<!-----------------------Меню стрима------------------------------>
	<div class="admin-menu">

		<!--<nav class="admin-navigation">
			<ul class="stream-navigation admin-navigation-list admin-back">
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="{{ asset('img/edit.png') }}" alt="Редактировать">Редактировать</a></li>
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="{{ asset('img/broadcast.png') }}" alt="Трансляция">Трансляция</a></li>
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="{{ asset('img/monitor.png') }}" alt="Мониторинг">Мониторинг</a></li>
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="{{ asset('img/analitik.png') }}" alt="Аналитика">Аналитика</a></li>
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="{{ asset('img/restream.png') }}" alt="Рестрим">Рестрим</a></li>
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="{{ asset('img/studio.png') }}" alt="Студия">Студия</a></li>
			</ul>
		</nav>-->
	</div>
	<!----------------------------Стрим-контент---------------------------------->
	<div class="admin-content admin-content-raw">
		<div class="block-admin-left">
			<div class="block-admin-container admin-back">
				<div class="admin-input-box admin-input-wrap">
					<label>Заголовок *</label>
					<input type="text" required name="Заголовок" class="block-admin-input admin-input" id="block-admin-inputct">
				</div>
				<div class="admin-input-box admin-input-wrap">
					<label>Описание</label>
					<textarea name="Описание" class="block-admin-input respons-input admin-input"></textarea>
				</div>
				<div class="admin-input-box admin-input-wrap">
					<textarea name="Описание для премиум клиентов" class="block-admin-prem-input block-admin-input admin-input">Описание для премиум клиентов</textarea>
				</div>
			</div>

			<div class="block-admin-container admin-back">
				<div class="block-admin-section">
					<div class="block-admin-sector block-admin-container block-admin-section-item">
						<div class="admin-input-box admin-input-wrap">
							<label>Начало трансляции</label>
							<input type="text" name="Начало трансляции" class="block-admin-input 		admin-input" placeholder="09 Мая в 08:45">
						</div>
						<div class="admin-input-box admin-input-wrap">
							<label>Дата публикации плеера</label>
							<input type="text" name="Начало трансляции" class="block-admin-input 		admin-input" placeholder="04 Мая в 18:50">
						</div>
					</div>
					<div class="block-admin-sector block-admin-container block-admin-section-item">
						<a href="#" class="add-preview-tournir" title="Загрузиь обложку турнира"><img src="https://nextcloud.tehnodir.ru/index.php/apps/files_sharing/publicpreview/3M57JCrBwTz7tq8?file=/&fileId=1983&x=1920&y=1080&a=true&etag=cbe2366c226f3374946830bd6d5fac9b" alt="Обложка турнира"></a>
						<div class="edit-preview-tournir">
							<a href="#" class="remove-preview-tournir" title="Удалить обложку"><img src="{{ asset('img/trash.png') }}" alt="Удалить обложку"></a>
						</div>
					</div>	
				</div>
			</div>

			<div class="block-admin-container admin-back">
				<div class="admin-input-box admin-input-wrap">
					<label>Шаблон для доступа региона</label>
					<select class="admin-input admin-input-select block-admin-input" id="admin_region_selectct">
						<option value="Все регионы">Все регионы</option>
					</select>
				</div>
				<div class="admin-input-box admin-input-wrap">
					<label>Сезон</label>
					<input type="text" name="Начало трансляции" class="block-admin-input 		admin-input" placeholder=" " id="admin_season_seasonct">
				</div>
				<div class="admin-input-box admin-input-wrap">
					<label>Турнир</label>
					<input type="text" name="Начало трансляции" class="block-admin-input 		admin-input" placeholder=" " id="admin_turnir_seasonct">
				</div>
				<div class="admin-input-box admin-input-wrap">
					<label>Возраст</label>
					<input type="text" name="Начало трансляции" class="block-admin-input 		admin-input" placeholder=" " id="admin_weigth_seasonct">
				</div>
				<div class="admin-input-box admin-input-wrap">
					<label>Добавить к продукту</label>
					<input type="text" name="Начало трансляции" class="block-admin-input 		admin-input" placeholder=" " id="admin_product_seasonct">
				</div>
			</div>

			<div class="block-admin-container admin-back">
				<div class="block-admin-section">
					<div class="block-admin-sector block-admin-container block-admin-section-item">
						<div class="admin-input-box admin-input-wrap">
							<label>Вид спорта</label>
							<select class="admin-input admin-input-select block-admin-input" id="admin_vidsporta_seasonct">
								<option value="Баскетбол">Баскетбол</option>
								<option value="Волейбол">Волейбол</option>
							</select>
						</div>
					</div>
					<div class="block-admin-sector block-admin-container block-admin-section-item">
						<div class="admin-input-box admin-input-wrap">
							<label>Задержка сигнала</label>
							<select class="admin-input admin-input-select block-admin-input" id="admin_minframe_seasonct">
								<option value="">Минимальная (10-15 секунд)</option>
								<option value="">Стандартная (20-25 секунд)</option>
							</select>
						</div>
					</div>
				</div>
			</div>

		</div>

		<div class="block-admin-right"> <!--------------------------------------------Правая панель ------------------>

			<div class="preview-tournir-vis">
				<img src="https://nextcloud.tehnodir.ru/index.php/apps/files_sharing/publicpreview/3M57JCrBwTz7tq8?file=/&fileId=1983&x=1920&y=1080&a=true&etag=cbe2366c226f3374946830bd6d5fac9b" alt="Заставка трансляции" title="Нет трансляции">
			</div>

			<div class="block-admin-container admin-back">
				<div class="admin-input-wrap">
					<div class="social-list">
						<a href="#" class="social-list-item"><img src="img/telegram.png" alt="Телеграм"></a>
						<a href="#" class="social-list-item"><img src="img/whatsapp.png" alt="Whatsapp"></a>
						<a href="#" class="social-list-item"><img src="img/facebook.png" alt="Facebook"></a>
						<a href="#" class="social-list-item"><img src="img/twitter.png" alt="Twitter"></a>
					</div>
				</div>
				<div class="admin-input-box admin-input-wrap">
					<label>Ссылка на трасляцию</label>
					<input type="text" name="Ссылка на трасляцию" class="block-admin-input admin-input" placeholder=" ">
					<a href="#" class="admin-video-link-stream" title="Перейти">
						<img src="img/right-arrow.svg" alt="Перейти">
					</a>
					<a href="#" class="admin-video-link-copy" title="Скопировать ссылку">
						<img src="img/copy.png" alt="Скопировать ссылку">
					</a>
				</div>
				<div class="admin-input-box admin-input-wrap">
					<label>Код для вставки на сайт</label>
					<input type="text" name="Код для вставки на сайт" class="block-admin-input admin-input" placeholder=" ">
					<a href="#" class="admin-video-link-stream" title="Перейти">
						<img src="img/right-arrow.svg" alt="Перейти">
					</a>
					<a href="#" class="admin-video-link-copy" title="Скопировать ссылку">
						<img src="img/copy.png" alt="Скопировать ссылку">
					</a>
				</div>
			</div>

		</div>
		
	</div>	
	</main>
	<!----------------->
        @endif
    @endforeach
    @endif
@endguest

@endsection