<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Blogosphere</title>
</head>

<body>  
 <center> <table>
    <tr>
      <td >
        <form method="post" action="">
       
       </form>    
      </td>
    </tr>
<tr>
<td><?php


  
  $bid=$_SESSION['bid'];
  $result = mysqli_query($con,"SELECT * FROM comment where bid = $bid");
  $num = mysqli_num_rows($result);
  
   if ($num > 0) {
    echo "<center><table border='0' height='200' width='500' id='table'>";
    echo "<tr height='40'>";
    echo "<th>No</th>"; 
    echo "<th>Comment </th>";
    echo "<th width='150'>Username</th>";
    echo "<th width='150'>Post Name</th>";
    echo "<th></th>";
    echo "</tr>";
    $i=1;
    while($row=mysqli_fetch_array($result))
      {
       
        echo "<tr><td>$i</td>";
        echo "<td><b>".$row['Comment']."</b></td>";
        echo "<td><b>".$row['commentuser']."</b></td>";
        echo "<td><b>".$row['postname']."</b></td>";
        echo "<td><a href=deletecomment.php?cid=".$row['id'].">Delete</a></td>";
        echo "</tr>";
        $i=$i+1;
      }
  
    echo "</table></center>";
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