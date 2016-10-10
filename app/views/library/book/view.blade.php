@extends('library.layout')

@section('head')
<title>Leafbox :: {{$number}} - {{$book['title']}}</title>
@stop

@section('body')
<div>
  <div class="well">
    <div>
      <h2>{{$number}}:{{$book['title']}} {{ $all_media }}</h2>
    </div>
    <div>
      <uib-tabset active="activeJustified" justified="true">
        <uib-tab index="0" heading="ข้อมูล">@include('library.book.part.bookdetails')</uib-tab>
        <uib-tab index="1" heading="สถานะการผลิต"><production-status></production-status></uib-tab>
        <uib-tab index="2" heading="เบรลล์"><media-tab media-type="braille"></media-tab></uib-tab>
        <uib-tab index="3" heading="เทปคาสเซ็ต"><media-tab media-type="cassette"></media-tab></uib-tab>
        <uib-tab index="4" heading="เดซี่"><media-tab media-type="daisy"></media-tab></uib-tab>
        <uib-tab index="5" heading="CD"><media-tab media-type="cd"></media-tab></uib-tab>
        <uib-tab index="6" heading="DVD"><media-tab media-type="dvd"></media-tab></uib-tab>
      </uib-tabset>
    </div>
  </div>
@stop
@section('script')
@parent
<script>
  $('.delete-book').click(function(e) {
    e.preventDefault();
    console.log("delete book");
    if(confirm("การลบหนังสือจะทำให้ข้อมูลสื่อทั้งหมดของหนังสือถูกลบ คุณต้องการลบจริงหรือไม่ ?"))
      console.log($(this).attr('href'));
    window.location.href = $(this).attr('href');
  });

  $(function() {
    $(".datepicker").datepicker({
      language:'th-th',
      format: 'dd/mm/yyyy',
      isBuddhist: true
    });
  });

  angular.module('leafBox').run(function($rootScope) {
    $rootScope.selected_book_id = {{ $book['id'] }};
  });
</script>
@stop
