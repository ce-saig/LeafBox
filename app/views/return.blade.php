@extends('library.layout')
@section('head')
<title>ระบบคืนหนังสือ</title>
@stop
@section('body')
<div class="container">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <span style="color:white;font-size: 24px">ระบบคืนหนังสือ</span>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-8">
          <div class="col-md-12">
            <div class="form-inline">
              <div class="form-group input-group">
                <div class="input-group-addon">ระบุรหัสของสื่อ</div>
                <input type="text" class="form-control" id="mid">
              </div>
              <button type="submit" class="btn btn-info btn-sm" id="add_btn">ค้นหาหนังสือ</button>
            </div>
            <br>
            <table class="table table-striped table-hover">
              <thead>
                <tr class="info">
                  <th>#</th>
                  <th>ชื่อหนังสือ</th>
                  <th>ID ของสื่อ</th>
                  <th>ชนิดสื่อ</th>
                  <th>วันที่ทำการยืม</th>
                  <th>วันกำหนดคืน</th>
                  <th></th>
                </tr>
              </thead>
              <tbody class = "table_fill">
                <?php
                $no=1;
                ?>
                <script>
                    var selectedBook = new Array();
                    var part = 0;
                  </script>
                @foreach ($list as $item)
                <tr id="media-row_{{ $item['id'] }}">
                  <td>{{$no++}}</td>
                  <td>{{$item['title']}}</td>
                  <td>{{$item['id']}}</td>
                  <td>{{$item['type']}}</td>
                  <td class="text-center">{{$item['date_borrowed']}}</td>
                  <td class="text-center">{{$item['due_date']}}</td>
                  <td><button type="button" class="btn btn-danger btn_delete" id="{{ $item['id'] }}">ลบ</button></td>
                </tr>
                <script>
                    part += {{$item['part']}};
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
        <div class="col-md-4">
          <div class="col-md-12">
            <div class = "row">
              <div class = "col-md-5" ><h4>ข้อมูลผู้ยืม</h4></div>&nbsp;
              <div class = "col-md-4">
                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#memberModal" style="margin-bottom: 5px;">
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
              <div class="form-inline form-group input-group input-group-addon">วันคืน : {{ date('Y-m-d') }}</div>
            </div>
          </div>
          <div class="col-md-12">
            <a href="/return/submit" id="submit-media"><button type="button" class="btn btn-success pull-right">คืน</button></a>
            <!-- TODO add jquery for refresh here -->
            <a href="/return/clear"><button type="button" class="btn btn-danger pull-right del_btn" style="margin-right:5px;">ล้าง</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="notify">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header modal-notification" id="noti-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title modal-notifiation-title">การทำรายการไม่สำเร็จ</h4>
      </div>
      <div class="modal-body">
        <ul id="notify-error">
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="form_completed">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header modal-notification" id="complete-noti-header">
        <h4 class="modal-title modal-notifiation-title">การทำรายการเสร็จสมบูรณ์</h4>
      </div>
    </div>
  </div>
</div>
@stop
@section('script')
@parent
<script type="text/javascript">
  var selectedMember = "{{ isset($member) }}";
  var amountOfMedia = "{{ count($list) }}";

  updateMediaAmount();

  if(!selectedMember) {
    $('#mid').prop('disabled', true).prop('placeholder', 'กรุณาเลือกผู้ยืม');
  }

  $('#notify').on('hidden.bs.modal', function() {
    $('#notify-error').html('');
  });

  $('.del_btn').click(function(event) {
    event.preventDefault();
    $(".table_fill").text("");
    $.ajax({
      type: "GET",
      url: "{{ url('/return/clear') }}",
    }).done(function(data) {
      console.log(data);
      clearData();
    });
  });

  $('#add_btn').click(function() {
    var text = $('#mid').val();
    console.log(text);
    if(!text && !selectedMember) {
      notifyUser('<li>กรุณาเลือกผู้ยืม</li><li>กรุณาพิมพ์รหัสสื่อที่ต้องการคืน<l/i>')
    }
    else if(!selectedMember)
      notifyUser('<li>กรุณาเลือกผู้ยืม</li>');
    else if(!text)
      notifyUser('<li>กรุณาพิมพ์รหัสสื่อที่ต้องการคืน</li>');
    else {
      $.ajax({
        type: "POST",
        url: "{{ url('return/add') }}",
        data: {mid:$('#mid').val()}
      }).done(function(data) {
        if(data['status'] == "success"){
          var input_data = data['media'];
          var tr_table = $('<tr id="media-row_' + input_data['id'] + '"></tr>');
          tr_table.append('<td>' + input_data['no'] + '</td>');
          tr_table.append('<td>' + input_data['title'] + '</td>');
          tr_table.append('<td>' + input_data['id'] + '</td>');
          tr_table.append('<td>' + input_data['type'] + '</td>');
          tr_table.append('<td class="text-center">' + input_data['date_borrowed'] + '</td');
          tr_table.append('<td class="text-center">' + input_data['due_date'] + '</td');
          tr_table.append('<td><button type="button" class="btn btn-danger btn_delete" id="' + input_data['id'] + '">ลบ</button></td>');
          $(".table_fill").append(tr_table);
          amountOfMedia++;
          part += input_data['part'];
          selectedBook[input_data['book_id']] = (!selectedBook[input_data['book_id']] ? 1 : selectedBook[input_data['book_id']] += 1);
          updateMediaAmount();
        }
        else {
          if(data['status'] == "not found")
            notifyUser('<li>รหัสสื่อไม่มีในรายการยืม</li>');
          else
            notifyUser('<li>สื่อได้ถูกเพิ่มในรายการเรียบร้อยแล้ว</li>');
        }
      });
}
});

$('.search-member-btn').click(function() {
  // AJAX for get member infomation
  $.ajax({
    type: "POST",
    url: "{{ url('return/member') }}",
    data: {member:$('#search-member').val()}
  }).done(function(data) {
    $('#member-result').empty();
    for(var i = 0;i < data.length; i++){
      console.log(data[i].name);
      $('#member-result').append("<tr class = 'select-member' ><td id = 'iden'>"+data[i].id+"</td><td id = 'name' >"+data[i].name+"</td><td id = 'gender'>"+data[i].gender+"</td></tr>")
    }
  });

});

$('#member-result').on('click', '.select-member', function(){
  selectedMember = true;
  var member_id = $(this).children('#iden').html();
  // AJAX for get info about member ,then show it !
  $.ajax({
    type: "GET",
    url: "{{ url('return/member/"+member_id+"') }}",
  }).done(function(data) {
    console.log(data);
    $('#member_name_label').html(data.name);
    $('#member_phone_label').html(data.phone_no);
    $('#memberModal').modal('toggle');
    $('#mid').prop('disabled', false).removeAttr('placeholder');
  });

  // AJAX for get borrowed media information
  var member_name = $(this).children('#name').html();
  $.ajax({
    type: "POST",
    url: "{{ url('return/member/borrowed') }}",
    data: {member:member_name} 
  }).done(function(data) {
    console.log(data);
    location.reload();
    /*for(var key in data["borrow"]){
      if(data["borrow"][key].length != 0){
        console.log("test" + data);
        for(var i in data["borrow"][key]){
          var type;
          // find first letter
          if(key === "cd"){
            type = 'Cd';
          }else{
            type = key[0].toUpperCase();
          }
          // get media type
          var input_data = key;
          // append table with new info
          console.log(data["borrow"][key][i]);
          var tr_table = $('<tr id="media-row_' + type + data["book"][key][i]['id'] + '"></tr>');
              tr_table.append('<td>' + amountOfMedia + '</td>');
              tr_table.append('<td>' + data["book"][key][i]['title'] + '</td>');
              tr_table.append('<td>' + data["borrow"][key][i]['id'] + '</td>');
              tr_table.append('<td>' + key + '</td>');
              tr_table.append('<td class="text-center">' + data["borrow"][key][i]['date_borrowed'] + '</td>');
              tr_table.append('<td class="text-center">' + data["borrow"][key][i]['date_returned'] + '</td>');
              tr_table.append('<td><button type="button" class="btn btn-danger btn_delete" id="'+ type + data["book"][key][i]['id'] + '">ลบ</button></td>');
              $(".table_fill").append(tr_table);
              // increase number of returned book 
              amountOfMedia++;
              part += parseInt(data['media'][key][i]['numpart']);

              selectedBook[data["borrow"][key][i]['book_id']] = (!selectedBook[data["borrow"][key][i]['book_id']] ? 1 : selectedBook[data["borrow"][key][i]['book_id']] += 1);
              
              updateMediaAmount();

              console.log("sb = " + selectedBook[data["borrow"][key][i]['book_id']]);
        }
      }
    }*/
  });
});

$('#submit-media').click(function(event) {
  event.preventDefault();
  console.log('return');
  if(!selectedMember || amountOfMedia == 0) {
    if(!selectedMember)
      $('#notify-error').append('<li>กรุณาเลือกผู้ยืม</li>');
    if(amountOfMedia == 0)
      $('#notify-error').append('<li>กรุณาเลือกสื่อที่จะคืน</li>');
    $('#notify').modal('show');
  }
  else {
    $.ajax({
      type: "POST",
      url: "{{ url('return/submit') }}",
    }).done(function(data) {
      console.log(data);
      if(data == "completed") {
        clearData();
        $('#form_completed').modal('show');
        setTimeout(function() {$('#form_completed').modal('hide');}, 1500);
      }
    });
  }
});

$("body").on("click", ".btn_delete", function() {
  var id = $(this).prop('id');
  var text = "{{ url('return/delete') }}/" + id;
  console.log(text);
  $.ajax({
    type: "POST",
    url: text,
  }).done(function(data) {
    console.log(data);
    if(data['status']) {
      $("#media-row_" + id).remove();
      selectedBook[data['book_id']] -= 1;

      if(!selectedBook[data['book_id']])
        delete selectedBook[data['book_id']];

      amountOfMedia--;
      part -= data['part'];
      updateMediaAmount();
    }
  });
});

function notifyUser(text)
{
  $('#notify-error').append(text);
  $('#notify').modal('show');
};

function clearData() {
  selectedMember = false;
  amountOfMedia = 0;
  selectedBook = new Array();
  part = 0;
  updateMediaAmount();
  $(".table_fill").text("");
  $("#member_data").html('ชื่อ   : <span id = "member_name_label">ยังไม่ได้เลือก</span><br/>เบอร์โทร : <span id = "member_phone_label">XX-XXXX-XXX</span>');
  $('#mid').prop('value', '').prop('disabled', true).prop('placeholder', 'กรุณาเลือกผู้ยืม');
};

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
