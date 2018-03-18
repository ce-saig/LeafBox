<?php 
	$dir    = dirname(__FILE__) . '/backup_files';
	$files = scandir($dir);
	echo json_encode($files);
?>