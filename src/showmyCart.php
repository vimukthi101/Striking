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
<h4>Checkout Items</h4>
<table class="table table-responsive table-hover">
<tr>
<td colspan="2">These items are not yet reviewed by the striking group managers. Don't worry, soon they will proceed with your order.</td>
</tr>
</table>
<?php
$query = mysql_query("SELECT * FROM orderdetails WHERE customerEmail='".$_SESSION['email']."' AND status='0'") or die();
if(mysql_num_rows($query) == 0){
	?><h4>There are no items to display</h4><?php	
} else {
	while($row = mysql_fetch_array($query)){
		$itemcode = $row['itemCode'];
		$totalprice = $row['totalPrice'];
		$quantity = $row['quantity'];
		$query1 = mysql_query("SELECT * FROM items WHERE code='".$itemcode."'") or die();
		if(mysql_num_rows($query1) == 0){
			?><h4>There are no items to display</h4><?php	
		} else {
			while($row1 = mysql_fetch_array($query1)){
				$type = $row1['type'];
				$name = $row1['name'];
				$price = $row1['price'];
				$des = $row1['description'];
				$pic = $row1['pic'];
				?>
                <div class="col-lg-12">
                <div class="col-lg-5">
                <img src="<?php echo $pic; ?>" class="img-responsive">
                </div>
                <div class="col-lg-7">
                <table class="table table-responsive table-hover">
                <tr>
                <td>Item Name :</td>
                <td><?php echo $name; ?></td>
                </tr>
                <tr>
                <td>Item Type :</td>
                <td><?php echo $type; ?></td>
                </tr>
                <tr>
                <td>Unit Price :</td>
                <td><?php echo $price; ?></td>
                </tr>
                <tr>
                <td>Item Description :</td>
                <td><?php echo $des; ?></td>
                </tr>
                <tr>
                <td>Item Quantity :</td>
                <td><?php echo $quantity; ?></td>
                </tr>
                <tr>
                <td>Total Price :</td>
                <td><?php echo $totalprice; ?></td>
                </tr>
                </table>
                </div>
                </div>
                <?php
			}
		}
	}
}
?>
</div>
</html>