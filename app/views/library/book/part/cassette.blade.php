<div role="tabpanel" class="tab-pane" >
  <a class = "btn btn-danger pull-right del_media_btn_all" data-media="cassette" data-bookid="{{$bid}}" href="{{$bid}}/cassette/deleteAll">ลบสื่อนี้ทั้งหมด</a>
  <div class = "list-media">
    <table class="table table-hover">
      <thead>
        <tr>
          <th width="300" class="text-center">คาสเซ็ทไอดี</th>
          <th class="text-center">จำนวนชิ้นย่อย (ตลับ)</th>
          <th class="text-center">ความยาว(นาที)</th>
          <th class="text-center">ผู้ยืม</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($cassette as $item)
        <tr class = "hover table-body" id="cassette-{{$item->id}}">
          <td class="text-center" id="media-id">{{$item->id}}</td>
          <td class="text-center" id="media-part">{{$item->numpart}}</td>
          <td class="text-center" id="media-length">{{$item->length_min}}</td>
          <td class="text-center" id="media-borrower" data-borrower="{{$item->borrower}}">{{$item->borrower}}</td>
          <td class="text-center"><a href = "{{ url('/book/'.$bid.'/cassette/delete/'.$item->id) }}" class="btn btn-danger del_media_btn">ลบ</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
