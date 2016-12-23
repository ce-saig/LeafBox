@extends('library.layout')
@section('head')
<title>แก้ไข</title>
@stop
@section('body')
<div class="panel panel-primary">
  <div class="panel-heading panel-title">
    <h4 style="color: white">แก้ไขรายละเอียด</h4>
  </div>
  <div class="panel-body">
    <form role="form" action="{{url('/book/'.$book['id'].'/edit')}}" method="post">
        <book-edit></book-edit>
  </form>
</div>
</div>
@stop
@section('script')
@parent

<script type="text/javascript">
  angular.module('leafBox').run(function($rootScope) {
    $rootScope.selected_book_id = {{ $book['id'] }};
  });
</script>
@stop
