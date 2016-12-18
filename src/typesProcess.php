<?php
if(!isset($_SESSION[''])){
	session_start();
}
include_once('../ssi/db.php');
if($_SESSION['role'] == "admin"){
	if(isset($_POST['submit'])){
		if($_POST['type'] == ""){
			header('Location:prompt.php?x=12');	
		} else {
			$type = mysql_real_escape_string(htmlspecialchars($_POST['type']));
			$result = mysql_query("SELECT * FROM itemtypes WHERE itype='".$type."'") or die();
			if(mysql_num_rows($result) == 0){
				$result1 = mysql_query("INSERT INTO itemtypes VALUES('".$type."')") or die();
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