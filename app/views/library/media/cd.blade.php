@extends('library.layout')

@section('head')
  <title>Leafbox :: Daisy - {{$item->id}}</title>
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
			<form action="{{ URL::to('book/'.$book->id.'/cd/'.$item->id.'/edit'); }}" method="POST" role="form">
	<div class="col-md-12">


		<table class="table">
						<tr>
							<th>ID</th>
							<th>ส่วนที่</th>
							<th>สถานะ</th>
							<th>หมายเหตุ</th>
							<th>แทร็กเริ่มต้น</th>
							<th>แทร็กสุดท้าย</th
						</tr>
						@foreach ($detail as $key => $value)
						<tr>
							<td>{{$value->id}}</td>
							<td>{{$value->part}}</td>
							<td>
								<select name="status[]" class="form-control">
									<option value="">เลือกสถานะ</option>
									<option {{$value->status==0?'selected':''}} value="0">ปกติ</option>
									<option {{$value->status==1?'selected':''}} value="1">ชำรุด</option>
									<option {{$value->status==2?'selected':''}} value="2">รอซ่อม</option>
								</select>
							</td>
							<td>
								<input type="text" name="note[]" class="form-control" value="{{$value->notes}}">	
							</td>
							<td>
								<input type="number" name="track_fr[]" class="form-control" value="{{$value->track_fr}}">	
							</td>
							<td>
								<input type="number" name="track_to[]" class="form-control" value="{{$value->track_to}}">	
							</td>
						</tr>
						@endforeach
					</table>

		</div>
		 <div class="col-md-12">
				<input type = "submit"  class="btn btn-success pull-right" value = "แก้ไข">
				<a href = "{{ URL::previous() }}" class = "btn btn-warning pull-right">กลับ</a>
		 </div>
		</form>
	</div>
</div>
@stop