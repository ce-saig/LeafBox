<div role="tabpanel" class="tab-pane active" id="detail">

  <a class = "btn btn-danger pull-right" href="{{$bid}}/braille/deleteAll">ลบสื่อนี้</a>
  <div class = "list-media">
    <table class="table table-hover">
      <thead>
        <tr>
          <th width="300">braille id</th>
          <th>status</th>
          <th>page</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($braille as $item)
          <tr>
            <td width="300">{{$item->id}}</td>
            <td>{{$item->status}}NEED BORROW SYSTEM</td>
            <td>{{$item->pages}}</td>
          </tr>
        @endforeach 
      </tbody>
    </table>
  </div>
</div>