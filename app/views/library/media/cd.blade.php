@extends('library.layout')
@section('head')
<title>Leafbox :: CD - {{$item->id}}</title>
@stop
@section('body')
<div class="container">
	<div class="panel panel-{{$item->reserved?'warning':'success'}}">
		<div class="panel-heading">
			<h3 class="panel-title">
			{{$item->id}}. {{$book->title}} ({{$item->reserved?"ถูกยืม":"ยืมได้"}})
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
				<br><br><br>
				<div class="line2 row" id="cd-field">
					<div class="col-md-2 form-label">แทร็กเริ่มต้น</div>
					<div class="col-md-2"><input type="number" name="track_fr[]" class="form-control" id="tr-start" value="0"></div>
					<div class="col-md-2 form-label" id="cd-field-label">แทร็กสุดท้าย</div>
					<div class="col-md-2" id="cd-field-input"><input type="number" name="track_to[]" class="form-control" id="tr-end" value="0"></div>
				</div>
			</div>
			<hr>
			<form action="{{ URL::to('book/'.$book->id.'/cd/'.$item->id.'/edit'); }}" method="POST" role="form">
				<div class="col-md-12">
					<table class="table">
						<tr>
							<th>ID</th>
							<th>ส่วนที่</th>
							<th>สถานะ</th>
							<th>หมายเหตุ</th>
							<th>แทร็กเริ่มต้น</th>
							<th>แทร็กสุดท้าย</th>
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
								<input type="text" name="note[]" class="form-control note" value="{{$value->notes}}">
							</td>
							<td>
								<input type="number" name="track_fr[]" class="form-control track-start" value="{{$value->track_fr}}">
							</td>
							<td>
								<input type="number" name="track_to[]" class="form-control track-end" value="{{$value->track_to}}">
							</td>
						</tr>
						@endforeach
					</table>
				</div>
				<div class="col-md-12">
					<div class = "btn btn-warning pull-left" onclick="window.history.back()" > กลับ </div>
					<input type = "submit"  class="btn btn-success pull-right" value = "แก้ไข">
				</div>
			</form>
		</div>
	</div>
</div>
@stop

@section('script')
@parent
<script>
	$('#edit-all-field').click(function() {
		$('.select-status').prop('value', $('#select-all-status').val());
		$('.note').prop('value', $('#head-note').val());
		$('.track-start').prop('value', $('#tr-start').val());
		$('.track-end').prop('value', $('#tr-end').val());
	});
</script>
@stop
