<?php
  $my_arr = array(
    array("ID" => "elliez","P"=> "23Seventeen23"),
    array("ID" => "junk()","P"=> "password1"),
    array("ID" => "busyBee","P"=> "pass20word"),
    array("ID" => "computerGal","P"=> "pass30word"),
    array("ID" => "compGuy","P"=> "mypass2309"),
    array("ID" => "expertComp","P"=> "60your78"),
    array("ID" => "smartone","P"=> "78y68pal"),
    array("ID" => "johndoe","P"=> "pass4567"),
    array("ID" => "johndoe3","P"=> "pass2100"),
    array("ID" => "johndoe67","P"=> "pass2099"),
  );
?>
<?php
  if(!isset($_POST["submit"])){
    header("Location: HW2_Part1.php");
  }
  else {
    $u = $_POST["username"];
    $p = $_POST["password"];

    echo $u." ".$p."<br>";
    foreach($my_arr as $account){
      foreach($account as $key=>$v){
        echo $key." ".$v."<br>";
      }
      echo "<br>";
    }
    echo $my_arr[0]['ID']."<br>";
    foreach($my_arr as $account){T
      echo $account['ID']."<br>";
      if($u === $account['ID']){
        foreach($my_arr as $account){
          if($p === $account['P']){
            echo "You have successfully logged in!"."<br>";
          }
        }
      }
      else{
        echo "Sorry wrong information was entered!";
        header("Location: HW2_Part1.php");
      }
      echo "<br>";
    }
  }
?>
<?php
  /*if(isset($_POST["register"])){
    foreach($my_arr as $account){
      if($u === $account['ID']){
        echo "Sorry, your username is taken"."<br>";
      }
      else{
        echo "Welcome user!"."<br>";
        array_push($my_arr,$u);
      }
    }
  }*/
?>
