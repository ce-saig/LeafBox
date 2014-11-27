@extends('library.layout')
@section('head')
  <title>ระบบยืมหนังสือ</title>
@stop
@section('body')
 ค้นหาหนังสือ:
  <input type="text" name="" id="search-book"/>
  <ul id="result">
  
  </ul>
@stop
@section('script')
  @parent
  <script type="text/javascript">
    $('#search-book').keyup(function(){
      $('#result').html('');
      if($('#search-book').val() != ''){
        $.get('{{ url('borrowSearch') }}', 
        {keyword: $('#search-book').val()},
        function(data){
          console.log(data);
          if(data != ""){
            addToList(data);
          }
        });
      }
    });

    function addToList(data){
      console.log('addToList');
      console.log(typeof data);
      //data = data.substr(data.indexOf(' ')+1);
      console.log(data);
      //var obj = jQuery.parseJSON(data);
      for(var i=0; i<data.length; i++){
        $('#result').append('<li>'+ data[i].title +'</li>');
      }
    }
  </script>
@stop
