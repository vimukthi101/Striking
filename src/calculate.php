<?php
$q = $_GET['q'];
$p = $_GET['p'];
$price = $p * $q;
echo '<input class="form-control" type="text" id="total" name="total" value="'.$price.'" readonly="readonly">';
echo '<br/><br/><tr><td class="text-left">';
echo '<input type="submit" name="next" id="next" value="Next" class="btn btn-success"/></td>&nbsp;&nbsp;&nbsp;';
echo '<td class="text-left"><input type="button" onclick="window.location=\'products.php\';" name="back" id="bcak" value="Cancel" class="btn btn-danger"/>';
echo '</td></tr>';
?>