@extends('library.layout')

@section('head')
  <title>Leafbox :: Cassette - {{$item->id}}</title>
@stop

@section('body')
  {{$item->id}}
  <?php 
    $list = Cassettedetail::where('book_id','=',$bid);
   ?>
   @foreach ($list as $item)
     ID : {{$item->id}} <br>
   @endforeach
@stop