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
<?php
$q = $_GET['q'];
$result = mysql_query("SELECT pic, type, code FROM items WHERE code='".$q."'") or die();
if(mysql_num_rows($result) == 0){
	echo('There are no such items to show. Input a valid Item Code.');
} else {
	while($row = mysql_fetch_array($result)){
		$pic = $row['pic'];
		$code = $row['code'];
		$type = $row['type'];
		$new = $type."-".$code;
		?>
        <div class="row">
        <div class="col-lg-3">
        <img src="<?php echo $pic; ?>" alt="itemImage" width="210px" height="250px">
        </div>
        <div class="col-lg-9">
        <form action="updateitempicprocess.php" method="post" enctype="multipart/form-data" role="form" class="form-group">
        <table class="table table-responsive">
        <tr>
            <td>Select an image to upload:</td>
            <td><input type="file" name="fileToUpload" id="fileToUpload" class="form-control"></td>
        </tr>
        <tr>
        <td><input type="text" name="picname" value="<?php echo $new; ?>" hidden=""></td>
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
</html>