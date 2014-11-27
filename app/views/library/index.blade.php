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
			  <div style= "height:250px;overflow:scroll;">
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
					<table class = "table table-striped table-hover">
						<tr>
							<td>ประเภทสื่อ</td>
							<td>สถานะ</td>
						</tr>
						<tr>
							<td>เบลล์</td>
							<td>
					@if($book->bm_status == 0)
						<span class="label label-danger">ไม่ทำการผลิต</span>
					@elseif($book->bm_status == 1)
						<span class="label label-success">ผลิตเสร็จ</span>
					@elseif ($book->bm_status == 2)
						<span class="label label-warning">รอการผลิต</span>
					@elseif ($book->bm_status == 3)
						<span class="label label-info">กำลังอ่าน</span>
					@endif
							</td>
						</tr>
						<tr>
							<td>หนังสือเสียง</td>
							<td>
					@if($book->setcs_status == 0)
						<span class="label label-danger">ไม่ทำการผลิต</span>
					@elseif($book->setcs_status == 1)
						<span class="label label-success">ผลิตเสร็จ</span>
					@elseif ($book->setcs_status == 2)
						<span class="label label-warning">รอการผลิต</span>
					@elseif ($book->setcs_status == 3)
						<span class="label label-info">กำลังอ่าน</span>
					@endif</td>
						</tr>
						<tr>
							<td>DVD</td>
							<td>
					@if($book->detdvd_status == 0)
						<span class="label label-danger">ไม่ทำการผลิต</span>
					@elseif($book->detdvd_status == 1)
						<span class="label label-success">ผลิตเสร็จ</span>
					@elseif ($book->detdvd_status == 2)
						<span class="label label-warning">รอการผลิต</span>
					@elseif ($book->detdvd_status == 3)
						<span class="label label-info">กำลังอ่าน</span>
					@endif</td>
							</td>
						</tr>
						<tr>
							<td>CD Mp3</td>
							<td>
					@if($book->setcd_status == 0)
						<span class="label label-danger">ไม่ทำการผลิต</span>
					@elseif($book->setcd_status == 1)
						<span class="label label-success">ผลิตเสร็จ</span>
					@elseif ($book->setcd_status == 2)
						<span class="label label-warning">รอการผลิต</span>
					@elseif ($book->setcd_status == 3)
						<span class="label label-info">กำลังอ่าน</span>
					@endif</td>
							</td>
						</tr>
						<tr>
							<td>CD Daisy</td>
							<td>
					@if($book->setds_status == 0)
						<span class="label label-danger">ไม่ทำการผลิต</span>
					@elseif($book->setds_status == 1)
						<span class="label label-success">ผลิตเสร็จ</span>
					@elseif ($book->setds_status == 2)
						<span class="label label-warning">รอการผลิต</span>
					@elseif ($book->setds_status == 3)
						<span class="label label-info">กำลังอ่าน</span>
					@endif</td>
							</td>
						</tr>
					</table>
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