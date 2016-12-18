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
<?php
$result = mysql_query("SELECT * FROM users WHERE email='".$_SESSION['email']."'") or die();
if(mysql_num_rows($result) > 0){
	while($row = mysql_fetch_array($result)){
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		$nic = $row['id'];
		$email = $row['email'];
		$pic = $row['pic'];
		$role = $row['role'];
		$contact = $row['contact'];
		$address = $row['address'];
	}
}
?>
<h4>
<?php
echo $_SESSION['firstname']." ".$_SESSION['lastname'];
?>
</h4>
<div class="col-lg-3">
<img src="<?php echo $pic; ?>" alt="profilePic" class="img-responsive" style="width:210px;height:250px;">
</div>
<div class="col-lg-9">
<table class="table table-responsive table-striped">
<tr>
<td>First Name : </td>
<td><?php
echo $firstname;
?>
</td>
</tr>
<tr>
<td></td>
<td></td>
</tr>
<tr>
<td>Last Name : </td>
<td><?php
echo $lastname;
?>
</td>
</tr>
<tr>
<td></td>
<td></td>
</tr>
<tr>
<td>NIC : </td>
<td><?php
echo $nic;
?></td>
</tr>
<tr>
<td></td>
<td></td>
</tr>
<tr>
<td>Email : </td>
<td><?php
echo $email;
?></td>
</tr>
<tr>
<td></td>
<td></td>
</tr>
<tr>
<td>Address : </td>
<td><?php
echo $address;
?></td>
</tr>
<tr>
<td></td>
<td></td>
</tr>
<tr>
<td>Contact Number : </td>
<td><?php
echo $contact;
?></td>
</tr>
<tr>
<td></td>
<td></td>
</tr>
<tr>
<td>Role : </td>
<td><?php
echo $role;
?></td>
</tr>
</table>
</div>
</div>
</html>