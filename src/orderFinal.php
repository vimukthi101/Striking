<?php
if(!isset($_SESSION[''])){
	session_start();
}
include_once('../ssi/db.php');
if(isset($_POST['submit'])){
	$user = $_SESSION['email'];
	$code = $_SESSION['code'];
	$qty = $_SESSION['qty'];
	$price = $_SESSION['tPrice'];
	$query = mysql_query("INSERT INTO orderDetails VALUES('".$user."','".$code."','".$qty."','".$price."','','0')") or die();
	if($query){
		header('Location:prompt.php?x=19');
	} else {
		header('Location:prompt.php?x=18');
	}
}
?>
