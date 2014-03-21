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

  $result = mysqli_query($con,"SELECT * FROM blog");
  echo "<table border='1' id='table'>";
  echo "<tr>";
  echo "<th><b>No</b></th>";
  echo "<th><b>Blog Name<b></th>";
 
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
  echo "</tr>";
  $i=1;
  While($row=mysqli_fetch_array($result))
  {
    $uid=$row['uid'];
    $sql1="select Username from user_detail where id=$uid";
    $userresult=mysqli_query($con,$sql1);

      While($userrow=mysqli_fetch_array($userresult))
      {
  echo "<tr><td>$i</td>";
  echo "<td >".$row['bname']."</td>";
  
  echo "<td >".$userrow['Username']."</td>";
  echo "<td ><a href=admin_container.php?id=".$row['id'].">View</a></td>";
  echo "<td ><a href=admin_deleteblog.php?id=".$row['id'].">Delete</a></td>";
  $i++;
  }
  }
  echo "</tr>";
  echo "</font></table>";
  
  ?>
  </td>
</tr>
</table>
</body>
</html>