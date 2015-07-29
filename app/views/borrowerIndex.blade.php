@extends('library.layout')

@section('head')
<title>ระบบจัดการผู้ยืม</title>
@stop
@section('body')
<div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="panel">
				<div class="panel-body">
			      	<div class="col-md-2" style="height: 38px; line-height: 35px"><p>ค้นหาสมาชิก</div>
			      	<div class="col-md-10"><input type="text" class="form-control" placeholder="ค้นหา"></div>
			  	</div>
			</div>
		</div>
		<div class="col-md-2" style="text-align: right">
			<button class="btn btn-primary">เพิ่มรายชื่อผู้ยืม</button>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="panel panel-info">
				<div class="panel-body">
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<br>
						<table class="table table-striped table-hover">
						<thead>
							<tr class="info">
								<th class="text-center">รหัสสมาชิก</th>
								<th>ชื่อ - สกุล</th>
								<th>เพศ</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($members as $member)
							<tr>
								<td class="text-center">{{$member->id}}</td>
								<td>{{$member->name}}</td>
								<td>{{$member->gender == 'ญ' ? 'หญิง':'ชาย'}}</td>
								<td><button class="btn btn-danger">ลบ</button></td>
							</tr>
							@endforeach
						</tbody>
					</table>
					</div>
					<div class="col-md-1"></div>
				</div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>
@stop
