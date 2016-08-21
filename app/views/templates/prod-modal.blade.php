<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" ng-click="cancel()" aria-hidden="true">&times;</button>
  <h4 class="modal-title">เพิ่มสถานะการผลิต</h4>
</div>
<div class="modal-body">
  <div class="alert alert-danger slide" id='prod-noti1' ng-hide="warning.off">
    <% warning.text %>
  </div>
  <div class="row" id="addProdBody">
    <div class="form-group">
      <label class="col-sm-2 control-label">ประเภทสื่อ</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="prod_media_type_text" value="<% getMedia() %>" disabled="disabled">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">*สถานะ</label>
      <div class="col-sm-10">
        <select name="" id="prod_action" class="form-control" required="required" ng-options="option.id as option.label for option in status_options" ng-change="changeStatus()" ng-model="selected.status.id">
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">*ผู้ปฏิบัติ</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" ng-model="actioner" id="prod_actioner">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">*วันปฏิบัติ</label>
      <div class="col-sm-10" ng-click="datepicker.toggle(1)">
        <input type="text" class="form-control" uib-datepicker-popup="<% datepicker.format %>" ng-model="action_date" is-open="datepicker.popup.action_date" datepicker-options="datepicker.dateOptions" ng-required="true" close-text="Close" alt-input-formats="altInputFormats" />
      </div>
    </div>
    <div class="form-group" id="finish_date" ng-hide="selected.status.id == 5">
      <label class="col-sm-2 control-label">วันเสร็จ</label>
      <div class="col-sm-10" ng-click="datepicker.toggle(2)">
        <input type="text" class="form-control" uib-datepicker-popup="<% datepicker.format %>" ng-model="finish_date" is-open="datepicker.popup.finish_date" datepicker-options="datepicker.dateOptions" ng-required="true" close-text="Close" alt-input-formats="altInputFormats" />
      </div>
    </div>
  </div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger" ng-click="cancel()">ยกเลิก</button>
  <button class="btn btn-success" ng-click="ok()" >เพิ่ม</button>
</div>