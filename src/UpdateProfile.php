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
<body>
<div>
<?php
$result = mysql_query("SELECT * FROM users WHERE email='".$_SESSION['email']."'") or die();
if(mysql_num_rows($result) > 0){
	while($row = mysql_fetch_array($result)){
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		$nic = $row['id'];
		$email = $row['email'];
		$role = $row['role'];
		$contact = $row['contact'];
		$address = $row['address'];
	}
}
?>
<p>*Enter only the relevant information what you want to update</p>
<form action="update.php" method="post" enctype="multipart/form-data" role="form" class="form-group">
<table class="table table-responsive table-hover">
<tr>
<td>First Name : </td>
<td><input type="text" name="firstname" class="form-control" maxlength="20" value="<?php echo $firstname; ?>"></td>
</tr>
<tr>
<td>Last Name : </td>
<td><input type="text" name="lastname" class="form-control" maxlength="20" value="<?php echo $lastname; ?>"></td>
</tr>
<tr>
<td>NIC : </td>
<td><input type="text" name="nic" class="form-control" maxlength="10" value="<?php echo $nic; ?>"></td>
</tr>
<tr>
<td>Address : </td>
<td><input type="text" name="address" class="form-control" value="<?php echo $address; ?>"></td>
</tr>
<tr>
<td>Contact Number : </td>
<td><input type="tel" name="contact" class="form-control" maxlength="10" value="<?php echo $contact; ?>"></td>
</tr>
<tr>
<td class="text-right"><input type="submit" name="submit" class="btn btn-info" value="Update"></td>
<td><input type="reset" class="btn btn-danger" value="Reset"></td>
</tr>
</table>
</form>
</div>
</body>
</html>