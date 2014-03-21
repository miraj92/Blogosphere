
<?php
 
if(isset($_REQUEST['create']))
{

 header("location:createpost.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Blogosphere</title>
</head>

<body>  
<center>  <table width="800">
    <tr>
      <td >
        <form method="post" action="">
       <input type="submit" name="create" class="b_createblog" value="New Post" />
       </form>    
      </td>
    </tr>
<tr>
<td><?php


  
  $bid=$_SESSION['bid'];
  $result = mysqli_query($con,"SELECT * FROM post where bid= $bid");
  $num = mysqli_num_rows($result);
  
   if ($num > 0) {
    echo "<table border='0' height='200' width='900' id='table'>";
    echo "<tr height='50'>";
    echo "<th>No</th>"; 
    echo "<th>Post Name</th>";
    echo "<th></th>";
    echo "<th></th>";
    echo "<th></th>";
    echo "</tr>";
    $i=1;
    while($row=mysqli_fetch_array($result))
      {
        echo "<tr><td>$i</td>";
        echo "<td><b>".$row['postname']."</b></td>";
        echo "<td><a href=postcontainer.php?id=".$row['id'].">View</a></td>";
        echo "<td><a href=editpost.php?id=".$row['id'].">Edit</a></td>";
        echo "<td><a href=deletepost.php?id=".$row['id'].">Delete</a></td>";
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
</center>
</body>
</html>