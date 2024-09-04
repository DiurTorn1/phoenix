@extends('admin_panel')
@section('title-block') Пользователи @endsection
@section('admin_res')
<script type="text/javascript" src = "{{ asset('js/Backbone.js') }}"></script>
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
<script>
var r = new Resumable({
  target: ''
});


r.assignBrowse(document.getElementById('exel_users_load'));

r.on('fileSuccess', function(file){
    console.debug('fileSuccess',file);
  });
r.on('fileProgress', function(file){
    console.debug('fileProgress', file);
  });
r.on('fileAdded', function(file, event){
    r.upload();
    console.debug('fileAdded', event);
  });
r.on('filesAdded', function(array){
    r.upload();
    console.debug('filesAdded', array);
  });
r.on('fileRetry', function(file){
    console.debug('fileRetry', file);
  });
r.on('fileError', function(file, message){
    console.debug('fileError', file, message);
  });
r.on('uploadStart', function(){
    console.debug('uploadStart');
  });
r.on('complete', function(){
    console.debug('complete');
  });
r.on('progress', function(){
    console.debug('progress');
  });
r.on('error', function(message, file){
    console.debug('error', message, file);
  });
r.on('pause', function(){
    console.debug('pause');
  });
r.on('cancel', function(){
    console.debug('cancel');
  });
</script>

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