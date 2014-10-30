@extends('library.master')

@section('container')
<div class="panel">
    <div class="panel-title"><?php echo $product['name']; ?></div>
    <div class="panel-content">
        <?php echo $product['content']; ?>
    </div>
</div>
@stop
