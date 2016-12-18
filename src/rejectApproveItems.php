<?php
if(!isset($_SESSION[''])){
	session_start();
}
include_once('../ssi/db.php');
if($_SESSION['role'] == "admin"){
	$code = $_REQUEST['code'];
	$id = $_REQUEST['id'];
	if($id == 1){
		$result = mysql_query("SELECT * FROM tempitems WHERE icode='".$code."'") or die();
		if(mysql_num_rows($result) != 0){
			while($row = mysql_fetch_array($result)){
				$type = $row['itype'];
				$id = $row['icode'];
				$name = $row['iname'];
				$price = $row['iprice'];
				$des = $row['idescription'];
				$pic = $row['ipic'];
				$added = $row['addedby'];
			}
			$result1 = mysql_query("INSERT INTO items VALUES('".$type."','".$id."','".$name."','".$price."','".$des."','".$pic."','".$added."','1')") or die();
			if($result1){
				$result2 = mysql_query("DELETE FROM tempitems WHERE icode='".$code."'") or die();
				if($result2){
					header('Location:prompt.php?x=15');
				} else{
					header('Location:prompt.php?x=111');
				}
			} else {
				header('Location:prompt.php?x=111');
			}
		} else {
			header('Location:prompt.php?x=111');
		}
	} else {
		$result3 = mysql_query("SELECT * FROM tempitems WHERE icode='".$code."'") or die();
		if(mysql_num_rows($result3) != 0){
			while($row = mysql_fetch_array($result3)){
				$type = $row['itype'];
				$id = $row['icode'];
				$name = $row['iname'];
				$price = $row['iprice'];
				$des = $row['idescription'];
				$pic = $row['ipic'];
				$added = $row['addedby'];
			}
			$result4 = mysql_query("INSERT INTO rejecteditems VALUES('".$type."','".$id."','".$name."','".$price."','".$des."','".$pic."','".$added."','-1')") or die();
			if($result4){
				$result5 = mysql_query("DELETE FROM tempitems WHERE icode='".$code."'") or die();
				if($result5){
					header('Location:prompt.php?x=16');
				} else{
					header('Location:prompt.php?x=111');
				}
			} else {
				header('Location:prompt.php?x=111');
			}
		} else {
			header('Location:prompt.php?x=111');
		}
	}
} else {
	header('Location:login.php');	
}
?>