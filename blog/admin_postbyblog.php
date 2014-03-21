<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link type="text/css" rel="stylesheet" href="1.css" />
<link type="text/css" rel="stylesheet" href="2.css" />
<title>Blogosphere</title>
</head>

<body>  
  <form method="POST" action="#">
  <table>
    <tr>
<td >
  <?php

include 'connection.php';

$result = mysqli_query($con, "SELECT * FROM blog");



echo "<table border='0' id='table'>";
echo "<tr>";
echo "<th><b>No</b></th>";
echo "<th><b>Blog Name<b></th>";
echo "<th></th>";
echo "</tr>";
echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td>";
echo "</tr>";

$i = 1;
While ($row = mysqli_fetch_array($result)) {
    
    echo "<tr><td>$i</td>";
    echo "<td class='user_edit_panel'>" . $row['bname'] . "</td>";
    
    echo "<td class='user_edit_panel'><a href=admin.php?id=" . $row['id'] . "&file=admin_blogpost.php>View</a></td>";
    
    $i++;
    
}
echo "</tr>";
echo "</table>";

?>
  </td>
</tr>



</table>
</form>
</body>
</html>
