@extends('library.layout')

@section('head')
<title>Leafbox :: Report Gen</title>
@stop

@section('body')

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Report Filter (Book,Part)</h3>
  </div>
  <div class="panel-body">

    <div class="row">
      <div class="col-md-12">
        <h4>ข้อมูลหนังสือ</h4>
      </div>
      <div class="col-md-12 checkbox">
        <div class="col-md-4">
          <label>
            <input type="checkbox" name="book-filter" value="title" class="book-checkbox"> ชื่อเรื่อง
          </label>
        </div>
        <div class="col-md-4">
          <label>
            <input type="checkbox" name="book-filter" value="author" class="book-checkbox"> ผู้แต่ง
          </label>
        </div>
        <div class="col-md-4">
          <label>
            <input type="checkbox" name="book-filter" value="translator" class="book-checkbox"> ผู้แปล
          </label>
        </div>
        <div class="col-md-4">
          <label>
            <input type="checkbox" name="book-filter" value="pub-year" class="book-checkbox"> ปีที่พิมพ์
          </label>
        </div> 

        <div class="col-md-4">
          <label>
            <input type="checkbox" name="book-filter" value="braille-prod" class="book-checkbox prod-status"> สถานะการผลิตเบรลล์
          </label>
        </div>

        <div class="col-md-4">
          <label>
            <input type="checkbox" name="book-filter" value="cassette-prod" class="book-checkbox prod-status"> สถานะการผลิตคาสเซ็ท
          </label>
        </div>

        <div class="col-md-4">
          <label>
            <input type="checkbox" name="book-filter" value="daisy-prod" class="book-checkbox prod-status"> สถานะการผลิตเดซี่
          </label>
        </div>

        <div class="col-md-4">
          <label>
            <input type="checkbox" name="book-filter" value="cd-prod" class="book-checkbox prod-status"> สถานะการผลิต CD
          </label>
        </div>

        <div class="col-md-4">
          <label>
            <input type="checkbox" name="book-filter" value="dvd-prod" class="book-checkbox prod-status"> สถานะการผลิต DVD
          </label>
        </div>
      </div>
    </div>

    <div class="row">
        <div class="col-md-12 well operator-book">
          
        </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <h4>ข้อมูลสื่อ</h4>
      </div>
      <div class="col-md-12 checkbox">
        <div class="col-md-6">
          <label>
            <input type="checkbox" name="media-filter" value="braille" class="media-checkbox"> เบรลล์
          </label>
        </div>
        <div class="col-md-6">
          <label>
            <input type="checkbox" name="media-filter" value="cassette" class="media-checkbox"> คาสเซ็ท
          </label>
        </div>
        <div class="col-md-6">
          <label>
            <input type="checkbox" name="media-filter" value="daisy" class="media-checkbox"> เดซี่
          </label>
        </div>
        <div class="col-md-6">
          <label>
            <input type="checkbox" name="media-filter" value="cd" class="media-checkbox"> CD
          </label>
        </div>
        <div class="col-md-6">
          <label>
            <input type="checkbox" name="media-filter" value="dvd" class="media-checkbox"> DVD
          </label>
        </div>
      </div>
    </div>

    <div class="row">
        <div class="col-md-12 well operator-media">
          
        </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <h4>ผลลัพธ์ที่จะแสดง</h4>
      </div>
      <div class="col-md-12 checkbox">

        <div class="col-md-4">
          <label>
            <input type="checkbox" name="result-column-filter" value="id" class="result-checkbox"> ทะเบียนหนังสือตาดี
          </label>
        </div>
        <div class="col-md-4">
          <label>
            <input type="checkbox" name="result-column-filter" value="title" class="result-checkbox"> เรื่อง
          </label>
        </div>

        <div class="col-md-4">
          <label>
            <input type="checkbox" name="result-column-filter" value="author" class="result-checkbox"> ผู้แต่ง
          </label>
        </div>
        <div class="col-md-4">
          <label>
            <input type="checkbox" name="result-column-filter" value="author" class="result-checkbox"> ผู้แปล
          </label>
        </div>
        <div class="col-md-4">
          <label>
            <input type="checkbox" name="result-column-filter" value="pub-year" class="result-checkbox"> ปีที่พิมพ์
          </label>
        </div>
        <div class="col-md-4">
          <label>
            <input type="checkbox" name="result-column-filter" value="braille-prod" class="result-checkbox"> สถานะการผลิตเบรลล์
          </label>
        </div>
        <div class="col-md-4">
          <label>
            <input type="checkbox" name="result-column-filter" value="cassette-prod" class="result-checkbox"> สถานะการผลิตคาสเซ็ท
          </label>
        </div>
        <div class="col-md-4">
          <label>
            <input type="checkbox" name="result-column-filter" value="daisy-prod" class="result-checkbox"> สถานะการผลิตเดซี่
          </label>
        </div>
        <div class="col-md-4">
          <label>
            <input type="checkbox" name="result-column-filter" value="cd-prod" class="result-checkbox"> สถานะการผลิต CD
          </label>
        </div>
        <div class="col-md-4">
          <label>
            <input type="checkbox" name="result-column-filter" value="dvd-prod" class="result-checkbox"> สถานะการผลิต DVD
          </label>
        </div>

        <div class="col-md-offset-10 col-md-2">
          <button type="button" class="btn btn-success">Get report</button>
        </div>
      </div>
      <div class="operator-answer">

      </div>
    </div>
  </div>
</div>



<h2>Old menu</h2>
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Book</h3>
  </div>
  <div class="panel-body">
    <ul class="list-group">
      <li class="list-group-item">Book 1</li>
      <li class="list-group-item">Book 2</li>
      <li class="list-group-item">Book 3</li>
      <li class="list-group-item">Book 4</li>
    </ul>
  </div>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Borrow</h3>
  </div>
  <div class="panel-body">
    <ul class="list-group">
      <li class="list-group-item">Borrow 1</li>
      <li class="list-group-item">Borrow 2</li>
      <li class="list-group-item">Borrow 3</li>
      <li class="list-group-item">Borrow 4</li>
    </ul>
  </div>
</div>


@stop
@section('script')
@parent
<script type="text/javascript">

  function book_filter (target_div,id_val,filter_type) {
    if ($.inArray("prod-status", filter_type)!=-1){ // For Prod status filter
      options_array=["normal","broken","repair"];
      operation_add(target_div,id_val,options_array,false)
    }else{ // Normal filter
      options_array=["contain","match",">","<","="];
      operation_add(target_div,id_val,options_array,true)
    }
  }

  function operation_add (target_div,id_val,options_array,have_input) {
    var col_operator = $("<div class=\"col-md-2\"></div>");
    var col_input = $("<div class=\"col-md-2\"></div>");
    var col_name = $("<div class=\"col-md-2\"></div>");
    var row = $("<div id = \""+id_val+"\"></div>"); //class=\"row\"
    var select = $("<select class=\"form-control\"></select>");

    // TODO: Implement For loop create option
    var option = [];
    option[0] = $("<option value=\"0\">contain</option>");
    option[1] = $("<option value=\"1\">match</option>");
    option[2] = $("<option value=\"2\">></option>");
    option[3] = $("<option value=\"3\"><</option>");
    option[4] = $("<option value=\"4\">=</option>");
    var input = $("<input class=\"form-control\" type=\"text\"></input>");
    col_name.html(id_val);
    col_operator.append(select.append(option));
    col_input.append(input);
    row.append(col_name);
    row.append(col_operator);
    if(have_input){
      row.append(col_input);
    }
    $(target_div).append(row);
  }

  $(document).ready(function(){
    $(".book-checkbox").change(function(){  
      if($(this).is(":checked")) {
        var id_val = $(this).val();
        var cb_class="" // TODO:Get $(this) class
        console.log(id_val);
        book_filter(".operator-book",id_val,cb_class)
      }
      else{
        $("#"+$(this).val()).remove();
      }
    });
});
</script>
@stop
