<?php
require_once("db_connection.php");
$id =  $_GET['id'];

$sql = "DELETE FROM work WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    header("location: read.php");
} else {
    echo "delete fail..." . mysqli_error();
}
