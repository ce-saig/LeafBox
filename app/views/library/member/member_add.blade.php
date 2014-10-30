@extends('library.master')

@section('container')
<style type="text/css">
  .form-inline .form-group{
    margin-left: 0;
    margin-right: 10px;
  }
</style>
<div class="row">
  <div class="col-md-12 head-topic">
    <h2>Add Member</h2>
    <div class="border"></div>
  </div>
  <div class="col-md-12">
    <div class="form-input panel panel-default">
      <div class="panel-heading">
        <i class="fa fa-external-link-square"></i>
         Add Form
      </div>
      <div class="panel-body">
        <form class="form-horizontal" role="form" action="" method="post">
          <div class="form-group">
            <label for="inputFitstname" class="col-sm-2 control-label">ชื่อ - นามสกุล</label>
            <div class="col-sm-6">
              <input name="NAME" type="text" class="form-control" id="inputTitle" placeholder="ณัฐวุฒิ">
            </div>
          </div>
          <div class="form-group">
            <label for="inputgender" class="col-sm-2 control-label">เพศ</label>
            <div class="col-sm-6">
              <label class="radio-inline">
                <input type="radio" name="GENDER" id="inlineRadio1" value="male" checked="checked"> ชาย
              </label>
              <label class="radio-inline">
                <input type="radio" name="GENDER" id="inlineRadio2" value="female"> หญิง
              </label>
            </div>
          </div>
          <div class="form-group">
            <label for="inputDesc" class="col-sm-2 control-label">ที่อยู่</label>
            <div class="col-sm-6">
              <div><textarea name="ADDRESS" class="form-control" placeholder="213/222" rows="3"></textarea></div>
            </div>
          </div>
          <div class="form-group">
            <label for="inputDISTRICT" class="col-sm-2 control-label">ตำบล</label>
            <div class="col-sm-6">
              <input name="DISTRICT" type="text" class="form-control" id="inputFacebook" placeholder="ตำบล">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPROVINCE_POSTCODE" class="col-sm-2 control-label">รหัสไปรษณีย์</label>
            <div class="col-sm-6">
              <input name="PROVINCE_POSTCODE" type="text" class="form-control" placeholder="10500">
            </div>
          </div>
          <div class="form-group">
            <label for="inputTel" class="col-sm-2 control-label">เบอร์โทร</label>
            <div class="col-sm-6">
              <input name="PHONE_NO" type="text" class="form-control" id="inputTel" placeholder="0862133232">
            </div>
          </div>
          <div class="form-group">
            <label for="inputOccu" class="col-sm-2 control-label">ตำแหน่ง</label>
            <div class="col-sm-6">
              <label class="radio-inline">
                <input type="radio" name="MEMBER_STATUS" id="inlineRadio1" value="user"> สมาชิกทั่วไป
              </label>
              <label class="radio-inline">
                <input type="radio" name="MEMBER_STATUS" id="inlineRadio2" value="vip"> สมาชิก VIP
              </label>
              <label class="radio-inline">
                <input type="radio" name="MEMBER_STATUS" id="inlineRadio2" value="institute"> หน่วยงาน
              </label>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-6">
              <button type="submit" class="btn btn-primary">Save</button>
              <input type="button" class="btn btn-danger" onclick="location.href=&quot;/library/Member&quot;;" value="Cancel">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@stop