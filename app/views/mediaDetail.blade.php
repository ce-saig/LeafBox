@extends('library.layout')

@section('head')
  <title> Book {{ $bookId }}</title>
@stop

@section('body')

<h1> Book {{ $bookId }}</h1> 

<button onclick="tabClick(this)">braille</button>
<button onclick="tabClick(this)">cassette</button>
<button onclick="tabClick(this)">daisy</button>
<button onclick="tabClick(this)">cd</button>
<button onclick="tabClick(this)">dvd</button>

<br/><br/>

<button data-toggle="modal" data-target="" id="addButton" onClick="add()">add</button>

<div class="modal fade" id="add">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
          <h4 class="modal-title">เพิ่มลงตะกร้า</h4>
        </div>
        <div class="modal-body">
          จำนวน: <input type="number" id="amount" value="1"/>
          <button onClick="add()">เพิ่ม</button>
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
        <div class="modal-footer">
          footer
        </div>
      </div>
    </div>
</div>
@stop
@section('script')
  @parent
  <script type="text/javascript" charset="utf-8">

    var tabClicked = "braille";
    function tabClick(tab){
      console.log(tab);
      console.log(tab.innerHTML);
      tabClicked = tab.innerHTML;
      if(tabClicked == "braille"){
        $("#addButton").attr('data-target', "");
        $("#addButton").attr('onClick', "add()");
      } else {
        $("#addButton").attr('data-target', "#add");
        $("#addButton").attr('onClick', "");
      }
    } 

    function add(){
      console.log($('#amount').val());
      var amount = $('#amount').val();

      console.log(amount);
      console.log(tabClicked);
      $.post( "{{ $bookId }}/" + tabClicked + "/add", {amount: amount}, function(result){
        console.log(result);
        //alert(result);
        //console.log("eiei");
        $('#success').modal('show');
      });
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
