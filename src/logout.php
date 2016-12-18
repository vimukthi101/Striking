<?php
if(!isset($_SESSION[''])){
	session_start();
}
unset($_SESSION['firstname']);
unset($_SESSION['lastname']);
unset($_SESSION['email']);
unset($_SESSION['role']);
unset($_SESSION['nic']);
header("refresh:5,url=login.php");
?>
<html>
<head>
<?php
include_once('../ssi/links.php');
?>
</head>
<body>
<div class="container-fluid">
<?php
include_once('../ssi/menu.php');
?>
<div class="col-lg-12">
<h3>Succesfully Log Out, Have a nice day!</h3>
</div>
<?php
include_once('../ssi/footer.php');
?>
</div>
</body>
</html>