@extends('library.layout')
@section('head')
<title>แก้ไข</title>
@stop
@section('body')
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">แก้ไข</h3>
  </div>
  <div class="panel-body">
    <form role="form" action="{{url('/book/'.$book['id'].'/edit')}}" method="post">

      <div class="container">
        <div style="padding: 0;">

        <div class="form-group">
            <div class="col-xs-6 col-lg-2">
              <label for="input" class="control-label">ชื่อเรื่อง</label>
            </div>
            <div class="col-xs-6 col-lg-2">
              <div class="col-lg-10">
                <input name="title" class="form-control" value="{{$book['title']}}" type="text">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-xs-6 col-lg-2">
              <label for="input" class="control-label">ชื่อเรื่อง (อังกฤษ)</label>
            </div>
            <div class="col-xs-6 col-lg-2">
              <div class="col-lg-10">
                <input name="title_eng" class="form-control" value="{{$book['title_eng']}}" type="text">
              </div>
            </div>
          </div>
        
        <div class="form-group">
          <div class="col-xs-6 col-lg-2">
            <label for="input" class="control-label">เลขอันดับ</label>
          </div>
          <div class="col-xs-6 col-lg-2">
            <div class="col-lg-10">
              <input name="number" class="form-control" value="{{$book['number']}}" type="text">
            </div>
          </div>
        </div>

          <div class="form-group">
          <div class="col-xs-6 col-lg-2">
            <label for="input" class="control-label">เลขอันดับ braille (b no.)</label>
          </div>
          <div class="col-xs-6 col-lg-2">
            <div class="col-lg-10">
              <input name="b_no" class="form-control" value="{{$book['b_no']}}" type="text">
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-6 col-lg-2">
            <label for="input" class="control-label">เลขอันดับ cassette (c no.)</label>
          </div>
          <div class="col-xs-6 col-lg-2">
            <div class="col-lg-10">
              <input name="c_no" class="form-control" value="{{$book['c_no']}}" type="text">
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-6 col-lg-2">
            <label for="input" class="control-label">เลขอันดับ cd (cd no.)</label>
          </div>
          <div class="col-xs-6 col-lg-2">
            <div class="col-lg-10">
              <input name="cd_no" class="form-control" value="{{$book['cd_no']}}" type="text">
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-6 col-lg-2">
            <label for="input" class="control-label">เลขอันดับ daisy (d no.)</label>
          </div>
          <div class="col-xs-6 col-lg-2">
            <div class="col-lg-10">
              <input name="d_no" class="form-control" value="{{$book['d_no']}}" type="text">
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-6 col-lg-2">
            <label for="input" class="control-label">เลขอันดับ dvd (dvd no.)</label>
          </div>
          <div class="col-xs-6 col-lg-2">
            <div class="col-lg-10">
              <input name="dvd_no" class="form-control" value="{{$book['dvd_no']}}" type="text">
            </div>
          </div>
        </div>

          <div class="form-group">
            <div class="col-xs-6 col-lg-2">
              <label for="input" class="control-label">ผู้แต่ง</label>
            </div>
            <div class="col-xs-6 col-lg-2">
              <div class="col-lg-10">
                <input name="author" class="form-control" value="{{$book['author']}}" type="text">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-xs-6 col-lg-2">
              <label for="input" class="control-label">ผู้แปล</label>
            </div>
            <div class="col-xs-6 col-lg-2">
              <div class="col-lg-10">
                <input name="translate" class="form-control" value="{{$book['translate']}}" type="text">
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-6 col-lg-2">
            <label for="input" class="control-label">วันลงทะเบียน</label>
          </div>
          <div class="col-xs-6 col-lg-2">
            <div class="col-lg-10">
              <input name="regis_date" class="form-control datepicker" value="{{$book['regis_date']}}" type="text">
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-6 col-lg-2">
            <label for="input" class="control-label">สำนักพิมพ์</label>
          </div>
          <div class="col-xs-6 col-lg-2">
            <div class="col-lg-10">
              <input name="publisher" class="form-control" value="{{$book['publisher']}}" type="text">
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-6 col-lg-2">
            <label for="input" class="control-label">พิมพ์ครั้งที่</label>
          </div>
          <div class="col-xs-6 col-lg-2">
            <div class="col-lg-10">
              <input name="pub_no" class="form-control" value="{{$book['pub_no']}}" type="text">
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-6 col-lg-2">
            <label for="input" class="control-label">ปีที่พิมพ์</label>
          </div>
          <div class="col-xs-6 col-lg-2">
            <div class="col-lg-10">
              <input name="pub_year" class="form-control" value="{{$book['pub_year']}}" type="text">
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-6 col-lg-2">
            <label for="input" class="control-label">ทะเบียนผลิต</label>
          </div>
          <div class="col-xs-6 col-lg-2">
            <div class="col-lg-10">
              <input name="produce_no" class="form-control" value="{{$book['produce_no']}}" type="text">
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-6 col-lg-2">
            <label for="input" class="control-label">ประเภทหนังสือ</label>
          </div>
          <div class="col-xs-6 col-lg-2">
            <div class="col-lg-10">
              <input name="btype" class="form-control" value="{{$book['btype']}}" type="text">
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-6 col-lg-2">
            <label for="input" class="control-label">หนังสือระดับ</label>
          </div>
          <div class="col-xs-6 col-lg-2">
            <div class="col-lg-10">
              <input name="grade" class="form-control" value="{{$book['grade']}}" type="text">
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-6 col-lg-2">
            <label for="input" class="control-label">ISBN</label>
          </div>
          <div class="col-xs-6 col-lg-2">
            <div class="col-lg-10">
              <input name="isbn" class="form-control" value="{{$book['isbn']}}" type="text">
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-6 col-lg-2">
            <label for="input" class="control-label">เลขหนังสือ</label>
          </div>
          <div class="col-xs-6 col-lg-2">
            <div class="col-lg-10">
              <input name="id" class="form-control" value="{{$book['id']}}" type="text">
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-12 col-lg-12">
            <label for="input" class="control-label">เนื้อเรื่องย่อ</label>
          </div>
          <div class="col-xs-12 col-lg-12">
            <div class="col-lg-10">
              <textarea name="abstract" cols="50" rows="10" class="form-control" value="{{$book['abstract']}}"></textarea>
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
          <label for="input" class="control-label">สถานะ</label> 
         </div>
        <div class="col-xs-6 col-lg-2">
          <div class="col-lg-10">
            <select name="bm_status" class="form-control media_status" id="select_bm_status">
              <option value="0" {{ ($book['bm_status'] == 0) ? 'selected' : ''}}>ไม่ผลิต</option>
              <option value="3" {{ ($book['bm_status'] == 3) ? 'selected' : ''}}>กำลังผลิต</option>
              <option value="1" {{ ($book['bm_status'] == 1) ? 'selected' : ''}}>ผลิต</option>
              <option value="2" {{ ($book['bm_status'] == 2) ? 'selected' : ''}}>จองอ่าน</option>
            </select>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-6 col-lg-1">
          <label for="input" class="control-label">เมื่อ</label> 
        </div>
        <div class="col-xs-6 col-lg-2">
          <div class="col-lg-10">
            <input name="bm_date" class="form-control datepicker" id="bm_date" {{($book['bm_date'] == 'ยังไม่ได้ระบุ') ? 'placeholder="ยังไม่ได้ระบุ"' : 'value='.$book["bm_date"]}} type="text">
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-6 col-lg-1">
          <label for="input" class="control-label">ต้นฉบับ</label>
        </div>
        <div class="col-xs-6 col-lg-2">
          <div class="col-lg-10">
            <input name="bm_no" class="form-control" value="{{$book['bm_no']}}" type="text">
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-6 col-lg-1">
          <label for="input" class="control-label">หมายเหตุ</label>
        </div>
        <div class="col-xs-6 col-lg-2">
          <div class="col-lg-10">
            <input name="bm_note" class="form-control" value="{{$book['bm_note']}}" type="text">
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
        <label for="input" class="control-label">สถานะ</label> 
      </div>
      <div class="col-xs-6 col-lg-2">
        <div class="col-lg-10">
          <select name="cs_status" class="form-control media_status" id="select_cs_status">
            <option value="0" {{ ($book['setcs_status'] == 0) ? 'selected' : ''}}>ไม่ผลิต</option>
            <option value="3" {{ ($book['setcs_status'] == 3) ? 'selected' : ''}}>กำลังผลิต</option>
            <option value="1" {{ ($book['setcs_status'] == 1) ? 'selected' : ''}}>ผลิต</option>
            <option value="2" {{ ($book['setcs_status'] == 2) ? 'selected' : ''}}>จองอ่าน</option>
          </select>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-xs-6 col-lg-1">
        <label for="input" class="control-label">เมื่อ</label> 
      </div>
      <div class="col-xs-6 col-lg-2">
        <div class="col-lg-10">
          <input name="cs_date" class="form-control datepicker" id="cs_date" {{($book['setcs_date'] == 'ยังไม่ได้ระบุ') ? 'placeholder="ยังไม่ได้ระบุ"' : 'value='.$book["setcs_date"]}} type="text">
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-xs-6 col-lg-1">
        <label for="input" class="control-label">ต้นฉบับ</label>
      </div>
      <div class="col-xs-6 col-lg-2">
        <div class="col-lg-10">
          <input name="setcm_no" class="form-control" value="{{$book['setcm_no']}}" type="text">
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-xs-6 col-lg-1">
        <label for="input" class="control-label">หมายเหตุ</label> 
      </div>
      <div class="col-xs-6 col-lg-2">
        <div class="col-lg-10">
          <input name="cs_note" class="form-control" value="{{$book['setcs_note']}}" type="text">
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
      <label for="input" class="control-label">สถานะ</label> 
    </div>
    <div class="col-xs-6 col-lg-2">
      <div class="col-lg-10">
        <select name="ds_status" class="form-control media_status" id="select_ds_status">
          <option value="0" {{ ($book['setds_status'] == 0) ? 'selected' : ''}}>ไม่ผลิต</option>
          <option value="3" {{ ($book['setds_status'] == 3) ? 'selected' : ''}}>กำลังผลิต</option>
          <option value="1" {{ ($book['setds_status'] == 1) ? 'selected' : ''}}>ผลิต</option>
          <option value="2" {{ ($book['setds_status'] == 2) ? 'selected' : ''}}>จองอ่าน</option>
        </select>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-xs-6 col-lg-1">
      <label for="input" class="control-label">เมื่อ</label>
    </div>
    <div class="col-xs-6 col-lg-2">
      <div class="col-lg-10">
        <input name="ds_date" class="form-control datepicker" id="ds_date" {{($book['setds_date'] == 'ยังไม่ได้ระบุ') ? 'placeholder="ยังไม่ได้ระบุ"' : 'value='.$book["setds_date"]}} type="text">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-xs-6 col-lg-1">
      <label for="input" class="control-label">ต้นฉบับ</label>
    </div>
    <div class="col-xs-6 col-lg-2">
      <div class="col-lg-10">
        <input name="setdm_no" class="form-control" value="{{$book['setdm_no']}}" type="text">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-xs-6 col-lg-1">
      <label for="input" class="control-label">หมายเหตุ</label> 
    </div>
    <div class="col-xs-6 col-lg-2">
      <div class="col-lg-10">
        <input name="ds_note" class="form-control" value="{{$book['setds_note']}}" type="text">
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
    <label for="input" class="control-label">สถานะ</label> 
  </div>
  <div class="col-xs-6 col-lg-2">
    <div class="col-lg-10">
      <select name="cd_status" class="form-control media_status" id="select_cd_status">
        <option value="0" {{ ($book['setcd_status'] == 0) ? 'selected' : ''}}>ไม่ผลิต</option>
        <option value="3" {{ ($book['setcd_status'] == 3) ? 'selected' : ''}}>กำลังผลิต</option>
        <option value="1" {{ ($book['setcd_status'] == 1) ? 'selected' : ''}}>ผลิต</option>
        <option value="2" {{ ($book['setcd_status'] == 2) ? 'selected' : ''}}>จองอ่าน</option>
      </select>
    </div>
  </div>
</div>

<div class="form-group">
  <div class="col-xs-6 col-lg-1">
    <label for="input" class="control-label">เมื่อ</label> 
  </div>
  <div class="col-xs-6 col-lg-2">
    <div class="col-lg-10">
      <input name="cd_date" class="form-control datepicker" id="cd_date" {{($book['setcd_date'] == 'ยังไม่ได้ระบุ') ? 'placeholder="ยังไม่ได้ระบุ"' : 'value='.$book["setcd_date"]}} type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <div class="col-xs-6 col-lg-1">
    <label for="input" class="control-label">ต้นฉบับ</label>
  </div>
  <div class="col-xs-6 col-lg-2">
    <div class="col-lg-10">
      <input name="setcdm_no" class="form-control" value="{{$book['setcdm_no']}}" type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <div class="col-xs-6 col-lg-1">
    <label for="input" class="control-label">หมายเหตุ</label>
  </div>
  <div class="col-xs-6 col-lg-2">
    <div class="col-lg-10">
      <input name="cd_note" class="form-control" value="{{$book['setcd_note']}}" type="text">
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
    <label for="input" class="control-label">สถานะ</label> 
  </div>
  <div class="col-xs-6 col-lg-2">
    <div class="col-lg-10">
      <select name="dvd_status" class="form-control media_status" id="select_dvd_status">
        <option value="0" {{ ($book['setdvd_status'] == 0) ? 'selected' : ''}}>ไม่ผลิต</option>
        <option value="3" {{ ($book['setdvd_status'] == 3) ? 'selected' : ''}}>กำลังผลิต</option>
        <option value="1" {{ ($book['setdvd_status'] == 1) ? 'selected' : ''}}>ผลิต</option>
        <option value="2" {{ ($book['setdvd_status'] == 2) ? 'selected' : ''}}>จองอ่าน</option>
      </select>
      <!-- text fields -->
    </div>
  </div>
</div>

<div class="form-group">
  <div class="col-xs-6 col-lg-1">
    <label for="input" class="control-label">เมื่อ</label> 
  </div>
  <div class="col-xs-6 col-lg-2">
    <div class="col-lg-10">
      <input name="dvd_date" class="form-control datepicker" id="dvd_date" {{($book['setdvd_date'] == 'ยังไม่ได้ระบุ') ? 'placeholder="ยังไม่ได้ระบุ"' : 'value='.$book["setdvd_date"]}} type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <div class="col-xs-6 col-lg-1">
    <label for="input" class="control-label">ต้นฉบับ</label>
  </div>
  <div class="col-xs-6 col-lg-2">
    <div class="col-lg-10">
      <input name="setdvdm_no" class="form-control" value="{{$book['setdvdm_no']}}" type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <div class="col-xs-6 col-lg-1">
    <label for="input" class="control-label">หมายเหตุ</label> 
  </div>
  <div class="col-xs-6 col-lg-2">
    <div class="col-lg-10">
      <input name="dvd_note" class="form-control" value="{{$book['setdvd_note']}}" type="text">
    </div>
  </div>
</div>
</div>
<br>
<div class="text-center">
  <button type="submit" class="btn btn-default btn-danger pull-left" id="cancel-form">ยกเลิก</button>
  <input class="btn btn-default btn-success pull-right" value="บันทึก" type="submit">
</div>
</form>
</div>
</div>
@stop
@section('script')
@parent

<script type="text/javascript">
  $(function() {
    $(".datepicker").datepicker({
      language:'th-th',
      format: 'dd/mm/yyyy',
      isBuddhist: true
    });
  });
  $('#cancel-form').click(function() {
    window.history.back();
  });
</script>
@stop
