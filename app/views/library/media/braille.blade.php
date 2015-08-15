@extends('library.layout')
@section('head')
<title>Leafbox :: Braille - {{$item->id}}</title>
@stop
@section('body')
<div class="container">
  <div class="panel panel-{{$item->reserved?'warning':'success'}}">
    <div class="panel-heading">
      <h3 class="panel-title">
      {{$item->id}}. {{$book->title}} {{$item->reserved?"(ถูกยืม)":""}}
      </h3>
    </div>
    <div class="panel-body">
      <div class="text-center">
        <div class="input col-md-10">
          <div class="col-md-1 form-label">สถานะ</div>
          <div class="col-md-4">
            <select class="form-control" id="select-all-status">
              <option {{$item->status==0?'selected':''}} value="0">ปกติ</option>
              <option {{$item->status==1?'selected':''}} value="1">ชำรุด</option>
              <option {{$item->status==2?'selected':''}} value="2">รอซ่อม</option>
            </select>
          </div>
          <div class="col-md-1 form-label">หมายเหตุ</div>
          <div class="col-md-6"><input type="text" name="note[]" class="form-control" id="head-note" value=""></div>
        </div>
        <div class="col-md-2">
          <button type="button" class="btn btn-warning" id="edit-all-field">แก้ไขทั้งหมด</button>
        </div>
      </div>
      <br><br>
      <hr>
      <form action="{{ URL::to('book/'.$book->id.'/braille/'.$item->id.'/edit'); }}" method="POST" role="form">
        <div class="col-md-12">
          <table class="table">
            <tr>
              <th>ID</th>
              <th>หนังสือชื่อ</th>
              <th>สถานะ</th>
              <th>หมายเหตุ</th>
            </tr>
            <tr>
              <td>{{$item->id}}</td>
              <td>{{$book->title}}</td>
              <td>
                <select name="status" class="form-control select-status">
                  <option {{$item->status==0?'selected':''}} value="0">ปกติ</option>
                  <option {{$item->status==1?'selected':''}} value="1">ชำรุด</option>
                  <option {{$item->status==2?'selected':''}} value="2">รอซ่อม</option>
                </select>
              </td>
              <td>
                <input type="text" name="notes" class="form-control note" value="{{$item->notes}}">
              </td>
            </tr>
          </table>
        </div>
        <div class="col-md-12">
          <button type="button" class = "btn btn-warning pull-left" onclick="window.history.back()" > กลัjnjkบ </button>
          <input type = "submit"  class="btn btn-success pull-right" value = "แก้ไข">
        </div>
      </form>
    </div>
  </div>
</div>
@stop

@section('script')
@parent
<script>
  $('#edit-all-field').click(function() {
    $('.select-status').prop('value', $('#select-all-status').val());
    $('.note').prop('value', $('#head-note').val());
  });
</script>
@stop
