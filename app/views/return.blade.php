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
        <div class="col-md-6">
          <div class="col-md-12">
            <label>ระบุรหัสของสื่อ</label>
            <input type="textbox" name="mid" id="mid">
            <input type="button" value="Add" id="add_btn">
            <br>
            //TODO Show list from session when refresh page
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
                @foreach ($list as $item)
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
            <h4>ข้อมูลผู้ยืม</h4>
            ชื่อ : XXX
            เบอร์โทร : XX-XXXX-XXX
            <br>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#memberModal">
              เลือกผู้ยืม
            </button>
          </div>
          <div class="col-md-12">
            <h4>สรุป</h4>
            วันยืม dd-mm-yyyy
            วันคือ dd-mm-yyyy
          </div>
          <div class="col-md-12">
            <a href="/return/submit"><button type="button" class="btn btn-success pull-right">คืน</button></a>
            <!-- TODO add jquery for refresh here -->
            <a href="/return/clear"><button type="button" class="btn btn-danger pull-right del_btn">ล้าง</button></a>
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

<div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">เลือกสมาชิก</h4>
      </div>
      <div class="modal-body">
        //Need to limit number of out put item<br>
        ชื่อ
        <input type="text" name="" id="search-member"/><button class = "btn btn-default search-member-btn">ค้นหา</button>
        <table id="member-result" class = "table">
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

  $('#add_btn').click(function() {
    $.ajax({
      type: "POST",
      url: "{{ url('return/add') }}",
      data: {mid:$('#mid').val()}
    }).done(function(data) {
          console.log(data['media']);
          if(data['status']){
            var input_data = data['media'];
            var tr_table = $('<tr></tr>');
            tr_table.append('<td>'+input_data['no']+'</td>');
            tr_table.append('<td>'+input_data['title']+'</td>');
            tr_table.append('<td>'+input_data['id']+'</td>');
            tr_table.append('<td>'+input_data['type']+'</td>');
            $(".table_fill").append(tr_table);
          }
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
            $('#member-result').append("<tr><td><a href=\"/borrow/member/"+data[i].id+"\"> "+data[i].name+"</a></td><td>"+data[i].gender+"</td></tr>")
          }
        });
    });

</script>
@stop
