<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Edit Student</title>
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
            #edit_user form{
                width: 200px;
                margin: 40px auto;
            }
            #edit_user form input{
                margin: 5px 0;
            }
        </style>
    </head>
    <body>
        <?php
        include_once 'include/dbconnect.inc.php';
        $error = false;
        if (isset($_GET['action']) && $_GET['action'] == 'edit') {
            if (isset($_POST['user_id']) && !empty($_POST['user_id']) && isset($_POST['studentname']) && !empty($_POST['studentname']) && isset($_POST['email']) && !empty($_POST['email'])) {
                $query2 = "UPDATE students SET studentname=".$_POST['studentname'].", email = ".$_POST['email'].", status=  ".$_POST['status'].", last_updated=".FROM_UNIXTIME(UNIX_TIMESTAMP())." WHERE id = ".$_POST['user_id']."; ";
                $result = mysqli_query($con, $query2);
                if (!$result) {
                    $error = "Cannot Update Student Info!";
                }
                mysqli_close($con);
                if ($error !== false) {
                    ?>
                    <div id="error-notify" class="box-content">
                        <h1>Thông báo</h1>
                        <h4><?= $error ?></h4>
                        <a href="./index.php">Danh sách tài khoản</a>
                    </div>
                <?php } else { ?>
                    <div id="edit-notify" class="box-content">
                        <h1><?= ($error !== false) ? $error : "Update Successfully!" ?></h1>
                        <a href="index.php">Student Roster</a>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div id="edit-notify" class="box-content">
                    <h1>Please Update Information</h1>
                    <a href="edit_student.php?id=<?= $_POST['user_id'] ?>">Return</a>
                </div>
            <?php
            }
        } else {
            $query1 = "SELECT * FROM students WHERE id=".$_GET['id']);
            $result = mysqli_query($con, $query1);
            $user = $result->fetch_assoc();
            mysqli_close($con);
            if (!empty($user)) {
                ?>
                <div id="edit_user" class="box-content">
                    <h1>Edit Student "<?= $user['studentname'] ?>"</h1>
                    <form action="edit_student.php?action=edit" method="POST">
                        <label>Student name</label></br>
                        <input type="hidden" name="user_id" value="<?= $user['id'] ?>" />
                        <input type="text" name="studentname" value="<?= $user['studentname'] ?>" />
                        <label>Email</label></br>
                        <input type="email" name="email" value="<?= $user['email'] ?>" />
                        <select name="status">
                            <option <?php if (!empty($user['status'])) { ?> selected <?php } ?> value="1">Active</option>
                            <option <?php if (empty($user['status'])) { ?> selected <?php } ?>  value="0">Disappear</option>
                        </select>
                        <br><br>
                        <input type="submit" value="Edit" />
                    </form>
                </div>
            <?php
            }
        }
        ?>
    </body>
</html>
