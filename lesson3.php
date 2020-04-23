<?php
	$pattern = '/^[a-z\.]+/';

	if(preg_match($pattern, '.cdcd')){
		echo "yes";
	} else{
		echo "no";
	}

?>