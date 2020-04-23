<?php
	include "includes/dbconnect.inc.php";
	
	//Prepared Statements
	//avoid SQL Injection
	//Better perfomance on executing multiple queries
	//trim()
	//htmlspecialchars(string)

	$balance = 1000;
	$city = 'Sheldon';
	//string query with placeholder ?
	$myquery = "SELECT CUSTOMER_NAME, CITY, BALANCE FROM CUSTOMER WHERE BALANCE < ? OR CITY = ?";
	//prepare query
	$stmt = $conn->prepare($myquery);

	//binding parameter
	/*
		i: integer
		s: string
		d: double
		b: blob //to save image file
	*/
	//$balance and $city are values to be plugged in the query
	//bind_param("isdb..", $var1, $var2, ..);
	$stmt->bind_param("is", $balance, $city);

	//execute query
	$stmt->execute();
	//get result
	$result = $stmt->get_result();

	//check if there is any record
	if($result->num_rows === 0) exit("No Rows");

	//fetch_assoc() : fetch every record (row) in associative array at once
	//row by row
	while($row = $result->fetch_assoc()){
		//append a new array in the big array
		$customer[] = $row;	
	}

	//$result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

	var_dump($customer);
	echo "<br><br>";
	echo $customer[1]['CUSTOMER_NAME'];
	echo "<br><br>";

	/* ----------------------------- */
	//or we can fetch all of records by
	/* ----------------------------- */

	//search for customers whose names start with letter A
	/*$search = "A%";
	$query2 = "SELECT CUSTOMER_NUM, CUSTOMER_NAME, CITY FROM CUSTOMER WHERE CUSTOMER_NAME LIKE ?";
	$stmt = $conn->prepare($query2);
	$stmt->bind_param("s", $search);
	$stmt->execute();
	$result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

	if(!$result) exit("No Rows");

	foreach ($result as $row){
		//now it depends on  how well you understand the array
		echo "<p>".$row['CUSTOMER_NUM']." is ".$row['CUSTOMER_NAME']." lives in ".$row['CITY'].", city</p>";
		echo "<br>";	
	}
*/
	
	$stmt->close();
	
?>
