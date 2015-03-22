<?php
	session_start();
?>
@extends('library.layout')
@section('head')
	<title>ระบบยืมหนังสือ</title>
@stop
@section('body')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){
	  $("#detail").click(function(){
		  $("p").toggle();
	  });
	  $("#borrow").click(function(){
		$("p").show();
	  });
	});
</script>
	<div class="row">
    	<div class="col-md-12">
    	<form role="form" action="{{ url('borrow') }}" method="post">
            <table class="table">
              <tr>
                <td>ค้นหา:</td>
                    <td>
                      	<select class="form-control" name="type">
                          <option value="title">ชื่อหนังสือ</option>
                          <option value="isbn">ISBN</option>
                          <option value="author">ชื่อผู้แต่ง</option>
                          <option value="translate">ชื่อผู้แปล</option>
                        </select> 
                  	</td>
                <td><input type="text" class="form-control" name="search" required></td>
                <td><input type="submit"  class="btn btn-primary" value="Search"></td>
              </tr> 
            </table>
        </form>
        </div>
    </div>
    <div class="row">
    	<div class="col-md-12">
        <?php
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
		?>
        	<table class="table table-striped">
            	<tr class="active">
                	<th>id</th>
                    <th>isbn</th>
                    <th>ชื่อเรื่อง</th>
                    <th>ชื่อผู้แต่ง</th>
                    <th>ผู้แปล</th>
                    <th>#</th>
                </tr>
         <?php
				foreach($Books as $Book){
		 ?>
                <tr>
                	<td>{{$Book->id}}</td>
                    <td>{{$Book->isbn}}</td>
                    <td>{{$Book->title}}</td>
                    <td>{{$Book->author}}</td>
                    <td>{{$Book->translate}}</td>
                    <td><p>test</p>
						<button class="btn btn-active" name="detail" id="detail">Detail</button>
                        <button class="btn btn-primary" name="borrow" id="borrow">Borrow</button>         
                    </td>
                </tr>
                <?php
				}
				?>
            </table>
         <?php
			}
		 ?>
        </div>
    </div>
@stop