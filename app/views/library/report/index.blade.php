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
    <div class="col_select">
      <label class="col-md-2">เลือกหัวข้อ : </label>
      <label class="checkbox-inline ">
       <input type="checkbox" id="inlineCheckbox1" value="order_num"> เลขอันดับ
      </label>
      <label class="checkbox-inline ">
        <input type="checkbox" id="inlineCheckbox2" value="title"> ชื่อเรื่อง
      </label>
      <label class="checkbox-inline ">
        <input type="checkbox" id="inlineCheckbox3" value="author"> ชื่อผู้แต่ง
      </label>
      <label class="checkbox-inline ">
        <input type="checkbox" id="inlineCheckbox3" value="translator"> ชื่อผู้แปล
      </label>
      <label class="checkbox-inline ">
        <input type="checkbox" id="inlineCheckbox3" value="status"> สถานะ
      </label>
    </div>
    <div class="submit col-md-3 col-md-offset-3">
      <button type="summit" class="btn btn-primary btn-sm">ตกลง</button>
    </div>
    <div class="table">
    </div>
 </div>
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
