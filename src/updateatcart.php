<?php
if(!isset($_SESSION[''])){
	session_start();
}
include_once('../ssi/db.php');
$contact = htmlspecialchars($_POST['contact']);
$address = htmlspecialchars($_POST['address']);
if($contact=="" || $address == ""){
	header('Location:Prompt.php?x=12');	
} else {
	$result = mysql_query("UPDATE users SET contact='".$contact."', address='".$address."' WHERE email='".$_SESSION['email']."'") or die();
	if($result){
		header('Location:checkout.php');	
	} else {
		header('Location:Prompt.php?x=5');	
	}
}
?>
