<!DOCTYPE html>
<html lang="" ng-app="leafBox">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
	<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
	<!-- Main custom Bootstrap style -->
  <link rel="stylesheet" type="text/css" href=" {{ asset('css/main.css') }}">
	<!-- date-picker style -->
  <link rel="stylesheet" type="text/css" href=" {{ asset('css/datepicker.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.dataTables.min.css') }}">

	<!-- font-awesome package-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Prompt:400,700" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('js/angularjs/ext/ui-select/css/select.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('js/angularjs/ext/ui-select/css/selectize.default.min.css') }}" />
  <style type="text/css">
      body{
        font-family: 'Prompt';
      }
    </style>

	@yield('head')

  </head>
  <body>
    <div class="navbar navbar-default" ng-controller="BackupController">
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
          <li><a href="{{URL::to('/borrower')}}">ระบบจัดการผู้ยืม</a></li>
          <li><a href="{{URL::to('/report')}}">รายงาน</a></li>
          <li><a href="{{URL::to('/backup')}}">ระบบสำรองข้อมูล</a></li>
          
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
  <div class = "col-md-5 ">
    <h4 style="color:white;">ศูนย์เทคโนโลยีการศึกษาเพื่อคนตาบอด</h4>
    <p>78/2 หมู่ 1 ต. บางตลาด ซ. ติวานนท์-ปากเกร็ด 1 ถ. ติวานนท์ อ. ปากเกร็ด จ. นนทบุรี 11120</p>
    <p>โทรศัพท์ : 02-9625818-9, แฟกซ์ : 02-5836518
อีเมล : Chanidapa_pp@hotmail.com</p>
  </div>
   
  <div class="col-md-5" style="text-align: left;">
    <h4 style="color:white; font-size:1.5em">มูลนิธิช่วยคนตาบอดแห่งประเทศไทย ในพระบรมราชินูปถัมภ์</h4>
    <p>420 ถนนราชวิถี แขวงทุ่งพญาไท เขตราชเทวี กรุงเทพมหานคร 10400</p>
    <p>โทรศัพท์ 0-2354-8365-68 , 0-2354-8370-71 โทรสาร 0-2354-8369</p>
    <p>อีเมล service@blind.or.th</p>
  </div>
</div>
</footer>
<!-- jQuery -->
@section('script')
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>

<!-- angular module -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-resource.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-route.js"></script>
<script src="https://code.angularjs.org/1.5.5/angular-sanitize.js"></script>
<script src="https://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-2.0.1.js"></script>
<script src="{{ asset('js/angularjs/app.js') }}"></script>

<script src="{{ asset('js/angularjs/ext/ui-select/js/angular-sanitize.min.js') }}"></script>
<script src="{{ asset('js/angularjs/ext/ui-select/js/select.min.js') }}"></script>

<script src="{{ asset('js/angularjs/components/bookedit.component.js') }}"></script>
<script src="{{ asset('js/angularjs/components/mediatab.component.js') }}"></script>
<script src="{{ asset('js/angularjs/components/production-status.component.js') }}"></script>

<!-- angular controller -->
<script src="{{ asset('js/angularjs/controllers/BackupController.js') }}"></script>
<script src="{{ asset('js/angularjs/controllers/BookViewController.js') }}"></script>
<script src="{{ asset('js/angularjs/controllers/BookEditController.js') }}"></script>
<script src="{{ asset('js/angularjs/controllers/BorrowController.js') }}"></script>
<script src="{{ asset('js/angularjs/controllers/ProductionStatusController.js') }}"></script>
<script src="{{ asset('js/angularjs/controllers/ReportController.js') }}"></script>
<script src="{{ asset('js/angularjs/controllers/UserController.js') }}"></script>
<script src="{{ asset('js/angularjs/controllers/MediaDetailEditController.js') }}"></script>
<script src="{{ asset('js/angularjs/controllers/MediaDetailTabController.js') }}"></script>
<script src="{{ asset('js/angularjs/controllers/modal_controllers/MediaModalController.js') }}"></script>
<script src="{{ asset('js/angularjs/controllers/modal_controllers/ProductionModalController.js') }}"></script>

<!-- angular service -->
<script src="{{ asset('js/angularjs/services/BookService.js') }}"></script>
<script src="{{ asset('js/angularjs/services/MediaService.js') }}"></script>
<script src="{{ asset('js/angularjs/services/UserService.js') }}"></script>
<script src="{{ asset('js/angularjs/services/DateTimeService.js') }}"></script>
<script src="{{ asset('js/angularjs/services/BookProductionService.js') }}"></script>

<!-- Bootstrap JavaScript -->
<script type="text/javascript"  src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- AJAX Databases -->
<script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/application.js') }}"></script>
<!-- Bootstrap Datepicker -->
<script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/locales/bootstrap-datepicker.th.js') }}" charset="UTF-8"></script>
@show
</body>
</html>
