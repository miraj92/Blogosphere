<?php
include 'connection.php';

include 'function.php';


//$m=new Functions();	
///$x=$m->checksession();



?>

<html>
<head>
<title>micks</title>
</head>
<body>
<form action="#" method="POST">

<?php
if(isset($_REQUEST['text']))
{
 $a=$_REQUEST['text'];	


$sql="select * from post ";
$result=mysqli_query($con,$sql);
echo"<table border='1'>";
echo"<tr>
<td>Post Name</td>
<td>Post content</td>";
echo"<td></td></tr>";
$i=0;
while($row=mysqli_fetch_array($result))
{
	$b=$row['postcontain'];
	if(strstr("$b","$a")==FALSE)
		{
			goto a;
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
a:
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