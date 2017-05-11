<!-- Number -->
<div class="col-md-12">
  <div class="col-md-12">
    <h4>เลขอันดับ</h4>
  </div>
  <div class="form-group col-xs-6 col-sm-6 col-md-4 col-lg-4" ng-repeat = "no in numbers.string" >
    <div class="col-md-6 col-lg-6">
      <label class="control-label labelisize"><%no%></label>
    </div>
    <div class="col-md-6 col-lg-6">
      <input class="form-control inputsize" ng-model="numbers.var[$index]" type="number" min="0">
    </div>
  </div>
  <div class="form-group col-xs-6 col-sm-6  col-lg-4 col-md-4">
    <div class="col-md-6 col-lg-6">
      <label for="input" class="control-label labelisize">เลขไอดี</label>
    </div>
    <div class="col-md-6 col-lg-6">
      <input name="title" class="form-control inputsize" ng-model="book.id" type="text" disabled>
    </div>
  </div>
  <div class="form-group col-xs-6 col-sm-6  col-lg-4 col-md-4">
    <div class="col-md-6 col-lg-6">
      <label for="input" class="control-label labelisize"><% details.string[0] %></label>
    </div>
    <div class="col-md-6 col-lg-6">
      <input name="title" class="form-control inputsize" ng-model="details.var[0]" type="text">
    </div>
  </div>
</div>

<!-- Other Info-->
<div class="col-md-12" style="padding-top: 20px">
  <div class="col-md-12">
    <h4>รายละอียดหนังสือ</h4>
  </div>
  <div class="form-group col-sm-6 col-xs-6 col-md-4 col-lg-4" ng-repeat = "detail in details.string" ng-if="!$first">
    <div class="col-md-6">
      <label for="input" class="control-label labelisize"><%detail%></label>
    </div>
    <div class="col-md-6">
      <input name="title" class="form-control inputsize" ng-model="details.var[$index]" type="text">
    </div>
  </div>
  <!-- Publish -->
    <div class="form-group col-xs-6 col-sm-6  col-md-4 col-lg-4" >
      <div class="col-lg-6 col-lg-6">
        <label for="input" class="control-label labelisize">วันลงทะเบียน</label>
      </div>
      <div class="col-lg-6 col-lg-6">
        <input name="regis_date" class="form-control inputsize" ng-model="book.regis_date" uib-datepicker-popup is-open="regis_date_popup.opened" datepicker-options="dateOptions" ng-click="regis_date_popup.opened = true">
      </div>
    </div>

    <div class="form-group col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-lg-6 col-lg-6">
        <label for="input" class="control-label labelisize">สำนักพิมพ์</label>
      </div>
      <div class="col-lg-6 col-lg-6">
        <input name="publisher" class="form-control inputsize" ng-model="book.publisher" type="text">
      </div>
    </div>

    <div class="form-group col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-lg-6 col-lg-6">
        <label for="input" class="control-label labelisize">พิมพ์ครั้งที่</label>
      </div>
      <div class="col-lg-6 col-lg-6">
        <input name="pub_no" class="form-control inputsize" ng-model="book.pub_no" type="text">
      </div>
    </div>

    <div class="form-group col-xs-6 col-sm-6 col-md-4 col-lg-4">
      <div class="col-xs-4 col-lg-6 col-lg-6">
        <label for="input" class="control-label labelisize">ปีที่พิมพ์</label>
      </div>
      <div class="col-xs-8 col-lg-6 col-lg-6">
          <input name="pub_year" class="form-control inputsize" ng-model="book.pub_year" type="text">
      </div>
    </div>

    <div class="form-group col-md-12">
      <div class="col-xs-12 col-lg-12">
        <label for="input" class="control-label labelisize" style="font-weight: bold">เนื้อเรื่องย่อ</label>
      </div>
      <div class="col-xs-12 col-lg-12">
          <textarea name="abstract" cols="50" rows="5" class="form-control" ng-model="book.abstract"></textarea>
      </div>
    </div>
</div>
<!-- Select Master -->
<div class="container col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-top: 20px">
  <div class="col-md-12">
    <h4>ต้นฉบับ</h4>
  </div>
  <div class="col-xs-3 col-md-1 text-right">
    <label class="control-label labelisize1"> ประเภท </label>
  </div>
  <div class="col-xs-3 col-md-2">
    <select class="form-control" ng-init = "prod_select = 'เบรลล์'" ng-model = "prod_select" ng-change="SelectMaster()">
      <option ng-repeat = "prod in products.string"><%prod%></option>
    </select>
  </div>
  <div class="col-xs-6 col-md-4 text-center">
    <label class="control-label labelisize1 text-center"> 
      <span ng-show="!no_master">ต้นฉบับ<%prod_select%> เช็ตไอดีคือ<strong> <%master_text%> </strong> เปลี่ยนเป็น</span>
      <span ng-show="no_master">ยังไม่มีสื่อต้นฉบับ เลือกต้นฉบับเป็น</span>
    </label>
  </div>
  <div class="col-xs-6 col-md-2">
    <select class="form-control" ng-model="select_master" ng-options = "item.text for item in media_list"> <%cid%>
    </select>
  </div>
  <div class="col-xs-6 col-md-2">
    <button class="btn btn-warning btn-sm" ng-click="ChangeMaster()">เปลี่ยนต้นฉบับ</button>
  </div>
</div>

<!-- Product Master Edit-->
<div class="col-md-12" style="font-size: 16px; padding-top: 20px;">
  <div class="col-xs-12 col-md-12">
   <h4><%prod_select%></h4>
  </div>
 <div class="form-group">
    <div class="col-xs-4 col-lg-1">
      <label for="input" class="control-label labelisize">สถานะ</label> 
    </div>
    <div class="col-xs-8 col-lg-2">
      <div class="col-lg-12">
        <input type="text" class="form-control inputsize" ng-show = "prod_select == 'เบรลล์'" value="<%BookProductionService.getProductionStatusLabel(0,master_prod.action)%>" disabled>
        <input type="text" class="form-control inputsize" ng-show = "prod_select == 'คาสเส็ท'" value="<%BookProductionService.getProductionStatusLabel(1,master_prod.action)%>" disabled>
        <input type="text" class="form-control inputsize" ng-show = "prod_select == 'เดซี่'" value="<%BookProductionService.getProductionStatusLabel(2,master_prod.action)%>" disabled>
        <input type="text" class="form-control inputsize" ng-show = "prod_select == 'ซีดี'" value="<%BookProductionService.getProductionStatusLabel(3,master_prod.action)%>" disabled>
        <input type="text" class="form-control inputsize" ng-show = "prod_select == 'ดีวีดี'" value="<%BookProductionService.getProductionStatusLabel(4,master_prod.action)%>" disabled>      
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-xs-12 col-lg-1">
      <label for="input" class="control-label labelisize">เมื่อ</label> 
    </div>
    <div class="col-xs-12 col-lg-2">
      <div class="col-lg-10">
        <input name="bm_date" class="form-control inputsize" ng-model ="master_prod.finish_date" uib-datepicker-popup is-open="master_date_popup.opened" datepicker-options="dateOptions" ng-click="master_date_popup.opened = true">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-xs-12 col-lg-1">
      <label for="input" class="control-label labelisize">ต้นฉบับ</label>
    </div>
    <div class="col-xs-12 col-lg-2">
      <div class="col-lg-10">
        <input name="bm_no" class="form-control inputsize" ng-model="master.original_no" type="text" disabled>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-xs-12 col-lg-1">
      <label for="input" class="control-label labelisize">หมายเหตุ</label>
    </div>
    <div class="col-xs-12 col-lg-2">
      <div class="col-lg-10">
        <input name="bm_note" class="form-control inputsize" ng-model="book.bm_note" type="text">
      </div>
    </div>
  </div>
</div>
<div class="col-xs-12 col-md-12 text-center" style="margin-top: 20px;padding-top: 20px;">
  <button type="submit" class="btn btn-lg btn-danger pull-left" id="cancel-form">ยกเลิก</button>
  <input class="btn btn-success pull-right" value="บันทึก" ng-click="EditBook()">
</div>

<script type="text/javascript">
  $(function() {
    $(".datepicker").datepicker({
      language:'th-th',
      format: 'dd/mm/yyyy',
      isBuddhist: false
    });    
  });
  $('#cancel-form').click(function() {
    window.history.back();
  });
</script>



