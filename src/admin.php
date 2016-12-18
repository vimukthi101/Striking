<?php
if(!isset($_SESSION[''])){
	session_start();
}
if($_SESSION['role'] == "admin"){ ?>
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
		$("#addItems").on("click",function(){
			$("#contentloader").load("AddItems.php");
		});
		$("#updateItems").on("click",function(){
			$("#contentloader").load("updateItems.php");
		});
		$("#updateItemPic").on("click",function(){
			$("#contentloader").load("changeItemPic.php");
		});
		$("#deleteItems").on("click",function(){
			$("#contentloader").load("deleteitems.php");
		});
		$("#addTypes").on("click",function(){
			$("#contentloader").load("addTypes.php");
		});
		$("#updateTypes").on("click",function(){
			$("#contentloader").load("updateTypes.php");
		});
		$("#deleteTypes").on("click",function(){
			$("#contentloader").load("deleteTypes.php");
		});
		$("#approveItems").on("click",function(){
			$("#contentloader").load("approveItems.php");
		});
		$("#addManager").on("click",function(){
			$("#contentloader").load("addManager.php");
		});
		$("#updateManager").on("click",function(){
			$("#contentloader").load("updateManager.php");
		});
		$("#deleteManager").on("click",function(){
			$("#contentloader").load("deleteManager.php");
		});
		$("#ourOrders").on("click",function(){
			$("#contentloader").load("ourOrders.php");
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
    <li><a href="#" id="addItems">Add Items</a></li>
    <li><a href="#" id="updateItems">Update Items</a></li>
    <li><a href="#" id="updateItemPic">Update Item Picture</a></li>
    <li><a href="#" id="deleteItems">Delete Items</a></li>
    </ul>
    </div>
    <div class="bg-info" style="padding:15px;margin-top:5px;margin-right:5px;">
    <h4 class="text-center">Item Types</h4>
    <ul style="list-style-type:square">
    <li><a href="#" id="addTypes">Add Types</a></li>
    <li><a href="#" id="updateTypes">Update Types</a></li>
    <li><a href="#" id="deleteTypes">Delete Types</a></li>
    </ul>
    </div>
	<div class="bg-info" style="padding:15px;margin-top:5px;margin-right:5px;">
    <h4 class="text-center">Approvals</h4>
    <ul style="list-style-type:square">
    <li><a href="#" id="approveItems">New Items</a></li>
    </ul>
    </div>
    <div class="bg-info" style="padding:15px;margin-top:5px;margin-right:5px;">
    <h4 class="text-center">Accounts</h4>
    <ul style="list-style-type:square">
    <li><a href="#" id="addManager">Add Managers</a></li>
    <li><a href="#" id="updateManager">Update Managers</a></li>
    <li><a href="#" id="deleteManager">Delete Managers</a></li>
    </ul>
    </div>
    <div class="bg-info" style="padding:15px;margin-top:5px;margin-right:5px;">
    <h4 class="text-center">Orders</h4>
    <ul style="list-style-type:square">
    <li><a href="#" id="ourOrders">Order Details</a></li>
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
