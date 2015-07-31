@extends('library.layout')
@section('head')
<title>ระบบจัดการผู้ใช้</title>
@stop
@section('body')
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-info">
			<div class="panel-heading panel-warning">
				<i class="fa fa-user"></i>
				<b>ข้อมูลของผู้ใช้</b>
			</div>
			<div class="panel-body">
				<table class="table table-hover">
					<tr>
						<td>ชื่อผู้ใช้</td><td>{{ $user->name }}</td>
					</tr>
					<tr>
						<td>อีเมล</td><td>{{ $user->email }}<td>
					</tr>
				</table>
				 <br />
			</div>
		</div>
	</div>

	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-info">
			<div class="panel-heading" >
				<i class="fa fa-users"></i>
				<b> จัดการผู้ใช้อื่นๆ </b>
			</div>
			<div class="panel-body">
				@if($user->isAdmin())
					@foreach( $users as $user )
							<div class="col-md-4" id = "{{ $user->id }}">
							    <h4>{{ $user->name }}</h4>
										<table class="table table-hover table-responsive">
											<tr>
												<td>Username</td><td>{{ $user->username }}</td>
											</tr>
											<tr>
												<td>Email</td><td>{{ $user->email }}</td>
											</tr>
										</table>
									<div class="text-center">
										<button user-id = "{{ $user->id }}" url="{{ url('user/'.$user->id.'/destroy') }}" class="del_user btn btn-danger" >ลบผู้ใช้งาน</button>
									</div>
							</div>
					@endforeach
				@else
					<div class="well">
						<i class="fa fa-exclamation-triangle"></i>
						คุณไม่มีสิทธิในการจัดการผู้ใช้อื่น
					</div>
				@endif
			</div>
		</div>
	</div>

@stop
