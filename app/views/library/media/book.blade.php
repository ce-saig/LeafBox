@extends('library.layout')
@section('head')
	<title>book</title>
@stop
@section('body')
<div class="row">
	<div class="col-md-12">
		<table class="table">
			<tr>
				<th>id</th>
				<th>isbn</th>
				<th>title</th>
				<th>author</th>	
				<th>translate</th>
				<th>grade</th>
			</tr>
			<tr>
				<td>{{$Data->id}}</td>
				<td>{{$Data->isbn}}</td>
				<td>{{$Data->title}}</td>
				<td>{{$Data->author}}</td>
				<td>{{$Data->translate}}</td>
				<td>{{$Data->grade}}</td>
			</tr>
		</table>
	</div>
</div>

@stop