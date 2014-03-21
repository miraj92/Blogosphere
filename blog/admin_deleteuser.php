<?php
include('connection.php');
session_start();


$bid = $_REQUEST['id'];

$query = "delete from user_detail where Id=$bid";

$sql = "delete from blog where uid=$bid";

$sql2 = "delete from post where uid=$bid";
$sql3 = "delete from comment where uid=$bid";
if (mysqli_query($con, $query)) {
    if (mysqli_query($con, $sql)) {
        if (mysqli_query($con, $sql2)) {
            if (mysqli_query($con, $sql3)) {
                header('location:admin.php');
            }
        }
    }
}

else {
    echo "error";
}


?>