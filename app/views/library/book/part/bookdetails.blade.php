<div class="col-xs-6 col-sm-2"><b>ชื่อเรื่อง</b></div>
<div class="col-xs-6 col-sm-4">{{($book['title'] == "") ? '-' : $book['title']}}</div>
<div class="col-xs-6 col-sm-2"><b>ชื่อเรื่อง (อังกฤษ)</b></div>
<div class="col-xs-6 col-sm-4">{{($book['title_eng'] == "") ? '-' : $book['title_eng']}}</div>
<div class="col-xs-6 col-sm-2"><b>เลขทะเบียนหนังสือตาดี</b></div>
<div class="col-xs-6 col-sm-4">I{{$book['id']}}</div>
<div class="col-xs-6 col-sm-2"><b>ผู้แต่ง</b></div>
<div class="col-xs-6 col-sm-4">{{($book['author'] == "") ? '-' : $book['author']}}</div>
<div class="col-xs-6 col-sm-2"><b>ผู้แปล</b></div>
<div class="col-xs-6 col-sm-4">{{($book['translate'] == "") ? '-' : $book['translate']}}</div>
<div class="col-xs-6 col-sm-2"><b>วันลงทะเบียน</b></div>
<div class="col-xs-6 col-sm-4">{{($book['regis_date'] == "") ? '-' : $book['regis_date']}}</div>
<div class="col-xs-6 col-sm-2"><b>สำนักพิมพ์</b></div>
<div class="col-xs-6 col-sm-4">{{($book['publisher'] == "") ? '-' : $book['publisher']}}</div>
<div class="col-xs-6 col-sm-2"><b>พิมพ์ครั้งที่</b></div>
<div class="col-xs-6 col-sm-4">{{($book['pub_no'] == "") ? '-' : $book['pub_no']}}</div>
<div class="col-xs-6 col-sm-2"><b>ปีที่พิมพ์</b></div>
<div class="col-xs-6 col-sm-4">{{($book['pub_year'] == "") ? '-' : $book['pub_year']}}</div>
<div class="col-xs-6 col-sm-2"><b>ทะเบียนผลิต</b></div>
<div class="col-xs-6 col-sm-4">{{($book['produce_no'] == "") ? '-' : $book['produce_no']}}</div>
<div class="col-xs-6 col-sm-2"><b>ประเภทหนังสือ</b></div>
<div class="col-xs-6 col-sm-4">{{($book['booktype'] == "") ? '-' : $book['booktype']}}</div>
<div class="col-xs-6 col-sm-2"><b>เนื้อเรื่องย่อ</b></div>
<div class="col-xs-6 col-sm-4">{{($book['abstract'] == "") ? '-' : $book['abstract']}}</div>
<div class="col-xs-6 col-sm-2"><b>ISBN</b></div>
<div class="col-xs-6 col-sm-4">{{($book['isbn'] == "") ? '-' : $book['isbn']}}</div>
<div class="col-xs-6 col-sm-2"><b>ระดับ</b></div>
<div class="col-xs-6 col-sm-4">{{($book['grade'] == "") ? '-' : $book['grade']}}</div>
<div class="col-xs-6 col-sm-2"><b>จำนวนหนังสือเบรลล์</b></div>
<div class="col-xs-6 col-sm-4">{{($book['b_number'] == "") ? '-' : $book['b_number'].' ชุด'}}</div>
<div class="col-xs-6 col-sm-2"><b>จำนวนเทปคาสเส็ท</b></div>
<div class="col-xs-6 col-sm-4">{{($book['cs_number'] == "") ? '-' : $book['cs_number'].' ชุด'}}</div>
<div class="col-xs-6 col-sm-2"><b>จำนวนเดซี่</b></div>
<div class="col-xs-6 col-sm-4">{{($book['ds_number'] == "") ? '-' : $book['ds_number'].' ชุด'}}</div>
<div class="col-xs-6 col-sm-2"><b>จำนวน CD</b></div>
<div class="col-xs-6 col-sm-4">{{($book['cd_number'] == "") ? '-' : $book['cd_number'].' ชุด'}}</div>
<div class="col-xs-6 col-sm-2"><b>จำนวน DVD</b></div>
<div class="col-xs-6 col-sm-4">{{($book['dvd_number'] == "") ? '-' : $book['dvd_number'].' ชุด'}}</div>
<hr>
<div class="col-xs-12"></div>
<div class="col-xs-6 col-sm-2"><b>สถานะของเบรลล์</b></div>
<div class="col-xs-6 col-sm-2" id="braille-status">{{$book['bm_status']}}</div>
<div class="col-xs-6 col-sm-2"><b>เมื่อ</b></div>
<div class="col-xs-6 col-sm-2">{{$book['bm_date']}}</div>
<div class="col-xs-6 col-sm-2"><b>เบลล์ต้นฉบับ</b></div>
<div class="col-xs-6 col-sm-2">{{($book['bm_no'] == "") ? '-' : $book['bm_no']}}</div>
<div class="col-xs-6 col-sm-2"><b>หมายเหตุ</b></div>
<div class="col-xs-6 col-sm-2">{{($book['bm_note'] == "") ? '-' : $book['bm_note']}}</div>
<hr>
<div class="col-xs-12"></div>
<div class="col-xs-6 col-sm-2"><b>สถานะของคาสเส็ท</b></div>
<div class="col-xs-6 col-sm-2" id="cassette-status">{{$book['setcs_status']}}</div>
<div class="col-xs-6 col-sm-2"><b>เมื่อ</b></div>
<div class="col-xs-6 col-sm-2">{{$book['setcs_date']}}</div>
<div class="col-xs-6 col-sm-2"><b>คาสเซ็ทต้นฉบับ</b></div>
<div class="col-xs-6 col-sm-2">{{($book['setcm_no'] == "") ? '-' : $book['setcm_no']}}</div>
<div class="col-xs-6 col-sm-2"><b>หมายเหตุ</b></div>
<div class="col-xs-6 col-sm-2">{{($book['setcs_note'] == "") ? '-' : $book['setcs_note']}}</div>
<hr>
<div class="col-xs-12"></div>
<div class="col-xs-6 col-sm-2"><b>สถานะของเดซี่</b></div>
<div class="col-xs-6 col-sm-2" id="daisy-status">{{$book['setds_status']}}</div>
<div class="col-xs-6 col-sm-2"><b>เมื่อ</b></div>
<div class="col-xs-6 col-sm-2">{{$book['setds_date']}}</div>
<div class="col-xs-6 col-sm-2"><b>เดซี่ต้นฉบับ</b></div>
<div class="col-xs-6 col-sm-2">{{($book['setdm_no'] == "") ? '-' : $book['setdm_no']}}</div>
<div class="col-xs-6 col-sm-2"><b>หมายเหตุ</b></div>
<div class="col-xs-6 col-sm-2">{{($book['setds_note'] == "") ? '-' : $book['setds_note']}}</div>
<hr>
<div class="col-xs-12"></div>
<div class="col-xs-6 col-sm-2"><b>สถานะของซีดี</b></div>
<div class="col-xs-6 col-sm-2" id="cd-status">{{$book['setcd_status']}}</div>
<div class="col-xs-6 col-sm-2"><b>เมื่อ</b></div>
<div class="col-xs-6 col-sm-2">{{$book['setcd_date']}}</div>
<div class="col-xs-6 col-sm-2"><b>CDต้นฉบับ</b></div>
<div class="col-xs-6 col-sm-2">{{($book['setcdm_no'] == "") ? '-' : $book['setcdm_no']}}</div>
<div class="col-xs-6 col-sm-2"><b>หมายเหตุ</b></div>
<div class="col-xs-6 col-sm-2">{{($book['setcd_note'] == "") ? '-' : $book['setcd_note']}}</div>
<hr>
<div class="col-xs-12"></div>
<div class="col-xs-6 col-sm-2"><b>สถานะของดีวีดี</b></div>
<div class="col-xs-6 col-sm-2" id="dvd-status">{{$book['setdvd_status']}}</div>
<div class="col-xs-6 col-sm-2"><b>เมื่อ</b></div>
<div class="col-xs-6 col-sm-2">{{$book['setdvd_date']}}</div>
<div class="col-xs-6 col-sm-2"><b>DVDต้นฉบับ</b></div>
<div class="col-xs-6 col-sm-2">{{($book['setdvdm_no'] == "") ? '-' : $book['setdvdm_no']}}</div>
<div class="col-xs-6 col-sm-2"><b>หมายเหตุ</b></div>
<div class="col-xs-6 col-sm-2">{{($book['setdvd_note'] == "") ? '-' : $book['setdvd_note']}}</div>
<div class="col-xs-6 col-sm-2"><b>หนังสือสร้างเมื่อ</b></div>
<div class="col-xs-6 col-sm-2">{{($book['created_at'] == "") ? '-' : $book['created_at']}}</div>

<div class="col-md-6">
   <a href="{{ URL::to('/book/'.$book['id'].'/delete') }}" class="btn btn-danger btn-lg pull-left delete-book">ลบหนังสือ</a>
</div>
<div id="isddfvi" class="row">
   <div class="col-md-6">
      <a href="{{ URL::to('/book/'.$book['id'].'/edit') }}" class="btn btn-warning btn-lg pull-right">แก้ไข</a>
 </div>
</div>