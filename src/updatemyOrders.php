<?php
if(!isset($_SESSION[''])){
	session_start();
}
include_once('../ssi/db.php');
if(isset($_POST['submit'])){
	if(isset($_POST['orderId'])){
		$id = $_POST['orderId'];
		$query = mysql_query("UPDATE orderdetails SET status='1' WHERE orderId='".$id."'") or die();
		if($query){
			header('Location:prompt.php?x=19');
		} else {
			header('Location:prompt.php?x=111');
		}
	}
}
?>

