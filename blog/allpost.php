<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blogsphere</title>
  <link type="text/css" rel="stylesheet" href="1.css" />
  <link type="text/css" rel="stylesheet" href="2.css" />
</head>
<body>
<form action="#" method="POST" >
  <table>
    <tr>
      <td>
  <?php

  include 'connection.php';

  $result = mysqli_query($con,"SELECT * FROM post");
  echo "<table border='1' id='table'>";
  echo "<tr>";
  echo "<th><b>No</b></th>";
  echo "<th><b>Post Name<b></th>";
  echo "<th><b>Post id</b></th>";
  echo "<th><b>Username</b></th>";
  echo "<th><b></b></th>";
  echo "<th></th>";
  echo "</tr>";
  echo "<tr>";
  echo "<td></td>";
  echo "<td></td>";
  echo "<td></td>";
  echo "<td></td>";
  echo "<td></td>";
  echo "<td></td>";
  echo "</tr>";
  $i=1;
  while($row=mysqli_fetch_array($result))
  {
    
  echo "<tr><td>$i</td>";
  echo "<td >".$row['postname']."</td>";
  echo "<td >".$row['id']."</td>";
  echo "<td >".$row['username']."</td>";
  echo "<td ><a href=admin_postcontainer.php?id=".$row['id'].">View</a></td>";
  echo "<td ><a href=admin_deletepost.php?id=".$row['id'].">Delete</a></td>";
  $i++;
  }
  
  echo "</tr>";
  echo "</font></table>";
  
  ?>
  </td>
</tr>
</table>
</body>
</html>