<div role="tabpanel" class="tab-pane active" >

  <a class = "btn btn-danger pull-right del_media_btn_all" href="{{$bid}}/dvd/deleteAll">ลบสื่อนี้ทั้งหมด</a>
  <div class = "list-media">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>dvd id</th>
          <th>numpart</th>
          <th>notes</th>
        </tr>
       </thead>
      <tbody>
        @foreach ($dvd as $item)
        <tr class = "hover" href="{{$bid}}/dvd/{{$item->id}}">
          <td>{{$item->id}}</td>
          <td>{{$item->numpart}}</td>
          <td>{{$item->detail()->first()->notes}}</td>
          <td><a href = "{{ url('/book/'.$bid.'/dvd/delete/'.$item->id) }}"class="btn btn-danger del_media_btn">ลบ</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
