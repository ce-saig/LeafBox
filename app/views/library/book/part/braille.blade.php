<div role="tabpanel" class="tab-pane active" id="detail">
  <a class = "btn btn-danger pull-right" href="{{$bid}}/braille/deleteAll" data-media="braille" data-bookid="{{$bid}}">ลบสื่อนี้ทั้งหมด</a>
  <div class = "list-media">
    <table class="table table-hover">
      <thead>
        <tr>
          <th style="text-align: center;">เบรลล์เซ็ทไอดี</th>
          <th style="text-align: center;">จำนวนหน้า</th>
          <th style="text-align: center;">จำนวนตอน</th>
          <th style="text-align: center;">ผู้ตรวจสอบ</th>
          <th style="text-align: center;">ผู้ยืม</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($braille as $item)
        {{--<script type="text/javascript">console.log('{{$braille}}')</script>--}}
          <tr class = "hover table-body"  id="braille-{{$item->id}}" href="{{$bid}}/braille/{{$item->id}}">
            <td style="text-align: center" id="media-id">{{$master==$item->id?"M":""}}{{$item->id}}</td>
            <td style="text-align: center" id="braille-page">{{$item->pages}}</td>
            <td style="text-align: center" id="braille-part">{{$item->numpart}}</td>
            <td style="text-align: center" id="braille-examiner">{{$item->examiner}}</td>
            <td style="text-align: center" id="media-borrower" data-borrower="{{$item->borrower}}">{{$item->borrower}}</td>
            <td style="text-align: center"><a href = "{{ url('/book/'.$bid.'/braille/delete/'.$item->id) }}" class="btn btn-danger del_media_btn">ลบ</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>


