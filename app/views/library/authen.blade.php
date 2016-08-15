@extends('library.layout')

@section('head')
	<title>Leafbox :: Home</title>
@stop

@section('body')
<div class="row">

  <div class="col-md-6 col-md-offset-3">
    <div class="alert alert-info">
      กรุณาทำการเข้าสู่ระบบก่อนหากท่านมีบัญชีอยู่แล้ว ในกรณีที่ไม่มีสามารถสมัครได้ด้านล่าง
    </div>
  </div>

  <div class="panel col-sm-6 col-sm-offset-3">
    <div class="panel-body">
      <div class="text-center">
        <img class = "img-logo" src="{{ asset('/img/logo.png') }}" >
      </div>
        {{ Form::open(array('url' => 'loginUser')) }}
      <p>
        {{ Form::label('email', 'อีเมลล์ผู้ใช้') }}
        {{ Form::text('email', Input::old('email'), array('placeholder' => 'อีเมลล์ที่ใช้สมัคร','class'=> 'form-control')) }}
      </p>
      <p>
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password',array('placeholder' => 'รหัสผ่านของคุณ','class'=> 'form-control')) }}
      </p>
      <hr>
        <div class="text-center">
          {{ Form::submit('login',array('class'=> 'btn btn-lg btn-success')) }} <br/><br/>
            ถ้าหากคุณยังไม่ได้เป็นสมาชิก <br />
            {{ HTML::link('/registration', 'สมัครสมาชิก') }}
            {{ Form::close() }}
      </div>

    </div>
  </div>
</div>

@stop
