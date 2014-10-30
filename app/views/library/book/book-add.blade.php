@extends('library.master')

@section('container')
<script>$('body').attr('id', 'product-add-page');</script>
<div class="row">
  <div class="col-md-12 head-topic">
    <h2>Add Book</h2>
    <div class="border"></div>
  </div>
  <div class="col-md-12">
    <div class="form-input panel panel-default">  
      <div class="panel-heading">
          <i class="fa fa-external-link-square"></i>
           Add Form
      </div>
      <div class="panel-body">  
        <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="inputTitle" class="col-sm-2 control-label">Book No</label>
            <div class="col-sm-3">
              <input name="IBOOK_NO" type="text" class="form-control" id="inputTitle" placeholder="I0002, I0003" value="{{$lastBook}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputTitle" class="col-sm-2 control-label">ISBN</label>
            <div class="col-sm-10">
              <input name="ISBN" type="text" class="form-control" id="inputTitle" placeholder="ISBN">
            </div>
          </div>
          <div class="form-group">
            <label for="inputTitle" class="col-sm-2 control-label">Title</label>
            <div class="col-sm-10">
              <input name="TITLE" type="text" class="form-control" id="inputTitle" placeholder="Title">
            </div>
          </div>
          <div class="form-group">
            <label for="inputTitle" class="col-sm-2 control-label">Author</label>
            <div class="col-sm-10">
              <input name="AUTHOR" type="text" class="form-control" id="inputTitle" placeholder="Author">
            </div>
          </div>
          <div class="form-group">
            <label for="inputTitle" class="col-sm-2 control-label">TRANSLATE</label>
            <div class="col-sm-10">
              <input name="TRANSLATE" type="text" class="form-control" id="inputTitle" placeholder="TRANSLATE">
            </div>
          </div>
          <div class="form-group">
            <label for="inputTitle" class="col-sm-2 control-label">PAGES</label>
            <div class="col-sm-10">
              <input name="PAGES" type="text" class="form-control" id="inputTitle" placeholder="PAGES">
            </div>
          </div>
          <div class="form-group">
            <label for="inputTitle" class="col-sm-2 control-label">GRADE</label>
            <div class="col-sm-10">
              <input name="GRADE" type="text" class="form-control" id="inputTitle" placeholder="GRADE">
            </div>
          </div>
          <div class="form-group">
            <label for="inputStatus" class="col-sm-2 control-label">สถานะ</label>
            <div class="col-sm-3">
              <select name="STATUS" class="form-control">
                <option value="กำลังผลิต">ว่าง</option>
                <option value="ผลิตเสร็จ">จองอ่าน</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputTitle" class="col-sm-2 control-label">BTYPE</label>
            <div class="col-sm-10">
              <input name="BTYPE" type="text" class="form-control" id="inputTitle" placeholder="BTYPE">
            </div>
          </div>
          <div class="form-group">
            <label for="inputStatus" class="col-sm-2 control-label">BM_STATUS</label>
            <div class="col-sm-3">
              <select name="BM_STATUS" class="form-control">
                <option value="กำลังผลิต">กำลังผลิต</option>
                <option value="ผลิตเสร็จ">ผลิตเสร็จ</option>
                <option value="ไม่ผลิต">ไม่ผลิต</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputStatus" class="col-sm-2 control-label">SETCM_STATUS</label>
            <div class="col-sm-3">
              <select name="SETCM_STATUS" class="form-control">
                <option value="กำลังผลิต">กำลังผลิต</option>
                <option value="ผลิตเสร็จ">ผลิตเสร็จ</option>
                <option value="ไม่ผลิต">ไม่ผลิต</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputStatus" class="col-sm-2 control-label">SETDM_STATUS</label>
            <div class="col-sm-3">
              <select name="SETDM_STATUS" class="form-control">
                <option value="กำลังผลิต">กำลังผลิต</option>
                <option value="ผลิตเสร็จ">ผลิตเสร็จ</option>
                <option value="ไม่ผลิต">ไม่ผลิต</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputStatus" class="col-sm-2 control-label">SETCD_STATUS</label>
            <div class="col-sm-3">
              <select name="SETCD_STATUS" class="form-control">
                <option value="กำลังผลิต">กำลังผลิต</option>
                <option value="ผลิตเสร็จ">ผลิตเสร็จ</option>
                <option value="ไม่ผลิต">ไม่ผลิต</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputStatus" class="col-sm-2 control-label">SETDVD_STATUS</label>
            <div class="col-sm-3">
              <select name="SETDVD_STATUS" class="form-control">
                <option value="กำลังผลิต">กำลังผลิต</option>
                <option value="ผลิตเสร็จ">ผลิตเสร็จ</option>
                <option value="ไม่ผลิต">ไม่ผลิต</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button class="btn btn-primary" id="save-button">Save</button>
              <input type="button" class="btn btn-danger" onclick="location.href=&quot;/library/book&quot;;" value="Cancel">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@stop
