<div role="tabpanel" class="tab-pane" >
  <div>
  <h3>สถานะการผลิต<p class="btn btn-sm btn-warning pull-right" data-toggle="modal" data-target="#addProd">เพิ่มสถานะการผลิต</p>
  </h3>
      @for ($i = 0; $i < 5; $i++)
    <div class="col-xs-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">
            @if ($i==0)
            เบรลล์
            @elseif ($i==1)
            คาสเซ็ท
            @elseif ($i==2)
            เดซี่
            @elseif ($i==3)
            CD
            @elseif ($i==4)
            DVD
            @endif
          </h3>
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
              <tr data-prodId="{{$data["id"]}}" onclick="prodEdit(this)">
                <td>
                  @if ($data["action"]==0)
                    อ่าน
                  @elseif ($data["action"]==1)
                    ทำต้นฉบับ
                  @elseif ($data["action"]==2)
                    ทำกล่อง
                  @elseif ($data["action"]==3)
                    ส่งตรวจ
                  @endif
                </td>
                <td>{{$data["actioner"]}}</td>
                <td>
                @if ($data["act_date"] == "0000-00-00 00:00:00")
                  ยังไม่ได้ระบุ
                @else
                  {{date_format(date_create($data["act_date"]), 'd-m-Y')}}
                @endif
                </td>
                <td>
                  @if ($data["finish_date"] == "0000-00-00 00:00:00"||$data["finish_date"] == null)
                    ยังไม่ได้ระบุ
                  @else
                    {{date_format(date_create($data["finish_date"]), 'd-m-Y')}}
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
        <h4 class="modal-title">Prod Edit</h4>
      </div>
      <div class="modal-body">
        <div class="row" id="prod-edit-body">
            <div class="form-group">
              <label class="col-sm-2 control-label">*สื่อ</label>
              <div class="col-sm-10">
                <select name="" id="prod_edit_media_type" class="form-control" required="required">
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
                <select name="" id="prod_edit_action" class="form-control" required="required">
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>