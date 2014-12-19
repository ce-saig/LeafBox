<div role="tabpanel" class="tab-pane active" >
  <table class="table table-hover">
    <thead>
      <tr>
        <th>dvd id</th>
        <th>numpart</th>
        <th>notes</th>
      </tr>
     </thead>
    <tbody>
      @foreach ($dvd as $item)
      <tr class = "hover" href="{{$bid}}/dvd/{{$item->id}}">
        <td>{{$item->id}}</td>
        <td>{{$item->numpart}}</td>
        <td>{{$item->detail()->first()->notes}}</td>
      </tr>

      @endforeach 
    </tbody>
  </table>
</div>