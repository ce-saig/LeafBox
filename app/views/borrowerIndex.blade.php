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
					<div class="col-md-3" id="search-member-label " style="font-size:1.5em; padding-left:5%;">ค้นหาสมาชิก</div>
					<div class="col-md-7"><input type="text" class="form-control" id="find-member" placeholder="ค้นหา"></div>
					<div class="col-md-2"><a href="{{ url('borrower/create') }}" class="btn btn-primary btn-sm">เพิ่มสมาชิก</a></div>
				</div>
			</div>
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
								<tr style="font-size: 1.3em; color:white;background-color: #007acc">
									<th class="text-center col-sm-3">รหัสสมาชิก</th>
									<th class="col-sm-4"><div class="text-center">ชื่อ - สกุล</div></th>
									<th class="text-center col-sm-2">เพศ</th>
									<th class="col-sm-2"></th>
									<th class="col-sm-1"></th>
								</tr>
							</thead>
							<tbody id="result">
								@foreach($members as $member)
								<tr class="member" id="{{ $member->id }}">
									<td class="text-center">{{$member->id}}</td>
									<td>{{$member->name}}</td>
									<td class="text-center">{{$member->gender == 'ญ' ? 'หญิง':'ชาย'}}</td>
									<td><button class="btn btn-success btn-sm member-detail" id="{{ $member->id }}">รายละเอียด</button></td>
									<td><button class="btn btn-danger btn-sm del-member" id="{{ $member->id }}">ลบ</button></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
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
				<button class="btn btn-danger del-confirm col-md-3 col-md-offset-1">ใช่</button>
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
			<div class="modal-body" style="overflow: auto">
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
				<a href="{{ url('borrower/editMember/') }}" class="btn btn-success pull-right edit-member">แก้ไขข้อมูล</a>
				<br>
				<br>
				<ul class="nav nav-tabs nav-justified">
					<li role="presentation" class="active" id="history"><a href="#">ประวัติยืม - คืน</a></li>
					<li role="presentation" id="non-return-list"><a href="#">รายการที่ยังไม่คืน</a></li>
				</ul>
				<div class="container col-md-12" >
					<table class="table table-striped table-hover" id="history-result">
						<thead id="table-head-history" style="color:black">
						</thead>
						<tbody id="table-result-history" style="font-size: 12px">
						</tbody>
					</table>
					<table class="table table-striped table-hover" id="non-return-result" hidden>
						<thead id="table-head-non-return" style="color:black">
						</thead>
						<tbody id="table-result-non-return" style="font-size: 12px">
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@stop
@section('script')

@parent
<script>
	var member_id = null;

	$('body').on('click', '#history', function() {
		$('#history').prop('class', 'active');
		$('#non-return-list').prop('class', '');
		$('#non-return-result').hide();
		$('#history-result').show();
	});

	$('body').on('click', '#non-return-list', function() {
		$('#non-return-list').prop('class', 'active');
		$('#history').prop('class', '');
		$('#history-result').hide();
		$('#non-return-result').show();
	});

	$('body').on('click', '.member-detail', function() {
		console.log('post member');
		member_id = $(this).prop('id');
		$.ajax({
			type: "POST",
			url: "{{ url('borrower/postMember') }}",
			data: {selectedMember: member_id}
		}).done(function(data) {
			$('#member-id').prop('value', data['id']);
			$('#member-name').prop('value', data['name']);
			$('#member-gender').prop('value', (data['gender'] == 'ช' ? 'ชาย' : 'หญิง'));
			$('#member-tel').prop('value', data['phone_no']);
			$('#member-status').prop('value', data['member_status']);
			$('#member-address').prop('value', data['address']);
			$('#member-district').prop('value', data['district']);
			$('#member-pro-post').prop('value', data['province_postcode']);
			addHistoryList();
			addNonReturnList();
			$('.show-member-data').modal('show');
		});
	});

	$('#find-member').on('input propertychange paste', function() {
		$('#result').html('');
		$.ajax({
			type: "POST",
			url: " {{ url('borrower/search') }} ",
			data: {keyword: $('#find-member').val()}
		}).done(function(data) {
			addToList(data);
		});
	});

	$('body').on('click', '.del-member', function() {
		member_id = $(this).prop('id');
		$('#notify').modal('show');
	});

	$('.del-confirm').click(function() {
		$.ajax({
			type: "POST",
			url: " {{ url('borrower/delete') }} ",
			data: {id: member_id}
		}).done(function(data) {
			if(data == "true") {
				$('#' + member_id + '.member').remove();
				$('#notify').modal('hide');
				console.log('success');
			}
		});
	});

	$('#notify').on('click', '.cancel-confirm', function() {
		$('#notify').modal('hide');
	});

	function addToList(data) {
		$('#result').html('');
		var member = jQuery.parseJSON(data);
		console.log(member);
		if(Array.isArray(member)) {
			for(var i = member.length - 1; i >= 0; i--)
				$('#result').prepend('<tr class="member" id="' + member[i]['id'] + '"><td class="text-center">' + member[i]['id'] + '</td><td>' + member[i]['name'] + '</td><td class="text-center">' + (member[i]['gender'] == 'ญ' ? 'หญิง' : 'ชาย') +'</td><td><button class="btn btn-success member-detail" id="' + member[i]['id'] +'">รายละเอียด</button></td><td><button class="btn btn-danger del-member" id="' + member[i]['id'] +'">ลบ</button></td></tr>');
		}
		else if(member != null)
				$('#result').prepend('<tr class="member" id="' + member['id'] + '"><td class="text-center">' + member['id'] + '</td><td>' + member['name'] + '</td><td class="text-center">' + (member['gender'] == 'ญ' ? 'หญิง' : 'ชาย') +'</td><td><button class="btn btn-success member-detail" id="' + member['id'] +'">รายละเอียด</button></td><td><button class="btn btn-danger del-member" id="' + member['id'] +'">ลบ</button></td></tr>');
	};


	function addHistoryList() {
		$.ajax({
			type: "POST",
			url: "{{ url('borrower/getHistory/') }}",
			data: {member_id}
		}).done(function(data) {
			$('#table-head-history').html('');
			$('#table-head-history').append('<tr class="info text-center"><td class="col-sm-4">ชื่อหนังสือ</td><td class="col-sm-2">ประเภท</td><td class="col-sm-2">รหัส</td><td class="col-sm-2">วันที่ยืม</td><td class="col-sm-2">วันที่คืน</td></tr>');
			$('#table-result-history').html('');
			data = jQuery.parseJSON(data);
			var index = 0;
			var date_borrowed = null;
			var date_return = null;
			while(data[index]) {
				date_borrowed = data[index]['date_borrowed'];
				date_returned = data[index]['actual_returned'];
				$('#table-result-history').append("<tr><td>" + data[index]['book_name'] + "</td><td class='text-center'>" + data[index]['type'] + "</td><td class='text-center'>" + data[index]['typeID'] + "</td><td>" + date_borrowed.substr(0, 2) + '/' + date_borrowed.substr(3, 2) + '/' + (parseInt(date_borrowed.substr(6, 4))+543) + "</td><td>" + date_returned.substr(0, 2) + '/' + date_returned.substr(3, 2) + '/' + (parseInt(date_returned.substr(6, 4))+543) + "</td></tr>");
				index++;
			}
		});
	};

	function addNonReturnList() {
		$.ajax({
			type: "POST",
			url: "{{ url('borrower/getNonReturn/') }}",
			data: {member_id}
		}).done(function(data) {

			if(data == null)
				console.log('no log');
			$('#table-head-non-return').html('');
			$('#table-head-non-return').append('<tr class="info text-center"><td class="col-sm-4">ชื่อหนังสือ</td><td class="col-sm-2">ประเภท</td><td class="col-sm-2">รหัส</td><td class="col-sm-2">วันที่ยืม</td><td class="col-sm-2">กำหนดคืน</td></tr>');
			$('#table-result-non-return').html('');
			data = jQuery.parseJSON(data);
			var index = 0;
			var date_borrowed = null;
			var date_return = null;
			while(data[index]) {
				date_borrowed = data[index]['date_borrowed'];
				due_date = data[index]['date_returned'];
				$('#table-result-non-return').append("<tr><td>" + data[index]['book_name'] + "</td><td class='text-center'>" + data[index]['type'] + "</td><td class='text-center'>" + data[index]['typeID'] + "</td><td>" + date_borrowed.substr(0, 2) + '/' + date_borrowed.substr(3, 2) + '/' + (parseInt(date_borrowed.substr(6, 4))+543) + "</td><td>" + due_date.substr(0, 2) + '/' + due_date.substr(3, 2) + '/' + (parseInt(due_date.substr(6, 4))+543) + "</td></tr>");
				index++;
			}
		});
	};
</script>
@stop
