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
<div>
<?php
$result = mysql_query("SELECT * FROM users WHERE email='".$_SESSION['email']."'") or die();
if(mysql_num_rows($result) > 0){
	while($row = mysql_fetch_array($result)){
		$pic = $row['pic'];
	}
}
?>
<div class="col-lg-3">
<h4>Existing Profile Picture</h4>
<img src="<?php echo $pic; ?>" alt="profilePic" class="img-responsive" style="width:210px;height:250px;">
</div>
<div class="col-lg-9">
<form action="UpdatePic.php" method="post" enctype="multipart/form-data" role="form" class="form-group">
<table class="table table-responsive">
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
</body>
</html>