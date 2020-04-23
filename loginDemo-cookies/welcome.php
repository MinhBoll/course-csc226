<!DOCTYPE html>
<html>
	<head>
		<title>Cookies</title>
	</head>
	<body>
		<?php
			if(!isset($_COOKIE['username'])){
				header('Location: index.php');
				exit();
			}
		?>
		<h1> Welcome <?php echo $_COOKIE['username']; ?> </h1>
		<p><a href="profile.php">Click Here to see your name </a></p>
		<p><a href="includes/logout.inc.php">Logout </a></p>
	</body>
</html>