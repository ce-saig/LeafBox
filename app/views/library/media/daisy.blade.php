@extends('library.layout')
@section('head')
<title>Leafbox :: Daisy - {{$item->id}}</title>
@stop
@section('body')
<div class="container">
	<div class="panel panel-{{$item->reserved?'warning':'success'}}">
		<div class="panel-heading">
			<h3 class="panel-title">
				เดซี่: {{$item->id}}. {{$book->title}} ({{$item->reserved?"ถูกยืม":"ยืมได้"}})
			</h3>
		</div>
		<div class="panel-body">
			<div class="text-center">
				<div class="line1">
					<div class="input col-md-10" >
						<div class="col-md-2 form-label" style="text-align: left">สถานะ</div>
						<div class="col-md-3">
							<select class="form-control" id="select-all-status">
								<option value="0">ปกติ</option>
								<option value="1">ชำรุด</option>
								<option value="2">รอซ่อม</option>
							</select>
						</div>
						<div class="col-md-2 form-label">หมายเหตุ</div>
						<div class="col-md-5"><input type="text" name="note[]" class="form-control" id="head-note" value=""></div>
					</div>
					<div class="col-md-2">
						<button type="button" class="btn btn-warning" id="edit-all-field">แก้ไขทั้งหมด</button>
					</div>
				</div>
			</div>
			<hr>
			<form action="{{ URL::to('book/'.$book->id.'/daisy/'.$item->id.'/edit'); }}" method="POST" role="form">
				<div class="col-md-12">
					<table class="table">
						<tr>
							<th class="col-md-1">ID</th>
							<th class="col-md-1">ชิ้นที่</th>
							<th class="col-md-1">สถานะ</th>
							<th class="col-md-2">วันที่แก้ไข</th>
							<th class="col-md-2">แทร็กเริ่มต้น</th>
							<th class="col-md-2">แทร็กสุดท้าย</th>
							<th class="col-md-3">หมายเหตุ</th>
						</tr>
						@foreach ($detail as $key => $value)
						<tr>
							<td>{{$value->id}}</td>
							<td>{{$value->part}}</td>
							<td>
								<select name="status[]" class="form-control select-status">
									<option {{$value->status==0?'selected':''}} value="0">ปกติ</option>
									<option {{$value->status==1?'selected':''}} value="1">ชำรุด</option>
									<option {{$value->status==2?'selected':''}} value="2">รอซ่อม</option>
								</select>
							</td>
							<td>
								<input type="text" class="form-control datepicker" name="date[]" value="{{$value->date}}">
							</td>
							<td>
								<input type="number" name="track_fr[]" class="form-control track-start" value="{{$value->track_fr}}">
							</td>
							<td>
								<input type="number" name="track_to[]" class="form-control track-end" value="{{$value->track_to}}">
							</td>
							<td>
								<input type="text" name="note[]" class="form-control note" value="{{$value->notes}}">
							</td>
						</tr>
						@endforeach
					</table>
				</div>
				<div class="col-md-12">
					<div class = "btn btn-warning pull-left" onclick="window.history.back()" > กลับ </div>
					<input type = "submit"  class="btn btn-success pull-right" value = "บันทึก">
				</div>
			</form>
		</div>
	</div>
</div>
@stop

@section('script')
@parent
<script>
$(".datepicker").datepicker({
				language:'th-th',
				format: 'dd/mm/yyyy',
				isBuddhist: true
			});
			
	$('#edit-all-field').click(function() {
		$('.select-status').prop('value', $('#select-all-status').val());
		$('.note').prop('value', $('#head-note').val());
	});
</script>
@stop
