<?php
if(!isset($_SESSION[''])){
	session_start();
}
include_once('../ssi/db.php');
if($_SESSION['role'] == "admin"){
?>
<html>
<head>
<?php
include_once('../ssi/links.php');
?>
</head>
<div>
<h4>Pending Approval</h4>
<?php 
$result = mysql_query("SELECT * FROM tempitems WHERE status='0'") or die();
if(mysql_num_rows($result) != 0){
	while($row = mysql_fetch_array($result)){
		$type = $row['itype'];
		$name = $row['iname'];
		$code = $row['icode'];
		$price = $row['iprice'];
		$des = $row['idescription'];
		$pic = $row['ipic'];
		$addby = $row['addedby'];
		?>
        <div class="row">
        <div class="col-lg-3">
        <img src=" <?php echo $pic; ?> " alt="itemsPendingApproval" style="width:210px;height:250px;">
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
        <tr>
        <td>Item Added By : </td>
        <td><?php echo $addby; ?></td>
        </tr>
        <tr>
        <td class="text-right">
        <a href="rejectApproveItems.php?code=<?php echo $code; ?>&id=1"><input type="button" name="approve" value="Approve" class="btn btn-info"></a>
        </td>
        <td class="text-left">
        <a href="rejectApproveItems.php?code=<?php echo $code; ?>&id=-1"><input type="button" name="reject" value="Reject" class="btn btn-danger"></a>
        </td>
        </tr>
        </table>
        </div>
        </div>
        <hr/>
        <?php
	}
} else {
	?> <h3>There are no items pending approval</h3>	<?php
}
?>
</div>
</html>
<?php
} else {
	header('Location:login.php');
}
?>