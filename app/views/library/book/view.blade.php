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



@stop
@section('script')
@parent
<script>
$(function()
{
  $('myTab a:last').tab('show.bs.tab');
});

//make table row as a link
$("table").on("click", "tr.table-body", function(e) {
  if ($(e.target).is("a,input"))
  return;
  location.href = $(this).attr("href");
});
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
