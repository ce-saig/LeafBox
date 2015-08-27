@extends('library.layout')

@section('head')
<title>Leafbox :: Report Gen</title>
@stop

@section('body')


<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Book</h3>
  </div>
  <div class="panel-body">
  <ul class="list-group">
    <li class="list-group-item">Book 1</li>
    <li class="list-group-item">Book 2</li>
    <li class="list-group-item">Book 3</li>
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
  </ul>
 </div>
</div>


@stop
@section('script')
@parent
<script>
</script>
@stop
