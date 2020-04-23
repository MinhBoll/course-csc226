<?php 
	
	echo "Arrays <br> <br> <br>";
	//indexed array
	$classes = array("CSC 126", "CSC 226", "CSC 211");

	$classes = array(
		0 => "CSC 226",
		1 => "CSC 126",
		"2" => "CSC 211",
	//  2 => "Extra"	
	);
	//insert a new element in the array
	array_push($classes, "Extra");

	echo "This is my indexed value <br>";
	for($i=0; $i < sizeof($classes); $i++){
		echo "classes[".$i."] = ".$classes[$i];
		echo "<br>";
	}
	//break $classes into $class
	foreach($classes as $element){
		echo "<br> ".$element."<br>";
	}

	//associative array
	$classes = array(
		/* $key => $value */
		"class" => 126,
		"objectives" => "PHP learning",
		"credits" => 3

	);

	echo $classes["class"];

	asort($classes, SORT_DESC);
	
	foreach($classes as $key => $value){
		echo $key." : ".$value."<br>";
	}


	echo "This is 2D array <br>";
	$students = array(
		//key => value
		array("name" => "Adam",
		"class" => "CSC 226",
		"age" => 14),

		array("name" => "John",
		"class" => "CSC 226",
		"age" => 14),

		array("name" => "Adam",
		"class" => "CSC 226",
		"age" => 14),
	);



	$cols = array_column(students, "age");
	



















	foreach($students as $student){ //getting rows
		foreach($student as $key => $value){ //getting cols
			echo $key." : ".$value."<br>";
		}
		echo "<br>";	
	}

?>