<?php
include('connection.php');
session_start();


$commentid = $_REQUEST['id'];



$sql3 = "delete from comment where id=$commentid";

if (mysqli_query($con, $sql3)) {
    header('location:admin.php');
}


else {
    echo "error";
}


?>