@extends('library.layout')
@section('head')
<title>ระบบจัดการผู้ใช้</title>
@stop
@section('body')
	
	<div class="col-md-8 col-md-offset-2 panel">
		<b>ข้อมูลของผู้ใช้</b> <br /> 
		ชื่อผู้ใช้ {{ $user->name }} <br />
		อีเมล {{ $user->email }} <br />
	</div>

	<div class="col-md-8 col-md-offset-2 panel">
		<b> จัดการผู้ใช้อื่นๆ </b> <br />

			@foreach( $users as $user )
				<div class="list-group">
				    <h4 class="list-group-item-heading">{{ $user->name }}</h4>s
				    <p class="list-group-item-text"> 
				    	Username : {{ $user->username }} <br />
				    	Email : {{ $user->email }} <br />
				    	<a href="">edit</a>
				    	<button url="{{ url('user/'.$user->id.'/destroy') }}" class="del_user" >remove</button> 
				    </p>
				</div>
			@endforeach

	</div>

@stop