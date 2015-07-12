@extends('library.layout')
@section('head')
<title>ระบบยืมหนังสือ</title>
@stop
@section('body')

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<div class="container">
  <div class = "row">
    <div class = "col-md-12">
         <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">ระบบยืมหนังสือ</h3>
            </div>
            <div class="panel-body">

              <div class="row">
                <div class="col-md-6">
                  <div class="col-md-12">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#searchModal">
                      ค้นหาหนังสือ
                    </button>
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr class="info">
                          <th>#</th>
                          <th>ชื่อหนังสือ</th>
                          <th>ID ของสื่อ</th>
                          <th>ชนิดสื่อ</th>
                        </tr>
                      </thead>
                      <tbody class = "table_fill">
                        <?php
                          $no=1;
                        ?>
                        @foreach ($borrow as $item)
                          <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item['title']}}</td>
                            <td>{{$item['id']}}</td>
                            <td>{{$item['type']}}</td>
                          </tr>
                        @endforeach

                      </tbody>
                    </table>
                    <table class="table table-striped table-hover">
                      <tbody class = "table_sum">
                      <tr>
                          <th>รวม</th>
                          <th>X เล่ม</th>
                          <th>Y ชุด</th>
                          <th>Z ชิ้น</th>
                        </tr>
                      </tbody>
                    </table>

                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col-md-12">
                    <div class = "row">
                      <div class = "col-md-3" ><h4>ข้อมูลผู้ยืม</h4></div>
                      <div class = "col-md-2">
                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#memberModal">
                          เลือกผู้ยืม
                        </button>
                      </div>
                    </div>
                    <div class = "row">
                      <div class = "well">
                      ชื่อ : <span id = "member_name_label">ยังไม่ได้เลือก</span><br/>
                    เบอร์โทร : <span id = "member_phone_label">XX-XXXX-XXX</span>
                    </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <h4>สรุป</h4>
                    <div class ="well">
                      <div class="form-inline">
                        <div class="form-group input-group">
                          <div class="input-group-addon">วันยืม : {{ date('d-m-Y '); }}</div>
                          <div class="input-group-addon">วันคืน : </div>
                          <input type="text" class="form-control" name="" id="datepicker"/>         
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <a href="{{ url('/borrow/submit') }}"><button type="button" class="btn btn-success pull-right">ทำรายการ</button></a>
                    <!-- TODO add jquery for refresh here -->
                    <a href="{{ url('/borrow/clear') }}"><button type="button" class="btn btn-danger pull-right del_btn">ล้าง</button></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
  </div>
  <div class = "col-md-3">
    <a href = "{{ url('/') }}" class = "btn btn-lg btn-warning revous">กลับหน้าแรก</a>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกหนังสือ</h4>
      </div>
      <div class="modal-body">
        <div class="form-inline">
          <div class="form-group input-group">
            <div class="input-group-addon">ค้นหาหนังสือ</div>
            <input type="text" class="form-control" name="" id="search-book"/>         
          </div>
          <button type="button" class="btn btn-primary book_search_btn">ค้นหา</button>
        </div>
          <ul id="result">
          </ul>
        
          <div hidden="hidden" id="not_found" class="alert alert-danger" role="alert">ไม่พบผลลัพธ์การค้นหา</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกสมาชิก</h4>
      </div>
      <div class="modal-body">
        //Need to limit number of out put item<br>
          <div class="form-inline">
            <div class="form-group input-group">
              <div class="input-group-addon">ค้นหารายชื่อ</div>
              <input type="text" class="form-control" name="" id="search-member" placeholder="ชื่อ"/>         
            </div>
           <button type="button" class="btn btn-primary search-member-btn">ค้นหา</button>
          </div>

        <table id="member-result" class = "table table-hover">
        <tr>
          <td>ชื่อ</td><td>เพศ</td>
        </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@stop
@section('script')
@parent

<script type="text/javascript">
  
  $(function() {
    $( "#datepicker" ).datepicker();
  });

  $('#search-book').on('input propertychange paste', function() {
    if($('#search-book').val() == '') {
      $('#not_found').fadeOut();
      $('#result').html('');
    }
  })

  $("#datepicker").on("change", "", function(event){
    $.ajax({
      type: "POST",
      url: "{{ url('/borrow/retdate') }}",
      data: {retdate:$('#datepicker').val()}
    }).done(function(data) {
      console.log('retdate change ='+$('#datepicker').val());
      // update retern date
    });
  });


  $('#searchModal').on('hidden.bs.modal', function() {
    $('#not_found').hide();
  });

  $('.book_search_btn').click(function(event){
  //$('#search-book').keyup(function(){
    $('#result').html('');
    if($('#search-book').val() != ''){
      $.get('{{ url("borrow/search") }}',
        {keyword: $('#search-book').val()},
        function(data){
          //console.log(data);
          if(data != ""){
            addToList(data);
            $('#not_found').hide();
          }
          else {
            //$('#result').prepend('<td>no book found!!</td>');
            $('#not_found').slideDown(250);
          }
        });
    }
    else {
      $('#not_found').slideDown(250);
    }
  });

  $("body").on("click", ".book_choose", function(event){
      event.preventDefault();
      var text = $(this).prop('href');
        console.log(text);
        $.ajax({
          type: "GET",
          url: text,
        }).done(function(data) {
          if(data['status']){
            var input_data = data['media'];
            var tr_table = $('<tr></tr>');
            tr_table.append('<td>'+input_data['no']+'</td>');
            tr_table.append('<td>'+input_data['title']+'</td>');
            tr_table.append('<td>'+input_data['id']+'</td>');
            tr_table.append('<td>'+input_data['type']+'</td>');
            $(".table_fill").append(tr_table); //or prepend
          }
        });
   });

  $('.del_btn').click(function(event) {
    event.preventDefault();
    $(".table_fill").text("");
    $.ajax({
          type: "GET",
          url: "{{ url('/borrow/clear') }}",
        }).done(function(data) {
          console.log(data);
          //do before clear
        });

  });

  



  function addToList(data){
    //console.log('addToList');
    //console.log(typeof data);
    var jsonArr = jQuery.parseJSON(data);
    /*
    console.log(data);
    console.log(typeof jsonArr);
    console.log(jsonArr);
    console.log("****");
    console.log(jsonArr.length);
    console.log(jsonArr[0][0]);*/

    for(var i=0; i<jsonArr.length; i++){
      //TODO when click same item should not add it to list
        //console.log(jsonArr[0][0].length);
        for(var brailleIndex = 0; brailleIndex<jsonArr[i][0].length; brailleIndex++){
          $('#result').append("<a class = \"book_choose\" href=\"{{ url('/borrow/book/"+jsonArr[i][0][brailleIndex].id+"') }}\"> <b>รหัส:</b> " + jsonArr[i][0][brailleIndex].id + " <b>ชื่อหนังสือ:</b>"+jsonArr[i].title +"</a><br>").hide().slideDown(200);
        }

        for(var cassetteIndex = 0; cassetteIndex<jsonArr[i][1].length; cassetteIndex++){
          $('#result').append("<a class = \"book_choose\" href=\"{{ url('/borrow/book/"+jsonArr[i][1][cassetteIndex].id+"') }}\"><b>รหัส:</b> " + jsonArr[i][1][cassetteIndex].id + " <b>ชื่อหนังสือ:</b>"+jsonArr[i].title +"</a><br>").hide().slideDown(200);
        }

        for(var cdIndex = 0; cdIndex<jsonArr[i][2].length; cdIndex++){
          $('#result').append("<a class = \"book_choose\" href=\"{{ url('/borrow/book/"+jsonArr[i][2][cdIndex].id+"') }}\"><b>รหัส:</b> " + jsonArr[i][2][cdIndex].id + " <b>ชื่อหนังสือ:</b>"+jsonArr[i].title +"</a><br>").hide().slideDown(200);
        }

        for(var daisyIndex = 0; daisyIndex<jsonArr[i][3].length; daisyIndex++){
          $('#result').append("<a class = \"book_choose\" href=\"{{ url('/borrow/book/"+jsonArr[i][3][daisyIndex].id+"') }}\"><b>รหัส:</b> " + jsonArr[i][3][daisyIndex].id + " <b>ชื่อหนังสือ:</b>"+jsonArr[i].title +"</a><br>").hide().slideDown(200);
        }

        for(var dvdIndex = 0; dvdIndex<jsonArr[i][4].length; dvdIndex++){
          $('#result').append("<a class = \"book_choose\" href=\"{{ url('/borrow/book/"+jsonArr[i][4][dvdIndex].id+"') }}\"><b>รหัส:</b> " + jsonArr[i][4][dvdIndex].id + " <b>ชื่อหนังสือ:</b>"+jsonArr[i].title +"</a><br>").hide().slideDown(200);
        }
      }
    }

    $('.search-member-btn').click(function() {
        $.ajax({
          type: "POST",
          url: "{{ url('borrow/member') }}",
          data: {member:$('#search-member').val()}
        }).done(function(data) {
          $('#member-result').empty();
          for(var i = 0;i < data.length; i++){
            console.log(data[i].name);
            $('#member-result').append("<tr class = 'select-member' ><td id = 'iden'>"+data[i].id+"</td><td id = 'name' > "+data[i].name+" </td><td id = 'gender'>"+data[i].gender+"</td></tr>")
          }
        });
    });

    $('#member-result').on('click', '.select-member', function(){
    var member_id = $(this).children('#iden').html();
      $.ajax({
        type: "GET",
        url: "{{ url('borrow/member/"+member_id+"') }}",
      }).done(function(data) {

        console.log(data);
        $('#member_name_label').html(data.name);
        $('#member_phone_label').html(data.phone_no);
        $('#memberModal').modal('toggle');
      });

    });



  </script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  @stop
