@extends('library.layout')

@section('head')
	<title>Leafbox :: Home</title>
@stop

@section('body')
<div class = "row">
	<div class = "col-md-12 search-bar panel" >
	  <form action = "{{ url('/search/book') }}" method="POST">
		<div class = "col-md-2">
			<select name = "search_type" class="form-control" role="menu">
			    <option value = "title" >ชื่อ</option>
			    <option value = "author" >ชื่อผู้แต่ง</option>
			    <option value = "translate" >ชื่อผู้แปล</option>
			    <option value = "isbn" >ISBN</option>
			    <option value = "id" >ID</option>
			 </select>
		</div>

		<div class = "col-md-8">
			<input name = "search_value" type = "text" class="form-control" placeholder = "ค้นหา" >
		</div>		  

		<input type = "submit" class="col-md-2 btn btn-success pull-right" value = "ค้นหา" />
	  </form>
	</div>	
	<hr>
	<br>
	<div  class= "col-md-12" id = "showBook">
		 @forelse ($books as $book)
		<a href = "{{url('book/'.$book->id) }}">
		<div class =  "panel-hover panel panel-default" style="margin-bottom:20px;">
			<div class = "panel-heading">
				{{ $book->id }}. <b>{{ $book->title }} - {{ $book->author }} ({{ $book->pub_year }}) </b>
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
							เทปคาสเซ็ท
						
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
							<span>CD</span>

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
							<span>Daisy</span>
							
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

	<div class = "row">
		<div class = "col-md-offset-1 col-md-5">
			<div class = "panel panel-default">
				<div class = "panel-heading">
					หนังสือที่เพิ่มล่าสุด
				</div>
				<div class= "panel-body">
				</div>
			</div>
		</div>
		<div class = "col-md-5">
			<div class = "panel panel-default">
				<div class = "panel-heading">
					หนังสือที่ยืมล่าสุด
				</div>
				<div class= "panel-body">
					
				</div>
			</div>
		</div>
	</div>
</div>
@stop