<?php
if(!isset($_SESSION[''])){
	session_start();
}
include_once('../ssi/db.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
include_once('../ssi/links.php');
?>
<script>
function showUser() {
	var str = document.getElementById('qty').value;
	var price = document.getElementById('price').value;
    if (str == "") {
        document.getElementById("results").innerHTML = "Please enter the quantity.";
        return;
    } 
	else if(str <= 0) {
		document.getElementById("results").innerHTML = "Please enter a valid quantity.";
        return;
	}
	else if(isNaN(str)) {
		document.getElementById("results").innerHTML = "The value you enterd is not a number.";
        return;
	}
	else if(str > 0) { 
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
        xmlhttp.open("GET","calculate.php?q="+str+"&p="+price,true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>
<div class="container-fluid">
<?php
include_once('../ssi/menu.php');
?>
<?php
if($_SESSION['role'] == "user"){
	if(isset($_POST['submit'])){
		?>
        <div class="row">
        <div class="col-lg-9">
        <form class="form-group" role="form" action="checkout.php" method="post">
        <table class="table table-responsive">
        <tr>
        <td>The price of a single item : </td>
        <td><input type="text" id="price" name="price" class="form-control" value="<?php echo $_POST['price']; ?>" readonly="readonly"/></td>
        </tr>
        <tr>
        <td>Enter the Quantity :</td>
        <td><input type="text" id="qty" name="qty" class="form-control"/></td>
        </tr>
        <tr>
        <td colspan="2" class="text-center">
        <input type="button" onClick="showUser()" value="Calculate the order price" class="btn btn-default"/>
        </td>
        </tr>
        <tr>
        <td>The value of the order :</td>
        <td><p id="results"></p></td>
        </tr>
        </table>
        </form>
        </div>
        </div>
		<?php
	}
}
include_once('../ssi/footer.php');
?>
</div>
</body>
</html>