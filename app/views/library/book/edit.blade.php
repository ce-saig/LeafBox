@extends('library.layout')
@section('head')
<title>แก้ไข</title>
@stop
@section('body')
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">แก้ไข</h3>
  </div>
  <div class="panel-body">
    <form role="form" action="{{url('/book/'.$book['id'].'/edit')}}" method="post">
      <div class="container">
        <?php
        $i=0;
        $media_status = array('bm_status', 'setcs_status', 'setds_status', 'setcd_status', 'setdvd_status');
        $media_date = array('bm_date', 'setcs_date', 'setds_date', 'setcd_date', 'setdvd_date');
        $media_status_index = 0;
        $media_date_index = 0;
        ?>
        <div style="padding: 0;">
        @foreach ($book as $data)
          <!-- ### LABEL ### -->
          @if ($i==13)
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">
               <h5>{{ substr($label[$i],24) }}</h5>
            </div>
          @elseif ($i==13||$i==17||$i==21||$i==25||$i==29)
          <hr>
          <div class="row">
            <div class="col-md-12">
               <h5>{{ substr($label[$i],24) }}</h5>
            </div>
          @endif
            <div class="form-group">
              @if ($i<12)
              <div class="col-xs-6 col-lg-2">
                <label for="input" class="control-label">{{$label[$i]}}</label>
              </div>
              <div class="col-xs-6 col-lg-2">
                <div class="col-lg-10">
              @elseif ($i==12)
              <div class="col-xs-12 col-lg-12">
                <label for="input" class="control-label">{{$label[$i]}}</label>
              </div>
              <div class="col-xs-12 col-lg-12">
                <div class="col-lg-10">

              @elseif($i==16||$i==22||$i==28)
                  <div class="col-xs-6 col-lg-1">
                    <label for="input" class="control-label">{{$label[$i]}}</label>
                  </div>
                  <div class="col-xs-6 col-lg-2">
                    <div class="col-lg-10">
              @elseif($i==15||$i==19||$i==23||$i==27||$i==31)
                  <div class="col-xs-6 col-lg-1">
                    <label for="input" class="control-label">{{ substr($label[$i],-21) }}</label>
                  </div>
                  <div class="col-xs-6 col-lg-2">
                    <div class="col-lg-10">
              @elseif($i==13||$i==17||$i==21||$i==25||$i==29)
                     <div class="col-xs-6 col-lg-1">
                        <label for="input" class="control-label">{{ substr($label[$i],0,15) }}</label> 
                      </div>
                      <div class="col-xs-6 col-lg-2">
                        <div class="col-lg-10">
              @else
                      <div class="col-xs-6 col-lg-1">
                        <label for="input" class="control-label">{{ $label[$i] }}</label> 
                      </div>
                      <div class="col-xs-6 col-lg-2">
                        <div class="col-lg-10">
              @endif
            <!-- ### FIELD ### -->
            <!-- status dropdown -->
            @if ($i==13||$i==17||$i==21||$i==25||$i==29)
                        <!-- TODO : Implement default value and select old value -->
                        <select name="{{$field[$i]}}" class="form-control media_status" id="select_{{$field[$i]}}">
                          <option {{$data == 0?'selected':''}} value=0>ไม่ผลิต</option>
                          <option {{$data == 1?'selected':''}} value=1>ผลิต</option>
                          <option {{$data == 2?'selected':''}} value=2>จองอ่าน</option>
                        </select>
                        <?php $media_status_index++ ?>
            <!-- text fields -->
            @elseif ($i==14||$i==18||$i==22||$i==26||$i==30)
                        <script>console.log('date is {{$data}}');</script>
              @if($data == "ยังไม่ได้ระบุ")
                        <input type="text" name="{{$field[$i]}}" class="form-control datepicker" id="{{$field[$i]}}" value="" placeholder="{{ $data }}">
              @else
                        <input type="text" name="{{$field[$i]}}" class="form-control datepicker" id="{{$field[$i]}}" value="{{ $data }}">
              @endif
            <!-- text area book description -->
            @elseif ($i==12)
                        <textarea name="{{$field[$i]}}"  cols="50" rows="10" class="form-control">{{$data}}</textarea>
                        <br>
            @else
                        <input type="text" name="{{$field[$i]}}" class="form-control" value="{{$data}}" >
            @endif
                      </div>
                    </div>
                  </div>
            @if ($i==16||$i==20||$i==24||$i==2||$i==28)
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
    $(".datepicker").datepicker({
                language:'th-th',
                format: 'dd/mm/yyyy',
                isBuddhist: true
              });
    });
    $('#cancel-form').click(function() {
    window.history.back();
    });
    </script>
    @stop
