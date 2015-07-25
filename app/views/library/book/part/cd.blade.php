<div role="tabpanel" class="tab-pane active" >

  <a class = "btn btn-danger pull-right del_media_btn_all" href="{{$bid}}/cd/deleteAll">ลบสื่อนี้ทั้งหมด</a>
  <div class = "list-media">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ซีดีไอดี</th>
          <th>จำนวนชิ้นย่อย (แผ่น)</th>
        </tr>
       </thead>
      <tbody>
        @foreach ($cd as $item)
        <tr class = "hover table-body" href="{{$bid}}/cd/{{$item->id}}">
          <td>{{$item->id}}</td>
          <td>{{$item->numpart}}</td>
          <td><a href = "{{ url('/book/'.$bid.'/cd/delete/'.$item->id) }}"class="btn btn-danger del_media_btn">ลบ</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
