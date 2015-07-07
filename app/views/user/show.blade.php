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
		@if($user->isAdmin())
			@foreach( $users as $user )
				<div class="col-md-4" id = "{{ $user->id }}">
				    <h4>{{ $user->name }}</h4>
				    	Username : {{ $user->username }} <br />
				    	Email : {{ $user->email }} <br />
				    	<button user-id = "{{ $user->id }}" url="{{ url('user/'.$user->id.'/destroy') }}" class="del_user btn btn-danger" >ลบผู้ใช้งาน</button>
				</div>
			@endforeach
		@else
			<div class="well">
				คุณไม่มีสิทธิในการจัดการผู้ใช้อื่น
			</div>
		@endif

	</div>

@stop
