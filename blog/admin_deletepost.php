<?php
include('connection.php');
session_start();


$postid = $_REQUEST['id'];


$sql2 = "delete from post where id=$postid";
$sql3 = "delete from comment where postid=$postid";
if (mysqli_query($con, $sql2)) {
    if (mysqli_query($con, $sql3)) {
        header('location:admin.php');
    }
}

else {
    echo "error";
}


?>