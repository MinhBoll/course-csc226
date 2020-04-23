<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Demo Log-in Sign up">
		<meta name=viewpoint content="width=device-width, initial-scale=1">
		<title></title>
		<link rel="stylesheet" href="assets/style.css">
		<style>
			.error{
				color: red;
			}
			.success{
				color: green;
			}
			button{
				width: 100px;
			}
		</style>
	</head>
	<body>
		 
		<div class="container">
			<?php
				if(isset($_GET['error'])){
					if($_GET['error'] == 'emptyfields'){
						echo '<p class="error">';
						echo 'Please fill in all fields';
						echo '</p>';

					} else if($_GET['error'] == 'wrongusername'){
						echo '<p class="error">';
						echo 'Username cannot be found';
						echo '</p>';
					} else{
						echo '<p class="error">';
						echo 'Username and Password not matched';
						echo '</p>';
					}
				} else if(isset($_GET['login'])){
					echo '<p class="success">';
						echo 'Record Found!!!';
						echo '</p>';
				}
			?>
			<form action="includes/login.inc.php" method="post">
				<div class="form-row">
					<label for="username"> Name: </label>
					<input type="text" name="username" placeholder="Username" value=<?php echo isset($_GET['username']) ? $_GET['username'] : ' '?>>
				</div>
				<div class="form-row">
					<label for="password"> Password: </label>
					<input type="password" name="password" placeholder="Password">
				</div>
				<div class="form-row">
					<button type="submit" name="login-submit">Login</button>
				</div>
			</form>
		</div>
	</body>
</html>