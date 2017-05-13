@extends('library.layout')
@section('head')
<title>ระบบจัดการผู้ใช้</title>
@stop
@section('body')
<div ng-controller="UserController">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-info">
			<div class="panel-heading" style="font-size: 18px">
				<i class="fa fa-user"></i>
				<b>ข้อมูลของผู้ใช้</b>
			</div>
			<div class="panel-body">
				<div class="col-md-10 col-md-offset-1">
					<table class="table table-hover">
						<tr>
							<td><b>ชื่อผู้ใช้งาน:</b></td><td>{{$user->name}}<td>
						</tr>
						<tr>
							<td><b>อีเมล:</b></td><td>{{ $user->email }}<td>
						</tr>
						<tr>
							<td><b>ตำแหน่ง:</b></td><td>{{ $user->role }}<td>
						</tr>
						<tr>
							<td><b>แก้ไขล่าสุด:</b></td><td>{{ $user->updated_at }}<td>
						</tr>
						<tr>
							<td><b>จัดการ: </b></td>
							<td>
								<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal" ng-click="Edit('{{$user->id}}', '{{$user->name}}', '{{$user->username}}', '{{$user->email}}' ,'{{$user->role}}')">แก้ไข</button>
								<button user-id = "{{ $user->id }}" url="{{ url('user/'.$user->id.'/destroy') }}" class="del_user btn btn-danger btn-sm" >ลบ</button>	
							</td>								
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-info">
			<div class="panel-heading" style="font-size: 18px">
				<i class="fa fa-users"></i>
				<b> จัดการผู้ใช้อื่นๆ </b>
			</div>
			<div class="panel-body">
				@if($user->isAdmin())
					@foreach( $users as $user )
							<div class="col-xs-6 col-md-6" id = "{{ $user->id }}">
							    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						    		<h4>{{ $user->name }}</h4>
									<table class="table table-hover table-responsive">
										<tr>
											<td><b>ชื่อผู้ใช้งาน:</b></td><td>
											<label id="{{'name'.$user->id}}">{{ $user->username }}</label></td>
										</tr>
										<tr>
											<td><b>อีเมล:</b></td><td>{{ $user->email }}</td>
										</tr>
										<tr>
											<td><b>ตำแหน่ง:</b></td><td>{{ $user->role }}<td>
										</tr>
										<tr>
											<td><b>แก้ไขล่าสุด:</b></td><td>{{ $user->updated_at }}<td>
										</tr>
										<tr>
											<td><b>จัดการ: </b></td>
											<td>
											<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal" ng-click="Edit('{{$user->id}}', '{{$user->name}}', '{{$user->username}}', '{{$user->email}}', '{{$user->role}}')">แก้ไข</button>
												<button user-id = "{{ $user->id }}" url="{{ url('user/'.$user->id.'/destroy') }}" class="del_user btn btn-danger btn-sm" >ลบ</button>	
											</td>								
										</tr>
									</table>		
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

	<!-- Modal -->
	<div class="modal fade" id="editModal" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">แก้ไขข้อมูลผู้ใช้งาน</h4>
	      </div>
	      <div class="modal-body">
	        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-xs-offset-1 col-md-offset-1">
				<table class="table table-hover table-responsive" style="font-size: 16px">
					<tr>
						<td><b>ชื่อ:</b></td>
						<td><input type="text" class="form-control" ng-model = "user.name"></td>
					</tr>
					<tr>
						<td><b>ชื่อผู้ใช้งาน:</b></td>
						<td><input type="text" class="form-control" ng-model = "user.username"></td>
					</tr>
					<tr>
						<td><b>รหัสผ่านใหม่:</b></td>
						<td><input type="password" class="form-control" ng-model = "user.password"></td>
					</tr>
					<tr>
						<td><b>ยืนยันรหัสผ่านใหม่:</b></td>
						<td><input type="password" class="form-control" ng-model = "user.conf_password"></td>
					</tr>					
					<tr>
						<td><b>อีเมล:</b></td>
						<td><input type="text" class="form-control" ng-model = "user.email"></td>
					</tr>
					<tr>
						<td><b>ตำแหน่ง:</b></td>
						<td><input type="text" class="form-control" ng-model = "user.role"></td>
					</tr>
						<div class="alert alert-danger text-center" ng-show="alert_edit != ''">
							<span class="glyphicon glyphicon-alert"></span> <strong> <%alert_edit%></strong>
						</div></td>
					
				</table>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
	        <a type="button" class="btn btn-success" ng-click="AcceptEdit()" href="{{ url('user/'.Auth::user()->id) }}">ยืนยัน</a>
	      </div>
	    </div>
	  </div>
	</div>
</div>
@stop

@section('script')
@parent
<script>
  angular.module('leafBox').run(function($rootScope) {
    $rootScope.master_user_id = {{ $user->id }};
  });
</script>
@stop