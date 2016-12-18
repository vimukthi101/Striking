<?php
if(!isset($_SESSION[''])){
	session_start();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Striking Group</title>
<?php
include_once('../ssi/links.php');
?>
</head>

<body>
<div class="container-fluid">
<?php
include_once('../ssi/menu.php');
?>
<div>
<?php
if(isset($_REQUEST['error'])){
	$errorNo = urldecode($_REQUEST['error']);
	$array = json_decode($errorNo);
	foreach($array as $key){
		switch($key){
		case 1:
			echo "First Name could not be empty"; 
			break;
		case 2:
			echo "Last Name could not be empty"; 
			break;
		case 3:
			echo "NIC could not be empty"; 
			break;
		case 4:
			echo "Email could not be empty"; 
			break;
		case 5:
			echo "Password could not be empty"; 
			break;
		case 6:
			echo "Confirm Password field could not be empty"; 
			break;
		case 7:
			echo "Password and Confirm Passwords do not match"; 
			break;
		case 8:
			echo "User name could not be empty"; 
			break;	
		case 9:
			echo "File is  not an image"; 
			break;	
		case 10:
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed."; 
			break;	
		case 11:
			echo "Sorry, File not uploaded!"; 
			break;	
		case 12:
			echo "Sorry, Password is wrong."; 
			break;	
		case 13:
			echo "Item type could not be empty"; 
			break;
		case 14:
			echo "Item code could not be empty"; 
			break;
		case 15:
			echo "Item name could not be empty"; 
			break;
		case 16:
			echo "Item price could not be empty"; 
			break;
		case 17:
			echo "Item Type exists!"; 
			break;
		case 18:
			echo "Contact number could not be empty"; 
			break;
		case 19:
			echo "Address could not be empty"; 
			break;
		default:
			echo "Error! Please try again later."; 
			break;
		}
	}
}
?>
</div>
<?php
include_once('../ssi/footer.php');
?>
</div>
</body>
</html>