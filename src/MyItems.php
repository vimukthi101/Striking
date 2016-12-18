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
<h4>Items Added By Me</h4>
<?php 
$add = $_SESSION['email'];
$result = mysql_query("SELECT * FROM items WHERE added='".$add."' AND status='1'") or die();
if(mysql_num_rows($result) != 0){
	while($row = mysql_fetch_array($result)){
		$type = $row['type'];
		$name = $row['name'];
		$code = $row['code'];
		$price = $row['price'];
		$des = $row['description'];
		$pic = $row['pic'];
		?>
        <div class="row">
        <div class="col-lg-3">
        <img src=" <?php echo $pic; ?> " alt="itemsAdded" style="width:210px;height:250px;">
        </div>
        <div class="col-lg-9">
        <table class="table table-responsive table-striped">
        <tr>
        <td>Item Name : </td>
        <td><?php echo $name; ?></td>
        </tr>
        <tr>
        <td>Item Type : </td>
        <td><?php echo $type; ?></td>
        </tr>
        <tr>
        <td>Item Code : </td>
        <td><?php echo $code; ?></td>
        </tr>
        <tr>
        <td>Item Price : </td>
        <td><?php echo $price; ?></td>
        </tr>
        <tr>
        <td>Item Description : </td>
        <td><?php echo $des; ?></td>
        </tr>
        </table>
        </div>
        </div>
        <hr/>
        <?php
	}
} else {
	?> <h3>There are no items added by you in the list</h3>	<?php
}
?>
</div>
</html>