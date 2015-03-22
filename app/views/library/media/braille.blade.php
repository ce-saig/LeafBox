@extends('library.layout')

@section('head')
  <title>Leafbox :: Braille - {{$item->id}}</title>
@stop

@section('body')
  {{$item->id}}
@stop