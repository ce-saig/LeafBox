<div role="tabpanel" class="tab-pane active" >

  <a class = "btn btn-danger pull-right" href="{{$bid}}/cd/deleteAll">ลบสื่อนี้</a>
  <div class = "list-media">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>cd id</th>
          <th>numpart</th>
          <th>notes</th>
        </tr>
       </thead>
      <tbody>
        @foreach ($cd as $item)
        <tr class = "hover" href="{{$bid}}/cd/{{$item->id}}">
          <td>{{$item->id}}</td>
          <td>{{$item->numpart}}</td>
          <td><a href = "{{ url('/book/'.$bid.'/cd/delete/'.$item->id) }}"class="btn btn-danger del_media_btn">ลบ</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
