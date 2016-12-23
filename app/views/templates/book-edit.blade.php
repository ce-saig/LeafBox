<div class="container">
	<div class="form-group" style="margin-top: 15px">
		<div class="col-xs-6 col-lg-2">
	    	<label for="input" class="control-label labelisize">ชื่อเรื่อง</label>
	  	</div>
	  	<div class="col-xs-6 col-lg-2">
	    	<div class="col-lg-10">
	      		<input name="title" class="form-control inputsize" ng-model="book.title" type="text">
	    	</div>
	  	</div>
	</div>

	<div class="form-group">
		<div class="col-xs-6 col-lg-2">
	    	<label for="input" class="control-label labelisize">ชื่อเรื่อง (อังกฤษ)</label>
	  	</div>
	  	<div class="col-xs-6 col-lg-2">
	    	<div class="col-lg-10">
	      		<input name="title" class="form-control inputsize" ng-model="book.title_eng" type="text">
	    	</div>
	  	</div>
	</div>

  <div class="form-group">
    <div class="col-xs-6 col-lg-2">
      <label for="input" class="control-label labelisize">รหัสหนังสือเดิม</label>
    </div>
    <div class="col-xs-6 col-lg-2">
      <div class="col-lg-10">
        <input name="id" class="form-control inputsize" ng-model="book.original_no" type="text">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-xs-6 col-lg-2">
      <label for="input" class="control-label labelisize">รหัส braille เดิม</label>
    </div>
    <div class="col-xs-6 col-lg-2">
      <div class="col-lg-10">
        <input name="original_no" class="form-control inputsize" ng-model="book.b_original_no" type="text">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-xs-6 col-lg-2">
      <label for="input" class="control-label labelisize">รหัส cassette เดิม</label>
    </div>
    <div class="col-xs-6 col-lg-2">
      <div class="col-lg-10">
        <input name="original_no" class="form-control inputsize" ng-model="book.c_original_no" type="text">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-xs-6 col-lg-2">
      <label for="input" class="control-label labelisize">รหัส daisy เดิม</label>
    </div>
    <div class="col-xs-6 col-lg-2">
      <div class="col-lg-10">
        <input name="original_no" class="form-control inputsize" ng-model="book.d_original_no" type="text">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-xs-6 col-lg-2">
      <label for="input" class="control-label labelisize">รหัส cd เดิม</label>
    </div>
    <div class="col-xs-6 col-lg-2">
      <div class="col-lg-10">
        <input name="original_no" class="form-control inputsize" ng-model="book.cd_original_no" type="text">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-xs-6 col-lg-2">
      <label for="input" class="control-label labelisize">รหัส dvd เดิม</label>
    </div>
    <div class="col-xs-6 col-lg-2">
      <div class="col-lg-10">
        <input name="original_no" class="form-control inputsize" ng-model="book.dvd_original_no" type="text">
      </div>
    </div>
  </div>

	<div class="form-group">
	  <div class="col-xs-6 col-lg-2">
	    <label for="input" class="control-label labelisize">ผู้แต่ง</label>
	  </div>
	  <div class="col-xs-6 col-lg-2">
	    <div class="col-lg-10">
	      <input name="author" class="form-control inputsize" ng-model="book.author" type="text">
	    </div>
	  </div>
	</div>

	<div class="form-group">
	  <div class="col-xs-6 col-lg-2">
	    <label for="input" class="control-label labelisize">ผู้แปล</label>
	  </div>
	  <div class="col-xs-6 col-lg-2">
	    <div class="col-lg-10">
	      <input name="translate" class="form-control inputsize" ng-model="book.translate" type="text">
	    </div>
	  </div>
	</div>

	<div class="form-group">
		<div class="col-xs-6 col-lg-2">
		  <label for="input" class="control-label labelisize">วันลงทะเบียน</label>
		</div>
		<div class="col-xs-6 col-lg-2">
		  <div class="col-lg-10">
		    <input name="regis_date" class="form-control datepicker inputsize" ng-model="book.regis_date" type="text">
		  </div>
		</div>
	</div>

	<div class="form-group">
		<div class="col-xs-6 col-lg-2">
		  <label for="input" class="control-label labelisize">สำนักพิมพ์</label>
		</div>
		<div class="col-xs-6 col-lg-2">
		  <div class="col-lg-10">
		    <input name="publisher" class="form-control inputsize" ng-model="book.publisher" type="text">
		  </div>
		</div>
	</div>

	<div class="form-group">
		<div class="col-xs-6 col-lg-2">
		  <label for="input" class="control-label labelisize">พิมพ์ครั้งที่</label>
		</div>
		<div class="col-xs-6 col-lg-2">
		  <div class="col-lg-10">
		    <input name="pub_no" class="form-control inputsize" ng-model="book.pub_no" type="number" min="0">
		  </div>
		</div>
	</div>

	<div class="form-group">
		<div class="col-xs-6 col-lg-2">
		  <label for="input" class="control-label labelisize">ปีที่พิมพ์</label>
		</div>
		<div class="col-xs-6 col-lg-2">
		  <div class="col-lg-10">
		    <input name="pub_year" class="form-control inputsize" ng-model="book.pub_year" type="text">
		  </div>
		</div>
	</div>

	<div class="form-group">
		<div class="col-xs-6 col-lg-2">
		  <label for="input" class="control-label labelisize">ทะเบียนผลิต</label>
		</div>
		<div class="col-xs-6 col-lg-2">
		  <div class="col-lg-10">
		    <input name="produce_no" class="form-control inputsize" ng-model="book.produce_no" type="text">
		  </div>
		</div>
	</div>

	<div class="form-group">
		<div class="col-xs-6 col-lg-2">
		  <label for="input" class="control-label labelisize">ประเภทหนังสือ</label>
		</div>
		<div class="col-xs-6 col-lg-2">
		  <div class="col-lg-10">
		    <input name="book_type" class="form-control inputsize" ng-model="book.book_type" type="text">
		  </div>
		</div>
	</div>

	<div class="form-group">
		<div class="col-xs-6 col-lg-2">
		  <label for="input" class="control-label labelisize">หนังสือระดับ</label>
		</div>
		<div class="col-xs-6 col-lg-2">
		  <div class="col-lg-10">
		    <input name="grade" class="form-control inputsize" ng-model="book.grade" type="text">
		  </div>
		</div>
	</div>

	<div class="form-group">
		<div class="col-xs-6 col-lg-2">
		  <label for="input" class="control-label labelisize">ISBN</label>
		</div>
		<div class="col-xs-6 col-lg-2">
		  <div class="col-lg-10">
		    <input name="isbn" class="form-control inputsize" ng-model="book.isbn" type="text">
		  </div>
		</div>
	</div>

  <div class="form-group">
    <div class="col-xs-6 col-lg-2">
        <label for="input" class="control-label labelisize">จำนวนหนังสือ</label>
    </div>
    <div class="col-xs-6 col-lg-2">
        <div class="col-lg-10">
          <input name="number" class="form-control inputsize" ng-model="book.number" type="number" min="0">
        </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-xs-6 col-lg-2">
      <label for="input" class="control-label labelisize">จำนวน braille</label>
    </div>
    <div class="col-xs-6 col-lg-2">
      <div class="col-lg-10">
        <input name="b_no" class="form-control inputsize" ng-model="book.b_number" type="number" min="0">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-xs-6 col-lg-2">
      <label for="input" class="control-label labelisize">จำนวน cassette</label>
    </div>
    <div class="col-xs-6 col-lg-2">
      <div class="col-lg-10">
        <input name="c_no" class="form-control inputsize" ng-model="book.cs_number" type="number" min="0">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-xs-6 col-lg-2">
      <label for="input" class="control-label labelisize">จำนวน cd</label>
    </div>
    <div class="col-xs-6 col-lg-2">
      <div class="col-lg-10">
        <input name="cd_no" class="form-control inputsize" ng-model="book.cd_number" type="number" min="0">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-xs-6 col-lg-2">
      <label for="input" class="control-label labelisize">จำนวน daisy</label>
    </div>
    <div class="col-xs-6 col-lg-2">
      <div class="col-lg-10">
        <input name="d_no" class="form-control inputsize" ng-model="book.ds_number" type="number" min="0">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-xs-6 col-lg-2">
      <label for="input" class="control-label labelisize">จำนวน dvd</label>
    </div>
    <div class="col-xs-6 col-lg-2">
      <div class="col-lg-10">
        <input name="dvd_no" class="form-control inputsize" ng-model="book.dvd_number" type="number" min="0">
      </div>
    </div>
  </div>

	<div class="form-group">
		<div class="col-xs-12 col-lg-12">
		  <label for="input" class="control-label labelisize">เนื้อเรื่องย่อ</label>
		</div>
		<div class="col-xs-12 col-lg-12">
		  <div class="col-lg-10">
		    <textarea name="abstract" cols="50" rows="10" class="form-control" ng-model="book.abstract"></textarea>
		    <br>
		  </div>
		</div>
	</div>
</div>

<hr>
<div class="row">
  <div class="col-md-12">
   <h5>เบรลล์</h5>
  </div>
 <div class="form-group">
   <div class="col-xs-6 col-lg-1">
    <label for="input" class="control-label labelisize">สถานะ</label> 
   </div>
  <div class="col-xs-6 col-lg-2">
    <div class="col-lg-10">
      <input type="text" class="form-control inputsize" value="<%BookProductionService.getProductionStatusLabel(0,book.bm_status)%>" disabled>
    </div>
  </div>
</div>

<div class="form-group">
  <div class="col-xs-6 col-lg-1">
    <label for="input" class="control-label labelisize">เมื่อ</label> 
  </div>
  <div class="col-xs-6 col-lg-2">
    <div class="col-lg-10">
      <input name="bm_date" class="form-control datepicker inputsize" id="bm_date" ng-model ="book.bm_date" value="<%book.date.bm%>" type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <div class="col-xs-6 col-lg-1">
    <label for="input" class="control-label labelisize">ต้นฉบับ</label>
  </div>
  <div class="col-xs-6 col-lg-2">
    <div class="col-lg-10">
      <input name="bm_no" class="form-control inputsize" ng-model="book.bm_no" type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <div class="col-xs-6 col-lg-1">
    <label for="input" class="control-label labelisize">หมายเหตุ</label>
  </div>
  <div class="col-xs-6 col-lg-2">
    <div class="col-lg-10">
      <input name="bm_note" class="form-control inputsize" ng-model="book.bm_note" type="text">
    </div>
  </div>
</div>
</div>

 <hr>

  <div class="row">
    <div class="col-md-12">
     <h5>คาสเส็ท</h5>
   </div>
   <div class="form-group">
     <div class="col-xs-6 col-lg-1">
      <label for="input" class="control-label labelisize">สถานะ</label> 
    </div>
    <div class="col-xs-6 col-lg-2">
      <div class="col-lg-10">
        <input type="text" class="form-control inputsize" value="<%BookProductionService.getProductionStatusLabel(0,book.setcs_status)%>" disabled>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-xs-6 col-lg-1">
      <label for="input" class="control-label labelisize">เมื่อ</label> 
    </div>
    <div class="col-xs-6 col-lg-2">
      <div class="col-lg-10">
        <input name="cs_date" class="form-control datepicker inputsize" id="cs_date" ng-model="book.setcs_date" type="text">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-xs-6 col-lg-1">
      <label for="input" class="control-label labelisize">ต้นฉบับ</label>
    </div>
    <div class="col-xs-6 col-lg-2">
      <div class="col-lg-10">
        <input name="setcm_no" class="form-control inputsize" ng-model="book.setcm_no" type="text">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-xs-6 col-lg-1">
      <label for="input" class="control-label labelisize">หมายเหตุ</label> 
    </div>
    <div class="col-xs-6 col-lg-2">
      <div class="col-lg-10">
        <input name="cs_note" class="form-control inputsize" ng-model="book.setcs_note" type="text">
      </div>
    </div>
  </div>
</div>

    <hr>
    <div class="row">
      <div class="col-md-12">
       <h5>เดซี่</h5>
     </div>
     <div class="form-group">
       <div class="col-xs-6 col-lg-1">
        <label for="input" class="control-label labelisize">สถานะ</label> 
      </div>
      <div class="col-xs-6 col-lg-2">
        <div class="col-lg-10">
          <input type="text" class="form-control inputsize" value="<%BookProductionService.getProductionStatusLabel(0,book.setds_status)%>" disabled>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-xs-6 col-lg-1">
        <label for="input" class="control-label labelisize">เมื่อ</label>
      </div>
      <div class="col-xs-6 col-lg-2">
        <div class="col-lg-10">
          <input name="ds_date" class="form-control datepicker inputsize" id="ds_date" ng-model="book.setds_date" type="text">
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-xs-6 col-lg-1">
        <label for="input" class="control-label labelisize">ต้นฉบับ</label>
      </div>
      <div class="col-xs-6 col-lg-2">
        <div class="col-lg-10">
          <input name="setdm_no" class="form-control inputsize" ng-model="book.setdm_no" type="text">
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-xs-6 col-lg-1">
        <label for="input" class="control-label labelisize">หมายเหตุ</label> 
      </div>
      <div class="col-xs-6 col-lg-2">
        <div class="col-lg-10">
          <input name="ds_note" class="form-control inputsize" ng-model="book.setds_note" type="text">
        </div>
      </div>
    </div>
  </div>

  <hr>

  <div class="row">
    <div class="col-md-12">
     <h5>ซีดี</h5>
   </div>
   <div class="form-group">
     <div class="col-xs-6 col-lg-1">
      <label for="input" class="control-label labelisize">สถานะ</label> 
    </div>
    <div class="col-xs-6 col-lg-2">
      <div class="col-lg-10">
        <input type="text" class="form-control inputsize" value="<%BookProductionService.getProductionStatusLabel(0,book.setcd_status)%>" disabled>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-xs-6 col-lg-1">
      <label for="input" class="control-label labelisize">เมื่อ</label> 
    </div>
    <div class="col-xs-6 col-lg-2">
      <div class="col-lg-10">
        <input name="cd_date" class="form-control datepicker inputsize" id="cd_date" ng-model = "book.setcd_date" type="text">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-xs-6 col-lg-1">
      <label for="input" class="control-label labelisize">ต้นฉบับ</label>
    </div>
    <div class="col-xs-6 col-lg-2">
      <div class="col-lg-10">
        <input name="setcdm_no" class="form-control inputsize" ng-model="book.setcdm_no" type="text">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-xs-6 col-lg-1">
      <label for="input" class="control-label labelisize">หมายเหตุ</label>
    </div>
    <div class="col-xs-6 col-lg-2">
      <div class="col-lg-10">
        <input name="cd_note" class="form-control inputsize" ng-model="book.setcd_note" type="text">
      </div>
    </div>
  </div>
  </div>

  <hr>
  <div class="row">
    <div class="col-md-12">
     <h5>ดีวีดี</h5>
   </div>
   <div class="form-group">
     <div class="col-xs-6 col-lg-1">
      <label for="input" class="control-label labelisize">สถานะ</label> 
    </div>
    <div class="col-xs-6 col-lg-2">
      <div class="col-lg-10">
        <input type="text" class="form-control inputsize" value="<%BookProductionService.getProductionStatusLabel(0,book.setdvd_status)%>" disabled>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-xs-6 col-lg-1">
      <label for="input" class="control-label labelisize">เมื่อ</label> 
    </div>
    <div class="col-xs-6 col-lg-2">
      <div class="col-lg-10">
        <input name="dvd_date" class="form-control datepicker inputsize" id="dvd_date" value="<%book.setdvd_date%>" type="text">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-xs-6 col-lg-1">
      <label for="input" class="control-label labelisize">ต้นฉบับ</label>
    </div>
    <div class="col-xs-6 col-lg-2">
      <div class="col-lg-10">
        <input name="setdvdm_no" class="form-control inputsize" ng-model="book.setdvdm_no" type="text">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-xs-6 col-lg-1">
      <label for="input" class="control-label labelisize">หมายเหตุ</label> 
    </div>
    <div class="col-xs-6 col-lg-2">
      <div class="col-lg-10">
        <input name="dvd_note" class="form-control inputsize" ng-model="book.setdvd_note" type="text">
      </div>
    </div>
  </div>
  </div>

  <br>
  <div class="text-center">
    <button type="submit" class="btn btn-default btn-danger pull-left" id="cancel-form">ยกเลิก</button>
    <input class="btn btn-default btn-success pull-right" value="บันทึก" ng-click="EditBook()">
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



