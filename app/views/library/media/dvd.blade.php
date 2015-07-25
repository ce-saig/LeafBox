@extends('library.layout')

@section('head')
<title>Leafbox :: DVD - {{$item->id}}</title>
@stop

@section('body')
<div class="contaner">
	<div class="panel panel-{{$item->reserved?'warning':'success'}}">
		<div class="panel-heading">
			<h3 class="panel-title">
				{{$item->id}}. {{$book->title}} ({{$item->reserved?"ถูกยืม":"ยืมได้"}})
			</h3>

		</div>
		<div class="panel-body">
			<form action="{{ URL::to('book/'.$book->id.'/dvd/'.$item->id.'/edit'); }}" method="POST" role="form">

				<div class="col-md-12">
					<table class="table">
						<tr>
							<th>ID</th>
							<th>ส่วนที่</th>
							<th>สถานะ</th>
							<th>หมายเหตุ</th>	
						</tr>
						@foreach ($detail as $key => $value)
						<tr>
							<td>{{$value->id}}</td>
							<td>{{$value->part}}</td>
							<td>
								<select name="status[]" class="form-control">
									<option {{$value->status==0?'selected':''}} value="0">ปกติ</option>
									<option {{$value->status==1?'selected':''}} value="1">ชำรุด</option>
									<option {{$value->status==2?'selected':''}} value="2">รอซ่อม</option>
								</select>
							</td>
							<td>
								<input type="text" name="note[]" class="form-control" value="{{$value->notes}}">	
							</td>
						</tr>
						@endforeach
					</table>
				</div>
				<div class="col-md-12">
					<a class = "btn btn-warning pull-left" href = "{{ URL::previous().'#dvd' }}" > กลับ </a>
          			<input type = "submit"  class="btn btn-success pull-right" value = "แก้ไข">
				</div>
			</form>
		</div>
	</div>
</div>
@stop