<?php
if(!isset($_SESSION[''])){
	session_start();
}
include_once('../ssi/db.php');
$q = $_GET['q'];
$result = mysql_query("SELECT * FROM items WHERE type='".$q."'") or die();
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
		?>
          <hr>
        <form class="form-group" role="form" action="carts.php" method="post">
        <div class="row">
        <div class="col-lg-5">
        <img src="<?php echo $pic; ?>" class="img-responsive center-block">
        </div>
        <div class="col-lg-7">
        <table class="table table-responsive">
        <tr hidden="">
        <td>Item Code</td>
        <td><input type="text" name="code" value="<?php echo $code; ?>"</td>
        </tr>
        <tr>
        <td>Item Type</td>
        <td><label><?php echo $type; ?></label></td>
        </tr>
        <tr>
        <td>Item Name</td>
        <td><label><?php echo $name; ?></label></td>
        </tr>
        <tr>
        <td>Item Price</td>
        <td><label><?php echo $price; ?></label></td>
        </tr>
        <tr>
        <td>Item Description</td>
        <td><label><?php echo $des; ?></label></td>
        </tr>
        <td colspan="2" class="text-center"><input type="submit" name="submit" value="Add to cart" class="btn btn-success"></td>
       </tr>
        </table>
        </div>
        </div>
        </form>      
        <?php
	}
}
?>
