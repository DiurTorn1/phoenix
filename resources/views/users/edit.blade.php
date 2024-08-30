@extends('admin_panel')
@section('title-block') Пользователи @endsection
@section('admin_res')
<div class="">
    <div class="top-menu-head admin-back">
        <div class="left-header">
            <h2 class="top-menu-title">Добавить нового пользователя</h2>
        </div>
        <div class="right-heder">
            <a class="top-menu-btn" href="{{ route('users.index') }}"> Назад</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
  <div class="">
    <strong>ООпс!</strong> Случилось страшное на выходе.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif


{!! Form::model($user, ['method' => 'PATCH', 'class' => 'admin-content top-menu-sort block-admin-left-w650 marg-l-0 admin-back', 'route' => ['users.update', $user->id]]) !!}
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
    <div class="">
        <div class="admin-input-box block-admin-input">
            <strong>Роль:</strong>
            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'block-admin-input admin-input','multiple')) !!}
        </div>
    </div>
    <div class="admin-input-box block-admin-input">
        <button type="submit" class="">Принять</button>
    </div>
</div>
{!! Form::close() !!}


@endsection