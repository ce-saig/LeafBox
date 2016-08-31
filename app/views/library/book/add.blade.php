@extends('library.layout')

@section('head')
<title>เพิ่มหนังสือใหม่</title>
@stop

@section('body')
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">เพิ่มหนังสือใหม่</h3>
  </div>
  <div class="panel-body">
      <div class='row'>
    <form role="form" action="{{ url('book/add') }}" method="post">
        <div class='col-md-6'>
          <div class="row">
            <div class="form-group">
              <label class="col-sm-4 control-label">เลขอันดับ</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="number">
              </div>
            </div>
          </div>

         <!--  <div class="row">
            <div class="form-group">
              <label class="col-sm-4 control-label">เลขอันดับ braille (b no.)</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="b_no">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group">
              <label class="col-sm-4 control-label">เลขอันดับ cassette (c no.)</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="c_no">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group">
              <label class="col-sm-4 control-label">เลขอันดับ cd (cd no.)</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="cd_no">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group">
              <label class="col-sm-4 control-label">เลขอันดับ daisy (d no.)</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="d_no">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group">
              <label class="col-sm-4 control-label">เลขอันดับ dvd (dvd no.)</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="dvd_no">
              </div>
            </div>
          </div> -->

          <div class="row">
            <div class="form-group">
              <label class="col-sm-4 control-label">ชื่อเรื่อง</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="title" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group">
              <label class="col-sm-4 control-label">ชื่อเรื่อง (อังกฤษ)</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="title_eng" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group">
              <label class="col-sm-4 control-label">ISBN</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="isbn" placeholder="เช่น 903-246-542-1">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group">
              <label class="col-sm-4 control-label">ผู้แต่ง</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="author">
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="form-group">
              <label class="col-sm-4 control-label">ผู้แปล</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="translate">
              </div>
            </div>
          </div>
          
        </div>

        <div class='col-md-6'>
          <div class="row">
            <div class="form-group">
              <label class="col-sm-3 control-label">สำนักพิมพ์</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="publisher">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group">
              <label class="col-sm-3 control-label">พิมพ์ครั้งที่</label>
              <div class="col-sm-9">
                <input type="number" min="1" class="form-control" placeholder="เช่น 1" name="pub_no">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="form-group">
              <label class="col-sm-3 control-label">พ.ศ.</label>
              <div class="col-sm-9">
                <input type="number"  min="2000" max="{{date('Y') + 543}}" class="form-control" placeholder="เช่น {{date('Y') + 543}}" name="pub_year">
              </div>
          </div>
          </div>

          <div class="row">
            <div class="form-group">
              <label class="col-sm-3 control-label">ทะเบียนหนังสือต้นฉบับตาดี</label>
              <div class="col-sm-9">
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
        <input type="submit" class="btn btn-success btn-lg pull-right" value='เพิ่ม'>
      </div>
    </form>
    <div class = "col-md-3">
          <a href = "{{ url('/') }}" class = "btn btn-lg btn-warning revous">กลับหน้าแรก</a>
    </div>
  </div>
</div>
@stop
