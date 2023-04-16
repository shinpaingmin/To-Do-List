<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <style>
        a {
            text-decoration: none;
            color: blue;
        }
    </style>
</head>
<body>
    <h1>To-Do List</h1>
    <a href="create.php" style="margin-right: 30px">Create Page</a>
    <a href="read.php" style="margin-right: 30px">List Page</a>
    <!-- INSERT INTO table_name(field1) VALUES (value1) -->
    <form method="POST" style="margin-top: 20px">
        
        <label for="taskName">Your Tasks</label>
        <input type="text" name="taskName" placeholder="Enter your tasks">
        
        <button type="submit" name="add">Add</button>
    </form>

    <?php
    require_once("db_connection.php");
        if (isset($_POST["add"])){
            $taskName = $_POST["taskName"];

            if ($taskName == "" || $taskName == null) {
                echo "<small style='color:red; margin-left:80px'>Need to Fill...</small>";
            } else {
                $sql = "INSERT INTO work (name) VALUES ('$taskName') ";
                if (mysqli_query($conn,$sql)) {
                  
                    header("location: read.php");
                } else {
                    echo "Query Fial" . mysqli_error();
                }
            }
        }
    ?>
</body>
</html>