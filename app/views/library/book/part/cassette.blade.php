<div role="tabpanel" class="tab-pane active" >
  <table class="table table-hover">
    <thead>
      <tr>
        <th width="300">ลำดับที่</th>
        <th>จำนวนส่วน</th>
      </tr>
     </thead>
    <tbody>
      @foreach ($cassette as $item)      
    <tr  href="{{$bid}}/cassette/{{$item->id}}">
        <td>{{$item->id}}</td>
        <td>{{$item->numpart}}</td>
    </tr>      
      @endforeach 
    </tbody>
  </table>
</div>