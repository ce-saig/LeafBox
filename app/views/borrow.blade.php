@extends('library.layout')
@section('head')
<title>ระบบยืมหนังสือ</title>
@stop
@section('body')
<div class="container">
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
              <tbody>
                <tr>
                  <td>...</td>
                  <td>...</td>
                  <td>...</td>
                  <td>...</td>
                </tr>
                <tr>
                  <td>...</td>
                  <td>...</td>
                  <td>...</td>
                  <td>...</td>
                </tr>
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
            <button type="button" class="btn btn-success pull-right">ทำรายการ</button>
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
        เลือกหนังสือ
        <input type="text" name="" id="search-book"/>
        <ul id="result">
        </ul>
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
        ชื่อ
        <input type="text" name="" id="search-book"/>
        <div id="result">
        </div>
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
  $('#search-book').keyup(function(){
    $('#result').html('');
    if($('#search-book').val() != ''){
      $.get('{{ url('borrowSearch') }}', 
        {keyword: $('#search-book').val()},
        function(data){
          console.log(data);
          if(data != ""){
            addToList(data);
          }
        });
    }
  });

  function addToList(data){
    console.log('addToList');
    console.log(typeof data);
    var jsonArr = jQuery.parseJSON(data);
    console.log('haha');
    console.log(data);
    console.log(typeof jsonArr);
    console.log(jsonArr);
    console.log("****");
    console.log(jsonArr.length);
    console.log(jsonArr[0][0]);

    for(var i=0; i<jsonArr.length; i++){
        //console.log(jsonArr[0][0].length);
        for(var brailleIndex = 0; brailleIndex<jsonArr[i][0].length; brailleIndex++){
          $('#result').append("<a href=\"/borrow/"+jsonArr[i][0][brailleIndex].id+"\"> <b>รหัส:</b> " + jsonArr[i][0][brailleIndex].id + " <b>ชื่อหนังสือ:</b>"+jsonArr[i].title +"</a><br>");
        }

        for(var cassetteIndex = 0; cassetteIndex<jsonArr[i][1].length; cassetteIndex++){
          $('#result').append("<a href=\"/borrow/"+jsonArr[i][1][cassetteIndex].id+"\"><b>รหัส:</b> " + jsonArr[i][1][cassetteIndex].id + " <b>ชื่อหนังสือ:</b>"+jsonArr[i].title +"</a><br>");
        }

        for(var cdIndex = 0; cdIndex<jsonArr[i][2].length; cdIndex++){
          $('#result').append("<a href=\"/borrow/"+jsonArr[i][2][cdIndex].id+"\"><b>รหัส:</b> " + jsonArr[i][2][cdIndex].id + " <b>ชื่อหนังสือ:</b>"+jsonArr[i].title +"</a><br>");
        }

        for(var daisyIndex = 0; daisyIndex<jsonArr[i][3].length; daisyIndex++){
          $('#result').append("<a href=\"/borrow/"+jsonArr[i][3][daisyIndex].id+"\"><b>รหัส:</b> " + jsonArr[i][3][daisyIndex].id + " <b>ชื่อหนังสือ:</b>"+jsonArr[i].title +"</a><br>");
        }

        for(var dvdIndex = 0; dvdIndex<jsonArr[i][4].length; dvdIndex++){
          $('#result').append("<a href=\"/borrow/"+jsonArr[i][4][dvdIndex].id+"\"><b>รหัส:</b> " + jsonArr[i][4][dvdIndex].id + " <b>ชื่อหนังสือ:</b>"+jsonArr[i].title +"</a><br>");
        }

      }
    }
  </script>
  @stop
