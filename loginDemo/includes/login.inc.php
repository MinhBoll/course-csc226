<?php
	$accounts=array(
		"Adam" => '1233',
		"John" => '5555',
		"JoeDoe" => "Hi123"
	);

	if(isset($_POST['login-submit'])){
		$username = $_POST['username'];
		$pwd = $_POST['password'];
		if(empty($username) || empty($pwd)){
			header("Location: ../index.php?error=emptyfields&username=".$username);
			exit();
		}
		else{
			if(array_key_exists($username, $accounts)){
				if($pwd === $accounts[$username]){
					header("Location: ../index.php?login=success");
					exit();
				} else{
					header("Location: ../index.php?error=wrongpwd&username=".$username);
					exit();
				}
			} else{
				header("Location: ../index.php?error=wrongusername");
				exit();
			}
			
		}
	} else{
		header("Location: ../index.php");
		exit();
	}
?>