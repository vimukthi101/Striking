<?php
if(!isset($_SESSION[''])){
	session_start();
}
include_once('../ssi/db.php');
$q = $_GET['q'];
$result = mysql_query("SELECT * FROM users WHERE email='".$q."'") or die();
if(mysql_num_rows($result) == 0){
	echo('There are no such managers to show. Input a valid email address.');
} else {
	while($row = mysql_fetch_array($result)){
		$email = $row['email'];
		$nic = $row['id'];
		$fname = $row['firstname'];
		$lname = $row['lastname'];
		$role = $row['role'];
		$contact = $row['contact'];
		$address = $row['address'];
		?>
        <form class="form-group" role="form" action="deleteManagerprocess.php" method="post">
        <table class="table table-responsive">
        <tr>
        <td>First Name</td>
        <td><input class="form-control" type="text" name="fname" value="<?php echo $fname; ?>"  readonly></td>
        </tr>
        <tr>
        <td>Last Name</td>
        <td><input class="form-control" type="text" name="lname" value="<?php echo $lname; ?>"  readonly></td>
        </tr>
        <tr>
        <td>Manager email</td>
        <td><input class="form-control" type="text" name="email" id="code" value="<?php echo $email; ?>"  readonly></td>
        </tr>
        <tr>
        <td>NIC</td>
        <td><input class="form-control" type="text" name="nic" value="<?php echo $nic; ?>"  readonly></td>
        </tr>
        <tr>
        <td>Role</td>
        <td><input class="form-control" type="text" name="role" value="<?php echo $role; ?>"  readonly></td>
        </tr>
        <tr>
        <td>Contact</td>
        <td><input class="form-control" type="text" name="contact" value="<?php echo $contact; ?>"  readonly></td>
        </tr>
        <tr>
        <td>Address</td>
        <td><input class="form-control" type="text" name="address" value="<?php echo $address; ?>"  readonly></td>
        </tr>
        <tr>
        <td class="text-right"><input type="submit" name="submit" value="Delete" class="btn btn-danger"></td>
        <td class="text-left"><input type="reset" value="Clear" class="btn btn-info"></td>
        </tr>
        </table>
        </form>
        <?php
	}
}
?>
