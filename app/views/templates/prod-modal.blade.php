<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title">เพิ่มสถานะการผลิต</h4>
</div>
<div class="modal-body">
  <div class="row" id="addProdBody">
    <div class="form-group">
      <label class="col-sm-2 control-label">ประเภทสื่อ</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="prod_media_type_text" value="<%media[selected.media]%>" disabled="disabled">
        <select name="" id="prod_media_type" ng-model="selected_media" class="form-control" required="required" style="display: none">
          <option value="">เลือกสื่อ</option>
          <option value="0">เบรลล์</option>
          <option value="1">เทปคาสเซ็ท</option>
          <option value="2">เดซี่</option>
          <option value="3">CD</option>
          <option value="4">DVD</option>
        </select>
      </div>
    </div>            
    <div class="form-group">
      <label class="col-sm-2 control-label">*สถานะ</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="prod_action_text" disabled="disabled">
        <select name="" id="prod_action" class="form-control" required="required" ng-model="selected_status">
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">*ผู้ปฏิบัติ</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="prod_actioner">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">*วันปฏิบัติ</label>
      <div class="col-sm-10">
        <input type="text" class="form-control datepicker" id="prod_act_date">
      </div>
    </div>
    <div class="form-group" id="finish_date" ng-hide="selected_status == 5">
      <label class="col-sm-2 control-label">วันเสร็จ</label>
      <div class="col-sm-10">
        <input type="text" class="form-control datepicker" id="prod_finish_date">
      </div>
    </div>
  </div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger" ng-click="cancel()">ยกเลิก</button>
  <button class="btn btn-success" onClick="postProd()" >เพิ่ม</button>
</div>