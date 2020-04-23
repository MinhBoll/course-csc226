<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Delete Student</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <style>
            .box-content{
                margin: 0 auto;
                width: 800px;
                border: 1px solid #ccc;
                text-align: center;
                padding: 20px;
            }
            #create_user form{
                width: 200px;
                margin: 40px auto;
            }
            #create_user form input{
                margin: 5px 0;
            }
        </style>
    </head>
    <body>
        <?php
        $error = false;
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            include_once 'includes/dbconnect.inc.php';
            $query = "DELETE FROM students WHERE id = ".$_GET['id'];
            $result = mysqli_query($con, $query);
            if (!$result) {
                $error = "Cannot Delete the Student Info";
            }
            mysqli_close($con);
            if ($error !== false) {
                ?>
                <div id="error-notify" class="box-content">
                    <h1>Caution</h1>
                    <h4><?= $error ?></h4>
                    <a href="index.php">Student Roster</a>
                </div>
            <?php } else { ?>
                <div id="success-notify" class="box-content">
                    <h1>Deleted Successfully</h1>
                    <a href="index.php">Student Roster</a>
                </div>
            <?php } ?>
        <?php } ?>
    </body>
</html>
