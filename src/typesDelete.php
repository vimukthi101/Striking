<?php
if(!isset($_SESSION[''])){
	session_start();
}
include_once('../ssi/db.php');
if($_SESSION['role'] == "admin"){
	if(isset($_POST['submit'])){
		if($_POST['test_text'] == ""){
			header('Location:prompt.php?x=12');	
		} else {
			$old = mysql_real_escape_string(htmlspecialchars($_POST['test_text']));
			$result1 = mysql_query("DELETE FROM itemtypes WHERE itype='".$old."'") or die();
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