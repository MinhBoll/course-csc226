<!DOCTYPE html>
<html>
	<head>
		<title>XSS Attack</title>
	</head>
	<body>
		
		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="GET">
			<input type="text" name="search">
			<input type="submit" name="submit-search" value="Search">
		</form>

		<p> Your search is:
		<?php
				echo "<b>";
				echo isset($_GET["search"]) ? $_GET["search"] : " ";
				echo "</b>";
		?>
		</p>
		<!--<script type="text/javascript">
			alert("Hello World!!!");
		</script>-->
	</body>
</html>

