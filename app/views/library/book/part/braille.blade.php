<div role="tabpanel" class="tab-pane active" id="detail">

  <a class = "btn btn-danger pull-right" href="{{$bid}}/braille/deleteAll">ลบสื่อนี้ทั้งหมด</a>
  <div class = "list-media">
    <table class="table table-hover">
      <thead>
        <tr>
          <th style="text-align: center;">เบรลล์ไอดี</th>
          <th style="text-align: center;">จำนวนหน้า</th>
          <th style="text-align: center;">จำนวนตอน</th>
          <th style="text-align: center;">ผู้ตรวจสอบ</th>
          <th style="text-align: center;">ผู้ยืม</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($braille as $item)
        <script type="text/javascript">console.log('{{$braille}}')</script>
          <tr class = "hover table-body" href="{{$bid}}/braille/{{$item->id}}" id="braille-{{$item->id}}">
            <td style="text-align: center;" id="media-id">{{$item->id}}</td>
            <td style="text-align: center" class="braille-page">{{$item->pages}}</td>
            <td style="text-align: center">{{$item->numpart}}</td>
            <td style="text-align: center" class="braille-examiner">{{$item->examiner}}</td>
            <td style="text-align: center">{{$item->borrower}}</td>
            <td style="text-align: center;"><a href = "{{ url('/book/'.$bid.'/braille/delete/'.$item->id) }}"class="btn btn-danger del_media_btn">ลบ</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>


