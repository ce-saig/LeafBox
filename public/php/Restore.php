<?php  
	// EXAMPLE:	IMPORT_TABLES("localhost","user","pass","db_name", "my_baseeee.sql"); //TABLES WILL BE OVERWRITTEN
				// P.S. IMPORTANT NOTE for people who try to change/replace some strings  in SQL FILE before importing, MUST READ:  https://goo.gl/2fZDQL
	// https://github.com/tazotodua/useful-php-scripts 
	$host = 'localhost';
	$username = "leafbox";
	$password = "{ko-hv,^]";
	$dbname = "leafbox";

	function CLEAR_TABLES($host,$user,$pass,$dbname){
		$mysqli = new mysqli($host, $user, $pass, $dbname);
		$mysqli->query('SET foreign_key_checks = 0');
		if ($result = $mysqli->query("SHOW TABLES"))
		{
		    while($row = $result->fetch_array(MYSQLI_NUM))
		    {
		        $mysqli->query('DROP TABLE IF EXISTS '.$row[0]);
		    }
		}

		$mysqli->query('SET foreign_key_checks = 1');
		$mysqli->close();
	}


	function IMPORT_TABLES($host,$user,$pass,$dbname, $sql_file_OR_content){
		set_time_limit(3000);
		$SQL_CONTENT = (strlen($sql_file_OR_content) > 300 ?  $sql_file_OR_content : file_get_contents($sql_file_OR_content)  );  
		$allLines = explode("\n",$SQL_CONTENT); 
		$mysqli = new mysqli($host, $user, $pass, $dbname); if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();} 
			$zzzzzz = $mysqli->query('SET foreign_key_checks = 0');	        preg_match_all("/\nCREATE TABLE(.*?)\`(.*?)\`/si", "\n". $SQL_CONTENT, $target_tables); foreach ($target_tables[2] as $table){$mysqli->query('DROP TABLE IF EXISTS '.$table);}         $zzzzzz = $mysqli->query('SET foreign_key_checks = 1');    $mysqli->query("SET NAMES 'utf8'");	
		$templine = '';	// Temporary variable, used to store current query
		foreach ($allLines as $line)	{											// Loop through each line
			if (substr($line, 0, 2) != '--' && $line != '') {$templine .= $line; 	// (if it is not a comment..) Add this line to the current segment
				if (substr(trim($line), -1, 1) == ';') {		// If it has a semicolon at the end, it's the end of the query
					if(!$mysqli->query($templine)){ print('Error performing query \'<strong>' . $templine . '\': ' . $mysqli->error . '<br /><br />');  }  $templine = ''; // set variable to empty, to start picking up the lines after ";"
				}
			}
		}	
		return 'Importing finished. Now, Delete the import file.';
		echo "Restore Complete (".$sql_file_OR_content.")";
	}   //see also export.php 
	
	CLEAR_TABLES($host, $username, $password, $dbname);
	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$file = $request->file;
	$file = dirname(__FILE__) . '/backup_files/' . $file;
	IMPORT_TABLES($host, $username, $password, $dbname, $file);

	$used = $request->used;
	if($used != null){
		$used = dirname(__FILE__) . '/backup_files/' . $used;
		rename($used, substr($used, 0, strlen($used)-9) .'.sql');
	}
	rename($file, substr($file, 0, strlen($file)-4) .'_used'.'.sql');
?>