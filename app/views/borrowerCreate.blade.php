@extends('library.layout')

@section('head')
	<title>ลบรายละเอียดผู้ยืม</title>
@stop

@section('body')
	<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">เพิ่มรายการผู้ยืม</h3>
  </div>
  <div class="panel-body">   
    <form role="form" action="{{ action('BorrowerSystemController@handleCreate') }}" method="post">
      <div class='row'>
          <div class="form-group">
            <label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="name">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Gender</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="gender" placeholder="ญ หรือ ช">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Address</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="address">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Dintrict</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="district">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Province_Postcode</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="province_postcode"  placeholder="เช่น กทม. 10250">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Phone number</label>
            <div class="col-sm-9">
              <input type="text" class="form-control"  name="phone_no" placeholder="xxx-xxxxxxx" >
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