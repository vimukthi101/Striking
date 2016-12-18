<?php
if(!isset($_SESSION[''])){
	session_start();
}
if(isset($_GET['email']) && filter_var($_GET['email'],FILTER_VALIDATE_EMAIL)){
	$email = mysql_real_escape_string(htmlspecialchars($_GET['email']));
}
if(isset($_GET['key']) && $_GET['key'] == 32){
	$key = mysql_real_escape_string(htmlspecialchars($_GET['key']));
}
if(isset($_GET['key']) && isset($_GET['email'])){
	$result = mysql_query("SELECT * FROM tempuser WHERE (email='".$email."' AND activation='".$key."') LIMIT 1 ") or die();
	while($row = mysql_fetch_array($result)){
		$id = mysql_real_escape_string($row['id']);
		$firstname = mysql_real_escape_string($row['firstname']);
		$lastname = mysql_real_escape_string($row['lastname']);
		$email = mysql_real_escape_string($row['email']);
		$password = mysql_real_escape_string($row['password']);
		$role = "user";
	}
	$result1 = mysql_query("INSERT INTO users (id,firstname,lastname,email,password,role) VALUES ('".$id."','".$firstname."','".$lastname."','".$email."','".$password."','".$role."')") or die(mysql_error());
	$result2 = mysql_query("DELETE FROM tempuser WHERE email='".$email."' ") or die(mysql_error());
	if(!$result1){
		header( 'Location:prompt.php?x=3' );
	}else{
		header( 'Location:prompt.php?x=0' );
	}
} else {
	header('Location:prompt.php?x=3');	
}
?>