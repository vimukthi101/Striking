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
<h4>Add New Types</h4>
<table class="table table-responsive">
<tr>
<td>Existing Types : </td>
<td>
<select class="form-control">
<?php
$result = mysql_query("SELECT * FROM itemtypes ORDER BY itype") or die();
if(mysql_num_rows($result) == 0){
	?><option disabled>No items</option><?php
} else {
	while($row = mysql_fetch_array($result)){
		$type = $row['itype'];
		?>
        <option>
        <?php echo $type; ?>
        </option>
        <?php
	}
}
?>
</select>
</td>
</tr>
</table>
<form action="typesProcess.php"  method="post" role="form" class="form-group" enctype="multipart/form-data">
<table class="table table-responsive">
<tr>
<td> Item Type<span style="color:#F00;"> *</span> : </td>
<td><input type="text" class="form-control" maxlength="30" name="type"></td>
</tr>
<tr>
<td class="text-right"><input type="submit" class="btn btn-info" value="Add" name="submit"></td>
<td class="text-left"><input type="reset" class="btn btn-danger" value="Clear"></td>
</tr>
</table>
</form>
</div>
</html>