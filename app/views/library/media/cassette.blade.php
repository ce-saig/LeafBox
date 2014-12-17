@extends('library.layout')

@section('head')
  <title>Leafbox :: Cassette - {{$item->id}}</title>
@stop

@section('body')
<div class="container">
	<div class="col-md-12">
		<div class="row">
				id : {{$item->id}}<br>
				name : {{$book->title}}<br>
				numpart : {{$item->numpart}}<br>
				reserved : {{$item->reserved}}<br>
				produc_date : {{$item->produce_date}}<br>
				notes : {{$item->detail()->first()->notes}}<br>
				<br>
		</div>
		<table class="table">
			<tr>
				<th>id</th>
				<th>part</th>
				<th>status</th>
				<th>notes</th>	
			</tr>
		@foreach ($detail as $key => $value)
			<tr>
				<td>{{$value->id}}</td>
				<td>{{$value->part}}</td>
				<td>{{$value->status}}</td>
				<td>{{$value->notes}}</td>
			</tr>
		@endforeach
		
			
		</table>
	</div>
</div>
@stop