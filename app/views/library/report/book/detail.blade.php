@extends('library.layout')

@section('head')
<title>Leafbox :: Report - Book - Detail</title>
@stop

@section('body')
<h3>Book Detail</h3>
@foreach ($data as $item)
 <div class="well">
  	<table class="table table-striped">
  		<tr>
  			<td>id:</td>
  			<td>{{$item["id"]}}</td>
  		</tr>
  		<tr>
  			<td>ISBN:</td>
  			<td>{{$item["isbn"]}}</td>
  		</tr>
  		<tr>
  			<td>title:</td>
  			<td>{{$item["title"]}}</td>
  		</tr>
  		<tr>
  			<td>author:</td>
  			<td>{{$item["author"]}}</td>
  		</tr>
  		<tr>
  			<td>translater:</td>
  			<td>{{$item["translate"]}}</td>
  		</tr>
  		<tr>
  			<td>status:</td>
  			<td></td>
  		</tr>
  	</table>
  </div>
@endforeach

@stop
@section('script')
@parent
<script>
</script>
@stop
