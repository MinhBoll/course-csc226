<?php
	$pattern = "/[^b]/";
	
	$input = "bb";
	echo "My string is: ".$input."<br>";
	echo "My pattern is: ".trim($pattern)."<br>";
	if(preg_match($pattern, $input)){
		echo "Valid !!!<br>";
	} else{
		echo "Invalid!!!<br>";
	}
	
	
	/*
	$my_email = "minh@gmail.como4";
	if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $my_email)) {
	echo "$my_email is a valid email address";
	}
	else
	{
	  echo "$my_email is NOT a valid email address";
	}*/
	
?>