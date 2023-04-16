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
    <h1>Tasks List</h1>
    <a href="create.php" style="margin-right: 30px">Create Page</a>
    <a href="read.php" style="margin-right: 30px">List Page</a>
    <table border="1" style=" border-collapse: collapse; margin-top: 20px">
        <thead>
            <tr>
                <th style="padding: 10px">ID</th>
                <th>Name</th>
                <th>Date</th>
                <th>

                </th>
            </tr>
        </thead>
        <tbody>
            <!-- <tr>
                <td>1</td>
                <td>Code Lab</td>
                <td>1.2.2022</td>
                <td>
                    <a href="#">Update</a>
                    <a href="#">Delete</a>
                </td>
            </tr> -->
            
            <?php
                require_once("db_connection.php");
                // SELECT * FROM table_name;

                $sql = "SELECT * FROM work";
                $query = mysqli_query($conn, $sql);
                
                $totalRow = mysqli_num_rows($query);
                // echo $row;
                
                while($row = mysqli_fetch_assoc($query)){
                    $time = date("d.m.Y h:m a", strtotime($row["created_at"]));
                    echo "
                <tr>
                    <td style='padding: 10px 20px'>{$row['id']}</td>
                    <td style='padding: 10px 50px'>{$row['name']}</td>
                    <td style='padding: 10px 80px'>$time</td>
                    <td style='padding: 10px 30px'>
                        <a href='update.php?id={$row['id']}' style='color: green; margin-right: 20px'>Update</a>
                        <a href='delete.php?id={$row['id']}' style='color: red'>Delete</a>
                    </td>
                </tr>";
                }
                
            ?>
        </tbody>
    </table>
</body>
</html>