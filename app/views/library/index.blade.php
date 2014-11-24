@extends('library.layout')

@section('body')
<div class = "row">
	<div class = "col-md-12 panel" >
	  <form action = "{{ url('/search/book') }}" method="POST">
		<div class = "col-md-8">
			<input name = "search_value" type = "text" class="form-control" placeholder = "ค้นหา" >
		</div>
		  
		<div class = "col-md-2">
			<select name = "search_type" class="form-control" role="menu">
			    <option value = "title" >title</option>
			    <option value = "author" >author</option>
			    <option value = "translate" >translate</option>
			    <option value = "isbn" >isbn</option>
			    <option value = "id" >id</option>
			 </select>
		</div>

		<input type = "submit" class="col-md-2 btn btn-success pull-right" value = "ค้นหา" />
	  </form>
	</div>	
	<div  class= "col-md-12" id = "showBook">
		@forelse ($books as $book)
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
		@empty
			<div class="alert alert-warning alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			  <strong>คำเตือน!</strong> ไม่พบสื่อที่คุณกำลังหา
			</div>
	 	@endforelse
	</div>
	{{-- AJAX CALL Respond Table ToDo:Nutsu  --}}
	{{--}} <div>
		 {{ Datatable::table()
		    ->addColumn('title','author')       // these are the column headings to be shown
		    ->setUrl(route('api.book'))   // this is the route where data will be retrieved
		    ->render() }}
	</div> --}}
</div>
@stop