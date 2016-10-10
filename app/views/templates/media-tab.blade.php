<div role="tabpanel" class="tab-pane">
  <div class="container-fluid">
        <div class="list-media">
          <table class="table table-hover">
            <thead>
              <tr>
                <th style="text-align: center" ng-repeat="name in tableHead"><% name %></th>
              </tr>
            </thead>
            <tbody>
              <tr class = "hover table-body" ng-repeat="item in mediaCollection">
                <td style="text-align: center" ng-click="editMediaModal(item)"><% item.id %></td>
                <td style="text-align: center" ng-click="editMediaModal(item)" ng-show="isShowTableData('pages')"><% item.pages %></td>
                <td style="text-align: center" ng-click="editMediaModal(item)" ng-show="isShowTableData('numpart')"><% item.numpart + ' ' + item.submedia_id %></td>
                <td style="text-align: center" ng-click="editMediaModal(item)" ng-show="isShowTableData('length')"><% item.length %></td>
                <td style="text-align: center" ng-click="editMediaModal(item)" ng-show="isShowTableData('examiner')"><% item.examiner.name %></td>
                <td style="text-align: center" ng-click="editMediaModal(item)" ><% item.borrower == null ? "ไม่มี" : item.borrower.name %></td>
                <td style="text-align: center"><button class="btn btn-danger" ng-click="deleteMedia(item)">ลบ</button></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="pull-left"><button  class="pull-right btn btn-primary" ng-click="verifyAddingMedia()">เพิ่ม <% getMediaLabel() %></button></div>
        <div class="pull-right"><a class = "btn btn-danger pull-right" ng-click="deleteAllMedia()">ลบ<% getMediaLabel() %>ทั้งหมด</a></div>
  </div>
</div>