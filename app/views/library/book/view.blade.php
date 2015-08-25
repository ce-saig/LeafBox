@extends('library.layout')

@section('head')
<title>Leafbox :: {{$book['id']}} - {{$book['title']}}</title>
@stop

@section('body')
<div class="well">
  <div>
    <h2>I{{$book['id']}}:{{$book['title']}}
      <a href="{{ URL::to('/book/'.$book['id'].'/edit') }}" class="btn btn-warning pull-right">แก้ไข</a>

    </h2>
  </div>
  <ul class="nav nav-tabs nav-justified" role="tablist">
    <li role="presentation" class="active"><a href="#detail" role="tab" data-toggle="tab">ข้อมูล</a></li>
    <li role="presentation"><a href="#braille" role="braille" data-toggle="tab" onClick="tabSelect(this)">เบรลล์</a></li>
    <li role="presentation"><a href="#cassette" role="cassette" data-toggle="tab" onClick="tabSelect(this)">เทปคาสเซ็ท</a></li>
    <li role="presentation"><a href="#daisy" role="daisy" data-toggle="tab" onClick="tabSelect(this)">เดซี่</a></li>
    <li role="presentation"><a href="#cd" role="cd" data-toggle="tab" onClick="tabSelect(this)">CD</a></li>
    <li role="presentation"><a href="#dvd" role="dvd" data-toggle="tab" onClick="tabSelect(this)">DVD</a></li>
  </ul>

  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="detail">
      <div class="row">
        <br>
        <?php
          $i=0;
        ?>
        @foreach ($book as $data)
              @if ($field[$i]!='ID')
                @if ($i==19||$i==22||$i==25||$i==28||$i==31)
                    <hr>
                    <div class="col-xs-12"></div>
                @endif
                @if ($i==19||$i==22||$i==25||$i==28||$i==31)
                  <div class="col-xs-6 col-sm-2"><b>{{$field[$i]}}</b></div>
                  <div class="col-xs-6 col-sm-2">
                    @if($data == 1)
                      ผลิต
                    @elseif($data == 2)
                      จองอ่าน
                    @else
                      ไม่ผลิต
                    @endif
                  </div>
                @elseif ($i>19||$i>22||$i>25||$i>28||$i>31)
                  <div class="col-xs-6 col-sm-2"><b>{{$field[$i]}}</b></div>
                  <div class="col-xs-6 col-sm-2">{{$data?$data:"-"}}</div>
                @else
                  <div class="col-xs-6 col-sm-2"><b>{{$field[$i]}}</b></div>
                  <div class="col-xs-6 col-sm-4"> {{$data?$data:"-"}}</div>
                @endif
              @endif
          <?php $i++; ?>
        @endforeach
      </div>
      <br>
      <br>
      <h3>สถานะการผลิต  <p  class="btn btn-sm btn-warning pull-right" data-toggle="modal" data-target="#addProd">เพิ่มสถานะการผลิต</p>
      </h3>
      <div class="row">
        {{-- List of Prod --}}
        <div class="col-xs-12">
          <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title">เบรลล์</h3>
              </div>
              <div class="panel-body">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>วันที่ปฏิบัติ</th>
                      <th>ขั้นตอน</th>
                      <th>ผู้ปฏิบัติ</th>
                      <th>วันเสร็จ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1111</td>
                      <td>2222</td>
                      <td>3333</td>
                      <td>4444</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="panel-heading">
                <h3 class="panel-title">เทปคาสเซ็ท</h3>
              </div>
              <div class="panel-body">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>วันที่ปฏิบัติ</th>
                      <th>ขั้นตอน</th>
                      <th>ผู้ปฏิบัติ</th>
                      <th>วันเสร็จ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1111</td>
                      <td>2222</td>
                      <td>3333</td>
                      <td>4444</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              
              <div class="panel-heading">
                <h3 class="panel-title">เดซี่</h3>
              </div>
              <div class="panel-body">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>วันที่ปฏิบัติ</th>
                      <th>ขั้นตอน</th>
                      <th>ผู้ปฏิบัติ</th>
                      <th>วันเสร็จ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1111</td>
                      <td>2222</td>
                      <td>3333</td>
                      <td>4444</td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="panel-heading">
                <h3 class="panel-title">CD</h3>
              </div>
              <div class="panel-body">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>วันที่ปฏิบัติ</th>
                      <th>ขั้นตอน</th>
                      <th>ผู้ปฏิบัติ</th>
                      <th>วันเสร็จ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1111</td>
                      <td>2222</td>
                      <td>3333</td>
                      <td>4444</td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="panel-heading">
                <h3 class="panel-title">DVD</h3>
              </div>
              <div class="panel-body">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>วันที่ปฏิบัติ</th>
                      <th>ขั้นตอน</th>
                      <th>ผู้ปฏิบัติ</th>
                      <th>วันเสร็จ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr onclick="prodEdit(1)">
                      <td>1111</td>
                      <td>2222</td>
                      <td>3333</td>
                      <td>4444</td>
                    </tr>
                  </tbody>
                </table>
              </div>
          </div>
        </div>
        
      </div>
    </div>
    
    <div role="tabpanel" class="tab-pane" id="braille">
      <div class="row" >
          @include('library.book.part.braille',array('braille'=>$braille,'bid'=>$book['id']))
        <button  class="pull-right addButton btn btn-lg btn-success" data-toggle="modal" data-target="#addBraille">เพิ่มเบรลล์</button>
      </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="cassette">
      <div class="row" >
        @include('library.book.part.cassette',array('cassette'=>$cassette,'bid'=>$book['id']))
        <button class="pull-right addButton btn btn-lg btn-success" data-toggle="modal" data-target="#add">เพิ่มคาสเซ็ท</button>
      </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="daisy">
      <div class="row">
        @include('library.book.part.daisy',array('daisy'=>$daisy,'bid'=>$book['id']))
        <button class="pull-right addButton btn btn-lg btn-success" data-toggle="modal" data-target="#add">เพิ่มเดซี่</button>
      </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="cd">
      <div class="row">
        @include('library.book.part.cd',array('cd'=>$cd,'bid'=>$book['id']))
        <button class="pull-right addButton btn btn-lg btn-success" data-toggle="modal" data-target="#add">เพิ่มCD</button>
      </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="dvd">
      <div class="row">
        @include('library.book.part.dvd',array('dvd'=>$dvd,'bid'=>$book['id']))
        <button class="pull-right addButton btn btn-lg btn-success" data-toggle="modal" data-target="#add">เพิ่มDVD</button>
      </div>
    </div>

  </div>
</div>


<div class="modal fade" id="add">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
          <h4 class="modal-title">เพิ่มสื่อ</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="pull-right">สื่อชิ้นนี้มี </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <input class="form-control" type="number" id="amount" min=1 value="1"/>
              </div>
            </div>
            <div class="col-md-4">
              ชิ้นย่อย
            </div>
          </div>
        </div>
        <div class="modal-footer">
                <button class="btn btn-success btn-lg" onClick="add()" data-dismiss="modal">เพิ่ม</button>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="addBraille">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
          <h4 class="modal-title">เพิ่มหนังสือเบรลล์</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-2">
              จำนวนหน้า
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <input type="number" class="form-control" id="pageBraille" min=1 value="1"/>
              </div>
            </div>
            <div class="col-md-2">
              จำนวนตอน
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <input type="number" class="form-control" id="amountBraille" min=1 value="1"/>
              </div>
            </div>
            <div class="col-md-2">
              ผู้ตรวจสอบ
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <input class="form-control" id="examiner" value=""/>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
                <button class="btn btn-success btn-lg" onClick="add()" data-dismiss="modal">เพิ่ม</button>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="success">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
          <h4 class="modal-title">ข้อความ</h4>
        </div>
        <div class="modal-body">
          เพิ่มสื่อสำเร็จ
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="addProd">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">เพิ่มสถานะการผลิต</h4>
      </div>
      <div class="modal-body">
        <div class="row" id="addProdBody">
            <div class="form-group">
              <label class="col-sm-2 control-label">สื่อ</label>
              <div class="col-sm-10">
                <select name="" id="prod_media_type" class="form-control" required="required">
                  <option value="">เลือกสื่อ</option>
                  <option value="0">เบรลล์</option>
                  <option value="1">เทปคาสเซ็ท</option>
                  <option value="2">เดซี่</option>
                  <option value="3">CD</option>
                  <option value="4">DVD</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">วันปฏิบัติ</label>
              <div class="col-sm-10">
                <input type="text" class="form-control datepicker" id="prod_act_date">
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">สถานะ</label>
              <div class="col-sm-10">
                <select name="" id="prod_action" class="form-control" required="required">
                  <option value="">เลือกสถานะ</option>
                  <option value="0">อ่าน</option>
                  <option value="1">ทำต้นฉบับ</option>
                  <option value="2">ทำกล่อง</option>
                  <option value="3">ส่งตรวจ</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">ผู้ปฏิบัติ</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="prod_actioner">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">วันเสร็จ</label>
              <div class="col-sm-10">
                <input type="text" class="form-control datepicker" id="prod_finish_date">
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
        <button class="btn btn-success" onClick="addProd()" >เพิ่ม</button>  
        {{-- data-dismiss="modal" --}}
      </div>
    </div>
  </div>
</div>

@stop
@section('script')
  @parent
  <script>
    $(function()
    {
     $('myTab a:last').tab('show.bs.tab');
   });

    //make table row as a link
    $("table").on("click", "tr.table-body", function(e) {
        if ($(e.target).is("a,input"))
            return;
        location.href = $(this).attr("href");
    });
    //var tabClicked = "braille";
    var tabClicked = "";
    //check and set tab if access tab panel from url link.
    if (window.location.href.match('#')){
      tabClicked  = window.location.hash.replace('#','');
      console.log(tabClicked);
    }

    function tabSelect(tab){
      console.log(tab);
      console.log(tab.getAttribute('role').toLowerCase());
      tabClicked = tab.getAttribute('role').toLowerCase();
      document.location.href = document.location.href.substring(0, tabClicked.lastIndexOf('#') + 1)+'#'+tabClicked;
      window.scrollTo(0, 0);
      if(tabClicked == "braille"){
        //$(".addButton").attr('data-target', "");
        //$(".addButton").attr('onClick', "add()");
        $(".addButton").attr('data-target', "#addBraille");
        //$(".addButton").attr('onClick', "");
      } else {
        $(".addButton").attr('data-target', "#add");
        //$(".addButton").attr('onClick', "");
      }
    }

    //Enable Link to tab


    $(function() {
    var hash = window.location.hash;
    hash && $('ul.nav a[href="' + hash + '"]').tab('show');
    });


    function add(){
      console.log($('#amount').val());
      var amount = $('#amount').val();
      var page = null;
      var examiner = null;
      if(tabClicked == "braille"){
        amount = $('#amountBraille').val();
        page = $('#pageBraille').val();
        examiner = $('#examiner').val();
      }

      console.log(amount);
      console.log(tabClicked);
      $.post( "{{ $book['id'] }}/" + tabClicked + "/add", {amount: amount, examiner: examiner, page: page}, function(result){
        console.log(result);
        $('#success').modal('show');
      });
      $('#amount').val(1);
    }

    var myModal = $('#success').on('show.bs.modal', function () {
      clearTimeout(myModal.data('hideInteval'));
      var id = setTimeout(function(){
          myModal.modal('hide');
          if (!window.location.href.match('#')) {
            document.location.href += ("#"+ tabClicked);
            console.log("on here");
          }else{
            document.location.href = document.location.href.substring(0, tabClicked.lastIndexOf('#') + 1)+"#"+tabClicked;
            console.log("here");
          }
          window.location.reload();
      }, 1500);
      myModal.data('hideInteval', id);
    });

    // Delete Button Cofirmation
    $(function() {
          $('.del_media_btn').click(function(e) {
              e.preventDefault();
              var link = $(this).attr('href');
              confirmation(link);
          });
          $('.del_media_btn_all').click(function(e) {
              e.preventDefault();
              var link = $(this).attr('href');
              confirmation(link);
          });
    });

    function confirmation(link) {
      if(confirm('คุณต้องการลบจริงหรือไม่ ?')){
        window.location.href = link;
      }else{
        // not doing anythings
      }
    }

    
  $(function() {
    $(".datepicker").datepicker({
                language:'th-th',
                format: 'dd/mm/yyyy',
                isBuddhist: true
              });
    });

  function addProd(){
      var act_date = $('#prod_act_date').val();
      var action = $('#prod_action').val();
      var actioner = $('#prod_actioner').val();
      var finish_date = $('#prod_finish_date').val();

      console.log(act_date);
      console.log(action);
      console.log(actioner);
      console.log(finish_date);
      
      $.post( "prod/add", {book_id:{{ $book['id'] }},act_date:act_date, action:action,actioner:actioner,finish_date:finish_date}, function(result){
        console.log(result);
        if(result=="success"){
          $("#addProd").hide();
          $('#success').modal('show');
        }else{
          $("#addProdBody").before("<div class=\"row\"><div class=\"alert alert-danger\">ใส่ข้อมูลไม่ครบ</div></div>")

        }
      });
    }

  function prodEdit (prodID) {
    console.log(prodID);
  }
  </script>
@stop
