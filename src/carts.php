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
function goBack() {
    window.history.back();
}
</script>
</head>
<body>
<div class="container-fluid">
<?php
include_once('../ssi/menu.php');
?>
<?php
if($_SESSION['role'] == "user"){
	if(isset($_POST['submit'])){
		$code = $_POST['code'];
		$result = mysql_query("SELECT * FROM items WHERE code='".$code."'") or die();
		if(mysql_num_rows($result) == 0){
			echo('Sorry! There are no itmes to show from this type. Try another item type.');
		} else {
			while($row = mysql_fetch_array($result)){
				$code = $row['code'];
				$type = $row['type'];
				$name = $row['name'];
				$price = $row['price'];
				$des = $row['description'];
				$pic = $row['pic'];
				$added = $row['added'];
				$_SESSION['code'] = $code;
				?>
				  <hr>
				<form class="form-group" role="form" action="checkoutPrice.php" method="post">
				<div class="row">
				<div class="col-lg-5">
				<img src="<?php echo $pic; ?>" class="img-responsive center-block">
				</div>
				<div class="col-lg-7">
				<table class="table table-responsive">
				<tr>
				<td>Item Code</td>
				<td><label><?php echo $code; ?></label></td>
                <input type="text" name="code" hidden="" value="<?php echo $code; ?>"/>
				</tr>
				<tr>
				<td>Item Type</td>
				<td><label><?php echo $type; ?></label></td>
                <input type="text" name="type" hidden="" value="<?php echo $type; ?>"/>
				</tr>
				<tr>
				<td>Item Name</td>
				<td><label><?php echo $name; ?></label></td>
                <input type="text" name="name" hidden="" value="<?php echo $name; ?>"/>
				</tr>
				<tr>
				<td>Item Price</td>
				<td><label><?php echo $price; ?></label></td>
                <input type="text" name="price" hidden="" value="<?php echo $price; ?>"/>
				</tr>
				<tr>
				<td>Item Description</td>
				<td><label><?php echo $des; ?></label></td>
				</tr>
				<td class="text-right"><input type="submit" name="submit" value="Check Out" class="btn btn-success"></td>
                <td class="text-left"><input type="button" onclick="goBack()" name="cancel" value="Cancel" class="btn btn-danger"></td>
			   </tr>
				</table>
				</div>
				</div>
				</form>      
				<?php
			}
		}
	}
} else {
	header('Location:login.php');	
}
?>
<?php
include_once('../ssi/footer.php');
?>
</div>
</body>
</html>