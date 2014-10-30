@extends('library.master')

@section('container')
<script>$('body').attr('id', 'book-add-page');</script>
<div class="row">
  <div class="col-md-12 head-topic">
    <div class="col-md-8"><h2>Edit <?php echo $type; ?></h2></div>
    <div class="col-md-4 new-btn-top">
      <a class="btn btn-primary" href="<?php echo url('/library/detail-add?book_id='.$book["IBOOK_NO"].'&type='.$type.'&order_id='.$navigation->get()->count()); ?>">Add {{$type}}</a>
    </div>
    <div class="col-md-12 border"></div>
  </div>
  <div class="col-md-12" style="padding-bottom: 20px;">
    <div class="btn-group">
      <?php $i = 0; ?>
      @foreach($navigation->get() as $nav)
        <?php $disabled=""; if($detail->id == $nav->id) $disabled="disabled"; ?>
        <a href="{{ URL::to('library/book-detail?book_id='.$book["IBOOK_NO"].'&type=cassette&order_id='.$i) }}" class="btn btn-info {{$disabled}}">{{$nav->id}}</a>
        <?php $i++; ?>
      @endforeach
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-input panel panel-default">  
      <div class="panel-heading">
        <ol class="breadcrumb">
          <li><a href="{{ URL::to('library/book') }}">List</a></li>
          <li><a href="{{ URL::to('library/book-edit?book_id='.$book["IBOOK_NO"]) }}">Book</a></li>
          <li class="active">{{$type." ".$detail->id}}</li>
        </ol>
      </div>
      <div class="panel-body">  
        <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $detail->id; ?>" />
          <input type="hidden" name="type" value="<?php echo $type; ?>" />
          <input type="hidden" name="order_id" value="{{$order}}" />
          <div class="form-group">
            <label for="inputStatus" class="col-sm-2 control-label">Book</label>
            <div class="col-sm-3">
              <select name="book_id" class="form-control" disabled>
                <?php foreach($book_all as $books) { ?>
                  <option value="<?php echo $books['IBOOK_NO']; ?>"><?php echo $books['TITLE']; ?></option>
                <?php } ?>
              </select>
              <script>$('[name=book_id]').val('<?php echo $book["IBOOK_NO"]; ?>');</script>
            </div>
          </div>
          <div class="form-group">
            <label for="inputStatus" class="col-sm-2 control-label">Reserve</label>
            <div class="col-sm-3">
              <select name="reserve" class="form-control" onchange="return check_reserve();">
                <option value="yes">ยืม</option>
                <option value="no">ไม่โดนยืม</option>
              </select>
                <script>$('[name=reserve]').val('{{$detail->RESERVED}}');</script>
            </div>
            <div class="clearfix"></div>
            <section class="reserve-detail">
              <div class="col-sm-12 clearpadding">
                <label for="inputStatus" class="col-sm-2 control-label">Member</label>
                <div class="col-sm-3">
                  <select name="member_id" class="form-control">
                      <option value="0">กรุณาเลือกชื่อ</option>
                    <?php foreach($members as $member) { ?>
                      <option value="<?php echo $member['MEMBER_NO']; ?>"><?php echo $member['NAME']; ?></option>
                    <?php } ?>
                  </select>
                  <script>$('[name=member_id]').val('<?php echo $detail->borrow->MEMBER_NO; ?>');</script>
                </div>
              </div>
              <div class="col-sm-12 clearpadding">
                <label for="inputTitle" class="col-sm-2 control-label">Borrow Date</label>
                <div class="col-sm-3">
                  <input name="BORROWED_DATE" type="text" class="form-control datepicker" placeholder="08-08-2014" value="{{$detail->borrow->BORROWED_DATE}}">
                </div>
              </div>
              <div class="col-sm-12 clearpadding">
                <label for="inputTitle" class="col-sm-2 control-label">Return Date</label>
                <div class="col-sm-3">
                  <input name="RETURNED_DATE" type="text" class="form-control datepicker" placeholder="08-08-2014" value="{{$detail->borrow->RETURNED_DATE}}">
                </div>
              </div>
            </section>
          </div>
          <div class="form-group">
            <label for="inputTitle" class="col-sm-2 control-label">Producted Date</label>
            <div class="col-sm-3">
              <input name="PRODUCED_DATE" type="text" class="form-control datepicker" placeholder="08-08-2014" value="{{$detail->PRODUCED_DATE}}">
            </div>
          </div>
          @if ($type != "braille")
          <div class="form-group">
            <label for="inputDesc" class="col-sm-2 control-label">Notes</label>
            <div class="col-sm-6">
              <div><textarea name="NOTES" class="form-control" placeholder="Notes" value="{{$detail->NOTES}}" rows="3"></textarea></div>
            </div>
          </div>
          @else
          <div class="form-group">
            <label for="inputDesc" class="col-sm-2 control-label">Examiner</label>
            <div class="col-sm-6">
              <input name="EXAMINER" type="text" class="form-control" placeholder="คาลิล ยิบราน" value="{{$detail->EXAMINER}}">
            </div>
          </div>
          @endif
          <section id="numpart-content-wrapper">
            <div class="form-group">
              <label for="inputTitle" class="col-sm-2 control-label">Numpart</label>
              @if ($type != "braille")
              <div class="col-sm-3">
                <input name="NUM_DISABLED" type="text" class="form-control" id="inputTitle" placeholder="1" value="{{$detail->NUMPART}}" disabled>
                <input name="NUMPART" type="hidden" value="{{$detail->NUMPART}}">
              </div>
              <div class="col-sm-2 step-add-btn"><a class="btn btn-primary" id="add-step-button" href="#" onclick="return add_step();" style="width: 100%;"><span class="fa fa-plus"></span> Part</a></div>
              @else
              <div class="col-sm-3">
                <input name="NUMPART" type="text" class="form-control" id="inputTitle" placeholder="1" value="{{$detail->NUMPART}}">
              </div>
              @endif
            </div>
            @if ($type != "braille")
              @foreach($detail->detail()->get() as $part)
              <div class="form-group numpart-content">
                <label for="inputStatus" class="col-sm-2 control-label">Numpart : {{$part->PART}}</label>
                <div class="col-sm-3 step-title">
                  <select name="part[{{ $part->id }}][status]" id="status{{ $part->id }}" class="form-control">
                      <option value="ปกติ">ปกติ</option>
                      <option value="ชำรุด">ชำรุด</option>
                  </select>
                  <script>$('#status{{ $part->id }}').val('{{ $part->STATUS }}');</script>
                </div>
                <div class="col-sm-5">
                  <input name="part[{{ $part->id }}][notes]" type="text" class="form-control" id="inputTitle" placeholder="Notes" value="{{$part->NOTES}}">
                </div>
              </div>
              @endforeach
            @endif
            </section>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button class="btn btn-primary" id="save-button">Save</button>
              <input type="button" class="btn btn-danger" onclick="location.href=&quot;/library/book&quot;;" value="Cancel">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>

    $(function() {
      check_reserve();
    });

    function add_step() {
        var i = $('#numpart-content-wrapper .numpart-content').length+1;
        $('#numpart-content-wrapper').append(' \
              <div class="form-group numpart-content"> \
              <label for="inputStatus" class="col-sm-2 control-label">New Part</label> \
              <div class="col-sm-3 step-title"> \
                <select name="addpart['+i+'][status]" id="status'+i+'" class="form-control"> \
                    <option value="ปกติ">ปกติ</option> \
                    <option value="ชำรุด">ชำรุด</option> \
                </select> \
              </div> \
              <div class="col-sm-5"> \
                <input name="addpart['+i+'][notes]" type="text" class="form-control" id="inputTitle" placeholder="Notes"> \
              </div> \
            </div>');

        $('[name=NUM_DISABLED]').val(i);
        $('[name=NUMPART]').val(i);

        return false;
    }
    function check_reserve() {
      var reserve = $('[name=reserve]').val();
      if (reserve == "yes") {
        $('[name=member_id]').removeAttr('disabled');
        $('[name=BORROWED_DATE]').removeAttr('disabled');
        $('[name=RETURNED_DATE]').removeAttr('disabled');
      }
      else {
        $('[name=member_id]').attr('disabled', 'disabled');
        $('[name=BORROWED_DATE]').attr('disabled', 'disabled');
        $('[name=RETURNED_DATE]').attr('disabled', 'disabled');
      }
      return false;
    }
</script>

@stop
