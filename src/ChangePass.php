<?php
if(!isset($_SESSION[''])){
	session_start();
}
include_once('../ssi/db.php');
?>
<html>
<head>
<?php
include_once('../ssi/links.php');
?>
</head>
<div>
<h4>Change Password</h4>
<form action="pass.php" method="post" enctype="multipart/form-data" role="form" class="form-group">
<table class="table table-responsive table-hover">
<tr>
<td colspan="2">Are you sure you want to change your password?</td>
</tr>
<tr>
<td></td>
<td></td>
</tr>
<tr>
<td>Your Password (existing) : </td>
<td><input type="password" name="old" class="form-control" maxlength="32" ></td>
</tr>
<tr>
<td>Your Password (new) : </td>
<td><input type="password" name="new" class="form-control" maxlength="32" ></td>
</tr>
<tr>
<td>Your Password (repeat) : </td>
<td><input type="password" name="newr" class="form-control" maxlength="32" ></td>
</tr>
<tr>
<td class="text-right"><input type="submit" name="submit" class="btn btn-info" value="Change"></td>
<td><input type="reset" class="btn btn-danger" value="Reset"></td>
</tr>
</table>
</form>
</div>
</html>