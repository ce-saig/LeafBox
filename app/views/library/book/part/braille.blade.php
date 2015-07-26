<div role="tabpanel" class="tab-pane active" id="detail">

  <a class = "btn btn-danger pull-right" href="{{$bid}}/braille/deleteAll">ลบสื่อนี้ทั้งหมด</a>
  <div class = "list-media">
    <table class="table table-hover">
      <thead>
        <tr>
          <th >เบรลล์ไอดี</th>
          <th>สถานะ</th>
          <th>จำนวนหน้า</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($braille as $item)
          <tr class = "hover table-body" href="{{$bid}}/braille/{{$item->id}}">
            <td >{{$item->id}}</td>
            <td>{{ $item->getStatus() }}</td>
            <td>{{$item->pages}}</td>
            <td><a href = "{{ url('/book/'.$bid.'/braille/delete/'.$item->id) }}"class="btn btn-danger del_media_btn">ลบ</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
