@extends('library.layout')
@section('head')
<title>ระบบจัดการผู้ใช้</title>
@stop
@section('body')
	<div class="col-md-8 col-md-offset-2 panel">
		<h2> สมัครสมาชิก  </h2> <br />
		<div class="col-md-8 col-md-offset-2">
			{{ Form::open(array('url' => 'user/store')) }}
			{{ Form::label('username', 'ชื่อผู้ใช้') }}
			{{ Form::text('username', '', array('class' => 'form-control')) }}
			{{ Form::label('email', 'Email') }}
			{{ Form::email('email', '',array('class' => 'form-control')) }}
			{{ Form::label('name', 'ชื่อ นามสกุล') }}
			{{ Form::text('name', '',array('class' =>
			'form-control')) }}
			{{ Form::label('password', 'รหัสผ่าน') }}
			{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
    	ใส่รหัสผานอีกครั้ง <br />
			{{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm Password')) }}
			<br />
			<div class="text-center">
				{{ Form::submit('ตกลง', array('class' => 'btn btn-success btn-lg' )) }}
			</div>
			{{ Form::close() }}
		</div>
	</div>
@stop
