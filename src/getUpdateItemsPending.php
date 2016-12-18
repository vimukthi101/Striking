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
<?php
$q = $_GET['q'];
$result = mysql_query("SELECT * FROM tempitems WHERE icode='".$q."' AND status='0'") or die();
if(mysql_num_rows($result) == 0){
	echo('There are no such items to show. Input a valid Item Code.');
} else {
	while($row = mysql_fetch_array($result)){
		$code = $row['icode'];
		$type = $row['itype'];
		$name = $row['iname'];
		$price = $row['iprice'];
		$des = $row['idescription'];
		$pic = $row['ipic'];
		$added = $row['addedby'];
		?>
        <div class="row">
        <div class="col-lg-3">
        <img class="img-responsive" src="<?php echo $pic; ?>">
        </div>
        <div class="col-lg-9">
        <form class="form-group" role="form" action="updatependingProcess.php" method="post">
        <table class="table table-responsive">
        <tr>
        <td>Item Code</td>
        <td><input class="form-control" type="text" name="code" id="code" value="<?php echo $code; ?>" readonly></td>
        </tr>
        <tr>
        <td>Item Type</td>
        <td><input class="form-control" type="text" name="type" value="<?php echo $type; ?>"></td>
        </tr>
        <tr>
        <td>Item Name</td>
        <td><input class="form-control" type="text" name="name" value="<?php echo $name; ?>"></td>
        </tr>
        <tr>
        <td>Item Price</td>
        <td><input class="form-control" type="text" name="price" value="<?php echo $price; ?>"></td>
        </tr>
        <tr>
        <td>Item Description</td>
        <td><input class="form-control" type="text" name="description" value="<?php echo $des; ?>"></td>
        </tr>
        <tr>
        <td>Item Added By</td>
        <td><input class="form-control" type="text" name="addedby" value="<?php echo $added; ?>" readonly></td>
        </tr>
        <tr>
        <td class="text-right"><input type="submit" name="submit" value="Update" class="btn btn-danger"></td>
        <td class="text-left"><input type="reset" value="Clear" class="btn btn-info"></td>
        </tr>
        </table>
        </form>
        </div></div>
        <?php
	}
}
?>
</body>
</html>