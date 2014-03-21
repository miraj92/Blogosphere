<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blogosphere</title>
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
  $sql="SELECT * FROM blog";
  $result = mysqli_query($con,$sql);
  echo "<table border='1' id='table'>";
  echo "<tr>";
  echo "<th><b>No</b></th>";
  echo "<th><b>Blog Name<b></th>";
  echo "<th><b>Total Views</b></th>";
  
  echo "</tr>";
  echo "<tr>";
  echo "<td></td>";
  echo "<td></td>";
  echo "<td></td>";
  
  echo "</tr>";
  $i=1;
  While($row=mysqli_fetch_array($result))
  {
   
     
  echo "<tr><td>$i</td>";
  echo "<td >".$row['bname']."</td>";
  echo "<td >".$row['stats']."</td>";
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