<?php
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$file = $request->file;
	$file = dirname(__FILE__) . '/backup_files/' . $file;
	unlink($file);
?>