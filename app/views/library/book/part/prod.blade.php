<div role="tabpanel" class="tab-pane" ng-controller="ProdController as prodCtrl" >
  <div>
    <div class="col-xs-12" ng-repeat="i in [0, 1, 2, 3, 4]">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="panel-title">
            <% media[i] %> <a class="pull-right" ng-click="addProdModal(i)"><h3 class="label label-primary add-media-prod"><i class="fa fa-plus fa-2"></i> เพิ่มสถานะการผลิต</h3></a>
          </div>
        </div>
        <div class="panel-body">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>ขั้นตอน</th>
                <th>ผู้ปฏิบัติ</th>
                <th>วันที่ปฏิบัติ</th>
                <th>วันเสร็จ</th>
              </tr>
            </thead>
            <tbody>
              <tr class="hover" ng-repeat="(index,prod) in prods.obj track by index" ng-if="prod.media_type == i">
                <td onclick="prodEditShow(this)">
                  <% status[i][prod.action] %>
                </td>
                <td onclick="prodEditShow(this)"><% prod.actioner.name %></td>
                <td class="prodEdit-act_date" onclick="prodEditShow(this)"><% prod.act_date == "0000-00-00 00:00:00" ? 'ยังไม่ได้ระบุ' : DBDate(prod.act_date);  %>
                </td>
                <td class="prodEdit-act_date" onclick="prodEditShow(this)"><% prod.finish_date == "0000-00-00 00:00:00" ? 'ยังไม่ได้ระบุ' : DBDate(prod.finish_date); %>
                </td>
                <td><button ng-click="editProdModal(prods.obj[index])" class="btn btn-success">แก้ไข</button>
                <button ng-click="removeProd(index)" ng-if="prod.action == prods.index[i]" class="btn btn-danger">ลบ</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="prod-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">แก้ไขสถานะการผลิต</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="alert alert-danger" id='prod-edit-noti' hidden>
            กรุณาใส่ข้อมูลที่มี * ให้ถูกต้อง และครบถ้วน
          </div>
        </div>
        <div class="row" id="prod-edit-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">*สถานะ</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="prod_edit_action_text" disabled>
                <select name="" id="prod_edit_action" class="form-control" required="required" style="display: none">
                  <option value="">เลือกสถานะ</option>
                  <option value="0">อ่าน</option>
                  <option value="1">ทำต้นฉบับ</option>
                  <option value="2">ทำกล่อง</option>
                  <option value="3">ส่งตรวจ</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">*ผู้ปฏิบัติ</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="prod_edit_actioner">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">*วันปฏิบัติ</label>
              <div class="col-sm-10">
                <input type="text" class="form-control datepicker" id="prod_edit_act_date">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">วันเสร็จ</label>
              <div class="col-sm-10">
                <input type="text" class="form-control datepicker" id="prod_edit_finish_date">
              </div>
            </div>
        </div>
        <input id="prod_edit_id" type="hidden" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        <button type="button" class="btn btn-primary" onclick="prodEditAjax()">บันทึก</button>
      </div>
    </div>
  </div>
</div>