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
        @if ($i==19||$i==22||$i==25||$i==28||$i==31)
        <hr>
        <div class="col-xs-12"></div>
        @endif
        @if ($i==19||$i==22||$i==25||$i==28||$i==31)
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
        @elseif ($i>19||$i>22||$i>25||$i>28||$i>31)
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

    <div role="tabpanel" class="tab-pane" id="braille">
      <div class="row" >
        @include('library.book.part.braille',array('braille'=>$braille,'bid'=>$book['id']))
        <button  class="pull-right addButton btn btn-lg btn-success" data-toggle="modal" data-target="#addBraille">เพิ่มเบรลล์</button>
      </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="cassette">
      <div class="row" >
        @include('library.book.part.cassette',array('cassette'=>$cassette,'bid'=>$book['id']))
        <button class="pull-right addButton btn btn-lg btn-success" data-toggle="modal" data-target="#add">เพิ่มคาสเซ็ท</button>
      </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="daisy">
      <div class="row">
        @include('library.book.part.daisy',array('daisy'=>$daisy,'bid'=>$book['id']))
        <button class="pull-right addButton btn btn-lg btn-success" data-toggle="modal" data-target="#add">เพิ่มเดซี่</button>
      </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="cd">
      <div class="row">
        @include('library.book.part.cd',array('cd'=>$cd,'bid'=>$book['id']))
        <button class="pull-right addButton btn btn-lg btn-success" data-toggle="modal" data-target="#add">เพิ่มCD</button>
      </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="dvd">
      <div class="row">
        @include('library.book.part.dvd',array('dvd'=>$dvd,'bid'=>$book['id']))
        <button class="pull-right addButton btn btn-lg btn-success" data-toggle="modal" data-target="#add">เพิ่มDVD</button>
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
              <div class="input-group-addon">สื่อชิ้นนี้มี</div>
              <input type="number" class="form-control" id="amount" min=1 value="1">
              <div class="input-group-addon">ชิ้นย่อย</div>
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
        เพิ่มสื่อสำเร็จ
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
  console.log(tabClicked);
}

function tabSelect(tab){
  console.log(tab);
  console.log(tab.getAttribute('role').toLowerCase());
  tabClicked = tab.getAttribute('role').toLowerCase();
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
    original_part = $(this).children('.braille-part').text();
    $('#test').html('<div class="col-md-2">จำนวนหน้า</div>\
                     <div class="col-md-4">\
                     <input type="number" class="form-control" id="edit-page-braille" min=1 value="">\
                     </div><br><br><br>\
                     <div class="col-md-2">จำนวนตอน</div>\
                     <div class="col-md-4">\
                     <input type="number" class="form-control" id="edit-part-braille" min=1 value="">\
                     </div><br><br><br>\
                     <div class="col-md-2">ผู้ตรวจสอบ</div>\
                     <div class="col-md-6"><input type="text" class="form-control" id="edit-examiner-braille"value="">\
                     </div>');
    $('#edit-page-braille').attr('value', $(this).children('.braille-page').text());
    $('#edit-part-braille').attr('value', original_part);
    $('#edit-examiner-braille').attr('value', $(this).children('.braille-examiner').text());
  }
  else {
    original_part = $(this).children('#media-part').text();
    $('#test').html('<div class="col-md-3">ความยาว</div>\
                     <div class="col-md-3"><input type="number" class="form-control" id="edit-length" value="">\
                     </div>\
                     <div class="col-md-2">นาที</div>\
                     <br><br><br>\
                     <div class="col-md-3">จำนวนชิ้นย่อย</div>\
                     <div class="col-md-3"><input type="number" class="form-control" id="edit-part" value="">\
                     </div>\
                     <div class="col-md-2">ชิ้น</div>');

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
    console.log(data);
    console.log('#' + tabClicked + '-' + media_id);
    if(tabClicked == "braille") {
      $('#' + tabClicked + '-' + media_id).children('.braille-page').text(page_amount);
      $('#' + tabClicked + '-' + media_id).children('.braille-examiner').text(examiner);
      $('#' + tabClicked + '-' + media_id).children('.braille-part').text(part_amount);
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


function add(){
  console.log($('#amount').val());
  var amount = $('#amount').val();
  var length = $('#length').val();
  var page = null;
  var examiner = null;
  if(tabClicked == "braille"){
    amount = $('#amountBraille').val();
    page = $('#pageBraille').val();
    examiner = $('#examiner').val();
  }

  console.log(amount);
  console.log(tabClicked);
  //$.post( "{{ $book['id'] }}/" + tabClicked + "/add", {amount: amount}, function(result){
    $.post( "{{ $book['id'] }}/" + tabClicked + "/add", {amount: amount, examiner: examiner, page: page, length: length}, function(result){
      console.log(result);
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
        console.log("on here");
      }else{
        document.location.href = document.location.href.substring(0, tabClicked.lastIndexOf('#') + 1)+"#"+tabClicked;
        console.log("here");
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


</script>
@stop
