<?php
// connect to database
$DBhost="localhost";
$DBuser="jd5688_csv";
$DBpass="smarttech";

//$DBuser="dbmanager";
//$DBpass="smarttech";
mysql_connect($DBhost,$DBuser,$DBpass);
mysql_select_db('jd5688_csv');
mysql_query("SET NAMES 'utf8'");
?>
