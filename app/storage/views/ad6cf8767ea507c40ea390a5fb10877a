<div role="tabpanel" class="tab-pane">
    <div  ng-repeat="(key, prods) in prodCollection">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="panel-title">
            <% MediaService.convertToMediaLabel(key) %> <a class="pull-right" ng-click="addProdModal(key)"><h3 class="label label-primary add-media-prod"><i class="fa fa-plus fa-2"></i> เพิ่มสถานะการผลิต</h3></a>
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
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr class="hover" ng-repeat="(key, prod) in prods">
                <td>
                  <% BookProductionService.getProductionStatusLabel(prod.media_type, prod.action) %>
                </td>
                <td><% prod.actioner.name %></td>
                <td><% prod.act_date == "0000-00-00 00:00:00" ? 'ยังไม่ได้ระบุ' : DateTimeService.convertToNormalFormat(prod.act_date);  %>
                </td>
                <td><% prod.finish_date == "0000-00-00 00:00:00" ? 'ยังไม่ได้ระบุ' : DateTimeService.convertToNormalFormat(prod.finish_date); %>
                </td>
                <td><button ng-click="editProdModal(prod)" class="btn btn-success">แก้ไข</button>
                <button ng-click="removeProd(prod)" ng-if="key == (prods.length - 1)" class="btn btn-danger">ลบ</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>