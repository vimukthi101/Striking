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
<script>
function showUser() {
	var str = document.getElementById('icode').value;
    if (str == "") {
        document.getElementById("results").innerHTML = "Please enter the Item Code.";
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
        xmlhttp.open("GET","getItemPic.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
</head>
<div>
<h4>Update Items</h4>
<form class="form-group" role="form">
<table class="table table-responsive">
<tr>
<td>Item Code</td>
<td><input class="form-control" type="text" name="icode" id="icode"></td>
</tr>
<tr>
<td colspan="2" class="text-center"><input type="button" name="btn" value="Search" class="btn btn-success" onClick="showUser()"></td>
</tr>
</table>
</form>
</div>
<div id="results">

</div>
</html>