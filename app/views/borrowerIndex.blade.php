@extends('library.layout')

@section('head')
<title>ระบบจัดการผู้ยืม</title>
@stop
@section('body')
<div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel">
				<div class="panel-body">
					<div class="col-md-2" id="search-member-label"><p>ค้นหาสมาชิก</div>
					<div class="col-md-10"><input type="text" class="form-control" id="find-member" placeholder="ค้นหา"></div>
				</div>
			</div>
		</div>
		<div class="col-md-2 pull-right">
			<button class="btn btn-primary">เพิ่มรายชื่อผู้ยืม</button>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
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
							<tbody id="result">
								@foreach($members as $member)
								<tr class="member" id="{{ $member->id }}">
									<td class="text-center">{{$member->id}}</td>
									<td>{{$member->name}}</td>
									<td>{{$member->gender == 'ญ' ? 'หญิง':'ชาย'}}</td>
									<td><button class="btn btn-danger del-member" id="{{ $member->id }}">ลบ</button></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="col-md-1"></div>
				</div>
			</div>
		</div>
		<div class="col-md-2"><button class="btn btn-info" id="test-modal">ทดสอบ</button></div>
	</div>
</div>

<div class="modal fade" id="notify">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header modal-notification" id="noti-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title modal-notifiation-title">คุณต้องการลบใช่หรือไม่</h4>
			</div>
			<div class="modal-body" id="del-conf">
				<button class="btn btn-danger del-confirm col-md-3 col-md-offset-1" id="">ใช่</button>
				<button class="btn btn-default cancel-confirm col-md-3 col-md-offset-4">ไม่</button>
				<br><br>
			</div>
		</div>
	</div>
</div>

<div class="modal fade show-member-data">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">ข้อมูลสมาชิก</h4>
			</div>
			<div class="modal-body">
				<form class="form-inline row">
					<div class="form-group col-md-5">
						<div class="col-md-6" style="line-height: 33px"><label>รหัสสมาชิก</label></div>
						<input type="text" class="form-control" style="width: 100px" id="member-id" value="" disabled>
					</div>
					<div class="form-group col-md-7">
						<div class="col-md-4" style="line-height: 33px"><label>ชื่อ - สกุล</label></div>
						<input type="text" class="form-control" style="width: 190px" id="member-name" value=""disabled>
					</div>
					<br><br><br>
					<div class="form-group col-md-5">
						<div class="col-md-6" style="line-height: 33px"><label>เพศ</label></div>
						<input type="text" class="form-control" style="width: 100px" id="member-gender" value=""disabled>
					</div>
					<div class="form-group col-md-7">
						<div class="col-md-4" style="line-height: 33px"><label>โทรศัพท์</label></div>
						<input type="text" class="form-control" style="width: 190px" id="member-tel" value="" disabled>
					</div>
					<br><br><br>
					<div class="form-group col-md-12">
						<div class="col-md-4" style="line-height: 33px"><label>สถานะ</label></div>
						<div class="col-md-8"><input type="text" class="form-control" id="member-status" style="margin-left: -30px; width: 370px" value="" disabled></div>
					</div>
					<br><br><br>
					<div class="form-group col-md-12">
						<div class="col-md-4" style="line-height: 33px"><label>ที่อยู่</label></div>
						<div class="col-md-8"><input type="text" class="form-control" id="member-address" style="margin-left: -30px; width: 370px" value="" disabled></div>
					</div>
					<br><br><br>
					<div class="form-group col-md-12">
						<div class="col-md-4" style="line-height: 33px"><label>เขต / อำเภอ</label></div>
						<div class="col-md-8"><input type="text" class="form-control" id="member-district" style="margin-left: -30px; width: 370px" value="" disabled></div>
					</div>
					<br><br><br>
					<div class="form-group col-md-12">
						<div class="col-md-4" style="line-height: 33px"><label>จังหวัด - รหัสไปรษณีย์</label></div>
						<div class="col-md-8"><input type="text" class="form-control" id="member-pro-post" style="margin-left: -30px; width: 370px" value="" disabled></div>
					</div>
				</form>
				<br>
				<br>
				<a href="{{ url('borrowersystem/editMember/') }}" class="btn btn-success pull-right edit-member">แก้ไขข้อมูล</a>
			</div>
			<hr>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">ประวัติการยืม - คืน</h4>
			</div>
			<div class="modal-body">
				test
			</div>
		</div>
	</div>
</div>

@stop
@section('script')

@parent
<script>
	var member_id = null;

	$('body').on('click', '.member', function() {
		console.log('post member');
		member_id = $(this).prop('id');
		$.ajax({
			type: "POST",
			url: "{{ url('borrowersystem/postMember') }}",
			data: {selectedMember: member_id}
		}).done(function(data) {
			console.log('{{ $selectedMember }}');
			$('#member-id').prop('value', data['id']);
			$('#member-name').prop('value', data['name']);
			$('#member-gender').prop('value', (data['gender'] == 'ช' ? 'ชาย' : 'หญิง'));
			$('#member-status').prop('value', data['member_status']);
			$('#member-address').prop('value', data['address']);
			$('#member-district').prop('value', data['district']);
			$('#member-pro-post').prop('value', data['province_postcode']);
			$('.show-member-data').modal('show');
		});
	});

	$('#find-member').on('input propertychange paste', function() {
		$('#result').html('');
		$.ajax({
			type: "POST",
			url: " {{ url('borrowersystem/search') }} ",
			data: {keyword: $('#find-member').val()}
		}).done(function(data) {
			addToList(data);
		});
	});

	$('body').on('click', '.del-member', function() {
		$('.del-confirm').prop('id', $(this).prop('id'));
		$('#notify').modal('show');
	});

	$('.del-confirm').click(function() {
		var id = $(this).prop('id');
		$.ajax({
			type: "POST",
			url: " {{ url('borrowersystem/delete') }} ",
			data: {id}
		}).done(function(data) {
			console.log(data);
			if(data == "true") {
				$('#' + id + '.member').remove();
				$('#notify').modal('hide');
				console.log('success');
			}
		});
	});

	$('#notify').on('click', '.cancel-confirm', function() {
		$('#notify').modal('hide');
	});

	$('#test-modal').click(function() {
		$('.show-member-data').modal('toggle');
	});

	function addToList(data) {
		$('#result').html('');
		var member = jQuery.parseJSON(data);
		console.log(member.length);
		for(var i = 0; i < member.length; i++)
			$('#result').prepend('<tr class="member" id="' + member[i]['id'] + '"><td class="text-center">' + member[i]['id'] + '</td><td>' + member[i]['name'] + '</td><td>' + (member[i]['gender'] == 'ญ' ? 'หญิง' : 'ชาย') +'</td><td><button class="btn btn-danger del-member" id="' + member[i]['id'] +'">ลบ</button></td></tr>');
	};
</script>
@stop
