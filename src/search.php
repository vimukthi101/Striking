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
<?php
include_once('../ssi/footer.php');
?>
</div>
</body>
</html>