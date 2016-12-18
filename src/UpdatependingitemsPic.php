<?php
if(!isset($_SESSION[''])){
	session_start();
}
include_once('../ssi/db.php');
$icode = $_POST['code'];
$itype = $_POST['type'];
$ipic = $_FILES['fileToUpload'];
$target_dir = "../addedItems/";
$filename=$_FILES["fileToUpload"]["name"];
$extension=end(explode(".", $filename));
$newfilename=$itype."-".$icode.".".$extension;
$target_file = $target_dir . $newfilename;
$uploadOk = 1;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			$uploadOk = 1;
		} else {
			$error[] = 9;
			$uploadOk = 0;
		}
}
// Allow certain file formats
if($extension != "jpg" && $extension != "png" && $extension != "jpeg"
&& $extension != "gif" ) {
	$error[] = 10;
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $error[] = 11;
	$array = json_encode($error);
	$data = urlencode($array);
	header('Location:error.php?error='.$data);	
// if everything is ok, try to upload file
} else {
	$name = $_SESSION['firstname'];
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		if(mysql_query("UPDATE tempitems SET ipic='".$target_file."' WHERE icode='".$icode."'") or die()){
			header('Location:prompt.php?x=17');	
		} else {
			header('Location:prompt.php?x=7');
		}
    } else {
		header('Location:prompt.php?x=8');
    }
}
?>