@extends('admin_panel')
@section('title-block') Пользователи @endsection
@section('admin_res')
<div class="top-menu-head tr-wrapper-mb admin-back">
    <div class="">
        <div class="top-menu-title">
            <h2> Данные пользователя</h2>
        </div>
        <div class="right-heder">
            <a class="top-menu-btn" href="{{ route('users.index') }}"> Назад</a>
        </div>
    </div>
</div>


<div class="tbody-wrapper admin-video-item admin-back">
    <div class="">
        <strong class="admin-video-item-h-date">Имя:</strong>
        {{ $user->name }}
    </div>
    <div class="">
        <strong class="admin-video-item-h-date">Почта:</strong>
        {{ $user->email }}
    </div>
    <div class="">
        <strong class="admin-video-item-h-date">Роль:</strong>
        @if(!empty($user->getRoleNames()))
            @foreach($user->getRoleNames() as $v)
                <label class="">{{ $v }}</label>
            @endforeach
        @endif
    </div>
</div>
@endsection