<?php
if(!isset($_SESSION[''])){
	session_start();
}
include_once('../ssi/db.php');
if(!isset($_SESSION[''])){
	$error = array();
	if(isset($_POST['submit'])){
	if($_POST['firstname'] == ""){
		$error[] = 1;
	}
	if($_POST['lastname'] == ""){
		$error[] = 2;
	}
	if($_POST['nic'] == ""){
		$error[] = 3;
	}
	if($_POST['email'] == ""){
		$error[] = 4;
	}
	if($_POST['password'] == ""){
		$error[] = 5;
	}
	if($_POST['cpassword'] == ""){
		$error[] = 6;
	}
	if($_POST['password'] != $_POST['cpassword']){
		$error[] = 7;
	}
	if(empty($error)){
		$firstname = mysql_real_escape_string(htmlspecialchars($_POST['firstname']));
		$lastname = mysql_real_escape_string(htmlspecialchars($_POST['lastname']));
		$email = mysql_real_escape_string(htmlspecialchars($_POST['email']));
		$nic = mysql_real_escape_string(htmlspecialchars($_POST['nic']));
		$password = md5(mysql_real_escape_string(htmlspecialchars($_POST['password'])));	
		$result = mysql_query("SELECT * FROM tempuser WHERE email='".$email."'") or die();
		$result2 = mysql_query("SELECT * FROM users WHERE email='".$email."'") or die();
		if(mysql_num_rows($result) == 0 or mysql_num_rows($result2) == 0 ){
			$activation = md5(uniqid(rand(),true));
			$result1 = mysql_query("INSERT INTO tempuser VALUES ('".$nic."','".$firstname."','".$lastname."','".$email."','".$password."','".$activation."')") or die();
			if(!$result1){
				die('Could not insert into database!');
			}else{
				$message = "To activate your account, please click on this link: \n\n";
				$message.= "http://localhost/Striking".'/activate.php?email='.urlencode($email)."&key=".$activation."";
				mail($email, 'Registration Confirmation', $message);
				header('Location:prompt.php?x=2');
			}
		} else {
			header('Location:prompt.php?x=1');	
		}
	} else {
		$array = json_encode($error);
		$data = urlencode($array);
		header('Location:error.php?error='.$data);	
	}
}
} else {
	header('Location:user.php');	
}
?>