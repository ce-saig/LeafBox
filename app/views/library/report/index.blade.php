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
          <select name = "filter_type" class="form-control" id = "filter_order_num" role="menu">
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
          <select name = "filter_type" class="form-control" id = "filter_title" role="menu">
            <option value = "contain" >ประกอบด้วยตัวอักษร</option>
            <option value = "equal" >อักษรตัวเดียวกัน</option>
          </select>
        </div>
        <div class="col-md-5">
          <input type="text" class="form-control" id="title" placeholder = "ชื่อเรื่อง">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-2">
          <label>ชื่อผู้แต่ง:</label>
        </div>
        <div class="col-md-3">
          <select name = "filter_type" class="form-control" id = "filter_author" role="menu">
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
       </label>
     </div>
    </div>
    <div class="submit col-md-2 col-md-offset-10">
      <br><button type="summit" class="btn btn-primary btn-sm">ตกลง</button>
    </div>
  </div>
</div>

<script type="text/javascript">
  /*var check = [0,0,0,0,0];
  function addfilter () {
    console.log(check);
    if($('#order_num').is(':checked') == true) {
      if(check[0] == 0) {
        $('.filter_area').append('<div class="row" id="order_num_f"><div class="col-md-12"><div class="col-md-2"><label>เลขอันดับ:</label></div><div class="col-md-3"><select name = "filter_type" class="form-control" id = "filter_type" role="menu"><option value = "contain" >ประกอบด้วยตัวอักษร</option><option value = "equal" >อักษรตัวเดียวกัน</option></select></div><div class="col-md-5"><input type="text" class="form-control" id="order_num" placeholder = "เลขอันดับ"></div></div></div>');
        check[0] = 1;
      }
    }
    else {
      $('#order_num_f').remove();
      check[0] = 0;
    }
    if($('#title').is(':checked') == true) {
      if(check[1] == 0) {
        $('.filter_area').append('<div class="row" id="title_f"><div class="col-md-12"><div class="col-md-2"><label>ชื่อเรื่อง:</label></div><div class="col-md-3"><select name = "filter_type" class="form-control" id = "filter_type" role="menu"><option value = "contain" >ประกอบด้วยตัวอักษร</option><option value = "equal" >อักษรตัวเดียวกัน</option></select></div><div class="col-md-5"><input type="text" class="form-control" id="order_num" placeholder = "ชื่อเรื่อง"></div></div></div>');
        check[1] = 1;
      }
    }
    else {
      $('#title_f').remove();
      check[1] = 0;
    }
    if($('#author').is(':checked') == true) {
      if(check[2] == 0) {
        $('.filter_area').append('<div class="row" id="author_f"><div class="col-md-12"><div class="col-md-2"><label>ชื่อผู้แต่ง:</label></div><div class="col-md-3"><select name = "filter_type" class="form-control" id = "filter_type" role="menu"><option value = "contain" >ประกอบด้วยตัวอักษร</option><option value = "equal" >อักษรตัวเดียวกัน</option></select></div><div class="col-md-5"><input type="text" class="form-control" id="order_num" placeholder = "ชื่อผู้แต่ง"></div></div></div>');
        check[2] = 1;
      }
    }
    else {
      $('#author_f').remove();
      check[2] = 0;
    }
    if($('#translator').is(':checked') == true) {
      if(check[3] == 0) {
        $('.filter_area').append('<div class="row" id="translator_t"><div class="col-md-12"><div class="col-md-2"><label>ชื่อผู้แปล:</label></div><div class="col-md-3"><select name = "filter_type" class="form-control" id = "filter_type" role="menu"><option value = "contain" >ประกอบด้วยตัวอักษร</option><option value = "equal" >อักษรตัวเดียวกัน</option></select></div><div class="col-md-5"><input type="text" class="form-control" id="order_num" placeholder = "ชื่อผู้แปล"></div></div></div>');
        check[3] = 1;
      }
    }
    else {
      $('#translator_t').remove();
      check[3] = 0;
    }
    if($('#status').is(':checked') == true) {
      if(check[4] == 0) {
        $('.filter_area').append('<div class="row" id="status_f"><div class="col-md-12"><div class="col-md-2"><label>สถานะ:</label></div><div class="col-md-3"><select name = "filter_type" class="form-control" id = "filter_type" role="menu"><option value = "contain" >ประกอบด้วยตัวอักษร</option><option value = "equal" >อักษรตัวเดียวกัน</option></select></div><div class="col-md-5"><input type="text" class="form-control" id="order_num" placeholder = "สถานะ"></div></div></div>');
        check[4] = 1;
      }
    }
    else {
      $('#status_f').remove();
      check[4] = 0;
    }
  }*/
</script>
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
</div>-->

<!--<div class="panel panel-info">
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
 </div>
</div>-->


@stop
@section('script')
@parent
<script>
</script>
@stop
