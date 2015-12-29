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
    console.log(data);
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
    first_row.append("<th>media id</th><th>ตอนที่</th><th>ชนิดสื่อ</th><th>สถานะสื่อ</th>")
    $(target_div).append(first_row);
  }

  function addTableData(target_div,data,col) {
    for(var item = 0;item < data.length;item++) {
      var row = $("<tr></tr>");
      var haveMedia = false;
      for(var i = 0;i < col.length;i++) {
        var col_data = $("<td></td>");
        if(col[i] == "bm_status" || col[i] == "setcs_status" || col[i] == "setds_status" || col[i] == "setcd_status" || col[i] == "setdvd_status") {
          col_data.html(toThaiStatus(data[item][col[i]]));
        }
        else {
          if(data[item][col[i]] != "") {
            col_data.html(data[item][col[i]]);
          }
          else {
            col_data.html("-");
          }
        }
        row.append(col_data);
      }

      for(var br = 0;br < data[item]["braille_prod"].length;br++) {
        var row_in_media = row.clone();
        //console.log("media");
        //console.log(row_in_media);
        var col_data = $("<td>"+data[item]["braille_prod"][br]["braille_id"]+"</td><td>"+data[item]["braille_prod"][br]["part"]+"</td><td>เบรลล์</td><td>"+toThaiMediaStatus(data[item]["braille_prod"][br]["status"])+"</td>");
        row_in_media.append(col_data);
        $(target_div).append(row_in_media);
        if(haveMedia != true) {
          haveMedia = true;
        }
      }

      //console.log("cassette = "+data[item]["cassette_prod"].length);
      for(var cs = 0;cs < data[item]["cassette_prod"].length;cs++) {
        var row_in_media = row.clone();;
        var col_data = $("<td>"+data[item]["cassette_prod"][cs]["cassette_id"]+"</td><td>"+data[item]["cassette_prod"][cs]["part"]+"</td><td>คาสเซ็ท</td><td>"+toThaiMediaStatus(data[item]["cassette_prod"][cs]["status"])+"</td>");
        row_in_media.append(col_data);
        $(target_div).append(row_in_media);
        if(haveMedia != true) {
          haveMedia = true;
        }
      }

      //console.log("daisy = "+data[item]["daisy_prod"].length);
      for(var ds = 0;ds < data[item]["daisy_prod"].length;ds++) {
        var row_in_media = row.clone();
        var col_data = $("<td>"+data[item]["daisy_prod"][ds]["daisy_id"]+"</td><td>"+data[item]["daisy_prod"][ds]["part"]+"</td><td>เดซี่</td><td>"+toThaiMediaStatus(data[item]["daisy_prod"][ds]["status"])+"</td>");
        row_in_media.append(col_data);
        $(target_div).append(row_in_media);
        if(haveMedia != true) {
          haveMedia = true;
        }
      }

      //console.log("cd = "+data[item]["cd_prod"].length);
      for(var cd = 0;cd < data[item]["cd_prod"].length;cd++) {
        var row_in_media = row.clone();
        var col_data = $("<td>"+data[item]["cd_prod"][cd]["cd_id"]+"</td><td>"+data[item]["cd_prod"][cd]["part"]+"</td><td>CD</td><td>"+toThaiMediaStatus(data[item]["cd_prod"][cd]["status"])+"</td>");
        row_in_media.append(col_data);
        $(target_div).append(row_in_media);
        if(haveMedia != true) {
          haveMedia = true;
        }
      }
      
      //console.log("dvd = "+data[item]["dvd_prod"].length);
      for(var dvd = 0;dvd < data[item]["dvd_prod"].length;dvd++) {
        var row_in_media = row.clone();
        var col_data = $("<td>"+data[item]["dvd_prod"][dvd]["dvd_id"]+"</td><td>"+data[item]["dvd_prod"][dvd]["part"]+"</td><td>DVD</td><td>"+toThaiMediaStatus(data[item]["dvd_prod"][dvd]["status"])+"</td>");
        row_in_media.append(col_data);
        $(target_div).append(row_in_media);
        if(haveMedia != true) {
          haveMedia = true;
        }
      }
      if(haveMedia == false) {
        row.append("<td>-</td><td>-</td><td>-</td><td>-</td>")
        $(target_div).append(row);
      }
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

  function toThaiMediaStatus(media) {
    if(media == 0) {
      return "ปกติ";
    }
    else if(media == 1) {
      return "เสีย";
    }
    else if(media == 2) {
      return "ซ่อม";
    }
  }
</script>
@stop
