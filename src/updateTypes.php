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
<h4>Update Types</h4>
<form action="typesUpdate.php"  method="post" role="form" class="form-group" enctype="multipart/form-data">
<table class="table table-responsive">
<tr>
<td>Existing Types<span style="color:#F00;"> *</span> : </td>
<td>
<select class="form-control" name="old" onChange="document.getElementById('text_content').value=this.options[this.selectedIndex].text">
<?php
$result = mysql_query("SELECT * FROM itemtypes ORDER BY itype") or die();
if(mysql_num_rows($result) == 0){
	?><option disabled>No items</option><?php
} else {?>
	<option disabled selected>~Select Item Type~</option>
	<?php while($row = mysql_fetch_array($result)){
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
<input type="hidden" name="test_text" id="text_content" value="" />
</td>
</tr>
<tr>
<td> Update Selected Item Type<span style="color:#F00;"> *</span> : </td>
<td><input type="text" class="form-control" maxlength="30" name="updateType"></td>
</tr>
<tr>
<td class="text-right"><input type="submit" class="btn btn-info" value="Update" name="submit"></td>
<td class="text-left"><input type="reset" class="btn btn-danger" value="Clear"></td>
</tr>
</table>
</form>
</div>
</html>