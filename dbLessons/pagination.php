<?php
	include "includes/dbconnect.inc.php";
?>
<html>
	<head>
		<title>Pagination</title>
	</head>
	<body>
		<?php
			$pagerows = 2;
			if ((isset($_GET['page']) && is_numeric($_GET['page']))){
				$pages = htmlspecialchars($_GET['page']);
			} else{
				$count_query = "SELECT COUNT(CUSTOMER_NUM) FROM CUSTOMER";
				$stmt = $conn->prepare($count_query);
				//execute query
				$stmt->execute();
				//count how many records in total
				$row = $stmt->get_result()->fetch_all(MYSQLI_NUM);
				//var_dump($row);
				$records = $row[0][0];
				//echo $records;
				if ($records > $pagerows){
					//ceil => round the number up to the nearest integer
					$pages = ceil($records/$pagerows);
					//echo $pages;
				} else{
					$pages = 1;
				}
			} //finished check number of pages

			if((isset($_GET['start'])) && (is_numeric($_GET['start']))){
				$start = htmlspecialchars($_GET['start']);
			} else{
				$start = 0;
			}
			//full $query1 = "SELECT CUSTOMER_NAME FROM CUSTOMER LIMIT ?, ?";
			$query1 = "SELECT CUSTOMER_NAME";
			$query1 .= " FROM CUSTOMER";
			$query1 .=" LIMIT ?, ?";
			//echo $query1;
			$stmt = $conn->prepare($query1);

			//binding parameter
			$stmt->bind_param("ii", $start, $pagerows);

			//execute query
			$stmt->execute();
			//get result
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
			if( $pages > 1){ //shoule be 5
				$current_page = ($start/$pagerows) + 1;
				echo "<p>";
				if($current_page != 1){
					echo '<a href="pagination.php?start='.($start - $pagerows).'&page='.$pages.'"> Previous </a>';
				}
				echo "Current page: ".$current_page;
				if($current_page != $pages){
					echo '<a href="pagination.php?start='.($start + $pagerows).'&page='.$pages.'"> Next </a>';
				}
				echo "</p>";
			}
		?>
	</body>
</html>