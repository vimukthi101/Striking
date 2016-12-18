<?php
if(!isset($_SESSION[''])){
	session_start();
}
include_once('../ssi/db.php');
if($_SESSION['role'] == "admin"){
	if(isset($_POST['submit'])){
		$error = array();
		if($_POST['type'] == ""){
			$error[] = 13;
		}
		if($_POST['code'] == ""){
			$error[] = 14;
		}
		if($_POST['name'] == ""){
			$error[] = 15;
		}
		if($_POST['price'] == ""){
			$error[] = 16;
		} 
		if(empty($error)){
			$type = $_POST['type'];
			$code = $_POST['code'];
			$name = $_POST['name'];
			$price = $_POST['price'];
			if($_POST['description'] != ""){
				$des = $_POST['description'];
			} else {
				$des = "Contact us for more details.";
			}
			$previous = mysql_query("SELECT * FROM items WHERE code='".$code."' AND type='".$type."' AND name='".$name."' AND price='".$price."' AND description='".$des."'") or die();
			if(mysql_num_rows($previous) == 0){
				$result = mysql_query("UPDATE items SET code='".$code."', price='".$price."', name='".$name."', type='".$type."', description='".$des."' WHERE code='".$code."'") or die();
				if($result){
					header('Location:prompt.php?x=4');	
				} else {
					header('Location:prompt.php?x=111');	
				}
			} else {
				header('Location:prompt.php?x=11');	
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