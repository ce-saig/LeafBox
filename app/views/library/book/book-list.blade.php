@extends('library.master')

@section('container')
<div class="row">
    <div class="col-md-12 head-topic">
      <div class="col-md-9">
        <h2>Book List</h2>
      </div>
      <div class="col-md-3 new-btn-top">
        <a class="btn btn-primary" href="<?php echo url('/library/book-add'); ?>">Add book</a>
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
            <th>สถานะ</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($books as $book) { ?>
          <tr>
            <td><?php echo $book['IBOOK_NO']; ?></td>
            <td><?php echo $book['ISBN']; ?></td>
            <td><?php echo $book['TITLE']; ?></td>
            <td><?php echo $book['AUTHOR']; ?></td>
            <td><?php echo $book['STATUS']; ?></td>
            <td class="text-center">
              <a href="<?php echo url('/library/book-edit?book_id='.$book['IBOOK_NO']); ?>" alt="Edit"><i class="fa fa-edit"></i></a>
              <a href="<?php echo url('/library/book-edit?book_id='.$book['IBOOK_NO']); ?>" alt="Delete" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash-o"></i></a>
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
