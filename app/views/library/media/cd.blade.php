@extends('library.layout')

@section('head')
  <title>Leafbox :: CD - {{$item->id}}</title>
@stop

@section('body')
  {{$item->id}}
  {{$item->reserved}}
@stop