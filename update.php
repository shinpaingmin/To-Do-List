<!-- Get Data => Show => Edit => Update  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a {
            text-decoration: none;
            color: blue;
           
        }
    </style>
</head>
<body>
    <?php
    require_once("db_connection.php");
    $id = $_GET['id'];

    $sql = "SELECT * FROM work WHERE id = $id";

    $query = mysqli_query($conn, $sql);

    $data = mysqli_fetch_assoc($query);

    if (isset($_POST["update"])) {
        $taskName = $_POST['taskName'];
        $id = $_POST['taskID'];
        if ($taskName == null || $taskName == "") {
            echo "<small style='color:red'> Task Name is required! </small>";
        } else {
            $updateSql = "UPDATE work SET name = '$taskName' WHERE id = '$id'";

            if (mysqli_query($conn, $updateSql)) {
                header("location: read.php");
            } else {
                echo "Update Error" . mysqli_error();
            }
        }
    }
    ?>
    <h1>Update List</h1>
    <a href="create.php" style="margin-right: 30px">Create Page</a>
    <a href="read.php" style="margin-right: 30px">List Page</a>
    <form method="POST" style="margin-top: 20px">
        <label for="taskName">Tasks: </label>
        <input type="hidden" name="taskID" value="<?php echo $data['id'] ?>">
        <input type="text" name="taskName" value="<?php echo $data['name'] ?>">
        <button name="update">Update</button>
    </form>
</body>
</html>
