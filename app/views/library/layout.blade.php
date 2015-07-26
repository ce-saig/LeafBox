<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap CSS -->
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href=" {{ asset('css/main.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.dataTables.min.css') }}">


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	@yield('head')

	<style type="text/css">


    </style>
  </head>
  <body>
    <div class="navbar navbar-default">
     <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </button>
       <a class="navbar-brand" href="/">LeafBox</a>
    </div>
   <div class="navbar-collapse collapse navbar-responsive-collapse">
        <ul class="nav navbar-nav">
          <!-- class="active" -->
          <li><a href="{{URL::to('/')}}">หน้าแรก</a></li>
          <li><a href="{{URL::to('/book/add')}}">เพิ่มหนังสือใหม่</a></li>
          <li><a href="{{URL::to('/borrow')}}">ระบบยืม</a></li>
          <li><a href="{{URL::to('/return')}}">ระบบคืน</a></li>
          <li><a href="{{URL::to('/borrowersystem')}}">ระบบจัดการผู้ยืม</a></li>
          <!-- <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              จัดการหนังสือ <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
             <li><a href="#">เพิ่ม</a></li>
           </ul>
         </li> -->
         <li><a href="#">สมาชิก</a></li>
       </ul>
       <ul class="nav navbar-nav navbar-right">
         <li class="dropdown">

          @if(Auth::check())
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{ url('user/'.Auth::user()->id) }}">จัดการผู้ใช้งาน</a></li>
            <li class="divider"></li>
            <li><a href="{{ URL::to('logout') }}">Log out</a></li>
          </ul>
          @else
          <li data-toggle="modal" data-target="#myModal" ><a> Sign in </a></li>
          @endif

        </li>
      </ul>
    </div>
</div>

<div class = "wrapper">
 <div class="row">
   @if ($errors->has())
   <div class="alert alert-danger" role="alert">
     <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     {{ $errors->first('email') }}
     {{ $errors->first('password') }}
   </div>
   @else
   @endif
   <div class = "col-md-10 col-md-offset-1">
     @yield('body')
   </div>
 </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
         <h4 class="modal-title" id="myModalLabel">Login</h4>
       </div>
       {{ Form::open(array('url' => 'loginUser')) }}
       <div class="modal-body">
        <p>
         {{ Form::label('email', 'Email Address') }}
         {{ Form::text('email', Input::old('email'), array('placeholder' => 'Your Email','class'=> 'form-control')) }}
       </p>
       <p>
         {{ Form::label('password', 'Password') }}
         {{ Form::password('password',array('class'=> 'form-control')) }}
       </p>
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       {{ Form::submit('Submit!',array('class'=> 'btn btn-success')) }}
     </div>
     {{ Form::close() }}
   </div>
  </div>
</div>


<footer>
<div class="footer">
  <div class= "col-md-2 footer-img">
    <img class = "img-logo" src="{{ asset('/img/logo.png') }}" >
  </div>
  <div class = "col-md-10 ">
    <p >ศูนย์เทคโนโลยีการศึกษาเพื่อคนตาบอด</p>
		<p> จัดทำโดย </p>
  </div>
</div>
</footer>
<!-- jQuery -->
@section('script')
<script type="text/javascript"  src="{{ asset('js/jquery.min.js') }}"></script>
<!-- Bootstrap JavaScript -->
<script type="text/javascript"  src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- AJAX Databases -->
<script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/application.js') }}"></script>
@show
</body>
</html>
