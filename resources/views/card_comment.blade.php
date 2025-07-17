@extends('admin_panel')
@section('title-block') Карта комментатора @endsection
@section('admin_res')
	<!----------------------------Стрим-контент ТРАНСЛЯЦИЯ---------------------------------->
	<script type="text/javascript" src = "{{ asset('js/card_comment.js') }}"></script>
	<header class="header admin-header">
		<div class="left-header">
			<a href="#" class="close-btn" title="Закрыть" id="close_card_comment"><img src="img/close.png" alt="Закрыть" width="24" height="24"></a>
			<h2 class="top-menu-title">Карточка комментатора</h2>
		</div>

		<div class="right-heder">
			<!-- <button class="top-menu-btn non-publish" id="product_unpublic_user">Отменить публикацию</button> Когда все поля заполнены добавляем класс "menu-btn-grey-active" -->
			<!-- <button class="top-menu-btn yes-publish" id="product_public_user">Опубликовать</button> Когда все поля заполнены добавляем класс "menu-btn-grey-active" -->
			<button class="top-menu-btn save-st" id="save_coment" style="margin-right: 1rem !important;">Сохранить</button><!-- Когда все поля заполнены добавляем класс "menu-btn-grey-active" -->
		</div>
	</header> 
	<!----------------------------Админ-контент---------------------------------->
	<div class="admin-content block-admin-left-w1080">

		<div class="top-menu-admin admin-video-sort admin-back">

			<div class="admin-input-box admin-input-wrap admin-input-mb">
				<label>Имя комментатора *</label>
				<input type="text" required name="Имя комментатора" class="block-admin-input admin-input" id="name_com">
			</div>

			<div class="block-admin-section admin-input-mb">
				<div class="admin-input-box admin-input-width50">
					<label>Почта</label>
					<input type="text" required name="Имя комментатора" class="block-admin-input admin-input" id="mail_com">
				</div>
			</div>
			<div class="right-heder dropdown">
			<a class="entrance entrance-admin">Выберите трансляцию</a>
				<div class="profile-popup">
					<ul class="" id="list_stream">
					</ul>
				</div>
			</div>

		</div>

	</div>
@endsection