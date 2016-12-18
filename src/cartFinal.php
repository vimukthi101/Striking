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
<script>
function showUser() {
    if (document.getElementById('chk').checked) {
		document.getElementById("results").innerHTML = "<form class=\"form-group\" role=\"form\" action=\"orderFinal.php\" method=\"post\"><input class=\"btn btn-success\" type=\"submit\" value=\"Buy The Order\"  name=\"submit\"/>&nbsp;&nbsp;&nbsp;<input class=\"btn btn-danger\" type=\"button\" value=\"Cancel The Order\" onClick=\"window.location='products.php';\"/></form>";
        return;
    } else { 
		document.getElementById("results").innerHTML = "Please Tick the check box to continue.";
        return;
    }
}
</script>
</head>
<body>
<div class="container-fluid">
<?php
include_once('../ssi/menu.php');
?>
<div class="col-lg-9">
<h4 class="text-capitalize text-center"><u>INVOICE</u></h4>
<?php
$query = mysql_query("SELECT * FROM users WHERE email='".$_SESSION['email']."'") or die();
if(mysql_num_rows($query) == 1){
	while($row = mysql_fetch_array($query)){
		$fname = $row['firstname']; 
		$lname = $row['lastname']; 
		$nic = $row['id'];
		$contact = $row['contact'];
		$address = $row['address'];   
	}
}
$query1 = mysql_query("SELECT * FROM items WHERE code='".$_SESSION['code']."'") or die();
if(mysql_num_rows($query1) == 1){
	while($row1 = mysql_fetch_array($query1)){
		$iname = $row1['name']; 
		$type = $row1['type']; 
	}
}
?>
<table class="table table-responsive">
<tr>
<td colspan="2" class="text-capitalize text-center">Customer Details</td>
</tr>
<tr>
<td>Customer Name :</td>
<td><label><?php echo $fname." ".$lname; ?></label></td>
</tr>
<tr>
<td>Customer NIC :</td>
<td><label><?php echo $nic; ?></label></td>
</tr>
<tr>
<td>Customer Contact Number :</td>
<td><label><?php echo $contact; ?></label></td>
</tr>
<tr>
<td>Customer Address :</td>
<td><label><?php echo $address; ?></label></td>
</tr>
<tr>
<td colspan="2" class="text-capitalize text-center">Order Details</td>
</tr>
<tr>
<td>Item Name :</td>
<td><label><?php echo $iname; ?></label></td>
</tr>
<tr>
<td>Item Type :</td>
<td><label><?php echo $type; ?></label></td>
</tr>
<tr>
<td>Unit Price :</td>
<td><label><?php echo $_SESSION['uPrice']; ?></label></td>
</tr>
<tr>
<td>Quantity :</td>
<td><label><?php echo $_SESSION['qty']; ?></label></td>
</tr>
<tr>
<td>Total Price :</td>
<td><label><?php echo $_SESSION['tPrice']; ?></label></td>
</tr>
<tr>
<td colspan="2"><input type="checkbox" name="chk" id="chk" value="agree" onclick="showUser()"/> I agree to accept the terms and conditions of the Striking Group and would like to proceed with the order.</td>
</tr>
<tr>
<td colspan="2" class="text-center">
<p id="results">Please Tick the check box to continue.</p>
</td>
</tr>
</table>
</div>
<?php
include_once('../ssi/footer.php');
?>
</div>
</body>
</html>