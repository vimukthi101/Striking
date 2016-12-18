<?php
if(!isset($_SESSION[''])){
	session_start();
}
include_once('../ssi/db.php');
if(isset($_POST['submit'])){
	if($_POST['old'] == ""){
		$error[] = 5;
	}
	if($_POST['new'] == ""){
		$error[] = 5;
	}
	if($_POST['newr'] == ""){
		$error[] = 6;
	}
	if(empty($error)){
		$old = md5($_POST['old']);
		$new = $_POST['new'];
		$newr = $_POST['newr'];
		$result = mysql_query("SELECT password FROM users WHERE email='".$_SESSION['email']."'") or die();
		if(mysql_num_rows($result) != 0){
			while($row = mysql_fetch_array($result)){
				$pass = $row['password'];
			}
			if($pass == $old){
				if($new == $newr){				
						$newpass = md5($newr);
						$result1 = mysql_query("UPDATE users SET password='".$newpass."' WHERE email='".$_SESSION['email']."' AND password='".$old."'") or die();
						if($result1){
							header('Location:prompt.php?x=4');
						} else {
							header('Location:prompt.php?x=5');
						}
				} else {
					header('Location:prompt.php?x=8');
				}
			} else {
				header('Location:prompt.php?x=9');
			}
		} else {
			header('Location:prompt.php?x=9');
		}
	} else {
		$array = json_encode($error);
		$msg = urlencode($array);
		header('Location:error.php?error='.$msg);
	}
}
?>