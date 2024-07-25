@extends('admin_panel')
@section('title-block') Пользователи @endsection
@section('admin_res')
<div class="">
    <div class="">
        <div class="">
            <h2>Список пользователей</h2>
        </div>
        <div class="">
            <a class="" href="{{ route('users.create') }}"> Добавить нового пользователя</a>
        </div>
        <div class="">
            <a class="" href=""> Загрузить пользователей из EXEL</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="">
  <p>{{ $message }}</p>
</div>
@endif


<table class="">
 <tr>
   <th>ID</th>
   <th>Имя</th>
   <th>Почта</th>
   <th>Роль</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <a class="" href="{{ route('users.show',$user->id) }}">Показать карточку</a>
       <a class="" href="{{ route('users.edit',$user->id) }}">Редактировать</a>
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Удалить', ['class' => '']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}
@endsection