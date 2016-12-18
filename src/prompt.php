<?php
if(!isset($_SESSION[''])){
	session_start();
}
$x = $_GET['x'];
$message = "";
if($x != ""){
	if(is_numeric($x)){
		switch($x){
			case 0 : 
				$message = "Congratulations! You are a member now. Please<a href=\"login.php\"> LogIn </a>to continue.";
				break;
			case 1 : 
				$message = "Sorry! Another account has been created by the same E-mail Address.";
				break;
			case 2 : 
				$message = "Thank you for registering! A confirmation email has been sent to your email. Please click on the activation link to activate your account.";
				break;	
			case 3 : 
				$message = "User name and Password combination does not match!";
				break;	
			case 4 : 
				$message = "Updated Succesfully!";
				break;	
			case 5 : 
				$message = "Couldn't update! Please try again later.";
				break;	
			case 6 : 
				$message = "Profile picture changed succesfully";
				break;		
			case 7 : 
				$message = "Sorry, there was an error uploading your file. Please try again later!";
				break;	
			case 8:
				$message = "Password and Confirm Passwords do not match"; 
				break;	
			case 9:
				$message = "Password wrong!"; 
				break;	
			case 10:
				$message = "Item is added and waiting for the admin approval."; 
				break;	
			case 11:
				$message = "Sorry the item exists!"; 
				break;	
			case 12:
				$message = "Empty field!"; 
				break;	
			case 13 : 
				$message = "Deleted Succesfully!";
				break;	
			case 14 : 
				$message = "Couldn't delete! Please try again later.";
				break;	
			case 15 : 
				$message = "Item Approved!";
				break;	
			case 16 : 
				$message = "Item Rejected!";
				break;
			case 17 : 
				$message = "Item picture changed succesfully";
				break;	
			case 18 : 
				$message = "Couldn't put the order. Please try again later!";
				break;	
			case 19 : 
				$message = "The order is received succesfully. We will contact you soon regarding the order. Thank You!";
				break;	
			case 19 : 
				$message = "The order is reviewed succesfully! Please try to send the order as soon as possible.";
				break;
			default:
				$message = "Something went wrong! Please try again later.";
				break;	
		}
	}
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
echo $message;
?>
</div>
<?php
include_once('../ssi/footer.php');
?>
</div>
</body>
</html>