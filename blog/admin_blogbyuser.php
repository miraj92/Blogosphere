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

$result = mysqli_query($con, "SELECT * FROM user_detail");
echo "<table border='' id='table'>";
echo "<tr>";
echo "<th><b>No</b></th>";
echo "<th><b>Userame<b></th>";
echo "<th><b>Total Blogs</b></th>";
echo "<th></th>";
echo "<th></th>";
echo "</tr>";
echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "</tr>";
$i = 1;
While ($row = mysqli_fetch_array($result)) {
    $uid        = $row['Id'];
    $sql1       = "select * from blog where uid=$uid";
    $userresult = mysqli_query($con, $sql1);
    $num        = mysqli_num_rows($userresult);
    
    
    echo "<tr><td>$i</td>";
    echo "<td >" . $row['Username'] . "</td>";
    echo "<td >" . $num . "</td>";
    echo "<td ><a href=admin.php?d=" . $row['Id'] . "&file=admin_userblog.php>View</a></td>";
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