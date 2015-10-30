@extends('library.layout')

@section('head')
<title>Leafbox :: Report Gen</title>
@stop

@section('body')
<div class="panel panel-default">
  <div class="panel-body">

    <div class="row">
      <div class="col-md-12">
        <h1>Filter</h1>
      </div>
      <div class="col-md-12">
        <div class="col-md-12">
          <h2>Book</h2>
        </div>
        <div class="checkbox">
          <div class="col-md-6">
            <label>
              <input type="checkbox" name="a" value="a" class="book-checkbox"> A
            </label>
          </div>
          <div class="col-md-6">
            <label>
              <input type="checkbox" name="a" value="b" class="book-checkbox"> B
            </label>
          </div>
          <div class="col-md-6">
            <label>
              <input type="checkbox" name="a" value="c" class="book-checkbox"> C
            </label>
          </div>
          <div class="col-md-6">
            <label>
              <input type="checkbox" name="a" value="d" class="book-checkbox"> D
            </label>
          </div> 
          <div class="col-md-6">
            <label>
              <input type="checkbox" name="a" value="e" class="book-checkbox"> E
            </label>
          </div>
          <div class="col-md-6">
            <label>
              <input type="checkbox" name="a" value="f" class="book-checkbox"> F
            </label>
          </div>
        </div>
        <div class="operator-book">

        </div>
      </div>
      
      <div class="col-md-12">
        <div class="col-md-12">
          <h2>Media</h2>
        </div>
        <div class="checkbox">
          <div class="col-md-6">
            <label>
              <input type="checkbox" name="b" value="g" class="media-checkbox"> GG
            </label>
          </div>
          <div class="col-md-6">
            <label>
              <input type="checkbox" name="b" value="h"  class="media-checkbox"> GG
            </label>
          </div>
          <div class="col-md-6">
            <label>
              <input type="checkbox" name="b" value="i" class="media-checkbox"> WP
            </label>
          </div>
          <div class="col-md-6">
            <label>
              <input type="checkbox" name="b" value="j" class="media-checkbox"> WP
            </label>
          </div>
        </div>
        <div class="operator-media">

        </div>
      </div>
      
      <div class="col-md-12">
        <div class="col-md-12">
          <h2>Answer</h2>
        </div>
        <div class="checkbox">
          <div class="col-md-4">
            <label>
              <input type="checkbox" name="c" value="k" class="answer-checkbox"> K
            </label>
          </div>
          <div class="col-md-4">
            <label>
              <input type="checkbox"name="c" value="l" class="answer-checkbox"> L
            </label>
          </div>
          <div class="col-md-4">
            <label>
              <input type="checkbox" name="c" value="m" class="answer-checkbox"> M
            </label>
          </div>
          <div class="col-md-4">
            <label>
              <input type="checkbox" name="c" value="n" class="answer-checkbox"> N
            </label>
          </div>
          <div class="col-md-4">
            <label>
              <input type="checkbox" name="c" value="o" class="answer-checkbox"> O
            </label>
          </div>
          <div class="col-md-4">
            <label>
              <input type="checkbox" name="c" value="p" class="answer-checkbox"> P
            </label>
          </div>
          <div class="col-md-offset-10 col-md-2">
            <button type="button" class="btn btn-success">Find</button>
          </div>
        </div>
        <div class="operator-answer">

        </div>
      </div>
    </div>
  </div>
</div>
  <script type="text/javascript">
      $(document).ready(function(){
        $(".book-checkbox").change(function(){  
            if($(this).is(":checked")) {
              var value = $(this).val();
              console.log(value);
              var col5_1 = $("<div class=\"col-md-5\"></div>");
              var col5_2 = $("<div class=\"col-md-5\"></div>");
              var col2 = $("<div class=\"col-md-2\"></div>");
              var row = $("<div class=\"row\" id = \""+value+"\"></div>");
              var select = $("<select class=\"form-control\"></select>");
              var option = [];
              option[0] = $("<option value=\"0\">contain</option>");
              option[1] = $("<option value=\"1\">match</option>");
              option[2] = $("<option value=\"2\">></option>");
              option[3] = $("<option value=\"3\"><</option>");
              option[4] = $("<option value=\"4\">=</option>");
              var input = $("<input class=\"form-control\" type=\"text\"></input>");
              col2.html(value);
              col5_1.append(select.append(option));
              col5_2.append(input);
              row.append(col2);
              row.append(col5_1);
              row.append(col5_2);
              $(".operator-book").append(row);
            }
            else{
              $("#"+$(this).val()).remove();
            }
          });
      });
    </script>


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
<script>
</script>
@stop
