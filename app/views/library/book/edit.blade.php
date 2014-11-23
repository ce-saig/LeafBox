@extends('library.layout')

@section('head')
  <title>แก้ไข</title>
@stop

@section('body')
<form role="form" action="{{ url('book/add') }}" method="post">
  <div class="row">
    <?php 
      $i=0;
    ?>
    @foreach ($book as $data)
    <div class="form-group">
      <div class="col-xs-6 col-sm-3">
        <label for="input" class="control-label">{{$field[$i]}}:</label>
      </div>
      <div class="col-xs-6 col-sm-3">
        <div class="col-sm-10">
          <input type="text" name="{{$field[$i]}}" class="form-control" value="{{$data}}">
        </div>
      </div>        
    </div>
    <?php $i++; ?>
    @endforeach 
  </div>
</form>
@stop