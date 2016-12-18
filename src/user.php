<?php
if(!isset($_SESSION[''])){
	session_start();
}
if($_SESSION['role'] == "user"){ ?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Striking Group</title>
	<?php
	include_once('../ssi/links.php');
	?>
    <script>
	$(document).ready(function() {
        $("#contentloader").load("Profile.php");
		$("#myinfo").on("click",function(){
			$("#contentloader").load("Profile.php");
		});
		$("#changepic").on("click",function(){
			$("#contentloader").load("ChangePic.php");
		});
		$("#updateinfo").on("click",function(){
			$("#contentloader").load("UpdateProfile.php");
		});
		$("#changepass").on("click",function(){
			$("#contentloader").load("ChangePass.php");
		});
		$("#cartDetails").on("click",function(){
			$("#contentloader").load("showmyCart.php");
		});
		$("#reviewDetails").on("click",function(){
			$("#contentloader").load("reviewDetails.php");
		});
    });
	</script>
	</head>
	
	<body>
	<div class="container-fluid">
	<?php
	include_once('../ssi/menu.php');
	?>
	<div>
	<div class="col-lg-3">
    <div class="bg-info" style="padding:15px;margin-top:5px;margin-right:5px;">
    <h4 class="text-center">Dashboard</h4>
    <ul style="list-style-type:square">
    <li><a href="#" id="myinfo">My Information</a></li>
    </ul>
    </div>
    <div class="bg-info" style="padding:15px;margin-top:5px;margin-right:5px;">
    <h4 class="text-center">Profile Update</h4>
    <ul style="list-style-type:square">
    <li><a href="#" id="changepic">Change Profile Picture</a></li>
    <li><a href="#" id="updateinfo">Update Information</a></li>
    <li><a href="#" id="changepass">Change Password</a></li>
    </ul>
    </div>
	<div class="bg-info" style="padding:15px;margin-top:5px;margin-right:5px;">
    <h4 class="text-center">My Cart</h4>
    <ul style="list-style-type:square">
    <li><a href="#" id="cartDetails">Checkout Items</a></li>
    <li><a href="#" id="reviewDetails">Received Items</a></li>
    </ul>
    </div>
    </div>
    <div class="col-lg-9" id="contentloader">

    </div>
	</div>
	<?php
	include_once('../ssi/footer.php');
	?>
	</div>
	</body>
	</html>
<?php	} else {
		header('Location:login.php');	
	}
?>
