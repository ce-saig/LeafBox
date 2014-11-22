@extends('library.layout')

@section('body')
<div class = "row">
	<div class = "col-md-12 panel" >
		<div class = "col-md-8">
			<input type = "text" class="form-control" placeholder = "ค้นหา" >
		</div>
		  
		<div class = "col-md-2">
			<select class="form-control" role="menu">
			    <option><a href="#">braille</a></option>
			    <option><a href="#">cassette</a></option>
			    <option><a href="#">daisy</a></option>
			    <option><a href="#">cd</a></option>
			    <option><a href="#">Separated dvd</a></option>
			 </select>
		</div>

		<input type = "submit" class="col-md-2 btn btn-success pull-right" value = "ค้นหา" />
		
	</div>	
	<div  class= "col-md-12">
		@foreach ($books as $book)
		<div class =  "panel panel-default">
			<div class = "panel-heading">
				<b><a href = "{{url('book/'.$book->id) }}" >{{ $book->title }}</a></b>
			</div>
			<div class = "panel-body">
			{{-- NUTSU :: It shouldn't show all details of media,so which column should show here ? --}}
				<table class = "table">
					<tr>
						<td>author</td>
						<td> {{ $book->author }} </td>
					</tr>
					<tr>
						<td>translate</td>
						<td>{{ $book->translate }}</td>
					</tr>
					<tr>
						<td>publisher</td>
						<td> {{ $book->publisher }} </td>
					</tr>
				</table>
			</div>
		</div>
	 	@endforeach	
	</div>
</div>
@stop