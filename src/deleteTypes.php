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
<h4>Delete Types</h4>
<form action="typesDelete.php"  method="post" role="form" class="form-group" enctype="multipart/form-data">
<table class="table table-responsive">
<tr>
<td>Existing Types<span style="color:#F00;"> *</span> : </td>
<td>
<select class="form-control" name="old" onchange="document.getElementById('text_content').value=this.options[this.selectedIndex].text">
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
<input type="hidden" name="test_text" id="text_content" value="" />
</td>
</tr>
<tr>
<td colspan="2" class="text-center"><input type="submit" class="btn btn-danger" value="Delete" name="submit"></td>
</tr>
</table>
</form>
</div>
</html>