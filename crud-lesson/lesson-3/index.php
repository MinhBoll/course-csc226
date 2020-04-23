<!DOCTYPE html>
<html>
    <head>
        <title>Student Management</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        include_once 'includes/dbconnect.inc.php';
        $result = mysqli_query($con, "SELECT * FROM student");
        mysqli_close($con);
        ?>
        <style>
            table, th, td {
                border: 1px solid black;
            }
            #user-info{
                border: 1px solid #ccc;
                width: 700px;
                margin: 0 auto;
                padding: 25px;
            }
            #user-info table{
                margin: 10px auto 0 auto;
                text-align: center;
            }
            #user-info h1{
                text-align: center;
            }
        </style>
        <div id="user-info">
            <h1>Student Roster</h1>
            <a href="create_student.php">Add New Student</a>
            <table id = "student-listing" style="width: 700px;">
                <tr>
                    <td>Student</td>
                    <td>Email</td>
                    <td>Attendance</td>
                    <td>Last Update</td>
                    <td>Registration Date</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?= $row['studentname'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['status'] == 1 ? "Active" : "Disappear" ?></td>
                        <td><?= date('d/m/Y H:i', $row['last_updated']) ?></td>
                        <td><?= date('d/m/Y H:i', $row['created_time']) ?></td>
                        <td><a href="edit_student.php?id=<?= $row['id'] ?>">Edit</a></td>
                        <td><a href="delete_student.php?id=<?= $row['id'] ?>">Delete</a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </body>
</html>
