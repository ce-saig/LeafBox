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
    <div class='container'>
    <form role="form" action="{{ url('book/add') }}" method="post">
          <div class="row col-md-6" style="margin-top: 15px">
            <div class="form-group">
              <label class="col-sm-4 control-label" style="margin-top: 10px">เลขอันดับ</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="number">
              </div>
            </div>
          </div>

          <div class="row col-md-6 pull-right" style="margin-top: 15px">
            <div class="form-group">
              <label class="col-sm-4 control-label" style="margin-top: 10px">เลขอันดับ braille (b no.)</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="b_no">
              </div>
            </div>
          </div>

          <div class="row col-md-6">
            <div class="form-group">
              <label class="col-sm-4 control-label" style="margin-top: 10px">เลขอันดับ cassette (c no.)</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="c_no">
              </div>
            </div>
          </div>

          <div class="row col-md-6 pull-right">
            <div class="form-group">
              <label class="col-sm-4 control-label" style="margin-top: 10px">เลขอันดับ cd (cd no.)</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="cd_no">
              </div>
            </div>
          </div>

          <div class="row col-md-6">
            <div class="form-group">
              <label class="col-sm-4 control-label" style="margin-top: 10px">เลขอันดับ daisy (d no.)</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="d_no">
              </div>
              </div>
            </div>

            <div class="row col-md-6 pull-right">
              <div class="form-group">
                <label class="col-sm-4 control-label" style="margin-top: 10px">เลขอันดับ dvd (dvd no.)</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="dvd_no">
                </div>
              </div>
            </div>

            <div class="row col-md-6" style="margin-top: 15px">
              <div class="form-group">
                <label class="col-sm-4 control-label" style="margin-top: 10px">เลขอันดับ เดิม</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="original_no"">
                </div>
              </div>
            </div>

            <div class="row col-md-6 pull-right" style="margin-top: 15px">
              <div class="form-group">
                <label class="col-sm-4 control-label" style="margin-top: 10px">เลขอันดับ braille เดิม</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="b_original_no"_no">
                </div>
              </div>
            </div>

            <div class="row col-md-6">
              <div class="form-group">
                <label class="col-sm-4 control-label" style="margin-top: 10px">เลขอันดับ cassette เดิม</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="c_original_no"">
                </div>
              </div>
            </div>

            <div class="row col-md-6 pull-right">
              <div class="form-group">
                <label class="col-sm-4 control-label" style="margin-top: 10px">เลขอันดับ cd เดิม</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="cd_original_no"">
                </div>
              </div>
            </div>

            <div class="row col-md-6">
              <div class="form-group">
                <label class="col-sm-4 control-label" style="margin-top: 10px">เลขอันดับ daisy เดิม</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="d_original_no"">
                </div>
              </div>
            </div>

            <div class="row col-md-6 pull-right">
              <div class="form-group">
                <label class="col-sm-4 control-label" style="margin-top: 10px">เลขอันดับ dvd เดิม</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="dvd_original_no">
                </div>
              </div>
            </div>


            <div class="row col-md-6" style="margin-top: 15px">
              <div class="form-group">
                <label class="col-sm-4 control-label" style="margin-top: 10px">จำนวนหนังสือ </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="number"">
                </div>
              </div>
            </div>

            <div class="row col-md-6 pull-right" style="margin-top: 15px">
              <div class="form-group">
                <label class="col-sm-4 control-label" style="margin-top: 10px">จำนวน braille </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="b_number"_no">
                </div>
              </div>
            </div>

            <div class="row col-md-6">
              <div class="form-group">
                <label class="col-sm-4 control-label" style="margin-top: 10px">จำนวน cassette </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="cs_number"">
                </div>
              </div>
            </div>

            <div class="row col-md-6 pull-right">
              <div class="form-group">
                <label class="col-sm-4 control-label" style="margin-top: 10px">จำนวน cd </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="cd_number"">
                </div>
              </div>
            </div>

            <div class="row col-md-6">
              <div class="form-group">
                <label class="col-sm-4 control-label" style="margin-top: 10px">จำนวน daisy </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="ds_number"">
                </div>
              </div>
            </div>

            <div class="row col-md-6 pull-right">
              <div class="form-group">
                <label class="col-sm-4 control-label" style="margin-top: 10px">จำนวน dvd </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="dvd_number">
                </div>
              </div>
            </div>

          <div class="row col-md-6" style="margin-top: 15px">
            <div class="form-group">
              <label class="col-sm-4 control-label" style="margin-top: 10px">ชื่อเรื่อง</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="title" required>
              </div>
            </div>
          </div>  

          <div class="row col-md-6 pull-right" style="margin-top: 15px">
            <div class="form-group">
              <label class="col-sm-4 control-label" style="margin-top: 10px">ชื่อเรื่อง (อังกฤษ)</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="title_eng" required>
              </div>
            </div>
          </div>

          <div class="row col-md-6">
            <div class="form-group">
              <label class="col-sm-4 control-label" style="margin-top: 10px">ISBN</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="isbn" placeholder="เช่น 903-246-542-1">
              </div>
            </div>
          </div>

          <div class="row col-md-6 pull-right">
            <div class="form-group">
              <label class="col-sm-4 control-label" style="margin-top: 10px">ผู้แต่ง</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="author">
              </div>
            </div>
          </div>
          
          <div class="row col-md-6">
            <div class="form-group">
              <label class="col-sm-4 control-label" style="margin-top: 10px">ผู้แปล</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="translate">
              </div>
            </div>
          </div>

          <div class="row col-md-6 pull-right">
            <div class="form-group">
              <label class="col-sm-4 control-label" style="margin-top: 10px">สำนักพิมพ์</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="publisher">
              </div>
            </div>
          </div>

          <div class="row col-md-6">
            <div class="form-group">
              <label class="col-sm-4 control-label" style="margin-top: 10px">พิมพ์ครั้งที่</label>
              <div class="col-sm-8">
                <input type="number" min="1" class="form-control" placeholder="เช่น 1" name="pub_no">
              </div>
            </div>
          </div>

          <div class="row col-md-6 pull-right">
            <div class="form-group">
              <label class="col-sm-4 control-label" style="margin-top: 10px">พ.ศ.</label>
              <div class="col-sm-8">
                <input type="number"  min="2000" max="{{date('Y') + 543}}" class="form-control" placeholder="เช่น {{date('Y') + 543}}" name="pub_year">
              </div>
            </div>
          </div>

          <div class="row col-md-6">
            <div class="form-group">
              <label class="col-sm-4 control-label" style="margin-top: 10px">ทะเบียนการผลิต</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="เช่น รท.4531" name="produce_no">
              </div>
            </div>
          </div>

          <div class="row col-md-6 pull-right">
            <div class="form-group">
              <label class="col-sm-4 control-label" style="margin-top: 10px">ประเภทหนังสือ</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="เช่น ประเภทAAA" name="book_type">
              </div>
            </div>
          </div>

          <div class="row col-md-6">
            <div class="form-group">
              <label class="col-sm-4 control-label" style="margin-top: 10px">หนังสือระดับ</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="เช่น ม.3" name="grade">
              </div>
            </div>
          </div>

          <div class="row col-md-6 pull-right">
            <div class="form-group">
              <label class="col-sm-4 control-label" style="margin-top: 10px">เนื้อเรื่องย่อ</label>
              <div class="col-sm-8">
                <textarea rows="4" class="form-control" name="abstract"></textarea>
              </div>
            </div>
          </div>

        <div class="form-group col-md-12" style="margin-top: 15px">
          <a href = "{{ url('/') }}" class = "btn btn-lg btn-warning revous">กลับหน้าแรก</a>
          <input type="submit" class="btn btn-success btn-lg pull-right" style="width: 100px" value='เพิ่ม'>
        </div>
        </form>
      </div>
  </div>
</div>
@stop
