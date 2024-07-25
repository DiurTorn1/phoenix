@extends('layouts.app')
@section('title-block') Панель админа-господина @endsection

@section('content')

@guest


@else
	@if(!empty(Auth::user()->getRoleNames()))
    @foreach( Auth::user()->getRoleNames() as $v)
		@if($v == "admin")
    <header class="header admin-header">
		<div class="left-header">
			<a href="/admin_panel" class="close-btn" title="Закрыть" ><img src="img/close.png" alt="Закрыть" width="24" height="24"></a>
			<h2 class="top-menu-title">Карточка стрима</h2>
		</div>
		<div class="right-heder">
			<button class="top-menu-btn save-st">Сохранить</button>
			<button class="top-menu-btn">Отменить публикацию</button>
		</div>
	</header>
	<main class="admin-container">
	<!-----------------------Меню стрима------------------------------>
	<div class="admin-menu">

		<nav class="admin-navigation">
			<ul class="stream-navigation admin-navigation-list admin-back">
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="img/edit.png" alt="Редактировать">Редактировать</a></li>
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="img/broadcast.png" alt="Трансляция">Трансляция</a></li>
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="img/monitor.png" alt="Мониторинг">Мониторинг</a></li>
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="img/analitik.png" alt="Аналитика">Аналитика</a></li>
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="img/restream.png" alt="Рестрим">Рестрим</a></li>
				<li class="admin-navigation-item"><a href="#" class="admin-navigation-link"><img class="admin-menu-icon" src="img/studio.png" alt="Студия">Студия</a></li>
			</ul>
		</nav>
	</div>
	<!----------------------------Стрим-контент---------------------------------->
	<div class="admin-content admin-content-raw">
		<div class="block-admin-left">
			<div class="block-admin-container admin-back">
				<div class="admin-input-box admin-input-wrap">
					<label>Заголовок *</label>
					<input type="text" required name="Заголовок" class="block-admin-input admin-input">
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
						<a href="#" class="add-preview-tournir" title="Загрузиь обложку турнира"><img src="img/ivs4.png" alt="Обложка турнира"></a>
						<div class="edit-preview-tournir">
							<a href="#" class="remove-preview-tournir" title="Удалить обложку"><img src="img/trash.png" alt="Удалить обложку"></a>
						</div>
					</div>	
				</div>
			</div>

			<div class="block-admin-container admin-back">
				<div class="admin-input-box admin-input-wrap">
					<label>Шаблон для доступа региона</label>
					<select class="admin-input admin-input-select block-admin-input">
						<option value="Шаблон 1">Шаблон 1</option>
						<option value="Шаблон 2">Шаблон 2</option>
					</select>
				</div>
				<div class="admin-input-box admin-input-wrap">
					<label>Сезон</label>
					<input type="text" name="Начало трансляции" class="block-admin-input 		admin-input" placeholder=" ">
				</div>
				<div class="admin-input-box admin-input-wrap">
					<label>Турнир</label>
					<input type="text" name="Начало трансляции" class="block-admin-input 		admin-input" placeholder=" ">
				</div>
				<div class="admin-input-box admin-input-wrap">
					<label>Возраст</label>
					<input type="text" name="Начало трансляции" class="block-admin-input 		admin-input" placeholder=" ">
				</div>
				<div class="admin-input-box admin-input-wrap">
					<label>Добавить к продукту</label>
					<input type="text" name="Начало трансляции" class="block-admin-input 		admin-input" placeholder=" ">
				</div>
			</div>

			<div class="block-admin-container admin-back">
				<div class="block-admin-section">
					<div class="block-admin-sector block-admin-container block-admin-section-item">
						<div class="admin-input-box admin-input-wrap">
							<label>Вид спорта</label>
							<select class="admin-input admin-input-select block-admin-input">
								<option value="Баскетбол">Баскетбол</option>
								<option value="Волейбол">Волейбол</option>
							</select>
						</div>
					</div>
					<div class="block-admin-sector block-admin-container block-admin-section-item">
						<div class="admin-input-box admin-input-wrap">
							<label>Задержка сигнала</label>
							<select class="admin-input admin-input-select block-admin-input">
								<option value="">Минимальная (10-15 секунд)</option>
								<option value="">Стандартная (20-25 секунд)</option>
							</select>
						</div>
					</div>
				</div>
			</div>

		</div>

		<div class="block-admin-right">
			<div class="preview-tournir-vis">
				<img src="img/ivs4.png" alt="Заставка трансляции" title="Нет трансляции">
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