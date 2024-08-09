@extends('card_stream_main')
@section('title-block') Аналитика @endsection
@section('card_stream_res')
	
	<!----------------------------Стрим-контент АНАЛИТИКА ---------------------------------->
	<div class="admin-content"> <!------------------------- Левая панель ------------------->
			
		<div class="block-admin-section block-analitic-row">
			<div class="block-admin-container admin-back monitor-cart-min">
				<div class="admin-input-wrap admin-input-row">
					<img class="analitik-eye" src="img/eye.png" alt="">
					<div>
						<p class="log-titel-min">0</p>
						<span>Зрителей онлайн</span>
					</div>
				</div>
			</div>
			<div class="block-admin-container admin-back monitor-cart-min">
				<div class="admin-input-wrap admin-input-row ">
					<img class="analitik-eye" src="img/eye.png" alt="">
					<div>
						<p class="log-titel-min">0</p>
						<span>Максимум онлайн</span>
					</div>
				</div>
			</div>
			<div class="block-admin-container admin-back monitor-cart-min">
				<div class="admin-input-wrap admin-input-row ">
					<img class="analitik-eye" src="img/eye.png" alt="">
					<div>
						<p class="log-titel-min">0</p>
						<span>Среднее онлайн</span>
					</div>
				</div>
			</div>
		</div>
		<div class="block-admin-container admin-back">
			<span class="log-titel-min">Зрителей онлайн</span>
			<div class="analitik-window">
				
			</div>
		</div>

	</div>
@endsection