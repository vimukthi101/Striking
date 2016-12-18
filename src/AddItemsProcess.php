<?php
if(!isset($_SESSION[''])){
	session_start();
}
include_once('../ssi/db.php');
if(($_SESSION['role'] == "manager") or ($_SESSION['role'] == "admin")){ 
	if(isset($_POST['submit'])){ 
		$error = array();
		if($_POST['test_text'] == ""){
			$error[] = 13;
		}
		if($_POST['icode'] == ""){
			$error[] = 14;
		}
		if($_POST['iname'] == ""){
			$error[] = 15;
		}
		if($_POST['iprice'] == ""){
			$error[] = 16;
		}
		if(empty($_FILES['ipic'])){
			$error[] = 11;
		} 
		if(empty($error)){
			$itype = $_POST['test_text'];
			$icode = $_POST['icode'];
			$iname = $_POST['iname'];
			$iprice = $_POST['iprice'];
			$addedby = $_SESSION['email'];
			if($_POST['idescription'] != ""){
				$ides = $_POST['idescription'];
			} else {
				$ides = "Contact us for more details.";
			}
			if(isset($_FILES['ipic'])){
				$ipic = $_FILES['ipic'];
				$target_dir = "../addedItems/";
				$filename=$_FILES["ipic"]["name"];
				$extension=end(explode(".", $filename));
				$newfilename=$itype."-".$icode.".".$extension;
				$target_file = $target_dir . $newfilename;
				move_uploaded_file($_FILES["ipic"]["tmp_name"], $target_file);
			}
			$previous = mysql_query("SELECT * FROM tempitems WHERE icode='".$icode."'") or die();
			$previous1 = mysql_query("SELECT * FROM items WHERE code='".$icode."'") or die();;
			if(mysql_num_rows($previous) == 0){
				if(mysql_num_rows($previous1) ==0){
					$result = mysql_query("INSERT INTO tempitems VALUES('".$itype."','".$icode."','".$iname."','".$iprice."','".$ides."','".$target_file."','".$addedby."','0')") or die();
				if($result){
					header('Location:prompt.php?x=10');	
				} else {
					header('Location:prompt.php?x=111');	
				}
				} else {
				header('Location:prompt.php?x=11');	
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