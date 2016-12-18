<?php
if(!isset($_SESSION[''])){
	session_start();
}
include_once('../ssi/db.php');
if($_SESSION['role'] == "admin"){
	if(isset($_POST['submit'])){
		echo ($_POST['updateType']);
		echo ($_POST['test_text']);
		if($_POST['updateType'] == "" || $_POST['test_text'] == ""){
			header('Location:prompt.php?x=12');	
		} else {
			$old = mysql_real_escape_string(htmlspecialchars($_POST['test_text']));
			$type = mysql_real_escape_string(htmlspecialchars($_POST['updateType']));
			$result = mysql_query("SELECT * FROM itemtypes WHERE itype='".$type."'") or die();
			if(mysql_num_rows($result) == 0){
				$result1 = mysql_query("UPDATE itemtypes SET itype='".$type."' WHERE itype='".$old."'") or die();
				if($result1){
					header('Location:prompt.php?x=4');	
				} else {
					header('Location:prompt.php?x=5');	
				}
			} else {
				header('Location:prompt.php?x=11');	
			}
		}
	}
} else {
	header('Location:login.php');	
}
?>