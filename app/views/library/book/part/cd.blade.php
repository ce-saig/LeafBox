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
      <tr class = "hover" href="{{$bid}}/cd/{{$item->id}}"> 
        <td>{{$item->id}}</td>
        <td>{{$item->numpart}}</td>
      </tr>
      @endforeach 
    </tbody>
  </table>
</div>