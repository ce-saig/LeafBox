@extends('library.layout')
@section('head')
<title>Leafbox :: DVD - {{$item->id}}</title>
@stop
@section('body')
<div class="container" ng-controller="MediaDetailEditController" ng-init="InitMediaType('dvd')">
  <div ng-class="panelclass">
    <div class="panel-heading text-center" class="panel-title">
      <span style="font-size: 20px;color:white">
         <u><strong>ดีวีดี<span ng-show="media.master == 1">ต้นฉบับ.</span></strong></u> 
         <% media.id %><span ng-hide="media.original_no == null">(<%media.original_no%>)</span> :: <% book.title %>
         <span ng-show="media.reserved == 1">(ถูกยืม)</span> <span ng-show="media.reserved == 0">(ยืมได้)</span>
         <span ng-show="media.reserved == 2">(ปรับปรุง)</span>
      </span>
    </div>

    <div class="panel-body" style="margin-top: 10px">
      <div class="text-right">
        <div class="input col-md-10">
          <div class="col-md-1 form-label" style="margin-top: 7px;font-size: 16px">สถานะ</div>
          <div class="col-md-2">
            <select class="form-control" ng-options="stat as stat.label for stat in status track by stat.id"  
            ng-init="all_selected_status = status[0]" ng-model="all_selected_status">
            </select>
          </div>
          <div class="col-md-2 form-label" style="margin-top: 7px;font-size: 16px">วันที่แก้ไข</div>
          <div class="col-md-2"><input type="text" class="form-control" ng-model="all_date" uib-datepicker-popup is-open="all_date_popup.opened" datepicker-options="dateOptions" ng-click="all_date_popup.opened = true"></div>
          <div class="col-md-2 form-label" style="margin-top: 7px;font-size: 16px">หมายเหตุ</div>
          <div class="col-md-3"><input type="text" class="form-control" ng-model="all_notes"></div>
        </div>
        <div class="col-md-2">
          <button type="button" class="btn btn-warning" ng-click="EditAll()">แก้ไขทั้งหมด</button>
        </div>
      </div>
      <br><br>
      <hr>

      <form role="form">
        <div class="col-md-12">
          <table class="table text-center">
            <tr style="font-size: 16px">
              <th ng-repeat = "th in tableheader" ng-if="$index < 2" class="text-center"><% th %></th>  
              <th ng-repeat = "th in tableheader" ng-if="$index > 1" class="text-left"><% th %></th>            
            </tr>
            <tr ng-repeat = "detail in details">
              <td style="padding-top: 15px"><% detail.id %></td>
              <td style="padding-top: 15px"><% detail.part %> / <% media.numpart %></td>
              <td><select class="form-control" ng-options="st as st.label for st in status track by st.id" ng-model="selected_status[$index]" 
              ng-init="selected_status[$index] = status[detail.status]" ng-change="SelectStatus($index)"></select></td>
              <td><input type="text" class="form-control" ng-model = "detail.date" uib-datepicker-popup is-open="date_popup[$index].opened" datepicker-options="dateOptions" ng-click="date_popup[$index].opened = true" ng-disabled="media.reserved==1"></td>
              <td><input type="text" class="form-control" ng-model="detail.note"></td>
            </tr>
          </table>
        </div>
        <div class="col-md-12">
          <div class = "btn btn-warning pull-left" style="font-size: 16px" ng-click="Back()" > กลับ </div>
          <div class="btn btn-success pull-right" style="font-size: 16px" ng-click="SaveEdit()">บันทึก</div>
        </div>
      </form>
    </div>
  </div>
</div>
@stop

@section('script')
@parent
<script>
  angular.module('leafBox').run(function($rootScope) {
    $rootScope.selected_book_id = {{ $book['id'] }};
    $rootScope.selected_media_id = {{ $item->id }};
  });
</script>
@stop
