@extends('library.master')

@section('container')
<div class="row">
    <div class="col-md-12 head-topic">
      <div class="col-md-9">
        <h2>Borrow List</h2>
      </div>
      <!-- <div class="col-md-5 form-group">
        <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
          <div class="input-group">
            <div class="input-group-addon">Search</div>
            <input name="search" class="form-control" type="text" placeholder="Enter book name" value="{{$search}}">
          </div>
        </form>
      </div> -->
      <div class="col-md-12 border clearpadding"></div>
    </div>
    <div class="col-md-12">
      <table id="activity-list" class="table table-striped table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>ISBN</th>
            <th>Name</th>
            <th>Author</th>
            <th class="text-center" width="60">Braille</th>
            <th class="text-center" width="60">Cassette</th>
            <th class="text-center" width="60">DAISY</th>
            <th class="text-center" width="60">CD</th>
            <th class="text-center" width="60">DVD</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($books as $book) { ?>
          <tr>
            <td><?php echo $book['IBOOK_NO']; ?></td>
            <td><?php echo $book['ISBN']; ?></td>
            <td><?php echo $book['TITLE']; ?></td>
            <td><?php echo $book['AUTHOR']; ?></td>
            <td class="text-center">
              <?php 
                echo "(".$book->braille()->count().") ";
                if($book->braille()->count() != 0) echo "<a href='/library/book-detail?book_id=".$book['IBOOK_NO']."&type=braille'><i class='fa fa-list'></i></a> ";
                else echo "<a href='/library/book-detail?book_id=".$book['IBOOK_NO']."&type=braille'><i class='fa fa-list icon-red'></i></a> ";
              ?>
            </td>
            <td class="text-center">
              <?php 
                echo "(".$book->cassette()->count().") ";
                if($book->cassette()->count() != 0) echo "<a href='/library/book-detail?book_id=".$book['IBOOK_NO']."&type=cassette'><i class='fa fa-list'></i></a> ";
                else echo "<a href='/library/book-detail?book_id=".$book['IBOOK_NO']."&type=cassette'><i class='fa fa-list icon-red'></i></a> ";
              ?>
            </td>
            <td class="text-center">
              <?php 
                echo "(".$book->daisy()->count().") ";
                if($book->daisy()->count() != 0) echo "<a href='/library/book-detail?book_id=".$book['IBOOK_NO']."&type=daisy'><i class='fa fa-list'></i></a> ";
                else echo "<a href='/library/book-detail?book_id=".$book['IBOOK_NO']."&type=daisy'><i class='fa fa-list icon-red'></i></a> ";
              ?>
            </td>
            <td class="text-center">
              <?php 
                echo "(".$book->cd()->count().") ";
                if($book->cd()->count() != 0) echo "<a href='/library/book-detail?book_id=".$book['IBOOK_NO']."&type=cd'><i class='fa fa-list'></i></a> ";
                else echo "<a href='/library/book-detail?book_id=".$book['IBOOK_NO']."&type=cd'><i class='fa fa-list icon-red'></i></a> ";
              ?>
            </td>
            <td class="text-center">
              <?php 
                echo "(".$book->dvd()->count().") ";
                if($book->dvd()->count() != 0) echo "<a href='/library/book-detail?book_id=".$book['IBOOK_NO']."&type=dvd'><i class='fa fa-list'></i></a> ";
                else echo "<a href='/library/book-detail?book_id=".$book['IBOOK_NO']."&type=dvd'><i class='fa fa-list icon-red'></i></a> ";
              ?>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('#activity-list').dataTable();
  } );
</script>
@stop
