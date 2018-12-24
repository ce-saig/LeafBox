<div class="container" style="width:auto;margin-top: 20px" ng-controller="BookViewController">
	<div class="col-xs-12 col-md-12 col-lg-12">
		<div class="col-xs-6 col-sm-2"><b>ชื่อเรื่อง</b></div>
		<div class="col-xs-6 col-sm-4">{{($book['title'] == "") ? '-' : $book['title']}}</div>
		<div class="col-xs-6 col-sm-2"><b>ชื่อเรื่อง (อังกฤษ)</b></div>
		<div class="col-xs-6 col-sm-4">{{($book['title_eng'] == "") ? '-' : $book['title_eng']}}</div>
		<div class="col-xs-6 col-sm-2"><b>เลขทะเบียนหนังสือ</b></div>
		<div class="col-xs-6 col-sm-4">I{{$book['id']}}</div>
		<div class="col-xs-6 col-sm-2"><b>เลขทะเบียนหนังสือเดิม</b></div>
		<div class="col-xs-6 col-sm-4">{{($book['original_no'] == "") ? '-' : 'I'.$book['original_no']}}</div>
		<div class="col-xs-6 col-sm-2"><b>ผู้แต่ง</b></div>
		<div class="col-xs-6 col-sm-4">{{($book['author'] == "") ? '-' : $book['author']}}</div>
		<div class="col-xs-6 col-sm-2"><b>ผู้แปล</b></div>
		<div class="col-xs-6 col-sm-4">{{($book['translate'] == "") ? '-' : $book['translate']}}</div>
		<div class="col-xs-6 col-sm-2"><b>วันลงทะเบียน</b></div>
		<div class="col-xs-6 col-sm-4">{{($book['regis_date'] == "" || $book['regis_date'] == null) ? '-' : substr($book['regis_date'],8,2) . '/' . substr($book['regis_date'],5,2) . '/' . (intval(substr($book['regis_date'],0,4)) + 543)}}</div>
		<div class="col-xs-6 col-sm-2"><b>สำนักพิมพ์</b></div>
		<div class="col-xs-6 col-sm-4">{{($book['publisher'] == "") ? '-' : $book['publisher']}}</div>
		<div class="col-xs-6 col-sm-2"><b>พิมพ์ครั้งที่</b></div>
		<div class="col-xs-6 col-sm-4">{{($book['pub_no'] == "") ? '-' : $book['pub_no']}}</div>
		<div class="col-xs-6 col-sm-2"><b>ปีที่พิมพ์</b></div>
		<div class="col-xs-6 col-sm-4">{{($book['pub_year'] == "") ? '-' : intval($book['pub_year']) + 543}}</div>
		<div class="col-xs-6 col-sm-2"><b>ทะเบียนผลิต</b></div>
		<div class="col-xs-6 col-sm-4">{{($book['produce_no'] == "") ? '-' : $book['produce_no']}}</div>
		<div class="col-xs-6 col-sm-2"><b>ประเภทหนังสือ</b></div>
		<div class="col-xs-6 col-sm-4">{{($book['booktype'] == "") ? '-' : $book['booktype']}}</div>
		<div class="col-xs-6 col-sm-2"><b>เนื้อเรื่องย่อ</b></div>
		<div class="col-xs-6 col-sm-9">{{($book['abstract'] == "") ? '-' : (strlen($book['abstract']) < 400) ? $book['abstract'] : substr($book['abstract'], 0, 800) . "..."}}</div>
	</div>
	<div class="col-xs-12 col-md-12 col-lg-12">	
		<div class="col-xs-6 col-sm-2"><b>ISBN</b></div>
		<div class="col-xs-6 col-sm-4">{{($book['isbn'] == "") ? '-' : $book['isbn']}}</div>
		<div class="col-xs-6 col-sm-2"><b>ระดับ</b></div>
		<div class="col-xs-6 col-sm-4">{{($book['grade'] == "") ? '-' : $book['grade']}}</div>
		<div class="col-xs-6 col-sm-2"><b>ลำดับ</b></div>
		<div class="col-xs-6 col-sm-4"><%book.number%></div>
		<div class="col-xs-6 col-sm-2"><b>ลำดับหนังสือเบรลล์</b></div>
		<div class="col-xs-6 col-sm-4"><%book.b_no%></div>
		<div class="col-xs-6 col-sm-2"><b>ลำดับเทปคาสเส็ท</b></div>
		<div class="col-xs-6 col-sm-4"><%book.c_no%></div>
		<div class="col-xs-6 col-sm-2"><b>ลำดับเดซี่</b></div>
		<div class="col-xs-6 col-sm-4"><%book.d_no%></div>
		<div class="col-xs-6 col-sm-2"><b>ลำดับซีดี</b></div>
		<div class="col-xs-6 col-sm-4"><%book.cd_no%></div>
		<div class="col-xs-6 col-sm-2"><b>ลำดับดีวีดี</b></div>
		<div class="col-xs-6 col-sm-4"><%book.dvd_no%></div>
		<div class="col-xs-6 col-sm-2"><b>จำนวนหนังสือเบรลล์</b></div>
		<div class="col-xs-6 col-sm-4"><%count['braille'][1]%> เล่ม (<%count['braille'][0]%> ชุด)</div>
		<div class="col-xs-6 col-sm-2"><b>จำนวนเทปคาสเส็ท</b></div>
		<div class="col-xs-6 col-sm-4"><%count['cassette'][1]%> ม้วน (<%count['cassette'][0]%> ชุด)</div>
		<div class="col-xs-6 col-sm-2"><b>จำนวนเดซี่</b></div>
		<div class="col-xs-6 col-sm-4"><%count['daisy'][1]%> แผ่น (<%count['daisy'][0]%> ชุด)</div>
		<div class="col-xs-6 col-sm-2"><b>จำนวนซีดี</b></div>
		<div class="col-xs-6 col-sm-4"><%count['cd'][1]%> แผ่น (<%count['cd'][0]%> ชุด)</div>
		<div class="col-xs-6 col-sm-2"><b>จำนวนดีวีดี</b></div>
		<div class="col-xs-6 col-sm-4"><%count['dvd'][1]%> แผ่น (<%count['dvd'][0]%> ชุด)</div>
	</div>
	<hr class="col-xs-12 col-md-12">
	<div class="col-xs-12 col-md-12 col-lg-12">
		<div class="col-xs-12"></div>
		<div class="col-xs-6 col-sm-2"><b>สถานะของเบรลล์</b></div>
		<div class="col-xs-6 col-sm-2"><%BookProductionService.getProductionStatusLabel(0,master_list['product_b'].action)%></div>
		<div class="col-xs-6 col-sm-2"><b>เมื่อ</b></div>
		<div class="col-xs-6 col-sm-2">{{($product['product_b'] == null || $product['product_b']->finish_date == "0000-00-00 00:00:00")? '-' : substr($product['product_b']->finish_date,8,2) . '/' . substr($product['product_b']->finish_date,5,2) . '/' . (intval(substr($product['product_b']->finish_date,0,4)) + 543)}}</div>
		<div class="col-xs-6 col-sm-2"><b>เบลล์ต้นฉบับ</b></div>
		<div class="col-xs-6 col-sm-2"><%master_list['braille'][0].id%><span ng-show = "master_list['braille'][0] == null"> - </span>
			<span ng-hide="master_list['braille'][0].original_no == null">(<%master_list['braille'][0].original_no%>)</span>
		</div>
		<div class="col-xs-6 col-sm-2"><b>หมายเหตุ</b></div>
		<div class="col-xs-6 col-sm-2">{{($book['bm_note'] == "") ? '-' : $book['bm_note']}}</div>
		<hr>
		<div class="col-xs-12"></div>
		<div class="col-xs-6 col-sm-2"><b>สถานะของคาสเส็ท</b></div>
		<div class="col-xs-6 col-sm-2"><%BookProductionService.getProductionStatusLabel(1,master_list['product_c'].action)%></div>
		<div class="col-xs-6 col-sm-2"><b>เมื่อ</b></div>
		<div class="col-xs-6 col-sm-2">{{($product['product_c'] == null || $product['product_c']->finish_date == "0000-00-00 00:00:00")? '-' : substr($product['product_c']->finish_date,8,2) . '/' . substr($product['product_c']->finish_date,5,2) . '/' . (intval(substr($product['product_c']->finish_date,0,4)) + 543)}}</div>
		<div class="col-xs-6 col-sm-2"><b>คาสเซ็ทต้นฉบับ</b></div>
		<div class="col-xs-6 col-sm-2"><%master_list['cassette'][0].id%><span ng-show = "master_list['cassette'][0] == null"> - </span>
			<span ng-hide="master_list['cassette'][0].original_no == null">(<%master_list['cassette'][0].original_no%>)</span>
		</div>
		<div class="col-xs-6 col-sm-2"><b>หมายเหตุ</b></div>
		<div class="col-xs-6 col-sm-2">{{($book['setcs_note'] == "") ? '-' : $book['setcs_note']}}</div>
		<hr>
		<div class="col-xs-12"></div>
		<div class="col-xs-6 col-sm-2"><b>สถานะของเดซี่</b></div>
		<div class="col-xs-6 col-sm-2"><%BookProductionService.getProductionStatusLabel(2,master_list['product_d'].action)%></div>
		<div class="col-xs-6 col-sm-2"><b>เมื่อ</b></div>
		<div class="col-xs-6 col-sm-2">{{($product['product_d'] == null || $product['product_d']->finish_date == "0000-00-00 00:00:00")? '-' : substr($product['product_d']->finish_date,8,2) . '/' . substr($product['product_d']->finish_date,5,2) . '/' . (intval(substr($product['product_d']->finish_date,0,4)) + 543)}}</div>
		<div class="col-xs-6 col-sm-2"><b>เดซี่ต้นฉบับ</b></div>
		<div class="col-xs-6 col-sm-2"><%master_list['daisy'][0].id%><span ng-show = "master_list['daisy'][0] == null"> - </span>
			<span ng-hide="master_list['daisy'][0].original_no == null">(<%master_list['daisy'][0].original_no%>)</span></div>
		<div class="col-xs-6 col-sm-2"><b>หมายเหตุ</b></div>
		<div class="col-xs-6 col-sm-2">{{($book['setds_note'] == "") ? '-' : $book['setds_note']}}</div>
		<hr>
		<div class="col-xs-12"></div>
		<div class="col-xs-6 col-sm-2"><b>สถานะของซีดี</b></div>
		<div class="col-xs-6 col-sm-2"><%BookProductionService.getProductionStatusLabel(3,master_list['product_cd'].action)%></div>
		<div class="col-xs-6 col-sm-2"><b>เมื่อ</b></div>
		<div class="col-xs-6 col-sm-2">{{($product['product_cd'] == null || $product['product_cd']->finish_date == "0000-00-00 00:00:00")? '-' : substr($product['product_cd']->finish_date,8,2) . '/' . substr($product['product_cd']->finish_date,5,2) . '/' . (intval(substr($product['product_cd']->finish_date,0,4)) + 543)}}</div>
		<div class="col-xs-6 col-sm-2"><b>CDต้นฉบับ</b></div>
		<div class="col-xs-6 col-sm-2"><%master_list['cd'][0].id%><span ng-show = "master_list['cd'][0] == null"> - </span>
			<span ng-hide="master_list['cd'][0].original_no == null">(<%master_list['cd'][0].original_no%>)</span></div>
		<div class="col-xs-6 col-sm-2"><b>หมายเหตุ</b></div>
		<div class="col-xs-6 col-sm-2">{{($book['setcd_note'] == "") ? '-' : $book['setcd_note']}}</div>
		<hr>
		<div class="col-xs-12"></div>
		<div class="col-xs-6 col-sm-2"><b>สถานะของดีวีดี</b></div>
		<div class="col-xs-6 col-sm-2"><%BookProductionService.getProductionStatusLabel(0,master_list['product_dvd'].action)%></div>
		<div class="col-xs-6 col-sm-2"><b>เมื่อ</b></div>
		<div class="col-xs-6 col-sm-2">{{($product['product_dvd'] == null || $product['product_dvd']->finish_date == "0000-00-00 00:00:00")? '-' : substr($product['product_dvd']->finish_date,8,2) . '/' . substr($product['product_dvd']->finish_date,5,2) . '/' . (intval(substr($product['product_dvd']->finish_date,0,4)) + 543)}}</div>
		<div class="col-xs-6 col-sm-2"><b>DVDต้นฉบับ</b></div>
		<div class="col-xs-6 col-sm-2"><%master_list['dvd'][0].id%><span ng-show = "master_list['dvd'][0] == null"> - </span>
			<span ng-hide="master_list['dvd'][0].original_no == null">(<%master_list['dvd'][0].original_no%>)</span></div>
		<div class="col-xs-6 col-sm-2"><b>หมายเหตุ</b></div>
		<div class="col-xs-6 col-sm-2">{{($book['setdvd_note'] == "") ? '-' : $book['setdvd_note']}}</div>
		<div class="col-xs-6 col-sm-2"><b>หนังสือสร้างเมื่อ</b></div>
		<div class="col-xs-6 col-sm-2">{{($book['created_at'] == "") ? '-' : substr($book['created_at'],0,2) . '/' . substr($book['created_at'],3,2) . '/' . (intval(substr($book['created_at'],6,4)) + 543)}}</div>
	</div>
	<hr class="col-xs-12 col-md-12">
	<div class="col-md-6" style="margin-top: 20px">
	   <a href="{{ URL::to('/book/'.$book['id'].'/delete') }}" class="btn btn-danger btn-lg pull-left delete-book">ลบหนังสือ</a>
	</div>
	<div id="isddfvi" class="row" style="margin-top: 20px">
	   <div class="col-md-6">
	      <a href="{{ URL::to('/book/'.$book['id'].'/edit') }}" class="btn btn-warning btn-lg pull-right">แก้ไข</a>
	 	</div>
	</div>
</div>