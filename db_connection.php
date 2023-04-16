<?php
    $conn = mysqli_connect("localhost:3307","root","","todo_list");
    if (!$conn) {
        echo "connection failed".mysqli_connection_error();
    }
    
?>