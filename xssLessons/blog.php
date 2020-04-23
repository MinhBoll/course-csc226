<?php
	$posts = array("Assume it is fetched from database <script>alert('Hacked')</script>");
	if(isset($_GET["post"])){
		array_push($posts, $_GET["post"]);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>XSS Attack</title>
	</head>
	<body>
		
		<form action="blog.php" method="GET">
			<p><textarea rows="6" cols="50" name="post" placeholder="Your Post Here" maxlength="400"></textarea></p>
			<input type="submit" name="submit-post" value="Post" >
		</form>

		<h4> Current Posts </h4>
		<?php
			if(empty($posts)){
				echo "<p>There is no post</p>";
			} else{
				foreach($posts as $post){
					echo $post."<br>";
				}
			}
		?>
		</p>
	</body>
</html>

