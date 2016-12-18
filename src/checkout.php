<?php
if(!isset($_SESSION[''])){
	session_start();
}
include_once('../ssi/db.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
<?php
if($_SESSION['role'] == "user"){
	if(isset($_POST['next'])){
		$unitPrice = $_POST['price'];
		$quantity = $_POST['qty'];
		$totalPrice = $_POST['total'];
		$_SESSION['uPrice'] = $unitPrice;
		$_SESSION['qty'] = $quantity;
		$_SESSION['tPrice'] = $totalPrice;
		?>
        <div class="row">
        <div class="col-lg-9">
        <form class="form-group" role="form" action="updateatcart.php" method="post">
        <table class="table table-responsive">
        <tr>
        <td>My Name :</td>
        <td><label><?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; ?></label></td>
        </tr>
        <tr>
        <td>My Email address :</td>
        <td><label><?php echo $_SESSION['email']; ?></label></td>
        </tr>
        <tr>
        <td>My NIC :</td>
        <td><label><?php echo $_SESSION['nic']; ?></label></td>
        </tr>
        <?php
        $query = mysql_query("SELECT * FROM users WHERE email='".$_SESSION['email']."'") or die();
		if(mysql_num_rows($query) == 1){
			while($row = mysql_fetch_array($query)){
				$contact = $row['contact'];
				$address = $row['address'];
				?>
                <tr>
                <td>My Contact Number :</td>
                <td>
                <?php
				if($contact == "not specified"){
					?>
                    <input class="form-control" type="text" name="contact" id="contact" />
					<?php	
				} else {
					?>
                    <input class="form-control" type="text" name="contact" id="contact" value="<?php echo $contact; ?>" readonly="readonly"/>
                    <?php
				}
				?>
                </td>
                </tr>
                <tr>
                <td>My Address :</td>
                <td>
                <?php
				if($address == "not specified"){
					?>
                    <input class="form-control" type="text" name="address" id="address" />
					<?php	
				} else {
					?>
                    <input class="form-control" type="text" name="address" id="address" value="<?php echo $address; ?>" readonly="readonly"/>
                    <?php
				}
				?>
                </td>
                </tr>
                <?php
				if(($address == "not specified") || ($contact == "not specified")){
					?>
                    <tr>
                    <td colspan="2">
                     <input type="submit" name="update" id="update" value="Update the profile to proceed" class="center-block btn btn-primary"/>
                     </td>
                     </tr>
					<?php	
				} else {
					?>
                    <tr>
                    <td class="text-right">
                    <input type="button" onclick="window.location='cartFinal.php';" name="next" id="next" value="Next" class="btn btn-success"/>
                    </td>
                    <td class="text-left">
                    <input type="button" onclick="window.location='products.php';" name="back" id="bcak" value="Cancel" class="btn btn-danger"/>
                    </td>
                    </tr>
					<?php
				}
				?>
                <tr>
                <td colspan="2">
                <p id="my"></p>
                </td>
                </tr>
                <?php
			}
		}
		?>
        </table>
        </form>
        </div>
        </div>
		<?php
	}
}
include_once('../ssi/footer.php');
?>
</div>
</body>
</html>