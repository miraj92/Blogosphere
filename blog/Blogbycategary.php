<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>blogosphere</title>
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

  
  echo "<table border='1'id='table'>";
  echo "<tr>";
  echo "<th><b>No</b></th>";
  echo "<th><b>Category<b></th>";
  echo "<th><b>Total Blogs</b></th>";
  echo "<th></th>";
  echo "</tr>"; 
  echo "<tr>";
  echo "<td></td>";
  echo "<td></td>";
  echo "<td></td>";
  echo "<td></td>";
  echo "</tr>";
  $array=array("Songs","Movie","Politics","Entertainment","Sports","Education","Mobile","Computers");
  for($i=0;$i<8;$i++)
  {
    $c=$array[$i];
  
    $sql1="select * from blog where Category='$c'";
  
    $categaryresult=mysqli_query($con,$sql1);
    $num = mysqli_num_rows($categaryresult);
      
  echo "<tr><td>$i</td>";
  echo "<td >".$c."</td>";
  echo "<td >".$num."</td>";
  echo "<td ><a href=admin.php?category=".$c."&file=admin_categaryblog.php>View</a></td>";

  }
  
  echo "</tr>";
  echo "</font></table>";
  
  ?>
  </td>
</tr>
</table>
</body>
</html>