@extends('library.layout')

@section('head')
<title>Leafbox :: Report - Book - Detail</title>
@stop

@section('body')
<h3>Book Detail</h3>
@foreach ($data as $item)
  <div class="well">
    {{$item}}
  </div>
@endforeach

@stop
@section('script')
@parent
<script>
</script>
@stop
