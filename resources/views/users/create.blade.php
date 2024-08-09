@extends('admin_panel')
@section('title-block') Пользователи @endsection
@section('admin_res')
<div class="admin-container top-menu-admin">
<div class="">
    <div class="top-menu-head admin-back">
        <div class="left-header">
            <h2 class="top-menu-title">Добавление нового пользователя</h2>
        </div>
        <div class="right-heder">
            <a class="top-menu-btn" href="{{ route('users.index') }}"> Back</a>
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
    <div class="">
        <div class="admin-input-box block-admin-input">
            <strong>Роль:</strong>
            {!! Form::select('roles[]', $roles,[], array('class' => 'block-admin-input admin-input','multiple')) !!}
        </div>
    </div>
    <div class="admin-input-box block-admin-input">
        <button type="submit" class="top-menu-btn">Принять</button>
    </div>
</div>
{!! Form::close() !!}
</div>

@endsection