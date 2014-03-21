<?php
include 'connection.php';


//$m=new Functions();	
///$x=$m->checksession();



?>

<html>
<head>
<title>Blogosphere</title>
<link type="text/css" rel="stylesheet" href="1.css" />
</head>
<body>
<form action="#" method="POST">

<?php
if(isset($_REQUEST['text']))
{
 $a=$_REQUEST['text'];	


$sql="select * from post ";
$result=mysqli_query($con,$sql);
echo"<table border='1' class='tableimg'>";
echo"<tr>
<th>Post Name</th>
<th>Post content</th>";
echo"<th></th></tr>";
$i=0;
while($row=mysqli_fetch_array($result))
{
	$b=$row['postcontainhtml'];
	if(strripos("$b","$a")==FALSE)
		{
			continue;
		}
		else
		{
			
			echo "<tr><td>".$row['postname']."</td>";
			echo "<td>".$row['postcontain']."</td>";
			echo "<td><a href=\"container.php?id=".$row['bid']."\">View</a></td>";
			echo "</tr>";
			$i=$i+1;
		}
		
}
if($i==0)
		{
			 echo "no records found";
		}
	echo "</table>";
}


?>
</form>

</body>

</html>