<?php
 // getdate function
 //optional timestamp as parameter
 
 $dateNow = getdate();
 print_r($dateNow);
 
 echo "<pre>"; //preformatted text leaving whitespace etc.
 print_r($dateNow);
 echo "</pre>";
 
 echo time(); //now unix time stamp
 
?>