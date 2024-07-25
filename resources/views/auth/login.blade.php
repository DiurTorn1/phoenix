@extends('layouts.app')
@section('title-block') Кто ты, воин? @endsection

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
                    <button type="submit" class="top-menu-btn" id="top-menu-btn">
						Войти
                    </button>
				</div>
				<input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="" for="remember">
                        {{ __('Запомни меня, тварь!!!') }}
        		</label>
			</div>
			

        </form>
</div>
@include('inc.banner')
@include('inc.header')

       
@section('content')


@endsection

</main>
