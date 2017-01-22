@extends('library.layout')

@section('head')
<title>Leafbox :: Report</title>
@stop

@section('body')

<div class="panel panel-primary" ng-controller="ReportController">
  <div class="panel-heading">
    <div class="panel-title">
    	<span style="color:white;font-size: 24px">รายงาน</span>
    </div>
  </div>
  <div class="panel-body">
  	
  	<div class="container">
  		<div class="col-md-12">
  			<span style="font-size: 20px">รายงานจากข้อมูลหนังสือ</span>
  		</div>
	  	<div class = "container">
		  <div class="col-lg-3" style="margin-top: 10px;" ng-repeat="book in books.label">
		    <div class="input-group">
		      <span class="input-group-addon" ng-style="books.style[$index]">
		        <input type="checkbox" ng-model="books.enabled[$index]" ng-click="AutoSelect($index)"> 
		      </span>
			  <input class="form-control" placeholder="<%book%>" ng-model="item.book_id_init" ng-if="$index == 0" ng-show="item.id_mode == id_modes[3]" ng-disabled="!books.enabled[$index]">
			  <span class="input-group-btn"  ng-if="$index == 0">
			      <select class="form-control" ng-options = "item for item in id_modes" ng-model="item.id_mode" ng-disabled="!books.enabled[$index]" style="width: 60px;font-size: 16px" ng-init="item.id_mode = id_modes[0]">
		    	  </select>
			  </span>
		      <input type="text" class="form-control" placeholder="<%book%>" ng-model="books.model[$index]" ng-disabled="!books.enabled[$index]" ng-click="check()" style="font-size: 16px">
		    </div><!-- /input-group -->
		  </div><!-- /.col-lg-3 -->
		</div>
	</div>

  	<div class="container" style="margin-top: 20px">
  		<div class="col-md-12">
  			<span style="font-size: 20px">รายงานจากข้อมูลสถานะการผลิตสื่อ</span>
  		</div>
		<div class = "container">
		  <div class="col-lg-4" style="margin-top: 10px" ng-repeat="prod in prods.label">  
		    <div class="input-group">
		      <span class="input-group-addon" style="font-size: 16px" ng-style="prods.style[$index]">
		        <input type="checkbox" ng-model="prods.enabled[$index]" ng-click="AutoSelect($index)"> สถานะการผลิต<%prod%>
		      </span>
		      <select class="form-control" ng-options = "idx as item for (idx, item) in BookProductionService.status[$index]" ng-model="prods.model[$index]" ng-disabled="!prods.enabled[$index]" style="height: 32px">
    		  </select>
		    </div><!-- /input-group -->
		  </div><!-- /.col-lg-3 -->
		</div>
  	</div> <!-- End Media container -->

  	<div class="container" style="margin-top: 20px">
  		<div class="col-md-12">
  			<span style="font-size: 20px">ข้อมูลสื่อย่อย</span>
  		</div>
		<div class = "container">
		  <div class="col-lg-3" style="margin-top: 10px" ng-repeat="prod in prods.label">  
		    <div class="input-group">
		      <span class="input-group-addon" style="font-size: 16px" ng-style="medias.style[$index]">
		        <input type="checkbox" ng-model="medias.enabled[$index]" ng-click="ChangeColor($index)"> <%prod%>
		      </span>
		      <select class="form-control" ng-options = "item for item in medias.label" ng-model="medias.status[$index]" ng-show="medias.enabled[$index]" style="height: 32px">
    		  </select>
		    </div><!-- /input-group -->
		  </div><!-- /.col-lg-3 -->
		</div>
  	</div> <!-- End Media container -->

  	<div class="container" style="margin-top: 20px">
  		<div class="col-md-12">
  			<span style="font-size: 20px">เลือกคอลัมน์ที่ต้องการแสดง</span>
  		</div>
		<div class = "container" style="margin-top: 10px">
		    <div class="input-group well col-md-12 column_show">
		      <div class="col-md-2" ng-repeat="column in columns.label">
		    	<span style="font-size: 16px">
		        	<input type="checkbox" ng-model="columns.enabled[$index]"> <%column%>
		      	</span>
		      </div>
		    </div><!-- /input-group -->
		</div>
  	</div> <!-- End Media container -->  	

  	<div class="container" style="margin-top: 20px">
  		<div class="btn btn-success col-md-3 pull-right" data-toggle="modal" data-target=".report_modal" ng-click="CreateReport()">สร้างรายงาน</div>
  	</div> <!-- End Media container -->  
  </div>
</div>

<!-- modal -->
<div class="modal fade report_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
  	</div>
  </div>
</div>

@stop
