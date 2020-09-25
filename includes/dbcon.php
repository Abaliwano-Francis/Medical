<?php 
$con = mysqli_connect("localhost", "root", "", "medical");
if (!$con) {
	echo "Failed to connect to database ".mysqli_erno();
	die();
}
 ?>