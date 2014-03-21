<?php

include 'function.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link type="text/css" rel="stylesheet" href="1.css" />
<link type="text/css" rel="stylesheet" href="2.css" />
<title>Blogosphere</title>
</head>

<body>  
  <form name="frmudsr" method="POST" action="#">
  <table width="1300" hieght="700"  class="tableimg" border="0" align="center" cellpadding="0" cellspacing="0" >
<tr>
  <td class="" width="200" height="220"></td>
  <td height="220" width="900" class="image"></td>
  <td class="" width="200" height="220"></td>
</tr>
<tr>
  <td class="" width="200" height=""></td>
  <td height="" width="900" class=""><div style="float:right;"><a href="user.php" class="button"><font color="#fff">Back</font></a></td>
  <td class="" width="200" height=""></td>
</tr>

<tr>
  <td height=""></td>
  <td height="400" width="900">
    <div align="center">
  <?php

include 'connection.php';

$result = mysqli_query($con, "SELECT * FROM blog JOIN user_detail ON user_detail.Id=blog.uid");



echo "<table id='table'>";
echo "<tr>";
echo "<th><b>No</b></th>";
echo "<th><b>Blog Name<b></th>";
echo "<th><b>User Name<b></th>";
echo "<th>Blog Category</th>";
echo "<th>Created on</th>";
echo "<th></th>";
echo "</tr>";


$i = 1;
While ($row = mysqli_fetch_array($result)) {
    
    echo "<tr><td>$i</td>";
    echo "<td class='user_edit_panel'>" . $row['bname'] . "</td>";
    echo "<td class='user_edit_panel'>" . $row['Username'] . "</td>";
    echo "<td class='user_edit_panel'>" . $row['Category'] . "</td>";
    echo "<td class='user_edit_panel'>" . $row['datetime'] . "</td>";
    echo "<td class='user_edit_panel'><a href=container.php?id=" . $row['id'] . ">View</a></td>";
    $i++;
    
}
echo "</tr>";
echo "</table>";

?>
  
  </td> 

  <td>

  
  </td>
  
</tr>



</table>
</form>
</body>
</html>
