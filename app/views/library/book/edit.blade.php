@extends('library.layout')

@section('head')
  <title>แก้ไข</title>
@stop

@section('body')
<form role="form" action="{{'/book/'.$book['id'].'/edit'}}" method="post">
  <div class="row">
    <?php 
      $i=0;
    ?>
    @foreach ($book as $data)
    @if ($i==14||$i==17||$i==20||$i==23||$i==26)
    <hr>
      <div class="row">
        <h5>{{ substr($label[$i],24) }}</h5>
    @endif
    <div class="form-group">
      @if ($i<14)
        <div class="col-xs-6 col-sm-3">
          <label for="input" class="control-label">{{$label[$i]}}</label>
        </div>
        <div class="col-xs-6 col-sm-3">
          <div class="col-sm-10">
      @else
        <div class="col-xs-6 col-sm-1">
          <label for="input" class="control-label">{{substr($label[$i],0,15)}}</label>
        </div>
        <div class="col-xs-6 col-sm-3">
          <div class="col-sm-10">
      @endif

          @if ($i==14||$i==17||$i==20||$i==23||$i==26)
          <!-- TODO : Implement default value and select old value -->
              <select name="{{$field[$i]}}" class="form-control">
                <option value="">เลือกสถานะ</option>
                <option value="ผลิต">ผลิต</option>
                <option value="ไม่ผลิต">ไม่ผลิต</option>
              </select>

          @elseif ($i==16||$i==19||$i==22||$i==25||$i==28)
            <input type="date" min="1990-12-12" name="{{$field[$i]}}" class="form-control" value="{{$data}}">
          @elseif ($i==13)
            <textarea name="{{$field[$i]}}"  cols="30" rows="5" class="form-control">{{$data}}</textarea>
          @else
            <input type="text" name="{{$field[$i]}}" class="form-control" value="{{$data}}">
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
  <div class="row">
    <input type="submit" class="btn btn-default btn-success" value="แก้ไข">
  </div>
</form>
@stop