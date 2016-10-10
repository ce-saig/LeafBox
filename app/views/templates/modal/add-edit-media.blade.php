<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" ng-click="closeModal()" aria-hidden="true">&times;</button>
  <h4 class="modal-title"><% operationName + getMediaLabel() %></h4>
</div>
<div class="modal-body">
  <div class="alert alert-danger slide" ng-show="notification.show">
    <% notification.message %>
  </div>

  <fieldset class="form-horizontal" ng-disabled="disabledForm">
    <div class="form-group" ng-show="getMediaNumber() == MediaService.BRAILLE">
      <label class="control-label col-md-3">จำนวนหน้า</label>
      <div class="col-md-6"><input type="number" class="form-control" min=1 ng-model="formdata.pages"></div>
      <label class="control-label">หน้า</label>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3"><% label.numpart %></label>
      <div class="col-md-6"><input type="number" class="form-control" min=1 ng-model="formdata.numpart"></div>
      <label class="control-label"><% label.numpart_suff %></label>
    </div>
    <div class="form-group" ng-show="getMediaNumber() != MediaService.BRAILLE">
      <label class="control-label col-md-3">ความยาว</label>
      <div class="col-md-6"><input type="number" class="form-control" min=1 ng-model="formdata.length"></div>
      <label class="control-label">นาที</label>
    </div>
    <div class="form-group" ng-show="getMediaNumber() == MediaService.BRAILLE">
      <label class="col-sm-3 control-label">ผู้ตรวจสอบ</label>
      <div class="col-sm-6">
        <ui-select ng-model="formdata.examiner" theme="selectize" title="Choose a person">
          <ui-select-match placeholder="Select or search a person." ><% formdata.examiner.name %></ui-select-match>
          <ui-select-choices group-by="'group'" refresh="searchUsers($select.search)" refresh-delay="1200" repeat="user in users | filter: $select.search">
            <span ng-bind-html="user.name | highlight: $select.search"></span>
            <small ng-bind-html="user.username | highlight: $select.search"></small>
            <small ng-bind-html="user.email | highlight: $select.search"></small>
          </ui-select-choices>
        </ui-select>
      </div>
    </div>
  </fieldset>
</div>
<div class="modal-footer">
  <button type="submit" class="btn btn-primary pull-left" ng-show="tunnel.mode == MediaService.EDIT" ng-click="goToMediaDetails()">ดูรายละเอียดสื่อ</button>
  <button type="submit" class="btn btn-success" ng-click="sendData()"><% operationName %></button>
</div>