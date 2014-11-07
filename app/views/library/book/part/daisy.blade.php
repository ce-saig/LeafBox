<div role="tabpanel" class="tab-pane active" >
  <table class="table table-hover">
    <thead>
      <tr>
        <th width="300">daisy id</th>
        <th>numpart</th>
        <th>notes</th>
      </tr>
     </thead>
    <tbody>
      @foreach ($daisy as $item)
      <tr>
        <td width="300">{{$item->id}}</td>
        <td>{{$item->numpart}}</td>
        <td>{{$item->notes}}</td>
      </tr>
      @endforeach 
    </tbody>
  </table>
</div>