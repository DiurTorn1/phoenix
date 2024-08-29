@extends('layouts.app')
@section('title-block') Кто ты, воин? @endsection


@include('inc.banner')

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
                	<input id="user-input" type="email" placeholder="Телефон или email" class="user-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> 
					@error('email')
                    	<span class="invalid-feedback" role="alert">
                    	<strong>{{ $message }}</strong>
                    	</span>
                	@enderror
				
                	<input id="password" type="password" placeholder="Телефон или email" class="user-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
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
						<a href="#" class="register-link">Регистрация</a>
						<a href="#" class="mem-password">Забыли пароль?</a>
					</div>
				</div>
			</div>
			

        </form>
</div>

@include('inc.header')

       
@section('content')


@endsection

</main>
