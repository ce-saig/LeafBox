@extends('library.layout')

@section('head')
<title>Leafbox :: Report Gen</title>
@stop

@section('body')

<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Book's Report</h3>
  </div>
  <div class="panel-body">
    <!--<div class="col_select">
      <label class="col-md-2">เลือกตัวกรอง: </label>
      <label class="checkbox-inline ">
        <input onclick="addfilter()" type="checkbox" id="order_num" value="order_num"> เลขอันดับ
      </label>
      <label class="checkbox-inline ">
        <input onclick="addfilter()" type="checkbox" id="title" value="title"> ชื่อเรื่อง
      </label>
      <label class="checkbox-inline ">
        <input onclick="addfilter()" type="checkbox" id="author" value="author"> ชื่อผู้แต่ง
      </label>
      <label class="checkbox-inline ">
        <input onclick="addfilter()" type="checkbox" id="translator" value="translator"> ชื่อผู้แปล
      </label>
      <label class="checkbox-inline ">
        <input onclick="addfilter()" type="checkbox" id="status" value="status"> สถานะ
      </label>-->
    <form action="/report/book/detail" method="POST">
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-2">
            <h4><span class="label label-info">ตัวกรอง</span></h4>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-2">
            <label>เลขอันดับ:</label>
          </div>
          <div class="col-md-3">
            <select name = "filter_order_num" class="form-control" id = "filter_order_num" role="menu">
              <option value = "contain" >ประกอบด้วยตัวอักษร</option>
              <option value = "equal" >อักษรตัวเดียวกัน</option>
            </select>
          </div>
          <div class="col-md-5">
            <input type="text" class="form-control" id="order_num" placeholder = "เลขอันดับ">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-2">
           <label>ชื่อเรื่อง:</label>
          </div>
          <div class="col-md-3">
            <select name = "filter_title" class="form-control" id = "filter_title" role="menu">
              <option value = "contain" >ประกอบด้วยตัวอักษร</option>
              <option value = "equal" >อักษรตัวเดียวกัน</option>
            </select>
          </div>
          <div class="col-md-5">
            <input name="title" type="text" class="form-control" id="title" placeholder = "ชื่อเรื่อง">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-2">
            <label>ชื่อผู้แต่ง:</label>
          </div>
          <div class="col-md-3">
            <select name = "filter_author" class="form-control" id = "filter_author" role="menu">
              <option value = "contain" >ประกอบด้วยตัวอักษร</option>
              <option value = "equal" >อักษรตัวเดียวกัน</option>
            </select>
          </div>
          <div class="col-md-5">
            <input type="text" class="form-control" id="author" placeholder = "ชื่อผู้แต่ง">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-2">
            <label>ชื่อผู้แปล:</label>
          </div>
          <div class="col-md-3">
            <select name = "filter_type" class="form-control" id = "filter_translator" role="menu">
              <option value = "contain" >ประกอบด้วยตัวอักษร</option>
              <option value = "equal" >อักษรตัวเดียวกัน</option>
            </select>
          </div>
          <div class="col-md-5">
            <input type="text" class="form-control" id="translator" placeholder = "ชื่อผู้แปล">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-2">
            <label>สถานะ:</label>
          </div>
          <div class="col-md-3">
            <select name = "filter_type" class="form-control" id = "filter_status" role="menu">
              <option value = "contain" >ประกอบด้วยตัวอักษร</option>
              <option value = "equal" >อักษรตัวเดียวกัน</option>
            </select>
          </div>
          <div class="col-md-5">
            <input type="text" class="form-control" id="status" placeholder = "สถานะ">
          </div>
         </div>
      </div>
      <!--<br>
      <div class="filter_area">
      </div>-->
      <br>
      <div class="col_to_show">
        <div class="col-md-2">
           <h4><span class="label label-info">หัวข้อที่จะแสดง</span></h4>
        </div>
        <div class="col-md-10 col-md-offset-2">
          <label class="checkbox-inline ">
            <input name="col[]" type="checkbox" id="order_num" value="order_num"> เลขอันดับ
          </label>
         <label class="checkbox-inline ">
          <input name="col[]" type="checkbox" id="title" value="title"> ชื่อเรื่อง
         </label>
         <label class="checkbox-inline ">
           <input name="col[]" type="checkbox" id="author" value="author"> ชื่อผู้แต่ง
         </label>
         <label class="checkbox-inline ">
          <input name="col[]" type="checkbox" id="translator" value="translator"> ชื่อผู้แปล
         </label>
         <label class="checkbox-inline ">
          <input name="col[]" type="checkbox" id="status" value="status"> สถานะ
         </label>
       </div>
      </div>
      <div class="submit col-md-2 col-md-offset-10">
        <br><button type="summit" class="report_submit_btn btn btn-primary btn-sm">ตกลง</button>
      </div>
    </div>
  </form>
</div>


<!--<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Book</h3>
  </div>
  <div class="panel-body">
  <ul class="list-group">
    <li class="list-group-item">Book 1</li>
    <li class="list-group-item">Book 2</li>
    <li class="list-group-item">Book 3</li>
    <li class="list-group-item">Book 4</li>
  </ul>
 </div>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Borrow</h3>
  </div>
  <div class="panel-body">
  <ul class="list-group">
    <li class="list-group-item">Borrow 1</li>
    <li class="list-group-item">Borrow 2</li>
    <li class="list-group-item">Borrow 3</li>
    <li class="list-group-item">Borrow 4</li>
  </ul>
 </div>-->



@stop
@section('script')
@parent
<script>
</script>
@stop
