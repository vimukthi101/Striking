<?php
if(!isset($_SESSION[''])){
	session_start();
}
include_once('../ssi/db.php');
?>
<html>
<head>
<?php
include_once('../ssi/links.php');
?>
</head>
<?php
if(isset($_POST['submit'])){
	if($_POST['firstname'] != ""){
		$firstname = mysql_real_escape_string(htmlspecialchars($_POST['firstname']));
	} else {
		$firstname = $_SESSION['firstname'];
	}
	if($_POST['lastname'] != ""){
		$lastname = mysql_real_escape_string(htmlspecialchars($_POST['lastname']));	
	} else {
		$lastname = $_SESSION['lastname'];
	}
	if($_POST['nic'] != ""){
		$nic = mysql_real_escape_string(htmlspecialchars($_POST['nic']));	
	} else {
		$nic = $_SESSION['nic'];
	}
	if($_POST['address'] != ""){
		$address = mysql_real_escape_string(htmlspecialchars($_POST['address']));	
	} else {
		$address = "null";
	}
	if($_POST['contact'] != ""){
		$contact = mysql_real_escape_string(htmlspecialchars($_POST['contact']));	
	} else {
		$contact = "0";
	}
	$result = mysql_query("UPDATE users SET id='".$nic."', firstname='".$firstname."', lastname='".$lastname."', address='".$address."', contact='".$contact."' WHERE email='".$_SESSION['email']."'") or die();
	if($result){
		header('Location:prompt.php?x=4');
	} else {
		header('Location:prompt.php?x=5');
	}
}
?>
</html>