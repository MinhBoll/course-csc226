<?php
	include "includes/dbconnect.inc.php";
?>
<html>
	<head>
		<title>Pagination</title>
	</head>
	<body>
		<?php
			$pagerows = 2; //display 2 records/page

			//http://localhost/csc226/dbLessons/pagination2.php?page=2
			if ((isset($_GET['page']) && is_numeric($_GET['page']))){
				$current_page = htmlspecialchars($_GET['page']); //$page = 2 => the second customer page
			} else{
				$current_page = 1;
			}

			//$page = 1 => $start = (1-1) * 2 = 0 => LIMIT $start, $pagerows => LIMIT 0, 2
			$start = ($current_page-1) * $pagerows;

			//calculate the number of pages
			$count_query = "SELECT COUNT(CUSTOMER_NUM) FROM CUSTOMER"; // 10
			$stmt = $conn->prepare($count_query);
			//execute query
			$stmt->execute();
			//count how many records in total
			$row = $stmt->get_result()->fetch_all(MYSQLI_NUM); //fetch records in indexed array
			/*var_dump($row);
			echo "<br>";*/
			$records = $row[0][0];
			//echo $records;
			
			//calculate the total number of pages
			if ($records > $pagerows){
				//ceil => round the number up to the nearest integer
				$total_pages = ceil($records/$pagerows);
				//echo $pages;
			} else{
				$total_pages = 1;
			}
			//finished check number of pages

			//full $query1 = "SELECT CUSTOMER_NAME FROM CUSTOMER LIMIT ?, ?";
			$query1 = "SELECT CUSTOMER_NAME";
			$query1 .= " FROM CUSTOMER";
			$query1 .= " LIMIT ?, ?";

			//echo $query1;
			$stmt = $conn->prepare($query1);

			//binding parameter
			$stmt->bind_param("ii", $start, $pagerows);

			//execute query
			$stmt->execute();
			//get result
			// object oriented: $stmt is an instance of an object that tries to use functions in parent object
			$result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
			if($result){
				//var_dump($result);
		?>
				<table border='1'>
					<tr>
						<th> Customer Name </th>
						<th> Edit </th>
						<th> Delete </th>
					</tr>
		<?php
				foreach($result as $customer){
					echo "<tr>";
					echo "<td>".$customer['CUSTOMER_NAME']."</td>";
					echo "<td> <a href='#'> Edit </a> </td>";
					echo "<td> <a href='#'> Delete </a> </td>";
					echo "</tr>";
				}
		?>
				</table>
		<?php
			} else{
				echo "<p>There is no records!!! </p>";
				exit();
			}

			$stmt->close();
			if( $current_page > 1){
					echo '<a href="pagination2.php?page='.($current_page-1).'"> Previous </a>';
			}
			if($current_page < $total_pages){
				//<a href="pagination2.php?page=2"> Next </a>
				echo '<a href="pagination2.php?page='.($current_page+1).'"> Next </a>';
			}
		?>

	</body>
</html>