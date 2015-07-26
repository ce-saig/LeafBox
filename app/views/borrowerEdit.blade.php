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
            <label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="name" value="{{ $member->name }}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Gender</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="gender" value="{{ $member->gender}}">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Address</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="address" value="{{ $member->address }}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Dintrict</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="district" value="{{ $member->district }}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Province_Postcode</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="province_postcode" value="{{ $member->province_postcode }}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Phone number</label>
            <div class="col-sm-9">
              <input type="text" class="form-control"  name="phone_no" value="{{ $member->phone_no }}">
            </div>
          </div>
          <input type="submit" value="Save" class="btn btn-primary" />
 			<a href="{{ action('BorrowerSystemController@index') }}" class="btn btn-link">Cancel</a>

     </div>
     </div>
     </form>
    </div>
 </div>

@stop