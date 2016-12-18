<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "striking_store";
$connect = mysql_connect($server,$user,$password);
$db = mysql_select_db($database);
if($connect){
	if(!$db){
		die('Could not connect to the database! Please try again later.');
	}
} else {
	die('Could not connect to the server! Please try again later.');	
}
?>