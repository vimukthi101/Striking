<?php
if(!isset($_SESSION[''])){
	session_start();
}
include_once('../ssi/db.php');
$q = $_GET['q'];
$result = mysql_query("SELECT * FROM items WHERE code='".$q."'") or die();
if(mysql_num_rows($result) == 0){
	echo('There are no such items to show. Input a valid Item Code.');
} else {
	while($row = mysql_fetch_array($result)){
		$code = $row['code'];
		$type = $row['type'];
		$name = $row['name'];
		$price = $row['price'];
		$des = $row['description'];
		$pic = $row['pic'];
		$added = $row['added'];
		?>
        <form class="form-group" role="form" action="deleteitemsprocess.php" method="post">
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
        <td><input class="form-control" type="text" name="addedby" value="<?php echo $added; ?>"></td>
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
