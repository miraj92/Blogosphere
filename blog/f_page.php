<?php
 
if(isset($_REQUEST['create']))
{
  header("location:createpage.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<link type="text/css" rel="stylesheet" href="1.css" />-->
<title>Blog-Makers</title>
</head>

<body>  
  <table>
    <tr>
      <td >
        <form method="post" action="Createpage.php">
       <input type="submit" name="create" value="New Page" /> 
       </form>   
      </td>
    </tr>
<tr>
<td>
<?php

 $bid=$_SESSION['bid'];

  $result = mysqli_query($con,"SELECT * FROM page JOIN blog ON blog.id = page.bid WHERE blog.id = $bid");
  $num = mysqli_num_rows($result);
 
   if($num > 0) {
   	

   	
    echo "<table border='0' height='200' width='500'>";
    echo "<tr>";
    echo "<td>No</td>"; 
    echo "<td>Page Name</td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "</tr>";
    $i=1;
    while($row=mysqli_fetch_array($result))
      {
        echo "<tr><td>$i</td>";
        echo "<td><b>".$row['pagename']."</b></td>";
        echo "<td><a href=page.php?id=".$row['id'].">View</a></td>";
        echo "<td><a href=page.php?id=".$row['id'].">Edit</a></td>";
        echo "<td><a href=page.php?id=".$row['id'].">Delete</a></td>";
        echo "</tr>";
        $i=$i+1;
      }
  
    echo "</table>";
  } else {
    echo "No Records found";
  }

?>
</td>
</tr>
</table>
</body>
</html>