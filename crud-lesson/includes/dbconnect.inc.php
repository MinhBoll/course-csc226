<?php
	$con = new mysqli("localhost", "root", "password", "CRUD");
	if($con->connect_error) {
		exit("Error connecting to databases");
	}
	//echo "successfully";
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$con->set_charset("utf8mb4");
?>
