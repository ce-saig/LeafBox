@extends('library.layout')
@section('head')
<title>แก้ไข</title>
@stop
@section('body')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">แก้ไข</h3>
  </div>
  <div class="panel-body">
    <form role="form" action="{{'/book/'.$book['id'].'/edit'}}" method="post">
      <div class="container">
        <?php
        $i=0;
        $media_status = array('bm_status', 'setcs_status', 'setds_status', 'setcd_status', 'setdvd_status');
        $media_date = array('bm_date', 'setcs_date', 'setds_date', 'setcd_date', 'setdvd_date');
        $media_status_index = 0;
        $media_date_index = 0;
        ?>
        <div class="col-lg-12" style="padding: 0;">
        @foreach ($book as $data)

        @if ($i==14)
        </div>
        <hr>
        <div class="row">
          <h5>{{ substr($label[$i],24) }}</h5>
        @elseif ($i==14||$i==17||$i==20||$i==23||$i==26)
        <hr>
        <div class="row">
          <h5>{{ substr($label[$i],24) }}</h5>
        @endif
          <div class="form-group">
            @if ($i<13)
            <div class="col-xs-6 col-lg-3">
              <label for="input" class="control-label">{{$label[$i]}}</label>
            </div>
            <div class="col-xs-6 col-lg-3">
              <div class="col-lg-10">
            @elseif ($i==13)
            <div class="col-xs-12 col-lg-12">
              <label for="input" class="control-label">{{$label[$i]}}</label>
            </div>
            <div class="col-xs-12 col-lg-12">
              <div class="col-lg-10">
            
            @elseif($i==16||$i==19||$i==22||$i==25||$i==28)
                <div class="col-xs-6 col-lg-1">
                  <label for="input" class="control-label">{{$label[$i]}}</label>
                </div>
                <div class="col-xs-6 col-lg-3">
                  <div class="col-lg-10">
            @else
                    <div class="col-xs-6 col-lg-1">
                      <label for="input" class="control-label">{{substr($label[$i],0,15)}}</label>
                    </div>
                    <div class="col-xs-6 col-lg-3">
                      <div class="col-lg-10">
            @endif

            @if ($i==14||$i==17||$i==20||$i==23||$i==26)
                        <!-- TODO : Implement default value and select old value -->
                        <select name="{{$field[$i]}}" class="form-control media_status" id="select_{{$field[$i]}}">
                          <option {{$data == "ผลิต"?'selected':''}} value="ผลิต">ผลิต</option>
                          <option {{$data == "ไม่ผลิต"?'selected':''}} value="ไม่ผลิต">ไม่ผลิต</option>
                          <option {{$data == "จองอ่าน"?'selected':''}} value="จองอ่าน">จองอ่าน</option>
                        </select>
                        <?php $media_status_index++ ?>
            @elseif ($i==15||$i==18||$i==21||$i==24||$i==27)
                        <script>console.log('date is {{$data}}');</script>
              @if($data == "ยังไม่ได้ระบุ")
                        <input type="text" name="{{$field[$i]}}" class="form-control datepicker" id="{{$field[$i]}}" value="" placeholder="{{ $data }}">
              @else
                        <input type="text" name="{{$field[$i]}}" class="form-control datepicker" id="{{$field[$i]}}" value="{{ $data }}">
              @endif

            @elseif ($i==13)
                        <textarea name="{{$field[$i]}}"  cols="50" rows="10" class="form-control">{{$data}}</textarea>
                        <br>
            @else
                        <input type="text" name="{{$field[$i]}}" class="form-control" value="{{$data}}" >
            @endif

                      </div>
                    </div>
                  </div>
            @if ($i==16||$i==19||$i==22||$i==25||$i==28)
                </div>
            @endif
                <?php $i++; ?>
      @endforeach
              </div>
              <br/>
              <div class = "text-center">
                <button type="submit" class="btn btn-default btn-danger pull-left" id="cancel-form">ยกเลิก</button>
                <input type="submit" class="btn btn-default btn-success pull-right" value="บันทึก">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    @stop
    @section('script')
    @parent
    
    <script type="text/javascript">
    $(function() {
    $(".datepicker").datepicker();
    });
    $('#cancel-form').click(function() {
    window.history.back();
    });
    </script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    @stop