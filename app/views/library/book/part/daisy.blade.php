<div role="tabpanel" class="tab-pane active" >

  <a class = "btn btn-danger pull-right" href="{{$bid}}/daisy/deleteAll">ลบสื่อนี้</a>
  <div class="list-media">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>daisy id</th>
          <th>numpart</th>
          <th>notes</th>
        </tr>
       </thead>
      <tbody>
        @foreach ($daisy as $item)
        <tr class = "hover" href="{{$bid}}/daisy/{{$item->id}}">
          <td>{{$item->id}}</td>
          <td>{{$item->numpart}}</td>
          <td>{{$item->notes}}</td>
          <td><a href = "{{ url('/book/'.$bid.'/daisy/delete/'.$item->id) }}"class="btn btn-danger">ลบ</a></td>
        </tr>
        @endforeach 
      </tbody>
    </table>
  </div>
</div>