@extends('admin_panel')
@section('title-block') Пользователи @endsection
@section('admin_res')
<div class="">
    <div class="">
        <div class="">
            <h2> Показать пользователя</h2>
        </div>
        <div class="">
            <a class="" href="{{ route('users.index') }}"> Назад</a>
        </div>
    </div>
</div>


<div class="">
    <div class="">
        <div class="">
            <strong>Имя:</strong>
            {{ $user->name }}
        </div>
    </div>
    <div class="">
        <div class="">
            <strong>Почта:</strong>
            {{ $user->email }}
        </div>
    </div>
    <div class="">
        <div class="">
            <strong>Роль:</strong>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <label class="">{{ $v }}</label>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection