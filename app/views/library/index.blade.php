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
		<a href = "{{url('book/'.$book->id) }}">
		<div class =  "panel-hover panel panel-default" style="margin-bottom:20px;">
			<div class = "panel-heading">
				<b>{{ $book->title }} -- {{ $book->author }} : {{ $book->pub_year }} </b>
			</div>
			<div class = "panel-body">
			{{-- NUTSU :: It shouldn't show all details of media,so which column should show here ? --}}
			  
			  <div class = "col-md-12">
				<div class = "label-status" >
					
					<div class = "col-md-2" >
							<span>เบลล์</span>
						
					@if($book->bm_status == 0)
						<span class="label label-danger">ไม่ทำการผลิต</span>
					@elseif($book->bm_status == 1)
						<span class="label label-success">ผลิตเสร็จ</span>
					@elseif ($book->bm_status == 2)
						<span class="label label-warning">รอการผลิต</span>
					@elseif ($book->bm_status == 3)
						<span class="label label-info">กำลังอ่าน</span>
					@endif
					</div>
			
					
					<div class = "col-md-3" >
							<td>หนังสือเสียง</td>
						
					@if($book->setcs_status == 0)
						<span class="label label-danger">ไม่ทำการผลิต</span>
					@elseif($book->setcs_status == 1)
						<span class="label label-success">ผลิตเสร็จ</span>
					@elseif ($book->setcs_status == 2)
						<span class="label label-warning">รอการผลิต</span>
					@elseif ($book->setcs_status == 3)
						<span class="label label-info">กำลังอ่าน</span>
					@endif
						</div>

					<div class = "col-md-2" >
							<span>DVD</span>
						
					@if($book->detdvd_status == 0)
						<span class="label label-danger">ไม่ทำการผลิต</span>
					@elseif($book->detdvd_status == 1)
						<span class="label label-success">ผลิตเสร็จ</span>
					@elseif ($book->detdvd_status == 2)
						<span class="label label-warning">รอการผลิต</span>
					@elseif ($book->detdvd_status == 3)
						<span class="label label-info">กำลังอ่าน</span>
					@endif
					</div>
					

					<div class = "col-md-2" >
							<span>CD Mp3</span>

					@if($book->setcd_status == 0)
						<span class="label label-danger">ไม่ทำการผลิต</span>
					@elseif($book->setcd_status == 1)
						<span class="label label-success">ผลิตเสร็จ</span>
					@elseif ($book->setcd_status == 2)
						<span class="label label-warning">รอการผลิต</span>
					@elseif ($book->setcd_status == 3)
						<span class="label label-info">กำลังอ่าน</span>
					@endif
					</div>
					

					<div class = "col-md-3" >
							<span>CD Daisy</span>
							
					@if($book->setds_status == 0)
						<span class="label label-danger">ไม่ทำการผลิต</span>
					@elseif($book->setds_status == 1)
						<span class="label label-success">ผลิตเสร็จ</span>
					@elseif ($book->setds_status == 2)
						<span class="label label-warning">รอการผลิต</span>
					@elseif ($book->setds_status == 3)
						<span class="label label-info">กำลังอ่าน</span>
					@endif
					</div>
					
				</div>
			  </div>
			</div>
		</div>
	   </a>
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