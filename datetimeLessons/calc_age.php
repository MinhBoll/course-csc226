<?php
 // set date for calculation
 $day = 24;
 $month = 7;
 $year = 1995;

 // remember you need bday as day month and year
 $bdayunix = mktime (0, 0, 0, $month, $day, $year); // get ts for then
 $nowunix = time(); // get unix ts for today
 $ageunix = $nowunix - $bdayunix; // work out the difference
 $age = floor($ageunix / (365 * 24 * 60 * 60)); // convert from seconds to years

 echo "Age is $age";
?>