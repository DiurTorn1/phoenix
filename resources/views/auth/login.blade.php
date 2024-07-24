@extends('layouts.app')
@section('title-block') Кто ты, воин! @endsection
@section('content')
<!------------------ Окно Входа -------------------------->
	<div class="popup-back" id="popup-back">
	    <form action="" class="popup-container">
			<div class="popup-content">
				<div class="popup-title-wrap">
					<button class="popup-close close-btn" id="popup-close" title="Закрыть"><img src="img/close.png" alt="Закрыть"></button>
					<h2 class="popup-title">Вход</h2>
				</div>
				<div class="popup-content-wrap">
					<input type="text" placeholder="Телефон или email" required class="user-input" pattern="	\+[0-9]{1,4}[0-9]{1,10}|(.*)@(.*)\.[a-z]{2,5}" title="" oninvalid="setCustomValidity('Пожалуйста, введите 	номер телефона или email')">
					<input type="text" placeholder="Введите код" required class="user-input">
					<button type="submit" class="top-menu-btn">Войти</button>
				</div>
			</div>
		</form>
	</div>
<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection
