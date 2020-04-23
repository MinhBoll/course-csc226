<!DOCTYPE html>
<html>
<head>
</head>
 <body>
 <form action= "process_data.php" method= "POST">
  <fieldset>
    <legend> Please fill out the form:</legend>

    <p>
    <label>Name:<input type=" text" name="username" size= "25" maxlength= "50" >
    </label>
    </p>
    <p>
    <label> Password:<input type="password" name="password" size="25" maxlength="50">
    </label>
    </p>
     <p align="center">
      <input type="submit" name="submit" value="Submit your information">
     </p>
     <p align="center">
      <input type="submit" name="register" value="Register your account">
     </p>

  </fieldset>

  </label>
  </form>
<!--/p-->

<?php
echo "username and password";
$forms_arr = array(
array("username" => "elliz",
"password" => "23seventee23"),
array("username" => "junk0",
"password" => "password1"),
array("username" => "busyBee",
"password " => "pass20word"),
);
$forms_col = array_column($forms_arr, "username and password");
print_r($forms_col);
echo "<br>";
?>
<table border=4>
  <tr>
   <th> username </th>
   <th> password </th>
   </tr>
  <?php
foreach($forms_arr as $username){
 echo "<tr>";
 foreach($username as $key => $value){
  echo "<td>". $value. "</td>";
  
 }
 echo "</tr>";
}
?>
</table>
</body>
</html>
