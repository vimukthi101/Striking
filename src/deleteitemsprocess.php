<?php
if(!isset($_SESSION[''])){
	session_start();
}
include_once('../ssi/db.php');
if($_SESSION['role'] == "admin"){
	if(isset($_POST['submit'])){
		if($_POST['code'] == ""){
			header('Location:prompt.php?x=12');	
		} else {
			$code = mysql_real_escape_string(htmlspecialchars($_POST['code']));
			$result1 = mysql_query("DELETE FROM items WHERE code='".$code."'") or die();
			if($result1){
				header('Location:prompt.php?x=13');	
			} else {
				header('Location:prompt.php?x=14');	
			}
		}
	}
} else {
	header('Location:login.php');	
}
?>