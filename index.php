<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      $str = "Hello I am Minh Minh";
      preg_match_all("/M.*/", $str, $arr);
      print_r($arr);
    ?>
  </body>
</html>