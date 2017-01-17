@extends('library.layout')

@section('head')
	<title>ลบรายละเอียดผู้ยืม</title>
@stop

@section('body')
<div class="page-header">
	<small>คุณต้องการจะลบรายชื่อนี้ใช่หรือไม่?</small>
</div>
<form action="{{ action('BorrowerSystemController@handleDelete') }}" method="post" role="form">
	<input type="hidden" name="id" value="{{ $member->id }}" />
	<input type="submit" class="btn btn-danger btn-lg" value="Yes"/>
	<a href="{{ action('BorrowerSystemController@index') }}" class="btn btn-primary btn-lg">No</a>
</form>
@stop