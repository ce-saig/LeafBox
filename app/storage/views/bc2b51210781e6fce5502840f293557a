<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" ng-click="cancel()" aria-hidden="true">&times;</button>
  <h4 class="modal-title"><% tunnel.mode == 'ADD' ? 'เพิ่ม' : 'แก้ไข' %>สถานะการผลิต</h4>
</div>
<div class="modal-body">
  <div class="alert alert-danger slide" ng-show="notification.show">
    <% notification.message %>
  </div>
  <div class="row">
    <div class="form-group">
      <label class="col-sm-2 control-label">ประเภทสื่อ</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" value="<% MediaService.convertToMediaLabel(tunnel.media_type) %>" disabled="disabled">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">*สถานะ</label>
      <div class="col-sm-10">
        <select ng-disabled="tunnel.mode == 'EDIT'" class="form-control" required="required" ng-options="option.status_number as option.status_label for option in status_options" ng-change="changeStatus()" ng-model="formdata.status_number">
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">*ผู้ปฏิบัติ</label>
      <div class="col-sm-10">
        <ui-select ng-model="formdata.actioner" theme="selectize" title="Choose a person">
        <ui-select-match placeholder="Select or search a person." ><% formdata.actioner.name %></ui-select-match>
          <ui-select-choices group-by="'group'" refresh="searchUsers($select.search)" refresh-delay="1200" repeat="user in users | filter: $select.search">
            <span ng-bind-html="user.name | highlight: $select.search"></span>
            <small ng-bind-html="user.username | highlight: $select.search"></small>
            <small ng-bind-html="user.email | highlight: $select.search"></small>
          </ui-select-choices>
        </ui-select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">*วันปฏิบัติ</label>
      <div class="col-sm-10" ng-click="datepicker.toggle(1)">
        <input type="text" class="form-control" uib-datepicker-popup="<% datepicker.format %>" ng-model="formdata.act_date" is-open="datepicker.popup.action_date" datepicker-options="datepicker.dateOptions" ng-required="true" close-text="Close" alt-input-formats="altInputFormats" />
      </div>
    </div>
    <div class="form-group" ng-hide="formdata.status_number == 5">
      <label class="col-sm-2 control-label">วันเสร็จ</label>
      <div class="col-sm-10" ng-click="datepicker.toggle(2)">
        <input type="text" class="form-control" uib-datepicker-popup="<% datepicker.format %>" ng-model="formdata.finish_date" is-open="datepicker.popup.finish_date" datepicker-options="datepicker.dateOptions" ng-required="true" close-text="Close" alt-input-formats="altInputFormats" />
      </div>
    </div>
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-danger" ng-click="cancel()">ยกเลิก</button>
  <button class="btn btn-success" ng-click="ok()" ><% tunnel.mode == 'ADD' ? 'เพิ่ม' : 'แก้ไข' %></button>
</div>