@extends('library.layout')

@section('head')
  <title>Leafbox :: Braille - {{$item->id}}</title>
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
  			<form action="{{ URL::to('book/'.$book->id.'/braille/'.$item->id.'/edit'); }}" method="POST" role="form">
  	<div class="col-md-12">


  		<table class="table">
  						<tr>
  							<th>ID</th>
  							<th>หนังสือชื่อ</th>
  							<th>สถานะ</th>
  							<th>หมายเหตุ</th>
  						</tr>
  						  <tr>
  							<td>{{$item->id}}</td>
  							<td>{{$book->title}}</td>
  							<td>
  								<select name="status" class="form-control">
  									<option {{$item->status==0?'selected':''}} value="0">ผลิต</option>
  									<option {{$item->status==1?'selected':''}} value="1">รอผลิต<option>
  									<option {{$item->status==2?'selected':''}} value="2">ไม่ผลิต</option>
                    <option {{$item->status==3?'selected':''}} value="3">จองอ่าน</option>
  								</select>
  							</td>
  							<td>
  								<input type="text" name="notes" class="form-control" value="{{$item->notes}}">
  							</td>
  						</tr>
  					</table>


  		</div>
  		<div class="col-md-12 text-center">
  				<input type = "submit"  class="btn btn-success btn-lg" value = "แก้ไข">
  				<a class = "btn btn-danger pull-left" href = "{{ URL::previous().'#braille' }}" > กลับ </a>
  		</div>
  		</form>
  	</div>
  </div>
@stop
