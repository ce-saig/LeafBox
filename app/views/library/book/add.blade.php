@extends('library.layout')

@section('head')
  <title>เพิ่มหนังสือใหม่</title>
@stop

@section('body')
<form role="form" action="{{ url('book/add') }}" method="post">
  <div class='row'>
    <div class='col-md-6'>
      <div class="form-group">
        <label class="col-sm-3 control-label">ISBN</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="isbn">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">ชื่อเรื่อง</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="title" required>
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-3 control-label">ผู้แต่ง</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="author">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">ผู้แปล</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="translate">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">สำนักพิมพ์</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="publisher">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">พิมพ์ครั้งที่</label>
        <div class="col-sm-9">
          <input type="number" min="1" class="form-control" placeholder="เช่น 1" name="pub_no" value="1">
        </div>
      </div>
          
      <div class="form-group">
        <label class="col-sm-3 control-label">พ.ศ.</label>
        <div class="col-sm-9">
          <input type="number"  min="2000" max="{{date('Y')+543}}" class="form-control" placeholder="เช่น {{date('Y')+543}}" name="pub_year" value="{{date('Y')+543}}">
        </div>
      </div>
    </div>

    <div class='col-md-6'>
      <div class="row">
        <div class="form-group">
          <label class="col-sm-4 control-label">ทะเบียนหนังสือต้นฉบับตาดี</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="original_no" required>
          </div>
        </div>      
      </div>

      <div class="row">
        <div class="form-group">
          <label class="col-sm-3 control-label">ทะเบียนการผลิต</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="เช่น รท.4531" name="produce_no">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="form-group">
          <label class="col-sm-3 control-label">ประเภทหนังสือ</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="เช่น ประเภทAAA" name="book_type">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="form-group">
          <label class="col-sm-3 control-label">หนังสือระดับ</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="เช่น ม.3" name="grade">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="form-group">
          <label class="col-sm-3 control-label">เนื้อเรื่องย่อ</label>
          <div class="col-sm-9">
            <textarea rows="4" class="form-control" name="abstract"></textarea>
          </div>
        </div>
      </div>

    </div>
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Submit">
  </div>
</form>
@stop