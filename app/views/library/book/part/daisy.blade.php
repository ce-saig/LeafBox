<div role="tabpanel" class="tab-pane active" >
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
      <tr>
        <td><a href="{{$bid}}/daisy/{{$item->id}}">{{$item->id}}</a></td>
        <td>{{$item->numpart}}</td>
        <td>{{$item->notes}}</td>
      </tr>
      @endforeach 
    </tbody>
  </table>
</div>