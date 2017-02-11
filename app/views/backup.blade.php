@extends('library.layout')

@section('head')
<title>Leafbox :: Backup</title>
@stop

@section('body')

<div class="panel panel-primary" ng-controller = "BackupController">
  <div class="panel-heading">
    <div class="panel-title">
    	<span style="color:white;font-size: 24px">ระบบสำรองฐานข้อมูล</span>
    </div>
  </div>
  <div class="panel-body">
   	<div class="container col-md-12 text-center">
		<table class="table" style="font-size: 20px">
		  <tr>
		    <th class="text-center">เลือก</th>
		    <th class="text-center">วันที่</th>
		    <th class="text-center">เวลา</th> 
		    <th class="text-center">ชื่อไฟล์</th>
		  </tr>
		  <tr ng-repeat="file in files" style="font-size: 16px;" ng-style="select[$index].style" class="sel_hover">
		  	<td style="font-size: 18px">
		  		<span ng-class="select[$index].class" ng-click="Selecting($index)"></span>
		  	</td>
		    <td><%file.date%></td>
		    <td><%file.time%></td> 
		    <td><%file.file%></td>
		  </tr>
		</table>   		
  	</div>
  	<div class="text-center" style="font-size: 18px">
  		<span>ฐานข้อมูลที่ใช้ในขณะนี้มาจากไฟล์ <%used_file%></span>
  	</div>
  	<div class="col-md-12" ng-hide = "loading">
   		<div class="btn btn-success pull-left" ng-click="Backup()">สำรองฐานข้อมูล</div>
   		<div class="pull-right">
			<div class="btn btn-danger" data-toggle="modal" data-target=".confirm_modal" ng-disabled="canRestore">
				ลบไฟล์
			</div>
   			<div class="btn btn-warning" ng-click="Restore()" ng-disabled="canRestore">คืนค่าฐานข้อมูล </div>  
   		</div>
   		
  	</div> 	
  	<div class="alert alert-warning col-md-12 text-center" ng-show = "loading">
   		<span style="font-size: 30px">Processing...</span>
  	</div> 	
  </div>
  	<!-- modal -->
	<div class="modal fade confirm_modal model-lg" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-body text-center">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <div style="margin-top: 20px">
	        	<span style="font-size: 24px">คุณต้องการลบไฟล์ <span style="font-size: 20px"><%files[temp_sel].file%></span> ?</span>
	        </div>
	        <div style="margin-top: 20px"> 
		    	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">ยกเลิก</button>
		    	<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" ng-click="DeleteFile()">ลบไฟล์</button>
	      	</div>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</div>
@stop
