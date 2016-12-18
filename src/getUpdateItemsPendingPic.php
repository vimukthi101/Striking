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
$result = mysql_query("SELECT ipic,itype FROM tempitems WHERE icode='".$q."' AND status='0'") or die();
if(mysql_num_rows($result) == 0){
	echo('There are no such items to show. Input a valid Item Code.');
} else {
	while($row = mysql_fetch_array($result)){
		$pic = $row['ipic'];
		$type = $row['itype'];
		?>
        <div class="row">
        <div class="col-lg-3">
<h4>Existing Items Picture</h4>
<img src="<?php echo $pic; ?>" alt="profilePic" class="img-responsive" style="width:210px;height:250px;">
</div>
<div class="col-lg-9">
<form action="UpdatependingitemsPic.php" method="post" enctype="multipart/form-data" role="form" class="form-group">
<table class="table table-responsive">
<tr>
<td>Item Code : </td>
<td><input type="text" class="form-control" name="code" value="<?php echo $q; ?>" readonly></td>
</tr>
<tr>
<td>Item Type : </td>
<td><input type="text" class="form-control" name="type" value="<?php echo $type; ?>" readonly></td>
</tr>
<tr>
    <td>Select an image to upload:</td>
    <td><input type="file" name="fileToUpload" id="fileToUpload" class="form-control"></td>
</tr>
<tr>
    <td class="text-right"><input type="submit" value="Upload Image" name="submit" class="btn btn-info"></td>
    <td class="text-left"><input type="reset" value="Reset" class="btn btn-danger"></td>
    </tr>
    </table>
</form>
</div>
        </div>
        <?php
	}
}
?>
</body>
</html>