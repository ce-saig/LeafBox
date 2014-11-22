@extends('library.layout')

@section('head')
<title>Leafbox :: {{$book['id']}} - {{$book['title']}}</title>
@stop

@section('body')
<div class="well">
  <div>
    <h2>I{{$book['id']}}:{{$book['title']}}
      <a href="/book/{{$book['id']}}/edit" class="btn btn-danger pull-right">แก้ไข</a>

    </h2>
  </div>
  <ul class="nav nav-tabs nav-justified" role="tablist">
    <li role="presentation" class="active"><a href="#detail" role="tab" data-toggle="tab">Detail</a></li>
    <li role="presentation"><a href="#braille" role="tab" data-toggle="tab" onClick="tabSelect(this)">Braille</a></li>
    <li role="presentation"><a href="#cassette" role="tab" data-toggle="tab" onClick="tabSelect(this)">Cassette</a></li>
    <li role="presentation"><a href="#daisy" role="tab" data-toggle="tab" onClick="tabSelect(this)">daisy</a></li>
    <li role="presentation"><a href="#cd" role="tab" data-toggle="tab" onClick="tabSelect(this)">CD</a></li>
    <li role="presentation"><a href="#dvd" role="tab" data-toggle="tab" onClick="tabSelect(this)">DVD</a></li>
  </ul>

  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="detail">
      <div class="row">
        <?php 
          $i=0;
        ?>
        @foreach ($book as $data)
          <div class="col-xs-6 col-sm-3"><b>{{$field[$i]}}</b></div>
          <div class="col-xs-6 col-sm-3">= {{$data}}</div>
          <?php $i++; ?>
        @endforeach 

      </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="braille">
      @include('library.book.part.braille',array('braille'=>$braille,'bid'=>$book['id']))
      <button class="addButton" onClick="add()" data-toggle="modal" data-target="#add">เพิ่ม</button>
    </div>

    <div role="tabpanel" class="tab-pane" id="cassette">
      @include('library.book.part.cassette',array('cassette'=>$cassette,'bid'=>$book['id']))
      <button class="addButton" onClick="add()" data-toggle="modal" data-target="#add">เพิ่ม</button>
    </div>

    <div role="tabpanel" class="tab-pane" id="daisy">
      @include('library.book.part.daisy',array('daisy'=>$daisy,'bid'=>$book['id']))
      <button class="addButton" onClick="add()" data-toggle="modal" data-target="#add">เพิ่ม</button>
    </div>

    <div role="tabpanel" class="tab-pane" id="cd">
      @include('library.book.part.cd',array('cd'=>$cd,'bid'=>$book['id']))
      <button class="addButton" onClick="add()" data-toggle="modal" data-target="#add">เพิ่ม</button>
    </div>

    <div role="tabpanel" class="tab-pane" id="dvd">
      @include('library.book.part.dvd',array('dvd'=>$dvd,'bid'=>$book['id']))
      <button class="addButton" onClick="add()" data-toggle="modal" data-target="#add">เพิ่ม</button>
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
          จำนวน: <input type="number" id="amount" value="1"/>
          <button onClick="add()" data-dismiss="modal">เพิ่ม</button>
        </div>
        <div class="modal-footer">
          footer
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
  </script>

  <script>

    var tabClicked = "braille";

    function tabSelect(tab){
      console.log(tab);
      console.log(tab.innerHTML.toLowerCase());
      tabClicked = tab.innerHTML.toLowerCase();
      if(tabClicked == "braille"){
        $(".addButton").attr('data-target', "");
        $(".addButton").attr('onClick', "add()");
      } else {
        $(".addButton").attr('data-target', "#add");
        $(".addButton").attr('onClick', "");
      }
    } 

    function add(){
      console.log($('#amount').val());
      var amount = $('#amount').val();

      console.log(amount);
      console.log(tabClicked);
      $.post( "{{ $book['id'] }}/" + tabClicked + "/add", {amount: amount}, function(result){
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
      }, 1500);
      myModal.data('hideInteval', id);
    });
  </script>
@stop
