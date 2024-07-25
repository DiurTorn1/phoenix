@extends('admin_panel')
@section('title-block') Пользователи @endsection
@section('admin_res')
<div class="">
    <div class="">
        <div class="">
            <h2>Добавить нового пользователя</h2>
        </div>
        <div class="">
            <a class="" href="{{ route('users.index') }}"> Назад</a>
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


{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
<div class="">
    <div class="">
        <div class="">
            <strong>Имя:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Имя','class' => '')) !!}
        </div>
    </div>
    <div class="">
        <div class="">
            <strong>Почта:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Почта','class' => '')) !!}
        </div>
    </div>
    <div class="">
        <div class="">
            <strong>Пароль:</strong>
            {!! Form::password('password', array('placeholder' => 'Пароль','class' => '')) !!}
        </div>
    </div>
    <div class="">
        <div class="">
            <strong>Повторить пароль:</strong>
            {!! Form::password('confirm-password', array('placeholder' => 'Повторить пароль','class' => '')) !!}
        </div>
    </div>
    <div class="">
        <div class="">
            <strong>Роль:</strong>
            {!! Form::select('roles[]', $roles,$userRole, array('class' => '','multiple')) !!}
        </div>
    </div>
    <div class="">
        <button type="submit" class="">Принять</button>
    </div>
</div>
{!! Form::close() !!}


@endsection