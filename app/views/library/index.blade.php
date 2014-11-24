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
		<div class =  "panel panel-default" style="margin-bottom:50px;">
			<div class = "panel-heading">
				<b>{{ $book->title }}</b>
				<a  class = "pull-right btn btn-info" href = "{{url('book/'.$book->id) }}">จัดการ</a>
			</div>
			<div class = "panel-body">
			{{-- NUTSU :: It shouldn't show all details of media,so which column should show here ? --}}
			  <div class = "col-md-6"  >
			  <b>ข้อูลของหนังสือ</b>
			  <div style= "height:200px;overflow:scroll;">
				<table class = "table table-hover table-striped">
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
					<tr>
						<td>regis_date</td>
						<td> {{ $book->regis_date }} </td>
					</tr>
					<tr>
						<td>pub_no</td>
						<td> {{ $book->pub_no }} </td>
					</tr>
					<tr>
						<td>pub_year</td>
						<td> {{ $book->pub_year }} </td>
					</tr>
					<tr>
						<td>origin_no</td>
						<td> {{ $book->origin_no }} </td>
					</tr>
					<tr>
						<td>produce_no</td>
						<td> {{ $book->produce_no }} </td>
					</tr>
					<tr>
						<td>btype</td>
						<td> {{ $book->btype }} </td>
					</tr>
					<tr>
						<td>abstract</td>
						<td> {{ $book->abstract }} </td>
					</tr>
					<tr>
						<td>isbn</td>
						<td> {{ $book->isbn }} </td>
					</tr>
					<tr>
						<td>grade</td>
						<td> {{ $book->grade }} </td>
					</tr>
				</table>
			   </div>
			  </div>
			  <div class = "col-md-6">
			  	<b>สถานะของสื่อ</b>
				<div>
					@if($book->bmstatus == 1)
						<span class="label label-success">เบลล์</span>
					@else
						<span class="label label-danger">เบลล์</span>
					@endif
				</div>
			  </div>
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