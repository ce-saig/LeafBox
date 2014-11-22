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
          <input type="text" class="form-control" placeholder="ISBN" name="isbn" required>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">ชื่อเรื่อง</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" placeholder="Title" name="title" required>
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-3 control-label">ผู้แต่ง</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" placeholder="Author" name="author">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">ผู้แปล</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" placeholder="Translater" name="translate">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">สำนักพิมพ์</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" placeholder="Publisher" name="publisher">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">พิมพ์ครั้งที่</label>
        <div class="col-sm-9">
          <input type="number" min="1" class="form-control" placeholder="" name="pub_no">
        </div>
      </div>
          
      <div class="form-group">
        <label class="col-sm-3 control-label">พ.ศ.</label>
        <div class="col-sm-9">
          <input type="number"  min="1" max="{{date('Y')+543}}" class="form-control" placeholder=""name="pub_year">
        </div>
      </div>
    </div>

    <div class='col-md-6'>        
      
        <div class="form-group">
          <label class="col-sm-5 control-label">ทะเบียนหนังสือต้นฉบับตาดีเลขที่</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" placeholder="" name="original_no" required>
          </div>
        </div>
      

        <div class="form-group">
          <label class="col-sm-3 control-label">ทะเบียนการผลิต</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="" name="produce_no">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">ประเภทของหนังสือ</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="BookType" name="book_type">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">เนื้อเรื่องย่อ</label>
          <div class="col-sm-9">
            <textarea rows="4" class="form-control" placeholder="Abstract" name="abstract"></textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label"><del>หนังสือเหมาะสำหรับ</del></label>
          <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="Grade" name="grade">
          </div>
        </div>
    </div>
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Submit">
  </div>                              
</form>
@stop