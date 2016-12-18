<?php
if(!isset($_SESSION[''])){
	session_start();
}
if($_SESSION['role'] == "manager"){ ?>
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
		$("#myitems").on("click",function(){
			$("#contentloader").load("MyItems.php");
		});
		$("#additems").on("click",function(){
			$("#contentloader").load("AddItems.php");
		});
		$("#myItemsPending").on("click",function(){
			$("#contentloader").load("myItemsPending.php");
		});
		$("#rejectedItems").on("click",function(){
			$("#contentloader").load("rejectedItems.php");
		});
		$("#updateItemsPending").on("click",function(){
			$("#contentloader").load("updateItemsPending.php");
		});
		$("#updateItemsPendingPic").on("click",function(){
			$("#contentloader").load("updateItemsPendingPic.php");
		});
		$("#deleteItemsPending").on("click",function(){
			$("#contentloader").load("deleteItemsPending.php");
		});
		$("#myOrders").on("click",function(){
			$("#contentloader").load("myOrders.php");
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
    <h4 class="text-center">Items</h4>
    <ul style="list-style-type:square">
    <li><a href="#" id="myitems">My Items</a></li>
    <li><a href="#" id="additems">Add Items</a></li>
    </ul>
    </div>
    <div class="bg-info" style="padding:15px;margin-top:5px;margin-right:5px;">
    <h4 class="text-center">Pending Items</h4>
    <ul style="list-style-type:square">
    <li><a href="#" id="myItemsPending">Items Pending Approval</a></li>
    <li><a href="#" id="rejectedItems">Items Rejected</a></li>
    <li><a href="#" id="updateItemsPending">Update Pending Items</a></li>
    <li><a href="#" id="updateItemsPendingPic">Update Pending Items Picture</a></li>
    <li><a href="#" id="deleteItemsPending">Delete Pending Items</a></li>
    </ul>
    </div>
    <div class="bg-info" style="padding:15px;margin-top:5px;margin-right:5px;">
    <h4 class="text-center">Order Details</h4>
    <ul style="list-style-type:square">
    <li><a href="#" id="myOrders">My Orders</a></li>
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

