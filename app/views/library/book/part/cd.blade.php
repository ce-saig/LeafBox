<div role="tabpanel" class="tab-pane active" >
  <table class="table table-hover">
    <thead>
      <tr>
        <th>cd id</th>
        <th>numpart</th>
        <th>notes</th>
      </tr>
     </thead>
    <tbody>
      @foreach ($cd as $item)
      <tr>
        <td><a href="{{$bid}}/cd/{{$item->id}}">{{$item->id}}</a></td>
        <td>{{$item->numpart}}</td>
        <td>{{$item->notes}}</td>
      </tr>
      @endforeach 
    </tbody>
  </table>
</div>