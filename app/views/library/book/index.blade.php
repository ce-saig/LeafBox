@extends('library.layout')

@section('head')
<title>Leafbox :: id - title</title>
@stop

@section('body')
<div class="well">
  <div><h2>I ID : TITLE</h2></div>
  <ul class="nav nav-tabs nav-justified" role="tablist">
    <li role="presentation" class="active"><a href="#detail" role="tab" data-toggle="tab">Detail</a></li>
    <li role="presentation"><a href="#braille" role="tab" data-toggle="tab">Braille</a></li>
    <li role="presentation"><a href="#cassette" role="tab" data-toggle="tab">Cassette</a></li>
    <li role="presentation"><a href="#cd" role="tab" data-toggle="tab">CD</a></li>
    <li role="presentation"><a href="#dvd" role="tab" data-toggle="tab">DVD</a></li>
  </ul>

  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="detail">
      <div class="row">
        <?php 
        $i=0;
        ?>
        @foreach ($book as $data)
        <div class="col-xs-3"><b>{{$field[$i]}}</b></div>
        <div class="col-xs-3">= {{$data}}</div>
        <?php $i++; ?>
        @endforeach 
        

      </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="braille">
     <div role="tabpanel" class="tab-pane active" id="detail">
      <table class="table table-hover">
       <tr><td width="300">ID</td><td>Numpost</td><td>Status</td></tr>
       <tr><td width="300">ID</td><td>Numpost</td><td>Status</td></tr>
     </table>
   </div>
 </div>
 <div role="tabpanel" class="tab-pane" id="cassette">Cassette
   <div role="tabpanel" class="tab-pane active" id="detail">
    <table class="table table-hover">
     <tr><td width="300">ID</td><td>Numpost</td><td>Status</td></tr>
     <tr><td width="300">ID</td><td>Numpost</td><td>Status</td></tr>
   </table>
 </div>
</div>

<div role="tabpanel" class="tab-pane" id="cd">CD
 <div role="tabpanel" class="tab-pane active" id="detail">
  <table class="table table-hover">
   <tr><td width="300">ID</td><td>Numpost</td><td>Status</td></tr>
   <tr><td width="300">ID</td><td>Numpost</td><td>Status</td></tr>
 </table>
</div>
</div>
<div role="tabpanel" class="tab-pane" id="dvd">DVD
 <div role="tabpanel" class="tab-pane active" id="detail">
  <table class="table table-hover">
   <tr><td width="300">ID</td><td>Numpost</td><td>Status</td></tr>
   <tr><td width="300">ID</td><td>Numpost</td><td>Status</td></tr>
 </table>
</div>
</div>
</div>
</div>

<script>
  $(function()
  {	
   $('myTab a:last').tab('show.bs.tab')
 })
</script>
</div>
@stop