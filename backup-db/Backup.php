<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "leafbox";

   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
	
   $backup_file  = "/backup-db/leafbox_db.sql";
   $sql = "SELECT * INTO OUTFILE '$backup_file'";
   
   mysql_select_db('leafbox');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not take data backup: ' . mysql_error());
   }
   
   echo "Backedup  data successfully\n";
   
   mysql_close($conn);
?>