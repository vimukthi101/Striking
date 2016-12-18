<?php
if(!isset($_SESSION[''])){
	session_start();
}
include_once('../ssi/db.php');
$q = $_GET['a'];
$result = mysql_query("SELECT * FROM users WHERE email='".$q."' AND role='manager'") or die();
if(mysql_num_rows($result) == 0){
	echo('There are no such Managers to show. Input a valid email address.');
} else {
	while($row = mysql_fetch_array($result)){
		$id = $row['id'];
		$fname = $row['firstname'];
		$lname = $row['lastname'];
		$email = $row['email'];
		$role = $row['role'];
		$contact = $row['contact'];
		$address = $row['address'];
		?>
        <form class="form-group" role="form" action="updatemanagerfinal.php" method="post">
        <table class="table table-responsive">
        <tr>
        <td>First Name</td>
        <td><input class="form-control" type="text" name="fname" id="code" value="<?php echo $fname; ?>"></td>
        </tr>
        <tr>
        <td>Last Name</td>
        <td><input class="form-control" type="text" name="lname" value="<?php echo $lname; ?>"></td>
        </tr>
        <tr>
        <td>E-mail</td>
        <td><input class="form-control" type="text" name="email" value="<?php echo $email; ?>" readonly="readonly"></td>
        </tr>
        <tr>
        <td>NIC</td>
        <td><input class="form-control" type="text" name="nic" value="<?php echo $id; ?>"></td>
        </tr>
        <tr>
        <td>Role</td>
        <td><input class="form-control" type="text" name="role" value="<?php echo $role; ?>" readonly="readonly"></td>
        </tr>
        <tr>
        <td>Contact Number</td>
        <td><input class="form-control" type="text" name="contact" value="<?php echo $contact; ?>"></td>
        </tr>
        <tr>
        <td>Address</td>
        <td><input class="form-control" type="text" name="address" value="<?php echo $address; ?>"></td>
        </tr>
        <tr>
        <td class="text-right"><input type="submit" name="submit" value="Update" class="btn btn-danger"></td>
        <td class="text-left"><input type="reset" value="Clear" class="btn btn-info"></td>
        </tr>
        </table>
        </form>
        <?php
	}
}
?>
