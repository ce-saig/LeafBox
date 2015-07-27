<div role="tabpanel" class="tab-pane active" >
  <a class = "btn btn-danger pull-right del_media_btn_all" href="{{$bid}}/cassette/deleteAll">ลบสื่อนี้ทั้งหมด</a>
  <div class = "list-media">
    <table class="table table-hover">
      <thead>
        <tr>
          <th width="300" style="text-align: center;">คาสเซ็ทไอดี</th>
          <th style="text-align: center;">จำนวนชิ้นย่อย (ตลับ)</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($cassette as $item)
        <tr class = "hover table-body" href="{{$bid}}/cassette/{{$item->id}}">
          <td style="text-align: center;" style="text-align: center;" style="text-align: center;">{{$item->id}}</td>
          <td style="text-align: center;" style="text-align: center;">{{$item->numpart}}</td>
          <td style="text-align: center;"><a href = "{{ url('/book/'.$bid.'/cassette/delete/'.$item->id) }}"class="btn btn-danger del_media_btn">ลบ</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>