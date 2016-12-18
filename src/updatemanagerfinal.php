<?php
if(!isset($_SESSION[''])){
	session_start();
}
include_once('../ssi/db.php');
if($_SESSION['role'] == "admin"){
	if(isset($_POST['submit'])){
		$error = array();
		if($_POST['fname'] == ""){
			$error[] = 1;
		}
		if($_POST['lname'] == ""){
			$error[] = 2;
		}
		if($_POST['nic'] == ""){
			$error[] = 3;
		}  
		if($_POST['contact'] == ""){
			$error[] = 18;
		} 
		if($_POST['address'] == ""){
			$error[] = 19;
		} 
		if(empty($error)){
			$email = $_POST['email'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$nic = $_POST['nic'];
			$contact = $_POST['contact'];
			$address = $_POST['address'];
			$result = mysql_query("UPDATE users SET firstname='".$fname."', lastname='".$lname."', id='".$nic."', contact='".$contact."', address='".$address."' WHERE email='".$email."'") or die();
				if($result){
					header('Location:prompt.php?x=4');	
				} else {
					header('Location:prompt.php?x=111');	
				}
		} else {
			$array = json_encode($error);
			$data = urlencode($array);
			header('Location:error.php?error='.$data);
		}
	}
} else {
	header('Location:login.php');	
}
?>