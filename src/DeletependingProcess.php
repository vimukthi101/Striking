<?php
if(!isset($_SESSION[''])){
	session_start();
}
include_once('../ssi/db.php');
if($_SESSION['role'] == "manager"){
if(isset($_POST['submit'])){
$code = $_POST['code'];
$result = mysql_query("DELETE FROM tempitems WHERE icode='".$code."'") or die();
if($result){
header('Location:prompt.php?x=13');	
} else {
header('Location:prompt.php?x=111');	
}
}
} else {
	header('Location:login.php');	
}
?>