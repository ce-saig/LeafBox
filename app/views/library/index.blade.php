@extends('library.layout')

@section('head')
	<title>Leafbox :: Home</title>
@stop

@section('body')
<div class = "row">
	<div class = "col-md-12 search-bar panel search-panel" >

		<div class = "col-md-2">
			<select name = "search_type" class="form-control" id = "search_type" role="menu">
			    <option value = "title" >ชื่อ</option>
			    <option value = "book_type" >ประเภทหนังสือ</option>
			    <option value = "author" >ชื่อผู้แต่ง</option>
			    <option value = "translate" >ชื่อผู้แปล</option>
			    <option value = "publisher" >สำนักพิมพ์</option>
			    <option value = "pub_year" >ปีที่พิมพ์</option>
			    <option value = "isbn" >ISBN</option>
			    <option value = "original_id" >ORIGINAL ID</option>
			    <option value = "id" >ID</option>
			 </select>
		</div>

		<!-- Search Result -->
		<div class = "col-md-8">
			<input name = "search_value" id = "search_value" type = "text" class="form-control" placeholder = "ค้นหา" >
		</div>
		<div class = "col-md-2 col-xs-8 pull-right" >
			<button  post-path="{{ url('/search/book') }}" class="btn btn-success btn-lg search_submit" style="margin-top:-5px" >ค้นหา</button>
			<span id="search-info" card-link-path="{{ url('book/') }}" ></span>
		</div>

	</div>
	<hr>
	<br>
	<div  class= "col-md-12" id = "showBook">

		<div class = "search_result">
		</div>
		<div class="search_control">
			<button class="paginate-control-left btn btn-success search_previous"><i class="fa fa-angle-left"></i></button>
		 	<button class="paginate-control-right btn btn-success search_next"><i class="fa fa-angle-right"></i></button>
		</div>
		<br/>
		{{--  @forelse ($books as $book)
		<a href = "{{url('book/'.$book->id) }}">
		<div class =  "panel-hover panel panel-default" style="margin-bottom:20px;">
			<div class = "panel-heading">
				{{ $book->id }}. <b>{{ $book->title }} - {{ $book->author }} ({{ $book->pub_year }}) </b>
			</div>
			<div class = "panel-body"> --}}
			{{-- NUTSU :: It shouldn't show all details of media,so which column should show here ? --}}

			 {{-- <div class = "col-md-12">
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
	 	@endforelse --}}
	</div>
	</div>

	<div class="row">
		<div class = "panel panel-danger">
				<div class = "panel-heading" style="font-size:1.5em">
					จัดการ
				</div>
				<div class= "panel-body">
					<div class="col-md-10 col-md-offset-1">

						<div class = "col-md-3 icon">
						  <a href="{{URL::to('/book/add')}}">
							<div class = "col-md-10 col-md-offset-1">
								<img class = "img-responsive" src="{{ asset('/img/book-with-add-button.png') }}">
							</div>
							<div class = "col-md-10 col-md-offset-1 text-center text-icon">
								<h4>เพิ่มหนังสือ</h4>
							</div>
						  </a>
						</div>
						<div class = "col-md-3 icon text-center">
						  <a href="{{URL::to('/borrow')}}">
							<div class = "col-md-10 col-md-offset-1">
								<img class = "img-responsive" src="{{ asset('/img/book-b.png') }}">
							</div>
							<div class = "col-md-10 col-md-offset-1 text-center text-icon">
								<h4>ยืมหนังสือ</h4>
							</div>
						  </a>
						</div>
						<div class = "col-md-3 icon text-center">
						  <a href="{{URL::to('/return')}}">
							<div class = "col-md-10 col-md-offset-1">
								<img class = "img-responsive" src="{{ asset('/img/book-r.png') }}">
							</div>
							<div class = "col-md-10 col-md-offset-1 text-center text-icon">
								<h4> คืนหนังสือ </h4>
							</div>
						  </a>
						</div>
						<div class = "col-md-3 icon text-center">
						 <a href="{{URL::to('/borrower')}}">
							<div class = "col-md-10 col-md-offset-1">
								<img class = "img-responsive" src="{{ asset('/img/lecture.png') }}">
							</div>
							<div class = "col-md-10 col-md-offset-1 text-center text-icon">
								<h4> จัดการผู้ยืม </h4>
							</div>
						</a>
						</div>
					</div>
				</div>
		</div>
	</div>

	<div class = "row">
		<div class = "col-md-offset-2 col-md-8">
			<div class = "panel panel-primary">
				<div class = "panel-heading" style="font-size:1.5em">
					หนังสือที่เพิ่มล่าสุด
				</div>
				<div class= "panel-body" ng-controller="ProductionStatusController as bookCtrl">
					<ul class="list_group">
					@foreach($books_all as $book)
					<a href="{{ url('book/'.$book->id) }}" style="text-decoration: none">
						<li class="list-group-item li_lastbook">

							 {{ $book->id }} 
							 @if($book->original_no!=null)({{$book->original_no}})@endif
							  . <b>{{ $book->title }} - {{ $book->author }} 
							 @if($book->pub_year > 0)({{ $book->pub_year }})@endif </b>

						</li>
					</a>
					@endforeach
					</ul>
				</div>
			</div>
		</div>

	</div>
</div>

@stop
