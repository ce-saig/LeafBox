@extends('library.layout')

@section('head')
  <title>Leafbox :: Daisy - {{$item->id}}</title>
@stop

@section('body')
  {{$item->id}}
@stop