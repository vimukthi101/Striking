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
<?php
$query = mysql_query("SELECT * FROM orderdetails WHERE status='0'") or die();
if(mysql_num_rows($query) == 0){
	?><h4>There are no items to display</h4><?php	
} else {
	while($row = mysql_fetch_array($query)){
		$orderId = $row['orderId'];
		$itemcode = $row['itemCode'];
		$totalprice = $row['totalPrice'];
		$quantity = $row['quantity'];
		$customer = $row['customerEmail'];
				$query2 = mysql_query("SELECT * FROM users WHERE email='".$customer."' AND status='1'") or die();
				if(mysql_num_rows($query2) == 1){
					while($row2 = mysql_fetch_array($query2)){
						$cfname = $row2['firstname'];
						$clname = $row2['lastname'];
						$contact = $row2['contact'];
						$address = $row2['address'];
						$nic = $row2['id'];
							$query1 = mysql_query("SELECT * FROM items WHERE code='".$itemcode."' AND added='".$_SESSION['email']."'") or die();
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
                        <hr/>
                        <div>
                        <h5>Order Number : <?php echo $orderId; ?></h5>
                        </div>
                        <div class="col-lg-5">
                        <img src="<?php echo $pic; ?>" class="img-responsive">
                        </div>
                        <div class="col-lg-7">
                        <form class="form-group" role="form" action="updatemyOrders.php" method="post">
                        <table class="table table-responsive table-hover">
                        <tr>
                        <td colspan="2" class="text-center" style="text-decoration:underline;">Item Details</td>
                        </tr>
                        <tr>
                        <td>Item Code :</td>
                        <td><?php echo $itemcode; ?></td>
                        </tr>
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
                        <td colspan="2" class="text-center" style="text-decoration:underline;">Order Details</td>
                        </tr>
                        <tr>
                        <td>Item Quantity :</td>
                        <td><?php echo $quantity; ?></td>
                        </tr>
                        <tr>
                        <td>Total Price :</td>
                        <td><?php echo $totalprice; ?></td>
                        </tr>
                        <tr>
                        <td colspan="2" class="text-center" style="text-decoration:underline;">Customer Details</td>
                        </tr>
                        <tr>
                        <td>Customer First Name :</td>
                        <td><?php echo $cfname; ?></td>
                        </tr>
                        <tr>
                        <td>Customer last Name :</td>
                        <td><?php echo $clname; ?></td>
                        </tr>
                        <tr>
                        <td>Customer NIC :</td>
                        <td><?php echo $nic; ?></td>
                        </tr>
                        <tr>
                        <td>Customer Address :</td>
                        <td><?php echo $address; ?></td>
                        </tr>
                        <tr>
                        <td>Customer Contact :</td>
                        <td><?php echo $contact; ?></td>
                        </tr>
                        <tr>
                        <tr hidden="">
                        <td colspan="2">
                        <input type="text" readonly hidden="" name="orderId" value="<?php echo $orderId; ?>">
                        </td>
                        </tr>
                        <td colspan="2">
                        <input type="submit" class="form-control btn btn-success" name="submit" value="Check">
                        </td>
                        </tr>
                        </table>
                        </form>
                        </div>
                        </div>
                        <?php	
					}
				}
			}
		}
	}
}
?>
</div>
</html>