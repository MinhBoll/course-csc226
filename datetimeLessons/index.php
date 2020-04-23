<?php

	/* Get date month year */
	/*echo date('d'); //print out current date
	echo date('m'); //print out current month*/
	echo date('Y'); //print out current year
	//echo date("l"); //print out current day of week

	/* Format the date */
	/*echo date('m/d/Y');*/
	
?>
<?php
	/* Get time */
	
	/*echo date('h'); //print out hour
	echo date('i'); //print out min
	echo date('s'); //print out second
	echo date('a'); // AM or PM*/
	
?>

<?php
	/* We need to set time zone in order to get correct time */
	/*date_default_timezone_set('America/New_York');
	echo date('m/d/Y h:i:sa');
	*/
	/* or */

	//echo date("m-d-Y h:i:sa");
?>

<?php
	/*
		mktime(hour, minute, second, month, date, year);
	*/
	/*$timestamp = mktime(00, 00, 00, 2, 1, 1970);
	echo $timestamp."<br>"; //print out 2674800
	*/
	/* or in date format: 02/01/1970 12:00:00am */
	//echo date('m/d/Y h:i:sa', $timestamp);
	
?>

<?php
	/* 
		strtotime(time);
	*/
	#$timestamp1 = strtotime('19-03-2020');
	/* or */
	/*$timestamp2 = strtotime('03/19/2020');
	
	echo date('m/d/Y h:i:sa', $timestamp1);
	echo "<br>";
	echo date('m/d/Y h:i:sa', $timestamp2);*/
?>
