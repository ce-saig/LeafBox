@extends('library.layout')

@section('head')
  <title>Leafbox :: DVD - {{$item->id}}</title>
@stop

@section('body')
  {{$item->id}}
  {{$item->reserved}}
@stop