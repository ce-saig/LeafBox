<?php  
    include_once(dirname(__FILE__) . '/mysqldump-php/src/Ifsnop/Mysqldump/Mysqldump.php');
    function SQLDUMP_BACKUP($host,$user,$pass,$dbname){
      $dump = new Ifsnop\Mysqldump\Mysqldump('mysql:host='.$host.';dbname='.$dbname, $user, $pass);
      date_default_timezone_set('Asia/Bangkok');
      $dir = 'backup_files/'.date('[Y.m.d][H-i-s]').'leafbox.sql';
      $dump->start($dir);
      echo 'Backup Complete ('.$dir.')';
   }

   SQLDUMP_BACKUP('localhost' ,'root', '', 'leafbox');
?>