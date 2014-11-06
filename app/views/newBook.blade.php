@extends('library.layout')
@section('head')
	<title>เพิ่มหนังสือใหม่</title>
@stop
@section('body')
			<div class='row'>
				<div class='col-md-12'>
					<form role="form" action="{{ url('add') }}" method="POST">
						<div class='col-md-6'>
							<table class="table">
								<tr>
									<td>ISBN</td>
									<td><input type="text" class="form-control" placeholder="ISBN" name="isbn"></td>
								</tr>
								<tr>
									<td>TITLE</td>
									<td><input type="text" class="form-control" placeholder="TITLE" name="title"></td>
								</tr>
								<tr>
									<td>AUTHOR</td>
									<td><input type="text" class="form-control" placeholder="AUTHOR" name="author"></td>
								</tr>
								<tr>
									<td>TRANSLATE</td>
									<td><input type="text" class="form-control" placeholder="TRANSLATE" name="translate"></td>
								</tr>
								<tr>
									<td>PAGE</td>
									<td><input type="text" class="form-control" placeholder="PAGE" name="page"></td>
								</tr>
								<tr>
									<td>GRADE</td>
									<td><input type="text" class="form-control" placeholder="GRADE" name="grade"></td>
								</tr>
							</table>
						</div>
						<div class='col-md-6'>
							<table class="table">
								<tr>
									<td>BTYPE</td>
									<td><input type="text" class="form-control" placeholder="BTYPE" name="btype"></td>
								</tr>
								<tr><td><input type="submit" class="btn btn-primary" name="bt1" value="POST"></td></tr>
							</table>
						</div>
					</form>
				</div>
			</div>
@stop