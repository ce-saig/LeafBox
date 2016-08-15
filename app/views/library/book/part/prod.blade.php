<div role="tabpanel" class="tab-pane" ng-controller="ProdController as prodCtrl" >
  <div>
      @for ($i = 0; $i < 5; $i++)
    <div class="col-xs-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="panel-title">
            @if ($i==0)
            เบรลล์ <a class="pull-right" ng-click="addProd(0)"><h3 class="label label-primary add-media-prod"><i class="fa fa-plus fa-2"></i> เพิ่มสถานะการผลิต</h3></a>
            @elseif ($i==1)
            คาสเซ็ท <a class="pull-right" ng-click="addProd(1)"><h3 class="label label-primary add-media-prod"><i class="fa fa-plus fa-2"></i> เพิ่มสถานะการผลิต</h3></a>
            @elseif ($i==2)
            เดซี่ <a class="pull-right" ng-click="addProd(2)"><h3 class="label label-primary add-media-prod"><i class="fa fa-plus fa-2"></i> เพิ่มสถานะการผลิต</h3></a>
            @elseif ($i==3)
            CD <a class="pull-right" ng-click="addProd(3)"><h3 class="label label-primary add-media-prod"><i class="fa fa-plus fa-2"></i> เพิ่มสถานะการผลิต</h3></a>
            @elseif ($i==4)
            DVD <a class="pull-right" ng-click="addProd(4)"><h3 class="label label-primary add-media-prod"><i class="fa fa-plus fa-2"></i> เพิ่มสถานะการผลิต</h3></a>
            @endif
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
              @foreach ($prod as $data)
              @if ($data["media_type"]==$i)
              <tr data-prodId="{{$data["id"]}}" class="hover">
                <td data-action="{{$data["action"]}}" onclick="prodEditShow(this)">
                  @if($i == 0)
                    @if ($data["action"]==0)
                      รอการผลิต
                    @elseif ($data["action"]==1)
                      รอพิมพ์
                    @elseif ($data["action"]==2)
                      กำลังพิมพ์
                    @elseif ($data["action"]==3)
                      ผลิตเสร็จ
                    @elseif ($data["action"]==5)
                      ไม่ทำการผลิต
                    @endif
                  @elseif($i == 2)
                    @if ($data["action"]==0)
                      รออ่าน
                    @elseif ($data["action"]==1)
                      กำลังอ่าน
                    @elseif ($data["action"]==2)
                      รอการผลิต
                    @elseif ($data["action"]==3)
                      ผลิตเสร็จ
                    @elseif ($data["action"]==5)
                      ไม่ผลิต
                    @endif
                  @else
                    @if ($data["action"]==0)
                      อ่าน
                    @elseif ($data["action"]==1)
                      ทำต้นฉบับ
                    @elseif ($data["action"]==2)
                      ทำกล่อง
                    @elseif ($data["action"]==3)
                      ส่งตรวจ
                    @endif
                  @endif
                </td>
                <td data-actioner="{{$data["actioner"]}}" onclick="prodEditShow(this)">{{$data["actioner"]}}</td>
                <td class="prodEdit-act_date" onclick="prodEditShow(this)">@if ($data["act_date"] == "0000-00-00 00:00:00")
                  ยังไม่ได้ระบุ
                @else
                  {{date_format(date_create($data["act_date"]), 'd/m/Y')}}
                @endif
                </td>
                <td class="prodEdit-act_date" data-finish-date="{{$data["finish_date"]}}" onclick="prodEditShow(this)">
                  @if ($data["finish_date"] == "0000-00-00 00:00:00"||$data["finish_date"] == null)
                    ยังไม่ได้ระบุ
                  @else
                    {{date_format(date_create($data["finish_date"]), 'd/m/Y')}}
                  @endif
                </td>
                <td><button onclick="prodEditShowOnButton(this)" class="btn btn-success">แก้ไข</button>
                @if($data["isLastStatus"])
                  <button onclick="prodDelete(this)" class="btn btn-danger">ลบ</button>
                @endif
                </td>
              </tr>
              @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  @endfor
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