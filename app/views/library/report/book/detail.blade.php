@extends('library.layout')

@section('head')
<title>Leafbox :: Report - Book - Detail</title>
@stop

@section('body')
<h3>Book Detail</h3>
<div class="well">
  <table class="table table-bordered">

  </table>
</div>
<form action="{{ url('/report/csv/download') }}" method="get"> 
  <div class="col-md-offset-10 col-md-2">
   <button type="submit" class="btn btn-success download">Download</button>
 </div>
</form>
@stop
@section('script')
@parent
<script>
  $(document).ready(function(){
    var data = {{json_encode($data)}};
    var col = {{json_encode($col)}}
    addTableTopic('.table',col);
    addTableData('.table',data,col);
  });

  function addTableTopic(target_div,col) {
    var first_row = $("<tr></tr>");
    for(var i = 0;i < col.length;i++) {
      var topic = $("<th></th>");
      topic.html(toThaiTopic(col[i]));
      first_row.append(topic);
    }
    $(target_div).append(first_row);
  }

  function addTableData(target_div,data,col) {
    for(var item = 0;item < data.length;item++) {
      var row = $("<tr></tr>");
      for(var i = 0;i < col.length;i++) {
        var col_data = $("<td></td>");
        if(col[i] == "bm_status" || col[i] == "setcs_status" || col[i] == "setds_status" || col[i] == "setcd_status" || col[i] == "setdvd_status") {
          col_data.html(toThaiStatus(data[item][col[i]]));
        }
        else {
          col_data.html(data[item][col[i]]);
        }
        row.append(col_data);
      }
      $(target_div).append(row);
    }
  }

  function toThaiTopic(col) {
    if(col == "title") {
      return "ชื่อเรื่อง";
    }
    else if(col == "author") {
      return "ชื่อผู้แต่ง";
    }
    else if(col == "translate") {
      return "ชื่อผู้แปล";
    }
    else if(col == "pub_year") {
      return "ปีที่พิมพ์";
    }
    else if(col == "bm_status") {
      return "สถานะการผลิตเบรลล์";
    }
    else if(col == "setcs_status") {
      return "สถานะการผลิตคาสเซ็ท";
    }
    else if(col == "setds_status") {
      return "สถานะการผลิตเดซี่";
    }
    else if(col == "setcd_status") {
      return "สถานะการผลิต CD";
    }
    else if(col == "setdvd_status") {
      return "สถานะการผลิต DVD";
    }
    else {
      return col;
    }
  }

  function toThaiStatus(status) {
    if(status == 0) {
      return "ไม่ผลิต";
    }
    else if(status == 1) {
      return "ผลิต";
    }
    else if(status == 2) {
      return "จองอ่าน";
    }
    else if(status == 3) {
      return "กำลังผลิต";
    } 
  }

  $('#download').click(function() {
    
  });
</script>
@stop
