@extends('admin_panel')
@section('title-block') Пользователи @endsection
@section('admin_res')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr> 
 @foreach ( Auth::user() as $key )
  <tr>
    <td>{{ Auth::user()->id }}</td>
    <td>{{ Auth::user()->name }}</td>
    <td>{{ Auth::user()->email }}</td>
    <td>
      @if(!empty(Auth::user()->getRoleNames()))
        @foreach(Auth::user()->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <a class="" href="">Show</a>
       <a class="" href="">Edit</a>
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', Auth::user()->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}

@endsection