@extends('library.layout')

@section('head')
<title>Leafbox :: Report</title>
@stop

@section('body')
<div ng-controller="ReportController">
<div class="panel panel-primary" style="color:black">
  <div class="panel-heading">
    <div class="panel-title">
    	<span style="color:white;font-size: 24px">รายงาน</span>
    </div>
  </div>
  <div class="panel-body">
  	
  	<div class="container col-md-12">
  		<div class="col-md-12">
  			<span style="font-size: 22px">รายงานจากข้อมูลหนังสือ</span>
  		</div>
		  <div class="col-lg-3" style="margin-top: 10px;" ng-repeat="book in books.label">
		    <div class="input-group">
		      <span class="input-group-addon" ng-style="books.style[$index]">
		        <input type="checkbox" ng-model="books.enabled[$index]" ng-click="AutoSelect($index, 'BOOK')"> 
		      </span>
			  <input class="form-control" placeholder="<%book%>" ng-model="item.book_id_init" ng-if="$first" ng-show="item.id_mode == id_modes[3]" ng-disabled="!books.enabled[$index]" type="number" min="0">
			  <span class="input-group-btn"  ng-if="$index == 0">
			      <select class="form-control" ng-options = "item for item in id_modes" ng-model="item.id_mode" ng-disabled="!books.enabled[$index]" style="width: 60px;font-size: 16px" ng-init="item.id_mode = id_modes[0]">
		    	  </select>
			  </span>
		      <input type="text" class="form-control" placeholder="<%book%>" ng-model="books.model[$index]" ng-disabled="!books.enabled[$index]" ng-if="!$first" style="font-size: 16px">
          <input type="number" class="form-control" placeholder="<%book%>" ng-model="books.model[$index]" ng-disabled="!books.enabled[$index]" ng-if="$first" style="font-size: 16px" min="0">
		    </div><!-- /input-group -->
		  </div><!-- /.col-lg-3 -->
	</div>

  	<div class="container col-md-12" style="margin-top: 20px">
  		<div class="col-md-12">
  			<span style="font-size: 22px">รายงานจากข้อมูลสถานะการผลิตสื่อ</span>
  		</div>
		  <div class="col-lg-4" style="margin-top: 10px" ng-repeat="prod in prods.label">  
		    <div class="input-group">
		      <span class="input-group-addon" style="font-size: 16px" ng-style="prods.style[$index]">
		        <input type="checkbox" ng-model="prods.enabled[$index]" ng-click="AutoSelect($index, 'PROD')"> สถานะของ<%prod%>
		      </span>
		      <select class="form-control" ng-options = "idx as item for (idx, item) in BookProductionService.status[$index]" ng-model="prods.model[$index]" ng-disabled="!prods.enabled[$index]" style="height: 32px">
    		  </select>
		    </div><!-- /input-group -->
		  </div><!-- /.col-lg-3 -->
  	</div> <!-- End Media container -->

  	<div class="container col-md-12" style="margin-top: 20px">
  		<div class="col-md-12">
  			<span style="font-size: 22px">ข้อมูลสื่อย่อย</span>
  		</div>
		  <div class="col-lg-3" style="margin-top: 10px" ng-repeat="prod in prods.label">  
		    <div class="input-group">
		      <span class="input-group-addon" style="font-size: 16px" ng-style="medias.style[$index]">
		        <input type="checkbox" ng-model="medias.enabled[$index]" ng-click="ChangeColor($index,'MEDIA')"> <%prod%>
		      </span>
		      <select class="form-control" ng-options = "idx as item for (idx, item) in medias.label" ng-model="medias.model[$index]" ng-show="medias.enabled[$index]" ng-init="medias.model[$index] = '0'" style="height: 32px">
    		  </select>
		    </div><!-- /input-group -->
		  </div><!-- /.col-lg-3 -->
  	</div> <!-- End Media container -->

    <div class="container col-md-12" style="margin-top: 20px">
      <div class="col-md-12">
        <span style="font-size: 22px">ข้อมูลผู้ยืม</span>
      </div>
      <div class="col-lg-3" style="margin-top: 10px" ng-repeat="borrower in borrowers.label">  
        <div class="input-group">
          <span class="input-group-addon" style="font-size: 16px" ng-style="borrowers.style[$index]">
            <input type="checkbox" ng-model="borrowers.enabled[$index]" ng-click="ChangeColor($index,'Borrower')"> <%borrower%>
          </span>
          <input type="number" class="form-control" ng-model="borrowers.model[$index]" ng-disabled="!borrowers.enabled[$index]" ng-if="$first" style="font-size: 16px" min="0">
          <input type="text" class="form-control" ng-model="borrowers.model[$index]" ng-disabled="!borrowers.enabled[$index]" ng-if="$index==1" style="font-size: 16px" min="0">
          <select class="form-control" ng-options = "idx as item for (idx, item) in borrowers.gender" ng-model="borrowers.model[$index]" ng-disabled="!borrowers.enabled[$index]" ng-init="borrowers.model[$index] = '0'" style="height: 32px" ng-if="$index==2"></select>
        </div><!-- /input-group -->
      </div><!-- /.col-lg-3 -->
    </div> <!-- End Media container -->

  	<div class="container col-md-12" style="margin-top: 20px">
  		<div class="col-md-12">
  			<span style="font-size: 22px">เลือกคอลัมน์ที่ต้องการแสดง</span>
  		</div>
  		<div class = "container col-md-12" style="margin-top: 10px">
		    <div class="input-group well col-md-12 column_show">
          <div class="col-md-2" ng-repeat="column in columns.label">
		    	<span style="font-size: 16px">
		        	<input type="checkbox" ng-model="columns.enabled[$index]"> <%column%>
		      	</span>
		      </div>
		    </div><!-- /input-group -->
  		</div>
    </div> <!-- End Media container -->  	

  	<div class="container col-md-12" style="margin-top: 20px">
  		<div class="btn btn-success col-md-3 pull-right" data-toggle="modal" data-target=".report_modal" ng-click="CreateReport()" ng-disabled="filter_enabled[0] == false && filter_enabled[1] == false">สร้างรายงาน</div>
  	</div> <!-- End Media container -->  
  </div>
</div>
  
  <!-- ________________________Report Modal_______________________________-->
  <div class="modal fade report_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" ng-click="hidedownload=true"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title text-center">
            <label ng-style="modal_style[0]" ng-click="ChangeTable(0)"> ตารางข้อมูลหนังสือ </label>   
            <span><strong>/</strong></span>
            <label ng-style="modal_style[1]" ng-click="ChangeTable(1)"> ตารางข้อมูลสื่อ </label>            
            <span><strong>/</strong></span>        
            <label ng-style="modal_style[2]" ng-click="ChangeTable(2)"> ตารางข้อมูลสื่อย่อย </label>
          </h3>
        </div>
        <div class="modal-body text-center">  
          <table class="table table-striped" ng-show="showtable==0 && !loading">
            <tr style="font-size: 18px;color: #4d4d4d">
              <th ng-repeat="th in table.header" class="text-left"><%th%></th>
            </tr>
            <tr ng-repeat="book in report.book" class="text-left">
              <td ng-show="columns.enabled[0]">
                <%book.id%> <span ng-show="book.original_no!=''">(<%book.original_no%>)</span>
              </td>
              <td ng-show="columns.enabled[1]"><% book.title    %></td> 
              <td ng-show="columns.enabled[2]"><% book.author   %></td>
              <td ng-show="columns.enabled[3]"><% book.translate %></td>
              <td ng-show="columns.enabled[4]"><% book.pub_year  %></td>
              <td ng-show="columns.enabled[5]"><% book.publisher %></td>
              <td ng-show="columns.enabled[6]"><% book.book_type %></td>
              <td ng-show="columns.enabled[7]">
                <% BookProductionService.getProductionStatusLabel(0 ,report.prod[$index][0].action) %>  
              </td>
              <td ng-show="columns.enabled[8]">
                <% BookProductionService.getProductionStatusLabel(1 ,report.prod[$index][1].action) %>  
              </td>
              <td ng-show="columns.enabled[9]">
                <% BookProductionService.getProductionStatusLabel(2 ,report.prod[$index][2].action) %>  
              </td>
              <td ng-show="columns.enabled[10]">
                <% BookProductionService.getProductionStatusLabel(3 ,report.prod[$index][3].action) %>  
              </td>
              <td ng-show="columns.enabled[11]">
                <% BookProductionService.getProductionStatusLabel(4 ,report.prod[$index][4].action) %>  
              </td>
            </tr>
          </table>

          <table class="table table-striped" ng-show="showtable==1 && filter_enabled[2] && !loading">
            <tr style="font-size: 18px;color: #4d4d4d">
              <th ng-repeat="th in borrow_label" class="text-center"><%th%></th>
            </tr>
            <tr ng-repeat="(i,media) in report.media.braille">
              <td><%media.book.title%></td>
              <td>เบรลล์</td>
              <td><%media.id%></td>
              <td><%media.numpart%></td> 
              <td>
                <span ng-show="media.borrow!=null"><%media.borrower.name%></span>
                <span ng-show="media.borrow==null">ไม่มี</span>
              </td>  
              <td>
                <span ng-show="media.borrow!=null"><%media.borrow.date_borrowed%></span>
                <span ng-show="media.borrow==null">ไม่มี</span>
              </td>
            </tr>
            <tr ng-repeat="(i,media) in report.media.cassette">
              <td><%media.book.title%></td>
              <td>คาสเช็ท</td>
              <td><%media.id%></td>
              <td><%media.numpart%></td>  
              <td><%(media.borrow!=null)?media.borrower.name:'ไม่มี'%></td> 
              <td><%(media.borrow!=null)?media.borrow.date_borrowed:'ไม่มี'%></td>     
            </tr>
            <tr ng-repeat="(i,media) in report.media.daisy">
              <td><%media.book.title%></td>
              <td>เดซี่</td>
              <td><%media.id%></td>
              <td><%media.numpart%></td>  
              <td><%(media.borrow!=null)?media.borrower.name:'ไม่มี'%></td> 
              <td><%(media.borrow!=null)?media.borrow.date_borrowed:'ไม่มี'%></td>      
            </tr>
            <tr ng-repeat="(i,media) in report.media.cd">
              <td><%media.book.title%></td>
              <td>ซีดี</td>
              <td><%media.id%></td>
              <td><%media.numpart%></td>   
              <td><%(media.borrow!=null)?media.borrower.name:'ไม่มี'%></td> 
              <td><%(media.borrow!=null)?media.borrow.date_borrowed:'ไม่มี'%></td>       
            </tr>
            <tr ng-repeat="(i,media) in report.media.dvd">
              <td><%media.book.title%></td>
              <td>ดีวีดี</td>
              <td><%media.id%></td>
              <td><%media.numpart%></td>  
              <td><%(media.borrow!=null)?media.borrower.name:'ไม่มี'%></td> 
              <td><%(media.borrow!=null)?media.borrow.date_borrowed:'ไม่มี'%></td>       
            </tr>
          </table>

          <table class="table table-striped" ng-show="showtable==2 && filter_enabled[2] && !loading">
            <tr style="font-size: 18px;color: #4d4d4d">
              <th ng-repeat="th in media_label" class="text-center"><%th%></th>
            </tr>
            <tr ng-repeat="(i,detail) in report.media.braille_detail">
              <td><%detail.braille_id%></td>
              <td><%detail.id%></td>
              <td><%detail.part%> / <%detail.media.numpart%></td>
              <td><%DetailStatus(detail.status)%></td>  
              <td><%detail.media.book.title%></td>
              <td>เบรลล์</td>  
            </tr>
            <tr ng-repeat="(i,detail) in report.media.cassette_detail">
              <td><%detail.cassette_id%></td>
              <td><%detail.id%></td>
              <td><%detail.part%> / <%detail.media.numpart%></td>
              <td><%DetailStatus(detail.status)%></td> 
              <td><%detail.media.book.title%></td>
              <td>คาสเช็ท</td>    
            </tr>
            <tr ng-repeat="(i,detail) in report.media.daisy_detail">
              <td><%detail.daisy_id%></td>
              <td><%detail.id%></td>
              <td><%detail.part%> / <%detail.media.numpart%></td>
              <td><%DetailStatus(detail.status)%></td>  
              <td><%detail.media.book.title%></td>
              <td>เดซี่</td>   
            </tr>
            <tr ng-repeat="(i,detail) in report.media.cd_detail">
              <td><%detail.cd_id%></td>
              <td><%detail.id%></td>
              <td><%detail.part%> / <%detail.media.numpart%></td>
              <td><%DetailStatus(detail.status)%></td> 
              <td><%detail.media.book.title%></td>
              <td>ซีดี</td>    
            </tr>
            <tr ng-repeat="(i,detail) in report.media.dvd_detail">
              <td><%detail.dvd_id%></td>
              <td><%detail.id%></td>
              <td><%detail.part%> / <%detail.media.numpart%></td>
              <td><%DetailStatus(detail.status)%></td>  
              <td><%detail.media.book.title%></td>
              <td>ดีวีดี</td>   
            </tr>
          </table>

          <div class="col-md-12 alert alert-warning text-center" ng-show="loading">
            <span style="font-size: 36px">Loading...</span>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal" ng-click="hidedownload=true">Close</button>
          <div ng-hide="!hidedownload" class="col-md-8 pull-right" style="font-size: 16px;margin-top: -10px">
            <div class="col-md-3 col-md-offset-6">
              <div class="text-left"><input type="checkbox" ng-model="table_download[0]"> ตารางข้อมูลหนังสือ</div>
              <div class="text-left"><input type="checkbox" ng-model="table_download[1]"> ตารางข้อมูลสื่อ</div>
              <div class="text-left"><input type="checkbox" ng-model="table_download[2]"> ตารางข้อมูลสื่อย่อย</div>
            </div>
            <button type="button" class="btn btn-primary pull-right" ng-click="ExportCSV()" style="margin-top: 10px">Create CSV</button>
          </div>
          <div ng-hide="hidedownload" class="col-md-8 pull-right" style="font-size: 16px;margin-top: -10px">
            <a class="btn btn-success" href="/php/csv/output.csv" download="report.csv" style="margin-top: 10px">Download
            <%(table_download[0]&&table_download[1]&&table_download[2])?'All Tables':'Some Tables'%>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



@stop
