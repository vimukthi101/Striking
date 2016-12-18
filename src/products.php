<?php
if(!isset($_SESSION[''])){
	session_start();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Striking Group</title>
<?php
include_once('../ssi/links.php');
?>
<script>
function showUser() {
	var str = document.getElementById('text_content').value;
    if (str == "") {
        document.getElementById("results").innerHTML = "Please select the Item Type.";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("results").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","getTypesProducts.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
</head>

<body>
<div class="container-fluid">
<?php
include_once('../ssi/db.php');
include_once('../ssi/menu.php');
?>
<div class=" col-lg-9">
<div>
<form role="form" class="form-group">
<table class="table table-responsive">
<tr>
<td class="text-center">Search Items by Item Type : </td>
<td>
<select class="form-control" name="old" onChange="document.getElementById('text_content').value=this.options[this.selectedIndex].text" onClick="showUser()">
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
</table>
</form>
</div>
<div id="results">

</div>
</div>
<?php
include_once('../ssi/footer.php');
?>
</div>
</body>
</html>