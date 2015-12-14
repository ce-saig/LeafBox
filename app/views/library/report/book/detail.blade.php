@extends('library.layout')

@section('head')
<title>Leafbox :: Report - Book - Detail</title>
@stop

@section('body')
<h3>Book Detail</h3>
<div class="well">
  <table class="table table-striped">
    <tr>
      @foreach($col as $item)
        @if($item == "order_num")
          <td>เลขอันดับ</td>
        @elseif($item == "title")
          <td>ชื่อเรื่อง</td>
        @elseif($item == "author")
          <td>ชื่อผู้แต่ง</td>
        @elseif($item == "translator")
          <td>ชื่อผู้แปละ</td>
        @elseif($item == "status")
          <td>สถานะ</td>
        @endif
      @endforeach
    </tr>
    @foreach ($data as $item)
      <tr>
        @foreach($col as $filter)
          @if($filter == "order_num")
            <td>1</td>
          @elseif($filter == "title")
            <td>{{$item["title"]}}</td>
          @elseif($filter == "author")
            <td>3</td>
          @elseif($filter == "translator")
            <td>4</td>
          @elseif($filter == "status")
            <td>5</td>
          @endif
        @endforeach
      </tr>
    @endforeach
  </table>
</div>


@stop
@section('script')
@parent
<script>
</script>
@stop
