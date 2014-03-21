<?php
include('connection.php');
session_start();


$bid = $_REQUEST['id'];

$sql  = "delete from blog where id=$bid";
$sql2 = "delete from post where bid=$bid";
$sql3 = "delete from comment where bid=$bid";
if (mysqli_query($con, $sql)) {
    
    if (mysqli_query($con, $sql2)) {
        if (mysqli_query($con, $sql3)) {
            header('location:admin.php');
        }
    }
}

else {
    echo "error";
}


?>