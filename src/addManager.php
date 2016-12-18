<?php
if(!isset($_SESSION[''])){
	session_start();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include_once('../ssi/links.php');
?>
</head>

<body>
<div class="col-lg-12" style="padding-top:10px;margin-top:10px;">
<form role="form" action="registrationManager.php" class="form-group" method="post">
<table class="table table-responsive">
<tr>
<td colspan="2">Register a new Manager!</td>
</tr>
<tr>
<td><label for="firstname">First Name : </label></td>
<td><input type="text" name="firstname" class="form-control" maxlength="30"/></td>
</tr>
<tr>
<td><label for="lastname">Last Name : </label></td>
<td><input type="text" name="lastname" class="form-control" maxlength="30"/></td>
</tr>
<tr>
<td><label for="lastname">NIC : </label></td>
<td><input type="text" name="nic" class="form-control" maxlength="10"/></td>
</tr>
<tr>
<td><label for="email">E-mail : </label></td>
<td><input type="email" name="email" class="form-control" maxlength="50"/></td>
</tr>
<tr>
<td><label for="password">Password : </label></td>
<td><input type="password" name="password" class="form-control" maxlength="20"/></td>
</tr>
<tr>
<td><label for="conpassword">Password again : </label></td>
<td><input type="password" name="cpassword" class="form-control" maxlength="20"/></td>
</tr>
<tr>
<td class="text-right"><input type="submit" name="submit" value="Register" class="btn btn-info"/></td>
<td class="text-left"><input type="reset" value="Clear" class="btn btn-danger" /></td>
</tr>
</table>
</form>
</div>
</body>
</html>