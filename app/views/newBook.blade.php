@extends('library.layout')
@section('head')
	<title>เพิ่มหนังสือใหม่</title>
@stop
@section('body')
			<form role="form" class = "form-inline" action="{{ url('add') }}" method="post">
			<div class='row'>
				<div class='col-md-12'>
						<div class='col-md-6'>
							<table class="table">
								<tr>
									<td>ISBN</td>
									<td><input type="text" class="form-control" placeholder="ISBN" name="isbn" required></td>
								</tr>
								<tr>
									<td>ชื่อเรื่อง</td>
									<td><input type="text" class="form-control" placeholder="Title" name="title" required></td>
								</tr>
								<tr>
									<td>ผู้แต่ง</td>
									<td><input type="text" class="form-control" placeholder="Author" name="author"></td>
								</tr>
								<tr>
									<td>ผู้แปล</td>
									<td><input type="text" class="form-control" placeholder="Translater" name="translate"></td>
								</tr>
								<tr>
									<td>หนังสือเหมาะสำหรับ</td>
									<td><input type="text" class="form-control" placeholder="Grade" name="grade"></td>
								</tr>
                                <tr>
									<td>เนื้อเรื่องย่อ</td>
									<td><textarea rows="4" class="form-control" placeholder="Abstract" name="abstract"></textarea></td>
								</tr>
							</table>
						</div>
						<div class='col-md-6'>
							<table class="table">

								<tr>
									<td>ประเภทของหนังสือ</td>
									<td><input type="text" class="form-control" placeholder="BookType"name="book_type"></td>
								</tr>
								<tr>
									<td>produce_no</td>
									<td><input type="text" class="form-control" placeholder=""name="produce_no"></td>
								</tr>
								<tr>
									<td>ทะเบียนหนังสือต้นฉบับตาดีเลขที่</td>
									<td><input type="text" class="form-control" placeholder=""name="original_no" required></td>
								</tr>								<tr>
								<td>พิมพ์ครั้งที่</td>
									<td><input type="number" min="1" class="form-control" placeholder=""name="pub_no"></td>
								</tr>
								<td>พ.ศ.</td>
									<td><input type="number"  min="1" max=<?= date("Y") ?> class="form-control" placeholder=""name="pub_year"></td>
								</tr>
								<td>สำนักพิมพ์</td>
									<td><input type="text" class="form-control" placeholder="Publisher"name="publisher"></td>
								</tr>
							</table>
						</div>

				</div>
			</div>
            <div class="row">
            	<div>
                	<hr>
                </div>
            	<div class="col-md-6 col-md-offset6">
            		<input type="submit" class="btn btn-primary" name="bt1" value="Submit">
                </div>
                <div class = "col-md-3">
			    	<a href = "{{ url('/') }}" class = "btn btn-lg btn-warning revous">กลับหน้าแรก</a>
				</div>
           	</div>
           	</form>
@stop
