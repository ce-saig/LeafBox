<div role="tabpanel" class="tab-pane" >
  <a class = "btn btn-danger pull-right del_media_btn_all" href="{{$bid}}/dvd/deleteAll" data-media="dvd" data-bookid="{{$bid}}">ลบสื่อนี้ทั้งหมด</a>
  <div class = "list-media">
    <table class="table table-hover">
      <thead>
        <tr>
          <th class="text-center">ดีวีดีเซ็ทไอดี</th>
          <th class="text-center">จำนวนชิ้นย่อย (แผ่น)</th>
          <th class="text-center">จำนวนแทร็ค(แทร็ค)</th>
          <th class="text-center">ผู้ยืม</th>
        </tr>
       </thead>
      <tbody>
        @foreach ($dvd as $item)
        <tr class = "hover table-body" id="dvd-{{$item->id}}" href="{{$bid}}/dvd/{{$item->id}}">
          <td class="text-center" id="media-id">{{$master==$item->id?"M":""}}{{$item->id}}</td>
          <td class="text-center" id="media-part" data-part="{{$item->numpart}}">{{$item->numpart}} {{$item->submedia_id}}</td>
          <td class="text-center" id="media-length">{{$item->length_min}}</td>
          <td class="text-center" id="media-borrower" data-borrower="{{$item->borrower}}">{{$item->borrower}}</td>
          <td class="text-center"><a href = "{{ url('/book/'.$bid.'/dvd/delete/'.$item->id) }}" class="btn btn-danger del_media_btn">ลบ</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
