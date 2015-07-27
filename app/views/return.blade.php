@extends('library.layout')
@section('head')
<title>ระบบคืนหนังสือ</title>
@stop
@section('body')
<div class="container">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">ระบบคืนหนังสือ</h3>
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
              <button type="submit" class="btn btn-info" id="add_btn">เพิ่ม</button>
            </div>
            <br>
            <table class="table table-striped table-hover">
              <thead>
                <tr class="info">
                  <th>#</th>
                  <th>ชื่อหนังสือ</th>
                  <th>ID ของสื่อ</th>
                  <th>ชนิดสื่อ</th>
                  <th>วัน - เวลา ที่ทำการยืม</th>
                  <th></th>
                </tr>
              </thead>
              <tbody class = "table_fill">
                <?php
                $no=1;
                ?>
                @foreach ($list as $item)
                <tr id="media-row_{{ $item['id'] }}">
                  <td>{{$no++}}</td>
                  <td>{{$item['title']}}</td>
                  <td>{{$item['id']}}</td>
                  <td>{{$item['type']}}</td>
                  <td>{{$item['date_borrowed']}}</td>
                  <td><button type="button" class="btn btn-danger btn_delete" id="{{ $item['id'] }}">ลบ</button></td>
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
        <div class="col-md-4">
          <div class="col-md-12">
            <div class = "row">
              <div class = "col-md-4" ><h4>ข้อมูลผู้ยืม</h4></div>&nbsp;
              <div class = "col-md-4">
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
              <div class="form-inline form-group input-group input-group-addon">วันคืน : {{ date('d-m-').(date('Y') + 543); }}</div>
            </div>
          </div>
          <div class="col-md-12">
            <a href="/return/submit" id="submit-media"><button type="button" class="btn btn-success pull-right">คืน</button></a>
            <!-- TODO add jquery for refresh here -->
            <a href="/return/clear"><button type="button" class="btn btn-danger pull-right del_btn">ล้าง</button></a>
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
        console.log(data['media']);
        console.log(data['input']);
        console.log(data['status']);
        if(data['status'] == "success"){
          var input_data = data['media'];
          var tr_table = $('<tr id="media-row_' + input_data['id'] + '"></tr>');
          tr_table.append('<td>' + input_data['no'] + '</td>');
          tr_table.append('<td>' + input_data['title'] + '</td>');
          tr_table.append('<td>' + input_data['id'] + '</td>');
          tr_table.append('<td>' + input_data['type'] + '</td>');
          tr_table.append('<td>' + input_data['date_borrowed'] + '</td');
          tr_table.append('<td><button type="button" class="btn btn-danger btn_delete" id="' + input_data['id'] + '">ลบ</button></td>');
          $(".table_fill").append(tr_table);
          amountOfMedia++;
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
  $.ajax({
    type: "POST",
    url: "{{ url('return/member') }}",
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
    url: "{{ url('return/member/"+member_id+"') }}",
  }).done(function(data) {
    console.log(data);
    $('#member_name_label').html(data.name);
    $('#member_phone_label').html(data.phone_no);
    $('#memberModal').modal('toggle');
    $('#mid').prop('disabled', false).removeAttr('placeholder');
  });
});

$('#submit-media').click(function(event) {
  event.preventDefault();
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
      amountOfMedia--;
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
  $(".table_fill").text("");
  $("#member_data").html('ชื่อ   : <span id = "member_name_label">ยังไม่ได้เลือก</span><br/>เบอร์โทร : <span id = "member_phone_label">XX-XXXX-XXX</span>');
  $('#mid').prop('value', '').prop('disabled', true).prop('placeholder', 'กรุณาเลือกผู้ยืม');
};
</script>
@stop