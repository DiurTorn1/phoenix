

<main class="index-main">
	    <!-- Главный баннер -->
	    <div class="banner">
		    <picture class="banner-img">
			    <img src="{{ asset('img/banner.png') }}" alt="Феникс ТВ">
		    </picture>
		    <div class="banner-text">
			    <span>Феникс ТВ</span>
			    <h1>Пространство детского спорта</h1>
		    </div>
	    </div>

<!------------------ Окно Входа -------------------------->
<div class="popup-back" id="popup-back">
        <form method="POST" action="" class="popup-container">
			<div class="popup-content">
            	@csrf
				<div class="popup-title-wrap">
					<button class="popup-close close-btn" id="popup-close" title="Закрыть"><img src="{{ asset('img/close.png') }}" alt="Закрыть"></button>
					<h2 class="popup-title">Вход</h2>
				</div>
				<div class="popup-content-wrap">
                	<input id="user-input" type="email" placeholder="Введите email" class="user-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> 
					@error('email')
                    	<span class="invalid-feedback" role="alert">
                    	<strong>{{ $message }}</strong>
                    	</span>
                	@enderror
				
                	<input id="password" type="password" placeholder="Пароль" class="user-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
					@error('password')
                    	<span class="invalid-feedback" role="alert">
                    	<strong>{{ $message }}</strong>
                    	</span>
                	@enderror
					<div class="popup-content-wrap-row remember-wrapper">
						<input class="admin-video-sort-check" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                		<label class="admin-video-check-label" for="remember">
                        	{{ __('Запомнить меня') }}
        				</label>
					</div>
                    <button type="submit" class="top-menu-btn" id="top-menu-btn">
						Войти
                    </button>
					<div class="popup-content-wrap-row register-wrapper">
						<a class="register-link" id="registr_push">Регистрация</a>
						<a class="mem-password">Забыли пароль?</a>
					</div>
				</div>
			</div>
			

        </form>
</div>


<div class="popup-back-login" id="popup-back-login">
        <div class="popup-container">
			<div class="popup-content">
            	<!--@csrf-->
				<div class="popup-title-wrap">
					<button class="popup-close close-btn" id="popup-close-login" title="Закрыть"><img src="{{ asset('img/close.png') }}" alt="Закрыть"></button>
					<h2 class="popup-title">Регистрация</h2>
					<h3 class="popup-title" id="details_registr"></h3>
				</div>
				<div class="popup-content-wrap">
                	<input id="user-input-registr" type="email" placeholder="Введите email" class="user-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> 
					<!--@error('email')-->
                    	<span class="invalid-feedback" role="alert">
                    	<strong>{{ $message }}</strong>
                    	</span>
                	<!--@enderror-->
				
                	<!--<input id="password" type="password" placeholder="Телефон или email" class="user-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
					@error('password')
                    	<span class="invalid-feedback" role="alert">
                    	<strong>{{ $message }}</strong>
                    	</span>
                	@enderror
					<div class="popup-content-wrap-row remember-wrapper">
						<input class="admin-video-sort-check" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                		<label class="admin-video-check-label" for="remember">
                        	{{ __('Запомнить меня') }}
        				</label>
					</div>-->
					<input id="user-input-code" type="password" placeholder="Введите пароль подтверждения почты" class="user-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> 
                    <button type="submit" class="top-menu-btn" id="send_mail">
						Подтвердить пароль
                    </button>
					<button type="submit" class="top-menu-btn" id="send_mail_reg">
						Завершить регистрацию
                    </button>
					{!! Form::open(array('route' => 'users.store','method'=>'POST','class' => 'admin-content top-menu-sort block-admin-left-w650 admin-back')) !!}
						<div class="">
    						<div class="">
        						<div class="admin-input-box block-admin-input">
            						<strong>Имя:</strong>
            						{!! Form::text('name', null, array('placeholder' => 'Имя','class' => 'block-admin-input admin-input')) !!}
        						</div>
    </div>
    <div class="">
        <div class="admin-input-box block-admin-input">
            <strong>Почта:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Почта','class' => 'block-admin-input admin-input')) !!}
        </div>
    </div>
    <div class="">
        <div class="admin-input-box block-admin-input">
            <strong>Пароль:</strong>
            {!! Form::password('password', array('placeholder' => 'Пароль','class' => 'block-admin-input admin-input')) !!}
        </div>
    </div>
    <div class="">
        <div class="admin-input-box block-admin-input">
            <strong>Повторить пароль:</strong>
            {!! Form::password('confirm-password', array('placeholder' => 'Повторить пароль','class' => 'block-admin-input admin-input')) !!}
        </div>
    </div>
    <div class="admin-input-box block-admin-input">
        <button type="submit" class="top-menu-btn">Принять</button>
    </div>
</div>
{!! Form::close() !!}
</div>

@endsection
					<!--<div class="popup-content-wrap-row register-wrapper">
						<a href="#" class="register-link">Регистрация</a>
						<a href="#" class="mem-password">Забыли пароль?</a>
					</div>-->
				</div>
			</div>
			
		</div>
</div>