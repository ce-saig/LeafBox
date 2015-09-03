@extends('library.layout')

@section('head')
<title>Leafbox :: {{$book['id']}} - {{$book['title']}}</title>
@stop

@section('body')
<div class="well">
  <div>
    <h2>I{{$book['id']}}:{{$book['title']}}</h2>
  </div>
  <ul class="nav nav-tabs nav-justified" role="tablist">
    <li role="presentation" class="active"><a href="#detail" role="tab" data-toggle="tab">ข้อมูล</a></li>
    <li role="presentation"><a href="#prod" role="prod" data-toggle="tab" onClick="tabSelect(this)">สถานะการผลิต</a></li>
    <li role="presentation"><a href="#braille" role="braille" data-toggle="tab" onClick="tabSelect(this)">เบรลล์</a></li>
    <li role="presentation"><a href="#cassette" role="cassette" data-toggle="tab" onClick="tabSelect(this)">เทปคาสเซ็ท</a></li>
    <li role="presentation"><a href="#daisy" role="daisy" data-toggle="tab" onClick="tabSelect(this)">เดซี่</a></li>
    <li role="presentation"><a href="#cd" role="cd" data-toggle="tab" onClick="tabSelect(this)">CD</a></li>
    <li role="presentation"><a href="#dvd" role="dvd" data-toggle="tab" onClick="tabSelect(this)">DVD</a></li>
  </ul>

  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="detail">
      <div class="row">
        <br>
        <?php
        $i=0;
        ?>
        @foreach ($book as $data)
        @if ($field[$i]!='ID')
        @if ($i==18||$i==22||$i==26||$i==30||$i==34)
        <hr>
        <div class="col-xs-12"></div>
        @endif
        @if ($i==18||$i==22||$i==26||$i==30||$i==34)
        <div class="col-xs-6 col-sm-2"><b>{{$field[$i]}}</b></div>
        <div class="col-xs-6 col-sm-2">
          @if($data == 1)
          ผลิต
          @elseif($data == 2)
          จองอ่าน
          @else
          ไม่ผลิต
          @endif
        </div>
        @elseif ($i>18||$i>22||$i>26||$i>30||$i>34)
        <div class="col-xs-6 col-sm-2"><b>{{$field[$i]}}</b></div>
        <div class="col-xs-6 col-sm-2">{{$data?$data:"-"}}</div>
        @else
        <div class="col-xs-6 col-sm-2"><b>{{$field[$i]}}</b></div>
        <div class="col-xs-6 col-sm-4"> {{$data?$data:"-"}}</div>
        @endif
        @endif
        <?php $i++; ?>
        @endforeach

        <div class="row">
          <div class="col-md-12 ">
            <a href="{{ URL::to('/book/'.$book['id'].'/edit') }}" class="btn btn-warning btn-lg pull-right">แก้ไข</a>
          </div>
        </div>
      </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="prod">
      <div class="row" >
          @include('library.book.part.prod',array('prod'=>$prod,'bid'=>$book['id']))
          {{-- @include('library.book.part.proc',array('braille'=>$braille,'bid'=>$book['id'])) --}}
      </div>
    </div>    
    
    <div role="tabpanel" class="tab-pane" id="braille">
      <div class="row" >
        @include('library.book.part.braille',array('braille'=>$braille,'bid'=>$book['id']))
        <button  class="pull-right addButton btn btn-lg btn-success" onclick="verifyAdding(0)">เพิ่มเบรลล์</button>
      </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="cassette">
      <div class="row" >
        @include('library.book.part.cassette',array('cassette'=>$cassette,'bid'=>$book['id']))
        <button class="pull-right addButton btn btn-lg btn-success" onclick="verifyAdding(1)">เพิ่มคาสเซ็ท</button>
      </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="daisy">
      <div class="row">
        @include('library.book.part.daisy',array('daisy'=>$daisy,'bid'=>$book['id']))
        <button class="pull-right addButton btn btn-lg btn-success" onclick="verifyAdding(2)">เพิ่มเดซี่</button>
      </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="cd">
      <div class="row">
        @include('library.book.part.cd',array('cd'=>$cd,'bid'=>$book['id']))
        <button class="pull-right addButton btn btn-lg btn-success" onclick="verifyAdding(3)">เพิ่มCD</button>
      </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="dvd">
      <div class="row">
        @include('library.book.part.dvd',array('dvd'=>$dvd,'bid'=>$book['id']))
        <button class="pull-right addButton btn btn-lg btn-success" onclick="verifyAdding(4)">เพิ่มDVD</button>
      </div>
    </div>

  </div>
</div>


<div class="modal fade" id="add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title">เพิ่มสื่อ</h4>
      </div>
      <div class="modal-body">
        <form class="form-inline">
          <div class="form-group">
            <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
            <div class="input-group">
              <div class="input-group-addon" id="add-media-prefix">จำนวนแผ่น</div>
              <input type="number" class="form-control" id="amount" min=1 value="1">
              <div class="input-group-addon" id="add-media-suffix">แผ่น</div>
              <div class="input-group-addon">ความยาว</div>
              <input type="number" class="form-control" id="length" min=1 value="1">
              <div class="input-group-addon">นาที</div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" onClick="add()" data-dismiss="modal">เพิ่ม</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addBraille">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title">เพิ่มหนังสือเบรลล์</h4>
      </div>
      <div class="modal-body row">
        <div class="col-md-2">จำนวนหน้า</div>
        <div class="col-md-4">
          <input type="number" class="form-control" id="pageBraille" min=1 value="1">
        </div><br><br><br>
        <div class="col-md-2">จำนวนตอน</div>
        <div class="col-md-4">
          <input type="number" class="form-control" id="amountBraille" min=1 value="1">
        </div><br><br><br>
        <div class="col-md-2">ผู้ตรวจสอบ</div>
        <div class="col-md-6">
          <input type="text" class="form-control" id="examiner"value="">
        </div>
      </div>
      <div class="modal-footer">
        <div class="text-center pull-right">
          <button class="btn btn-success btn" onClick="add()" data-dismiss="modal">เพิ่ม</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="success">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
          <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title">ข้อความ</h4>
      </div>
      <div class="modal-body">
        การทำรายการสำเร็จ
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="prod-notify">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">ไม่สามารถเพิ่มสื่อได้</h4>
      </div>
      <div class="modal-body">
        กระบวนการผลิตยังไม่เสร็จสมบูรณ์ โปรดตรวจสอบสถานะการผลิต
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addProd">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">เพิ่มสถานะการผลิต</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="alert alert-danger" id='prod-noti1' hidden>
            ไม่สามารถเพิ่มสถานะได้ เนื่องจากยังไม่มีการระบุวันเสร็จในสถานะล่าสุด
          </div>
          <div class="alert alert-danger" id='prod-noti2' hidden>
            กรุณาใส่ข้อมูลที่มี * ให้ถูกต้อง และครบถ้วน
          </div>
          <div class="alert alert-danger" id='prod-noti3' hidden>
            ไม่สามารถเพิ่มสถานะได้ เนื่องจากเสร็จสิ้นกระบวนการผลิตแล้ว
          </div>
        </div>
        <div class="row" id="addProdBody">
            <div class="form-group">
              <label class="col-sm-2 control-label">ประเภทสื่อ</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="prod_media_type_text" disabled="disabled">
                <select name="" id="prod_media_type" class="form-control" required="required" style="display: none">
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
                <input type="text" class="form-control" id="prod_action_text" disabled="disabled">
                <select name="" id="prod_action" class="form-control" required="required" style="display: none">
                  <option value="">เลือกสถานะ</option>
                  <option value="0"></option>
                  <option value="1"></option>
                  <option value="2"></option>
                  <option value="3">ส่งตรวจ</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">*ผู้ปฏิบัติ</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="prod_actioner">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">*วันปฏิบัติ</label>
              <div class="col-sm-10">
                <input type="text" class="form-control datepicker" id="prod_act_date">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">วันเสร็จ</label>
              <div class="col-sm-10">
                <input type="text" class="form-control datepicker" id="prod_finish_date">
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
        <button class="btn btn-success" onClick="postProd()" >เพิ่ม</button>  
        {{-- data-dismiss="modal" --}}
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="edit-detail">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="media-title-head">แก้ไขรายละเอียดสื่อ</h4>
      </div>
      <div class="modal-body row" id="test">

      </div>
      <div class="modal-footer">
        <a class="btn btn-primary pull-left" id="link-edit-page" href="">แก้ไขรายละเอียดรายสื่อ</a>
        <button class="btn btn-success pull-right" id="send-data">บันทึก</button>
      </div>
    </div>
  </div>
</div>

@stop
@section('script')
@parent
<script>
  var examiner = null;
  var page_amount = null;
  var part_amount = null;
  var length = null;
  var media_id = null;
  var original_part = null;

  $(function()
  {
    $('myTab a:last').tab('show.bs.tab');
  });

//make table row as a link
//var tabClicked = "braille";
var tabClicked = "";
//check and set tab if access tab panel from url link.
if (window.location.href.match('#')){
  tabClicked  = window.location.hash.replace('#','');
  //console.log(tabClicked);
}

function tabSelect(tab){
  //console.log(tab);
  //console.log(tab.getAttribute('role').toLowerCase());
  tabClicked = tab.getAttribute('role').toLowerCase();
  console.log(tabClicked);
  document.location.href = document.location.href.substring(0, tabClicked.lastIndexOf('#') + 1)+'#'+tabClicked;
  window.scrollTo(0, 0);
  if(tabClicked == "braille"){
    //$(".addButton").attr('data-target', "");
    //$(".addButton").attr('onClick', "add()");
    $(".addButton").attr('data-target', "#addBraille");
    //$(".addButton").attr('onClick', "");
  } else {
    $(".addButton").attr('data-target', "#add");
    //$(".addButton").attr('onClick', "");
  }
}

$("table").on("click", "tr.table-body", function() {
  var media_type = {braille:'เบรลล์', cassette:'เทปคาสเซ็ท', cd:' CD', daisy:'เดซี่', dvd:' DVD'};
  media_id = $(this).children('#media-id').text();
  $('#media-title-head').text('แก้ไขรายละเอียด' + media_type[tabClicked]);
  if(tabClicked == "braille") {
    original_part = $(this).children('#braille-part').text();
    $('#test').html('<div class="col-md-2">จำนวนหน้า</div>\
                     <div class="col-md-4">\
                     <input type="number" class="form-control" id="edit-page-braille" min=1 value="">\
                     </div>\
                     <div class="col-md-2">หน้า</div><br><br><br>\
                     <div class="col-md-2">จำนวนตอน</div>\
                     <div class="col-md-4">\
                     <input type="number" class="form-control" id="edit-part-braille" min=1 value="">\
                     </div>\
                     <div class="col-md-2">ตอน</div><br><br><br>\
                     <div class="col-md-2">ผู้ตรวจสอบ</div>\
                     <div class="col-md-6"><input type="text" class="form-control" id="edit-examiner-braille"value="">\
                     </div>');
    console.log("test" +$(this).children('.braille-page').text());
    $('#edit-page-braille').attr('value', $(this).children('#braille-page').text());
    $('#edit-part-braille').attr('value', original_part);
    $('#edit-examiner-braille').attr('value', $(this).children('#braille-examiner').text());
  }
  else {
    original_part = $(this).children('#media-part').text();
    $('#test').html('<div class="col-md-3" id="amount-prefix">จำนวนแผ่น</div>\
                     <div class="col-md-3"><input type="number" class="form-control" id="edit-part" value="">\
                     </div>\
                     <div class="col-md-2" id="amount-suffix">แผ่น</div>\
                     <br><br><br>\
                      <div class="col-md-3">ความยาว</div>\
                     <div class="col-md-3"><input type="number" class="form-control" id="edit-length" value="">\
                     </div>\
                     <div class="col-md-2">นาที</div>');
    if(tabClicked == "daisy") {
      $('#amount-prefix').text("จำนวนชิ้น");
      $('#amount-suffix').text("ชิ้น");
    }
    else if(tabClicked == "cassette") {
      $('#amount-prefix').text("จำนวนตลับ");
      $('#amount-suffix').text("ตลับ");
    }

    $('#edit-length').attr('value', $(this).children('#media-length').text());
    $('#edit-part').attr('value', original_part);
  }
  $('#link-edit-page').attr('href', $(this).attr('href'));
  $('#edit-detail').modal('show');
  console.log(tabClicked + "sd");
});

$('body').on('click', '#send-data', function() {
  page_amount = $('#edit-page-braille').val();
  examiner = $('#edit-examiner-braille').val();
  length = $('#edit-length').val();
  part_amount = (tabClicked == "braille" ? $('#edit-part-braille').val() : $('#edit-part').val());

  if(original_part != part_amount) {
    if(!confirm('การดำเนินการต่อจะทำให้มีการเพิ่มหรือลบจำนวนตอนหรือจำนวนชิ้นย่อยของสื่อ\nคุณต้องการดำเนินการต่อหรือไม่ '))
      return;
  }

  var data = {media_type: tabClicked, media_id: media_id, page_amount: page_amount, part_amount: part_amount, length: length, examiner: examiner};
  $.ajax({
    type: "POST",
    url: "{{ url('editMedia') }}",
    data: {data: data}
  }).done(function(data) {
    //console.log(data);
    //console.log('#' + tabClicked + '-' + media_id);
    if(tabClicked == "braille") {
      $('#' + tabClicked + '-' + media_id).children('#braille-page').text(page_amount);
      $('#' + tabClicked + '-' + media_id).children('#braille-examiner').text(examiner);
      $('#' + tabClicked + '-' + media_id).children('#braille-part').text(part_amount);
    }
    else {
      $('#' + tabClicked + '-' + media_id).children('#media-length').text(length);
      $('#' + tabClicked + '-' + media_id).children('#media-part').text(part_amount);
    }
    $('#edit-detail').modal('hide');
  });
});
//Enable Link to tab


$(function() {
  var hash = window.location.hash;
  hash && $('ul.nav a[href="' + hash + '"]').tab('show');
});

  function verifyAdding(media_type) {
    var data = getLastProdStatus(media_type);
    data.success(function(data) {
        if(data['finish_date'] && (media_type && (data['action_status'] == 3) || media_type == 0 && (data['action_status'] == 2))) {
          if(!media_type)
            $('#addBraille').modal('show');
          else {
            if(media_type == 1) {
              $('#add-media-prefix').text('จำนวนตลับ');
              $('#add-media-suffix').text('ตลับ');
            }
            else if(media_type == 2) {
              $('#add-media-prefix').text('จำนวนชิ้น');
              $('#add-media-suffix').text('ชิ้น');
            }
            $('#add').modal('show');
          }
        }
        else
          $('#prod-notify').modal('show');
      });
  }

function add(){
  //console.log($('#amount').val());
  var amount = $('#amount').val();
  var length = $('#length').val();
  var page = null;
  var examiner = null;
  if(tabClicked == "braille"){
    amount = $('#amountBraille').val();
    page = $('#pageBraille').val();
    examiner = $('#examiner').val();
  }

  //console.log(amount);
  //console.log(tabClicked);
  //$.post( "{{ $book['id'] }}/" + tabClicked + "/add", {amount: amount}, function(result){
    $.post( "{{ $book['id'] }}/" + tabClicked + "/add", {amount: amount, examiner: examiner, page: page, length: length}, function(result){
      //console.log(result);
    //alert(result);
    //console.log("eiei");
    $('#success').modal('show');
  });
    $('#amount').val(1);
  }

  var myModal = $('#success').on('show.bs.modal', function () {
    clearTimeout(myModal.data('hideInteval'));
    var id = setTimeout(function(){
      myModal.modal('hide');
      if (!window.location.href.match('#')) {
        document.location.href += ("#"+ tabClicked);
        // console.log("on here");
      }else{
        document.location.href = document.location.href.substring(0, tabClicked.lastIndexOf('#') + 1)+"#"+tabClicked;
        // console.log("here");
      }
      window.location.reload();
    }, 1500);
    myModal.data('hideInteval', id);
  });

// Delete Button Cofirmation
$(function() {
  $('.del_media_btn').click(function(e) {
    e.preventDefault();
    var link = $(this).attr('href');
    confirmation(link);
  });
  $('.del_media_btn_all').click(function(e) {
    e.preventDefault();
    var link = $(this).attr('href');
    confirmation(link);
  });
});

function confirmation(link) {
  if(confirm('คุณต้องการลบจริงหรือไม่ ?')){
    window.location.href = link;
  }else{
    // not doing anythings
  }
}

    
  $(function() {
    $(".datepicker").datepicker({
      language:'th-th',
      format: 'dd/mm/yyyy',
      isBuddhist: true
    });
  });

  function addProdModal() {
    var media_type = $('#prod_media_type').val();
    $("#prod_media_type option[value='']").remove();
    enableProdText();
    hideProdNoti();
    $('#addProd').modal('show');
    var data = getLastProdStatus(media_type);
    data.success(function(data) {
        changeProdAction(media_type);
        $('#prod_action option[value=' + (++data['action_status']) + ']').attr('selected', 'true');
        $('#prod_action_text').val($('#prod_action option[value=' + data['action_status'] + ']').text());
        if(data['finish_date'] == null) {
          disableProdText();
          $('#prod-noti1').slideDown(300);
        }
        if(data['finish_date'] && ((media_type && (data['action_status'] == 4)) || (media_type == 0 && data['action_status'] == 3))) { //if finish_date is filled and (if media_type != braille && action_status == last action status || media_type == braille && action_status == last action status of braille)
          disableProdText();
          $('#prod-noti3').slideDown(300);
        }
      });
    }

  function changeProdAction(media_type) {
    console.log(media_type);
    if(media_type == 0) {
      $('#prod_action option[value="0"]').text('พิมพ์ต้นฉบับ');
      $('#prod_action option[value="1"]').text('ตรวจตาดี');
      $('#prod_action option[value="2"]').text('ตรวจบรู๊ฟเบรลล์');
    }
    else {
      $('#prod_action option[value="0"]').text('อ่าน');
      $('#prod_action option[value="1"]').text('ทำต้นฉบับ');
      $('#prod_action option[value="2"]').text('ทำกล่อง');
    }
  }

  function getLastProdStatus(media_type) {
    return $.ajax({
              type: "POST",
              url: "/book/{{ $book['id'] }}/prod/get_status",
              data: {book_id: {{ $book['id'] }}, media_type: media_type}
            });
  }

  function enableProdText() {
    $('#prod_actioner').removeAttr('disabled');
    $('#prod_act_date').removeAttr('disabled');
    $('#prod_finish_date').removeAttr('disabled');
  }

  function disableProdText() {
    $('#prod_actioner').prop('disabled', 'false');
    $('#prod_act_date').prop('disabled', 'false');
    $('#prod_finish_date').prop('disabled', 'false');
  }

  function hideProdNoti() {
    $('#prod-noti1').hide();
    $('#prod-noti2').hide();
    $('#prod-noti3').hide();
  }

  function addProd(media_type) {
    changeProdAction(media_type);
    $('#prod_media_type option[value="' + media_type + '"]').attr('selected', 'true');
    $('#prod_media_type_text').val($('#prod_media_type option[value="' + media_type + '"]').text().trim());
    $('#addProd').modal('show');
    addProdModal();
  }

  function postProd(){
      var media_type = $('#prod_media_type').val();
      var action = $('#prod_action').val();
      var actioner = $('#prod_actioner').val();
      var act_date = $('#prod_act_date').val();
      var finish_date = $('#prod_finish_date').val();

      // console.log(act_date);
      // console.log(action);
      // console.log(actioner);
      // console.log(finish_date);
      
      $.post( "/book/{{ $book['id'] }}/prod/add", {book_id:{{ $book['id'] }},media_type:media_type,act_date:act_date, action:action,actioner:actioner,finish_date:finish_date}, function(result){
        // console.log(result);
        if(result=="success"){
          $("#addProd").hide();
          $('#success').modal('show');
        }else{ 
          if(!$('#prod-noti1').is(':visible') && !$('#prod-noti3').is(':visible'))
            $('#prod-noti2').slideDown(300);
        }
      });
    }
    function prodEditShowOnButton(prodObj) {
      prodEditShow($(prodObj).parent());
    }

    function prodEditShow(prodObj) {
      // Append hidden field for prodId
      $('#prod_edit_action option[value=' + $(prodObj).parent().children().eq(0).attr("data-action") + ']').attr('selected', 'selected');
      $('#prod_edit_action_text').val($(prodObj).parent().children().eq(0).text().trim());
      $('#prod_edit_actioner').val($(prodObj).parent().children().eq(1).attr("data-actioner"));
      $('#prod_edit_act_date').val($(prodObj).parent().children().eq(2).text().trim());
      $('#prod_edit_finish_date').val($(prodObj).parent().children().eq(3).text().trim());
      console.log($(prodObj).children()[1]);
      console.log($(prodObj).children()[2]);
      console.log($(prodObj).children()[3]);
      $("#prod_edit_id").val($(prodObj).parent().attr("data-prodid"));
      $('#prod-edit-noti').hide();
      $("#prod-edit").modal('show');
    }

    function prodEditAjax(){
      var prodId = $('#prod_edit_id').val();
      console.log(prodId + " bookid {{ $book['id'] }}");
      var action = $('#prod_edit_action').val();
      var actioner = $('#prod_edit_actioner').val();
      var act_date = ($('#prod_edit_act_date').val().trim() == "ยังไม่ได้ระบุ" ? null : $('#prod_edit_act_date').val());
      var finish_date = ($('#prod_edit_finish_date').val().trim() == "ยังไม่ได้ระบุ" ? null : $('#prod_edit_finish_date').val());

      // console.log(act_date);
      // console.log(action);
      // console.log(actioner);
      // console.log(finish_date);
      
      $.post( "/book/{{ $book['id'] }}/prod/edit", {book_id:{{ $book['id'] }},prod_id: prodId, act_date:act_date, action:action,actioner:actioner,finish_date:finish_date}, function(result){
        // console.log(result);
        if(result=="success"){
          $("#prod-edit").hide();
          $('#success').modal('show');
        }else{
          $('#prod-edit-noti').slideDown(300);
        }
      });
    }

    function prodDelete(prodObj) {
      if(confirm("คุณต้องการลบรายการนี้ใช่หรือไม่")) {
        $.ajax({
          type: "POST",
          url: "/book/{{ $book['id'] }}/prod/delete",
          data: {prod_id: $(prodObj).closest('tr').attr('data-prodId')}
        }).done(function(data) {
          if(data == "success") {
            var lastProdStatus = $(prodObj).closest('tr').children().eq(0).attr('data-action');
            if(lastProdStatus != "undefine")
              $(prodObj).parent().parent().parent().children().eq(--lastProdStatus).children().eq(4).append('<button onclick="prodDelete(this)" class="btn btn-danger">ลบ</button>');
            $(prodObj).closest('tr').remove();
          }
        }); 
      }
    }
  </script>

@stop
