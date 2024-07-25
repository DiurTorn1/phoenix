@extends('layouts.app')
@section('title-block') Панель админа-господина @endsection

@section('content')

@guest


@else
	@if(!empty(Auth::user()->getRoleNames()))
    @foreach( Auth::user()->getRoleNames() as $v)
		@if($v == "admin")
        <header class="header admin-header">
		<div class="left-header">
			<a href="/admin_panel" class="close-btn" title="Закрыть" ><img src="{{ asset('img/close.png') }}" alt="Закрыть" width="24" height="24"></a>
			<h2 class="top-menu-title">Панель админа-господина</h2>
		</div>
		<div class="right-heder">
		</div>
        </header>
        @endif
    @endforeach
    @endif
@endguest

@endsection