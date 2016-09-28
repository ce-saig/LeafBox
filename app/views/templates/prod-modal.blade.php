<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" ng-click="cancel()" aria-hidden="true">&times;</button>
  <h4 class="modal-title"><% data.mode == 'ADD' ? 'เพิ่ม' : 'แก้ไข' %>สถานะการผลิต</h4>
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
        <select ng-disabled="data.mode == 'EDIT'" id="prod_action" class="form-control" required="required" ng-options="option.id as option.label for option in status_options" ng-change="changeStatus()" ng-model="selected.status.id">
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">*ผู้ปฏิบัติ</label>
      <div class="col-sm-10">
        <ui-select ng-model="selected.actioner" theme="selectize" title="Choose a person">
        <ui-select-match placeholder="Select or search a person." ><% selected.actioner.name %></ui-select-match>
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
  <button class="btn btn-success" ng-click="ok()" ><% data.mode == 'ADD' ? 'เพิ่ม' : 'แก้ไข' %></button>
</div>