@extends('library.layout')

@section('body')
<div >
	<input class="form-control col-md-8 " placeholder = "ค้นหา" >
	<table class = "table table-hover" >
		@foreach ($books as $book)
		<tr>
			<td>{{ $book->title }}</td>
		</tr>
	 	@endforeach
	</table>
</div>
@stop