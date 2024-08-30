@extends('admin_panel')
@section('title-block') Пользователи @endsection
@section('admin_res')
<script type="text/javascript" src = "{{ asset('js/Backbone.js') }}"></script>
<script type="text/javascript" src = "{{ asset('js/exel_user_load.js') }}"></script>
<div class="admin-content">
    <div class="top-menu-head admin-back">
        <div class="top-menu-title">
            <h2>Список пользователей</h2>
        </div>
        <div class="right-heder">
            <a class="top-menu-btn save-st" href="{{ route('users.create') }}"> Добавить нового пользователя</a>
            <a class="top-menu-btn" href="#" id="exel_users_load"> Загрузить пользователей из EXEL</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="">
  <p>{{ $message }}</p>
</div>
@endif


<table>
<tbody class="tbody-wrapper">
 <tr class="tr-wrapper admin-video-item admin-back">
   <th>ID</th>
   <th>Имя</th>
   <th>Почта</th>
   <th>Роль</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr class="tr-wrapper admin-video-item admin-back">
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
    <td class="td-item-action">
       <a class="" href="{{ route('users.show',$user->id) }}">Показать карточку</a>
       <a class="" href="{{ route('users.edit',$user->id) }}">Редактировать</a>
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Удалить', ['class' => 'del-button']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</tbody>
</table>


{!! $data->render() !!}

@endsection