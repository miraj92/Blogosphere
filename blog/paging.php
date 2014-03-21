	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link type="text/css" rel="stylesheet" href="1.css" />
<link type="text/css" rel="stylesheet" href="2.css" />
<title>Blogosphere</title>
</head>

<body>  
<table width="1300" border="0"  align="center" class="tableimg"  cellpadding="0" cellspacing="0" >


<tr>
  <td  width="200" class="" height="223"></td>
  <td height="223" width="900" class="image"></td>
  <td class="" width="200" height="223"></td>
</tr>
<tr>
<td width="200"></td>
<td>
<center>
<a href="admin.php" class='button'><font color='#fff'>Back</font></a>
</center>
</td>
<td width="200"></td>
</tr>
<tr>
  <td width="200"></td>
  <td width="900" height="400">
    <center>

<?php

$rec;
$pages;
$re=5;
$page=0;

include 'connection.php';

$a="select count(ID) from user_detail";
$b=mysqli_query($con,$a);


while($c=mysqli_fetch_array($b))
{
$rec=$c[0];
}


$pages=ceil($rec/$re);

if( isset($_GET['page'] ) )
{
   $page = $_GET['page'] + 1;
   $offset = $re * $page ;
}
else
{
   $page = 0;
   $offset = 0;
}
$left_rec = $rec - ($page * $re);


$sql = "SELECT * ".
       "FROM user_detail ".
       "LIMIT $offset, $re";

$retval = mysqli_query($con,$sql);


echo "<table border='' id='table' align='center'>
       <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Id</th>
        <th>Username</th>
        <th>Email id</th>
        <th>Contact no.</th>
        <th>Birthdate</th>
        <th>Gender</th>
        <th>Age</th>
        <th>Created At</th>
        <th></th>


       </tr>";

while($row = mysqli_fetch_array($retval))
{

    echo "<tr><td>".$row['fname']."</td>";
    echo "<td>".$row['lname']."</td>";
    echo "<td>".$row['Id']."</td>";
    echo "<td>".$row['Username']."</td>";
    echo "<td>".$row['emailid']."</td>";
    echo "<td>".$row['cnum']."</td>";
    echo "<td>".$row['dob']."</td>";
    echo "<td>".$row['gender']."</td>";
    echo "<td>".$row['age']."</td>";
    echo "<td>".$row['datetime']."</td>";
    echo "<td><a href=admin_deleteuser.php?id=".$row['Id'].">Delete</a></td>";  
    echo "</tr>";
}
 echo "</table>";
 
if( $page > 0 && $page<$pages-1)
{
   $last = $page - 2;
   echo "<center><a class='b_createblog' href=\"".$_SERVER["PHP_SELF"]."?page=$last\"><font color='#fff'>Last 5 Records</font></a></center>";
   echo "<center><a class='b_createblog' href=\"".$_SERVER["PHP_SELF"]."?page=$page\"><font color='#fff'>Next 5 Records</font></a></center>";
}
else if( $page == 0 )
{
   echo "<center><a class='b_createblog' href=\"".$_SERVER["PHP_SELF"]."?page=$page\"><font color='#fff'>Next 5 Records</font></a></center>";
}

else if( $left_rec < $re)
{
   $last = $page - 2;
   echo "<center><a class='b_createblog' href=\"".$_SERVER["PHP_SELF"]."?page=$last\"><font color='#fff'>Last 5 Records</font></a></center>";
}

?>
</center>
</td>
<td width="200"></td>

<tr>
<td height="85" colspan="3" class="footerleft">
<div class="footer-left"> Contact Info:<p class="footerp">shalinchoksi92@gmail.com<br />micks.9093@gmail.com</p></div>
<br />
<div class="footer-right">&copy;Copyright 2013. Design By Micks </div>
</td>
</tr>


</table>
</body>
</html>
