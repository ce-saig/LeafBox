@extends('library.layout')

@section('head')
	<title>ระบบจัดการผู้ยืม</title>
@stop
@section('body')
<div>
	<div>
		<a href="{{ action('BorrowerSystemController@create') }}"class="btn btn-primary btn-lg btn-block">เพิ่มรายชื่อผู้ยืม</a>
	</div>
	<div>
	<table class="table table-striped">
 		<thead>
 			<tr>
 				<th>Name</th>
 				<th>Gender</th>
 				<th>Address</th>
 				<th>District</th>
 				<th>Postcode</th>
 				<th>Phone Number</th>
 				<th>Action</th>
 			</tr>
 		</thead>
 		<tbody>
 		@foreach($members as $member)
 			<tr>
 				<td>{{$member->name}}</td>
 				<td>{{$member->gender == 'ญ' ? 'หญิง':'ชาย'}}</td>
 				<td>{{$member->address}}</td>
 				<td>{{$member->district}}</td>
 				<td>{{$member->province_postcode}}</td>
 				<td>{{$member->phone_no}}</td>
 				<td>
 					<a href="{{ action('BorrowerSystemController@edit', $member->id) }}"class="btn btn-default">แก้ไข</a>
 				</td>
 				<td>
 					<a href="{{ action('BorrowerSystemController@delete', $member->id) }}" class="btn btn-danger">ลบ</a>
 				</td>
 			</tr>
 		@endforeach
 	</tbody>
 </table>
 </div>
 </div>
 @stop
