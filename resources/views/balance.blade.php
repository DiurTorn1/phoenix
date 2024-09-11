@extends('admin_panel')
@section('title-block') Покупки @endsection
@section('admin_res')
<script type="text/javascript" src = "{{ asset('js/balance.js') }}"></script> 
<div class="top-menu-admin admin-back">
			<div class="top-menu-head">
				<h2 class="top-menu-title">Баланс</h2>
				<button id="company_details" class="top-menu-btn">Сведения о компании</button>
			</div>
		</div>
		<div class="admin-video-sort justi-sp-b padd-none">
			<div class="admin-input-box disp-fl-sb width50 marg-t-0 padd-1rm admin-back">
				<div class="left-header">
					<div class="admin-box-item-img">
						<img src="img/wallet2.png" alt="">
					</div>
					<div class="admin-box-item-text">
						<span>0 &#8381;</span>
						<p>Текущий баланс</p>
					</div>
				</div>
				<div class="right-heder">
					<button class="menu-btn-grey">Вывести</button><!-- Когда все поля заполнены добавляем класс "menu-btn-grey-active" -->
				</div>
			</div>

			<div class="admin-input-box disp-fl-sb width50 marg-t-0 padd-1rm admin-back">
				<div class="left-header">
					<div class="admin-box-item-img">
						<img src="img/list.png" alt="">
					</div>
					<div class="admin-box-item-text">
						<span>2036567</span>
						<p>Всего выплачено</p>
					</div>
				</div>
			</div>	
		</div>
		<h3 class="top-menu-head pb-none pt-none">Выплаты</h3>
		<table>
			<tbody class="tbody-wrapper pt-none">
			 	<tr class="tr-wrapper admin-video-item admin-back">
			   		<td class="admin-video-btn">Статус</td>
			   		<td class="admin-video-btn">Сумма</td>
			   		<td class="table-one-column admin-video-btn">Отчёт</td>
			   		<td class="admin-video-btn">К выплате</td>
			   		<td class="admin-video-btn">Запрошено в</td>
				</tr>
				<tr class="tr-wrapper admin-video-item admin-back">
			    	<td>
			    		<p class="balance-paid-admin">выплачено</p>
			    	</td>
			   		<td class="">123546 &#8381;</td>
			   		<td class="table-one-column">
			   			<a href="#" class="report-down-admin">Скачать отчёт</a>
			   		</td>
			   		<td>
			   			<div class="admin-video-item-header price-item-wrapper">
							<p class="price-item-bold">17:36</p>
							<p>1 января 2024</p>
						</div>
					</td>
			   		<td>
			   			<div class="admin-video-item-header price-item-wrapper">
							<p class="price-item-bold">17:36</p>
							<p>1 января 2024</p>
						</div>
					</td>
				</tr>
				<tr class="tr-wrapper admin-video-item admin-back">
			    	<td>
			    		<p class="balance-cancel-admin">отменена</p>
			    	</td>
			   		<td class="">1235 &#8381;</td>
			   		<td class="table-one-column">
			   			<a href="#" class="report-down-admin"></a>
			   		</td>
			   		<td>
			   			<div class="admin-video-item-header price-item-wrapper">
							<p class="price-item-bold">17:36</p>
							<p>1 января 2024</p>
						</div>
					</td>
			   		<td>
			   			<div class="admin-video-item-header price-item-wrapper">
							<p class="price-item-bold">17:36</p>
							<p>1 января 2024</p>
						</div>
					</td>
				</tr>
				<tr class="tr-wrapper admin-video-item admin-back">
			    	<td>
			    		<p class="balance-new-admin">новая</p>
			    	</td>
			   		<td class="">1235 &#8381;</td>
			   		<td class="table-one-column">
			   			<a href="#" class="report-down-admin"></a>
			   		</td>
			   		<td>
			   			<div class="admin-video-item-header price-item-wrapper">
							<p class="price-item-bold">17:36</p>
							<p>1 января 2024</p>
						</div>
					</td>
			   		<td>
			   			<div class="admin-video-item-header price-item-wrapper">
							<p class="price-item-bold">17:36</p>
							<p>1 января 2024</p>
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

        <!--------- ОКНО СВЕДЕНИЯ О КОМПАНИИ --------->
<div class="product-content-popup" id="open_company_details"> <!--------- PopUP --------->
	<div class="admin-content block-admin-left-w650 fix-position">

		<div class="header admin-header">
			<div class="left-header">
				<a href="#" class="close-btn" id="close_company_details" title="Закрыть"><img src="img/close.png" alt="Закрыть" width="24" height="24"></a>
				<h2 class="top-menu-title">Сведения</h2>
			</div>
		</div>

		<div class="top-menu-sort block-admin-section tr-wrapper-mb admin-back">
			<div class="admin-input-box block-admin-input">
				<p> Здесь выводится в каком-то виде инфа!
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum, cumque eos facere obcaecati! Qui excepturi labore modi voluptas doloribus odit itaque, impedit. Ullam illo, provident repellat saepe neque minima quis.
				Voluptatem suscipit, nisi pariatur? Neque minima aliquid libero assumenda est facilis, iste explicabo minus modi, quae, tempore incidunt suscipit at quidem aspernatur recusandae nemo vero maxime, eos expedita delectus magnam?
				Doloremque quos, quae vero ut error, qui consequuntur ullam aliquam quis odit facere ratione obcaecati veniam, odio omnis dicta voluptate ipsum, cum laborum dolor perspiciatis! Soluta voluptatem, quibusdam deleniti incidunt!
				Dicta eaque saepe cumque corporis minus commodi voluptatibus porro architecto unde, rem sit. Fugiat, vero molestias veniam iste nulla iure dolores commodi, voluptate assumenda eos cum. Odit, quo consequatur facilis!
				</p>
			</div>
		</div>

	</div>
</div>
@endsection