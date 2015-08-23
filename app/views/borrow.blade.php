@extends('library.layout')
@section('head')
<title>ระบบยืมหนังสือ</title>
@stop
@section('body')


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
                    <th></th>
                  </tr>
                </thead>
                <tbody class = "table_fill">
                  <?php
                  $no=1;
                  ?>
                  <script>
                    var selectedMedia = new Array();
                    var selectedBook = new Array();
                    var part = 0;
                  </script>
                  @foreach ($borrow as $item)
                  <tr class="media-row" id="media-row_{{ $item['typeID']; }}">
                    <td>{{$no++}}</td>
                    <td>{{$item['title']}}</td>
                    <td>{{$item['typeID']}}</td>
                    <td>{{$item['type']}}</td>
                    <td><button type="button" class="btn btn-danger btn_delete" id="{{ $item['typeID'] }}">ลบ</button></td>
                  </tr>
                  <script>
                    part += {{$item['part']}};
                    selectedMedia['{{ $item['typeID']; }}'] = true;
                    selectedBook['{{ $item['book_id']; }}'] = (!selectedBook['{{ $item['book_id']; }}'] ? 1 : selectedBook['{{ $item['book_id']; }}'] += 1);
                  </script>
                  @endforeach
                </tbody>
              </table>
              <table class="table table-striped table-hover">
                <tbody class = "table_sum">
                  <tr>
                    <th>รวม</th>
                    <th id="book-amount"></th>
                    <th id="media-amount"></th>
                    <th id="part-amount"></th>
                  </tr>
                </tbody>
              </table>

            </div>
          </div>
          <div class="col-md-6">
            <div class="col-md-12">
              <div class = "row">
                <div class = "col-md-3" ><h4>ข้อมูลผู้ยืม</h4></div>
                <div class = "col-md-3">
                  <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#memberModal">
                    เลือกผู้ยืม
                  </button>
                </div>
              </div>
              <div class = "row">
                <div class = "well" id="member_data">
                  @if(isset($member))
                  ชื่อ   : <span id = "member_name_label">{{ $member->name }}</span><br/>
                  เบอร์โทร : <span id = "member_phone_label">{{ $member->phone_no }}</span>
                  @else
                  ชื่อ   : <span id = "member_name_label">ยังไม่ได้เลือก</span><br/>
                  เบอร์โทร : <span id = "member_phone_label">XX-XXXX-XXX</span>
                  @endif
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <h4>สรุป</h4>
              <div class ="well">
                <div class="form-inline">
                  <div class="form-group input-group">
                    <div class="input-group-addon">วันยืม : {{ date('d-m-').(date('Y') + 543); }}</div>
                    <div class="input-group-addon">วันคืน : </div>
                    <input type="text" class="form-control" name="" id="datepicker"/>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <a href="{{ url('/borrow/submit') }}" id="submit-media"><button type="button" class="btn btn-success pull-right">ทำรายการ</button></a>
              <!-- TODO add jquery for refresh here -->
              <a href="{{ url('/borrow/clear') }}"><button type="button" class="btn btn-danger pull-right del_btn">ล้าง</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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
          <!-- add by oat!-->
          <select name = "select_type" class="form-control" id = "select_type" role="menu">
            <option value = "all" selected id="select_all">ทั้งหมด</option>
            <option value = "avaiable" >ไม่ถูกยืม</option>
          </select>
          <button type="button" class="btn btn-primary book_search_btn">ค้นหา</button>
        </div>
        <div id="result">
        </div>

        <div hidden="hidden" id="not_found" class="alert alert-danger" role="alert">ไม่พบผลลัพธ์การค้นหา</div>
      </div>
      <div class="modal-footer">
        <label class="text-left" style="color:#ccc">*ตัวอักษรสีเทาคือถูกยืมแล้ว</label>
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">close</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกสมาชิก</h4>
      </div>
      <div class="modal-body">
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
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="notify">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header modal-notification" id="noti-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title modal-notifiation-title">การทำรายการยืมไม่สำเร็จ</h4>
      </div>
      <div class="modal-body">
        <ul id="notify-error">
        </ul>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="form_completed">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header modal-notification" id="complete-noti-header">
        <h4 class="modal-title modal-notifiation-title">การทำรายการเสร็จสมบูรณ์</h4>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@stop
@section('script')
@parent

<script type="text/javascript">
  var selectedMember = "{{ isset($member) }}";
  var amountOfMedia = "{{ count($borrow) }}";

  updateMediaAmount();

  $(function() {
  $("#datepicker").datepicker({
              language:'th-th',
              format: 'dd/mm/yyyy',
              isBuddhist: true
            });
  });

  $('#submit-media').click(function(event) {
    event.preventDefault();
    if(!selectedMember || amountOfMedia == 0 || !$('#datepicker').val()) {
      if(!selectedMember)
        $('#notify-error').append('<li>กรุณาเลือกผู้ยืม</li>');
      if(amountOfMedia == 0)
        $('#notify-error').append('<li>กรุณาเลือกสื่อ</li>');
      if(!$('#datepicker').val())
        $('#notify-error').append('<li>กรุณาเลือกวันคืนสื่อ</li>');
      $('#notify').modal('show');
    }
    else {
      $.ajax({
        type: "GET",
        url: "{{ url('borrow/submit') }}",
      }).done(function(data) {
        if(data == "completed") {
          clearData();
          $('#form_completed').modal('show');
          setTimeout(function() {$('#form_completed').modal('hide');}, 1500);
        }
      });
    }
  })

  $('#notify').on('hidden.bs.modal', function() {
   $('#notify-error').html('');
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
      data: {retdate: $('#datepicker').val()}
    }).done(function(data) {
      console.log('retdate change ='+$('#datepicker').val());
      // update retern date
    });
  });


  $('#searchModal').on('hidden.bs.modal', function() {
    $('#not_found').hide();
    $('#result').html('');
    $('#select_all').attr('selected', 'selected');
    $('#search-book').prop('value', '');
  });

  $('.book_search_btn').click(function(event){
  //$('#search-book').keyup(function(){
    $('#result').html('');
    if($('#search-book').val() != ''){
      $.get('{{ url("borrow/search") }}',
        {keyword: $('#search-book').val(), status:$('#select_type').val()},
        function(data){
          console.log(data);
          if(data != "") {
            $('#not_found').hide();
            $('#result').append('<table class="table table-striped table-hover result-list"><thead><tr class="warning"><th class="col-sm-3">รหัสสื่อ</th><th class="col-sm-5">ชื่อหนังสือ</th><th class="col-sm-2">ยืม</th><td hidden></td></tr></thead><tbody class = "search-table"></tbody></table>');
            addToList(data);
            console.log('add to list');
          }
          else {
            $('#not_found').slideDown(250);
            console.log('not add to list');
          }
        });
    }
    else {
      $('#not_found').slideDown(250);
    }
  });

  $("body").on("click", ".btn_delete", function() {
    var id = $(this).prop('id');
    var text = "{{ url('borrow/delete') }}/" + id;
    $.ajax({
      type: "POST",
      url: text,
    }).done(function(data) {
      console.log(data);
      if(data['status']) {
        $("#media-row_" + id).remove();
        selectedMedia[id] = false;
        selectedBook[data['book_id']] -= 1;

        if(!selectedBook[data['book_id']])
          delete selectedBook[data['book_id']];

        amountOfMedia--;
        part -= data['part'];
        updateMediaAmount();
      }
    });
  });

  $("body").on("click", ".book_choose", function(event){
    var id = $(this).prop('id');
    var isBorrowed = $(this).children('.isBorrowed').text();
    console.log(id);
    if(isBorrowed == "n") { //add by oat
      $.ajax({
        type: "GET",
        url: "{{ url('borrow/book') }}/" + id,
      }).done(function(data) {
        if(data['status']){
          var input_data = data['media'];
          var tr_table = $('<tr id="media-row_' + id + '"></tr>');
          $('#' + id + '.media_selected').show();
          tr_table.append('<td>'+input_data['no']+'</td>');
          tr_table.append('<td>'+input_data['title']+'</td>');
          tr_table.append('<td>'+input_data['typeID']+'</td>');
          tr_table.append('<td>'+input_data['type']+'</td>');
          tr_table.append('<td><button type="button" class="btn btn-danger btn_delete" id="' + id + '">ลบ</button></td>');
          $(".table_fill").append(tr_table); //or prepend
          selectedMedia[id] = true;
          amountOfMedia++;
          part += input_data['part'];
          selectedBook[input_data['book_id']] = (!selectedBook[input_data['book_id']] ? 1 : selectedBook[input_data['book_id']] += 1);
          updateMediaAmount();
        }
        });
    }
  });

  $('.del_btn').click(function(event) {
    event.preventDefault();
    clearData();
    $.ajax({
      type: "GET",
      url: "{{ url('/borrow/clear') }}",
    }).done(function(data) {
      console.log(data);
      clearData();
    });
  });

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
    selectedMember = true;
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

  function clearData() {
    amountOfMedia = 0;
    selectedMember = false;
    selectedMedia = new Array();
    selectedBook = new Array();
    part = 0;
    updateMediaAmount();
    $(".table_fill").text("");
    $('#datepicker').val("");
    $("#member_data").html('ชื่อ   : <span id = "member_name_label">ยังไม่ได้เลือก</span><br/>เบอร์โทร : <span id = "member_phone_label">XX-XXXX-XXX</span>');
  }

  function addToList(data){
    //console.log(typeof data);
    var jsonArr = jQuery.parseJSON(data);
    /*
    console.log(data);
    console.log(typeof jsonArr);
    console.log(jsonArr);
    console.log("****");
    console.log(jsonArr.length);
    console.log(jsonArr[0][0]);*/
    var media_amount = 0;
    for(var i=0; i<jsonArr.length; i++){
      //TODO when click same item should not add it to list
      for(var brailleIndex = 0; brailleIndex<jsonArr[i][0].length; brailleIndex++){
        if(jsonArr[i][0][brailleIndex].reserved == 1) {  //add by oat
          $('.search-table').append("<tr style='color:#ccc' class = \"book_choose\" id=" + jsonArr[i][0][brailleIndex].id + "> <td>" + jsonArr[i][0][brailleIndex].id + "</td>  <td>"+jsonArr[i].title +"</td> <td><img class='media_selected'  hidden id='" + jsonArr[i][0][brailleIndex].id + "' src='http://goo.gl/IPvYUj'></td><td class='isBorrowed' hidden>y</td></tr><br>");
        }
        else {
          $('.search-table').append("<tr class = \"book_choose\" id=" + jsonArr[i][0][brailleIndex].id + "> <td>" + jsonArr[i][0][brailleIndex].id + "</td>  <td>"+jsonArr[i].title +"</td> <td><img class='media_selected'  hidden id='" + jsonArr[i][0][brailleIndex].id + "' src='http://goo.gl/IPvYUj'></td><td class='isBorrowed' hidden>n</td></tr><br>");
        }
      }

    for(var cassetteIndex = 0; cassetteIndex<jsonArr[i][1].length; cassetteIndex++){
      if(jsonArr[i][1][cassetteIndex].reserved == 1) {
        $('.search-table').append("<tr style='color:#ccc' class = \"book_choose\" id=" + jsonArr[i][1][cassetteIndex].id + "> <td>" + jsonArr[i][1][cassetteIndex].id + "</td>  <td>"+jsonArr[i].title +"</td> <td><img class='media_selected' hidden id='" + jsonArr[i][1][cassetteIndex].id + "' src='http://goo.gl/IPvYUj'></td><td class='isBorrowed' hidden>y</tr><br>");
      }
      else {
        $('.search-table').append("<tr class = \"book_choose\" id=" + jsonArr[i][1][cassetteIndex].id + "> <td>" + jsonArr[i][1][cassetteIndex].id + "</td>  <td>"+jsonArr[i].title +"</td> <td><img class='media_selected' hidden id='" + jsonArr[i][1][cassetteIndex].id + "' src='http://goo.gl/IPvYUj'></td><td class='isBorrowed' hidden>n</td></tr><br>");
      }
     }

     for(var cdIndex = 0; cdIndex<jsonArr[i][2].length; cdIndex++){
      if(jsonArr[i][2][cdIndex].reserved == 1) {
          $('.search-table').append("<tr style='color:#ccc' class = \"book_choose\" id=" + jsonArr[i][2][cdIndex].id + "> <td>" + jsonArr[i][2][cdIndex].id + "</td>  <td>"+jsonArr[i].title +"</td> <td><img class='media_selected'  hidden id='" + jsonArr[i][2][cdIndex].id + "' src='http://goo.gl/IPvYUj'></td><td class='isBorrowed' hidden>y</td></tr><br>");
        }
      else {
          $('.search-table').append("<tr class = \"book_choose\" id=" + jsonArr[i][2][cdIndex].id + "> <td>" + jsonArr[i][2][cdIndex].id + "</td>  <td>"+jsonArr[i].title +"</td> <td><img class='media_selected'  hidden id='" + jsonArr[i][2][cdIndex].id + "' src='http://goo.gl/IPvYUj'></td><td class='isBorrowed' hidden>n</td></tr><br>");
      }
     }

     for(var daisyIndex = 0; daisyIndex<jsonArr[i][3].length; daisyIndex++){
      if(jsonArr[i][3][daisyIndex].reserved == 1) {
           $('.search-table').append("<tr style='color:#ccc' class = \"book_choose\" id=" + jsonArr[i][3][daisyIndex].id + "> <td>" + jsonArr[i][3][daisyIndex].id + "</td>  <td>"+jsonArr[i].title +"</td> <td><img class='media_selected'  hidden id='" + jsonArr[i][3][daisyIndex].id + "' src='http://goo.gl/IPvYUj'></td><td class='isBorrowed'>y</td></tr><br>");
      }
      else {
           $('.search-table').append("<tr class = \"book_choose\" id=" + jsonArr[i][3][daisyIndex].id + "> <td>" + jsonArr[i][3][daisyIndex].id + "</td>  <td>"+jsonArr[i].title +"</td> <td><img class='media_selected'  hidden id='" + jsonArr[i][3][daisyIndex].id + "' src='http://goo.gl/IPvYUj'></td><td class='isBorrowed' hidden>n</td></tr><br>");
      }
     }

     for(var dvdIndex = 0; dvdIndex<jsonArr[i][4].length; dvdIndex++){
      if(jsonArr[i][4][dvdIndex].reserved == 1) {
          $('.search-table').append("<tr style='color:#ccc' class = \"book_choose\" id=" + jsonArr[i][4][dvdIndex].id + "> <td>" + jsonArr[i][4][dvdIndex].id + "</td>  <td>"+jsonArr[i].title +"</td> <td><img class='media_selected'  hidden id='" + jsonArr[i][4][dvdIndex].id + "' src='http://goo.gl/IPvYUj'></td><td class='isBorrowed' hidden>y</td></tr><br>");
      }
      else {
          $('.search-table').append("<tr class = \"book_choose\" id=" + jsonArr[i][4][dvdIndex].id + "> <td>" + jsonArr[i][4][dvdIndex].id + "</td>  <td>"+jsonArr[i].title +"</td> <td><img class='media_selected'  hidden id='" + jsonArr[i][4][dvdIndex].id + "' src='http://goo.gl/IPvYUj'></td></tr><td class='isBorrowed' hidden>n</td><br>");
      }
     }
     media_amount += jsonArr[i][0].length + jsonArr[i][1].length + jsonArr[i][2].length + jsonArr[i][3].length + jsonArr[i][4].length;
   }

   if(media_amount == 0) {
    $('.result-list').remove();
    $('#not_found').slideDown(250);
    return;
  }
   for (var key in selectedMedia) {
        if (selectedMedia.hasOwnProperty(key)) {
          if(selectedMedia[key])
            $('#' + key + '.media_selected').show();
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
      $('#member-result').append("<tr class = 'select-member' ><td id = 'iden'>"+data[i].id+"</td><td id = 'name' > "+data[i].name+" </td><td id = 'gender'>"+data[i].gender+"</td></tr>");
    }
  });
});

function countObj(obj) {
  var count = 0;
  for (var k in obj) {
    if (obj.hasOwnProperty(k))
      count++;
  }
  return count;
}

function updateMediaAmount() {
  console.log('part is' + part);
  $('#book-amount').text(countObj(selectedBook) + ' เล่ม');
  $('#media-amount').text(amountOfMedia + ' ชุด');
  $('#part-amount').text(part + ' ชิ้น');
}

</script>
@stop
