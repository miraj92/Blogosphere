<?php
include('connection.php');
session_start();


	$cmmentid=$_REQUEST['cid'];

$sql3="delete from comment where id=$cmmentid";
echo $sql3;
		if(mysqli_query($con,$sql3))
		{	
			header('location:userpanel_new.php');
		}
		else
		{
			echo "error";
		}


?>