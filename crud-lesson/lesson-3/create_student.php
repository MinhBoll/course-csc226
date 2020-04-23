<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Add New Student</title>
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
        if (isset($_GET['action']) && $_GET['action'] == 'create') {
            if (isset($_POST['studentname']) && !empty($_POST['studentname']) && isset($_POST['email']) && !empty($_POST['email'])) {
                include_once 'includes/dcconnect.inc.php';
                // Thêm bản ghi vào cơ sở dữ liệu
                $query = "INSERT INTO students (studentname, email, status, created_time, last_updated) VALUES ('".$_POST['studentname']."','".$_POST['email']."', 1, '".FROM_UNIXTIME(UNIX_TIMESTAMP())."','".FROM_UNIXTIME(UNIX_TIMESTAMP())."') ";

                $result = mysqli_query($con, $query);
                if (!$result) {
                    if (strpos(mysqli_error($con), "Duplicate entry") !== FALSE) {
                        $error = "The Student was added.";
                    }
                }
                mysqli_close($con);
                if ($error !== false) {
                    ?>
                    <div id="error-notify" class="box-content">
                        <h1>Error</h1>
                        <h4><?= $error ?></h4>
                        <a href="create_student.php">Add new student</a>
                    </div>
                <?php } else { ?>
                    <div id="success-notify" class="box-content">
                        <h4>Student <?= $_POST['studentname'] ?> has been successfully added!</h4>
                        <a href="index.php">Student Roster</a>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } else { ?>
            <div id="create_user" class="box-content">
                <h1>Tạo tài khoản</h1>
                <form action="create_student.php?action=create" method="POST">
                    <label>Student Name</label></br>
                    <input type="text" name="studentname"/>
                    <br>
                    <label>Email</label></br>
                    <input type="email" name="email" />
                    <br><br>
                    <input type="submit" value="Create" />
                </form> 
            </div>
        <?php } ?>
    </body>
</html>
