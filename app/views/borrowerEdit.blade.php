@extends('library.layout')

@section('head')
<title>ระบบจัดการผู้ยืม</title>
@stop

@section('body')
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">แก้ไขรายละเอียดผู้ยืม</h3>
  </div>
  <div class="panel-body">   
    <form role="form" action="{{ action('BorrowerSystemController@handleEdit') }}" method="post">
      <input type="hidden" name="id" value="{{ $member->id }}" />
      <div class='row'>
        <div class="form-group">
          <label class="col-sm-2 control-label form-label">ชื่อ - สกุล</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="name" value="{{ $member->name }}">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label form-label">เพศ</label>
          <div class="col-sm-9">
            <label class="radio-inline">
              <input type="radio" name="gender" id="inlineRadio1" value="ช" {{ (( $member->gender == 'ช' ) ? 'checked' : '') }}>ชาย
            </label>
            <label class="radio-inline">
              <input type="radio" name="gender" id="inlineRadio2" value="ญ" {{ (( $member->gender == 'ญ' ) ? 'checked' : '') }}>หญิง
            </label>
          </div>
        </div>
        <br><br><br>
        <div class="form-group">
          <label class="col-sm-2 control-label form-label">สถานะ</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="status" value="{{ $member->member_status }}">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label form-label">ที่อยู่</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="address" value="{{ $member->address }}">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label form-label">อำเภอ/เขต</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="district" value="{{ $member->district }}">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label form-label">จังหวัด - รหัสไปรษณีย์</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="province_postcode" value="{{ $member->province_postcode }}">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label form-label">หมายเลขโทรศัพท์</label>
          <div class="col-sm-9">
            <input type="text" class="form-control"  name="phone_no" value="{{ $member->phone_no }}">
          </div>
        </div>
      </div>
      <br>
      <div class="pull-right">
        <input type="submit" value="บันทึก" class="btn btn-primary" />
        <a href="{{ action('BorrowerSystemController@index') }}" class="btn btn-default">ยกเลิก</a>
      </div>
    </div>
  </form>
</div>
</div>

@stop