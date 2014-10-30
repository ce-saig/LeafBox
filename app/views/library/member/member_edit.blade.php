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
    <div class="col-md-6">
      <h2>Edit Member</h2>
    </div>
    <div class="col-md-6 new-btn-top">
      <a class="btn btn-danger pull-right" href="<?php echo url('library/member-remove?member_id='.$member['MEMBER_NO']); ?>" onclick="return confirm('Are you sure to remove member?');">Remove member</a>
    </div>
    <div class="col-md-12 border clearpadding"></div>
  </div>
  <div class="col-md-12">
    <div class="form-input panel panel-default">
      <div class="panel-heading">
          <i class="fa fa-external-link-square"></i>
           Edit Form
      </div>
      <div class="panel-body">
        <form class="form-horizontal" role="form" action="" method="post">
          <input type="hidden" name="member_id" value="<?php echo $member['MEMBER_NO']; ?>" />
          <div class="form-group">
            <label for="inputFitstname" class="col-sm-2 control-label">ชื่อ - นามสกุล</label>
            <div class="col-sm-6">
              <input name="NAME" type="text" class="form-control" id="inputTitle" placeholder="ณัฐวุฒิ" value="<?php echo $member['NAME']; ?>" >
            </div>
          </div>
          <div class="form-group">
            <label for="inputgender" class="col-sm-2 control-label">เพศ</label>
            <div class="col-sm-6">
              <label class="radio-inline">
                <input type="radio" name="GENDER" class="gender" value="male"> ชาย
              </label>
              <label class="radio-inline">
                <input type="radio" name="GENDER" class="gender" value="female"> หญิง
              </label>
            </div>
            <script>
              $('.gender[value=<?php echo $member['GENDER']; ?>]').attr('checked', 'checked');
            </script>
          </div>
          <div class="form-group">
            <label for="inputDesc" class="col-sm-2 control-label">ที่อยู่</label>
            <div class="col-sm-6">
              <div><textarea name="ADDRESS" class="form-control" placeholder="213/222" rows="3"><?php echo $member['ADDRESS']; ?>"</textarea></div>
            </div>
          </div>
          <div class="form-group">
            <label for="inputDISTRICT" class="col-sm-2 control-label">ตำบล</label>
            <div class="col-sm-6">
              <input name="DISTRICT" type="text" class="form-control" id="inputFacebook" placeholder="ตำบล" value="<?php echo $member['DISTRICT']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPROVINCE_POSTCODE" class="col-sm-2 control-label">รหัสไปรษณีย์</label>
            <div class="col-sm-6">
              <input name="PROVINCE_POSTCODE" type="text" class="form-control" placeholder="10500" value="<?php echo $member['PROVINCE_POSTCODE']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputTel" class="col-sm-2 control-label">เบอร์โทร</label>
            <div class="col-sm-6">
              <input name="PHONE_NO" type="text" class="form-control" id="inputTel" placeholder="0862133232" value="<?php echo $member['PHONE_NO']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="inputOccu" class="col-sm-2 control-label">ตำแหน่ง</label>
            <div class="col-sm-6">
              <label class="radio-inline">
                <input type="radio" name="MEMBER_STATUS" class="postion" value="user"> สมาชิกทั่วไป
              </label>
              <label class="radio-inline">
                <input type="radio" name="MEMBER_STATUS" class="postion" value="vip"> สมาชิก VIP
              </label>
              <label class="radio-inline">
                <input type="radio" name="MEMBER_STATUS" class="postion" value="institute"> หน่วยงาน
              </label>
            </div>
            <script>
              $('.postion[value=<?php echo $member['MEMBER_STATUS']; ?>]').attr('checked', 'checked');
            </script>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-6">
              <button type="submit" class="btn btn-primary">Save</button>
              <input type="button" class="btn btn-danger" onclick="location.href=&quot;/library/member&quot;;" value="Cancel">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div style="display: none;">
      <div id="reset-password">
          <form action="<?php echo url('library/member-reset-password'); ?>" method="post">
              <input type="hidden" name="member_id" value="<?php echo $member['id']; ?>" />
              <table class="table table-striped">
                  <tr><td>New Password</td><td><input type="password" class="form-control" name="password" value="" /></td></tr>
              </table>
              <div><button class="btn btn-primary">Reset</button></div>
          </form>
      </div>
  </div>
</div>
@stop