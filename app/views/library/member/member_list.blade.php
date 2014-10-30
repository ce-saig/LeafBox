@extends('library.master')

@section('container')
<div class="row">
    <div class="col-md-12 head-topic">
      <div class="col-md-9">
        <h2>Member</h2>
      </div>
      <div class="col-md-3 new-btn-top">
        <a class="btn btn-primary" href="<?php echo url('/library/member-add'); ?>">New member</a>
      </div>
      <div class="col-md-5 form-group">
        <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
          <div class="input-group">
            <div class="input-group-addon">Search</div>
            <input name="search" class="form-control" type="text" placeholder="Enter member name">
          </div>
        </form>
      </div>
      <div class="col-md-12 border clearpadding"></div>
    </div>
    <div class="col-md-12">
      <table id="member-list" class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Address</th>
            <th>Status</th>
            <th>Phone No.</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $postion['user'] = "สมาชิกทั่วไป";
          $postion['vip'] = "สมาชิก VIP";
          $postion['institute'] = "หน่วยงาน";
        ?>
          <?php foreach($members as $member) { ?>
          <tr>
            <td><?php echo $member['MEMBER_NO']; ?></td>
            <td><?php echo $member['NAME']; ?></td>
            <td><?php echo $member['ADDRESS']; ?></td>
            <td><?php echo $postion[$member['MEMBER_STATUS']]; ?></td>
            <td ><?php echo $member['PHONE_NO']; ?></td>
            <td class="text-center">
              <a href="<?php echo url('library/member-edit?member_id='.$member['MEMBER_NO']); ?>"><i class="fa fa-edit"></i></a>
              <a href="<?php echo url('library/member-remove?member_id='.$member['MEMBER_NO']); ?>" alt="Delete" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash-o"></i></a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

</div>
@stop