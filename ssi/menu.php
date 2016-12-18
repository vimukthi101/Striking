<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Striking Group</title>
<?php
include_once('links.php');
?>
</head>
<body>
<div class="col-lg-12">
<div class="col-lg-3">
<?php
echo date('d M Y');
?>
</div>
<div class="col-lg-9 text-right">
<?php
if(isset($_SESSION['firstname'])){
	if($_SESSION['role'] == "admin"){
		echo '<p>Welcome <a href="../src/admin.php">'.$_SESSION['firstname'].'</a><button class="btn btn-default"><a href="../src/logout.php"><span class="glyphicon glyphicon-log-out"> LogOut</span></a></button></p>';
	} else if($_SESSION['role'] == "manager"){
		echo '<p>Welcome <a href="../src/manager.php">'.$_SESSION['firstname'].'</a><button class="btn btn-default"><a href="../src/logout.php"><span class="glyphicon glyphicon-log-out"> LogOut</span></a></button></p>';
	} else {
		echo '<p>Welcome <a href="../src/user.php">'.$_SESSION['firstname'].'</a><button class="btn btn-default"><a href="../src/logout.php"><span class="glyphicon glyphicon-log-out"> LogOut</span></a></button></p>';
	}
	
} else {
	echo '<p>Welcome Guest <button class="btn btn-default"><a href="../src/login.php"><span class="glyphicon glyphicon-log-in"> LogIn</span></a></button></p>';
}
?>
</div>
</div>
<div class="col-lg-12">
<div class="col-lg-4">
<a href="../src/index.php"><img src="../images/png_00000.png" alt="Striing Logo" class="img-responsive" /></a>
</div>
<div class="col-lg-8 text-right">
<form action="../src/search.php" role="form" class="form-group form-inline">
<input type="text" name="search" id="search" class="form-control" size="50"/>
<input type="submit" class="form-control" value="Search"/>
</form>
</div>
</div>
<div class="col-lg-12">
<ul class="nav nav-tabs">
  <li role="presentation"><a href="../src/index.php">Home</a></li>
  <li role="presentation"><a href="../src/products.php">Products</a></li>
  <li role="presentation"><a href="../src/aboutus.php">About US</a></li>
  <li role="presentation"><a href="../src/contactus.php">Contact Us</a></li>
  <?php
	if(isset($_SESSION['firstname'])){
		if($_SESSION['role'] == "admin"){
			echo '<li role="presentation"><a href="../src/admin.php">My Profile</a></li>';
		} else if($_SESSION['role'] == "manager"){
			echo '<li role="presentation"><a href="../src/manager.php">My Profile</a></li>';
		} else {
			echo '<li role="presentation"><a href="../src/user.php">My Profile</a></li>';
		}
	} 
  ?>
</ul>
</div>
</body>
</html>