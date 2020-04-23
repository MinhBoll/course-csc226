<?php
	$password = "test1234";

	echo "Before hashing: $password";
	echo "<br>";

	$hashed = password_hash($password, PASSWORD_DEFAULT);

	echo "After hashing: $hashed";
	echo "<br>";

	echo password_verify($password, $hashed);
?>