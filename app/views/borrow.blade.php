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
      var jsonArr = jQuery.parseJSON(data);
      console.log('haha');
      console.log(data);
      console.log(typeof jsonArr);
      console.log(jsonArr);
      console.log("****");
      console.log(jsonArr.length);
      console.log(jsonArr[0][0]);
      
      for(var i=0; i<jsonArr.length; i++){
        //console.log(jsonArr[0][0].length);
        for(var brailleIndex = 0; brailleIndex<jsonArr[i][0].length; brailleIndex++){
          $('#result').append("<li> <b>รหัส:</b> " + jsonArr[i][0][brailleIndex].id + " <b>ชื่อหนังสือ:</b>"+jsonArr[i].title +"</li>");
        }

        for(var cassetteIndex = 0; cassetteIndex<jsonArr[i][1].length; cassetteIndex++){
          $('#result').append("<li> <b>รหัส:</b> " + jsonArr[i][1][cassetteIndex].id + " <b>ชื่อหนังสือ:</b>"+jsonArr[i].title +"</li>");
        }

        for(var cdIndex = 0; cdIndex<jsonArr[i][2].length; cdIndex++){
          $('#result').append("<li> <b>รหัส:</b> " + jsonArr[i][2][cdIndex].id + " <b>ชื่อหนังสือ:</b>"+jsonArr[i].title +"</li>");
        }

        for(var daisyIndex = 0; daisyIndex<jsonArr[i][3].length; daisyIndex++){
          $('#result').append("<li> <b>รหัส:</b> " + jsonArr[i][3][daisyIndex].id + " <b>ชื่อหนังสือ:</b>"+jsonArr[i].title +"</li>");
        }

        for(var dvdIndex = 0; dvdIndex<jsonArr[i][4].length; dvdIndex++){
          $('#result').append("<li> <b>รหัส:</b> " + jsonArr[i][4][dvdIndex].id + " <b>ชื่อหนังสือ:</b>"+jsonArr[i].title +"</li>");
        }

      }
    }
  </script>
@stop
