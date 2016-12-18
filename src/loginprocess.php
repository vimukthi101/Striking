<?php
if(!isset($_SESSION[''])){
	session_start();
}
include_once('../ssi/db.php');
if(!isset($_SESSION[''])){
	session_start();
}
if(isset($_POST['login'])){
	$error = array();
	if($_POST['username'] == ""){
		$error[] = 8;
	}
	if($_POST['password'] == ""){
		$error[] = 5;
	}
	if(empty($error)){
		$email = mysql_real_escape_string(htmlspecialchars($_POST['username']));
		$password = md5(mysql_real_escape_string(htmlspecialchars($_POST['password'])));
		$result = mysql_query("SELECT * FROM users WHERE email='".$email."' AND password='".$password."'") or die();
		if(mysql_num_rows($result)==0){
			header('Location:prompt.php?x=3');	
		} else {
			while($row = mysql_fetch_array($result)){
				$_SESSION['firstname'] = $row['firstname'];
				$_SESSION['lastname'] = $row['lastname'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['role'] = $row['role'];
				$_SESSION['nic'] = $row['id'];
				if($_SESSION['role'] == "admin"){
					header('Location:admin.php');	
					exit();
				} else if($_SESSION['role'] == "manager"){
					header('Location:manager.php');	
					exit();
				} else {
					header('Location:user.php');	
					exit();
				}	
			}
		}
	} else {
		$array = json_encode($error);
		$data = urlencode($array);
		header('Location:error.php?error='.$data);	
		exit();
	}
}
?>