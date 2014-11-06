@extends('library.layout')

@section('head')
<title>Leafbox :: {{$book['id']}} - {{$book['title']}}</title>
@stop

@section('body')
<div class="well">
  <div><h2>I{{$book['id']}}:{{$book['title']}}</h2></div>
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
          <div class="col-xs-6 col-sm-3"><b>{{$field[$i]}}</b></div>
          <div class="col-xs-6 col-sm-3">= {{$data}}</div>
          <?php $i++; ?>
        @endforeach 

      </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="braille">
      <div role="tabpanel" class="tab-pane active" id="detail">
        <table class="table table-hover">
          <thead>
            <tr>
              <th width="300">braille id</th>
              <th>status</th>
              <th>page</th>
            </tr>
           </thead>
          <tbody>
            @foreach ($braille as $item)
            <tr>
              <td width="300">{{$item->id}}</td>
              <td>{{$item->status}}NEED BORROW SYSTEM</td>
              <td>{{$item->pages}}</td>
            </tr>
            @endforeach 
          </tbody>
        </table>
      </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="cassette">
      <div role="tabpanel" class="tab-pane active" >
        <table class="table table-hover">
          <thead>
            <tr>
              <th width="300">cassette id</th>
              <th>numpart</th>
              <th>notes</th>
            </tr>
           </thead>
          <tbody>
            @foreach ($cassette as $item)
            <tr>
              <td width="300">{{$item->id}}</td>
              <td>{{$item->numpart}}</td>
              <td>{{$item->notes}}</td>
            </tr>
            @endforeach 
          </tbody>
        </table>
      </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="daisy">
      <div role="tabpanel" class="tab-pane active" >
        <table class="table table-hover">
          <thead>
            <tr>
              <th width="300">daisy id</th>
              <th>numpart</th>
              <th>notes</th>
            </tr>
           </thead>
          <tbody>
            @foreach ($daisy as $item)
            <tr>
              <td width="300">{{$item->id}}</td>
              <td>{{$item->numpart}}</td>
              <td>{{$item->notes}}</td>
            </tr>
            @endforeach 
          </tbody>
        </table>
      </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="cd">
      <div role="tabpanel" class="tab-pane active" >
        <table class="table table-hover">
          <thead>
            <tr>
              <th width="300">cd id</th>
              <th>numpart</th>
              <th>notes</th>
            </tr>
           </thead>
          <tbody>
            @foreach ($cd as $item)
            <tr>
              <td width="300">{{$item->id}}</td>
              <td>{{$item->numpart}}</td>
              <td>{{$item->notes}}</td>
            </tr>
            @endforeach 
          </tbody>
        </table>
      </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="dvd">
      <div role="tabpanel" class="tab-pane active" >
        <table class="table table-hover">
          <thead>
            <tr>
              <th width="300">dvd id</th>
              <th>numpart</th>
              <th>notes</th>
            </tr>
           </thead>
          <tbody>
            @foreach ($dvd as $item)
            <tr>
              <td width="300">{{$item->id}}</td>
              <td>{{$item->numpart}}</td>
              <td>{{$item->notes}}</td>
            </tr>
            @endforeach 
          </tbody>
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

@stop