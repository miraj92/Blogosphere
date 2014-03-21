<?php

include 'function.php';

$m=new Functions();
$username=$m->checksession();

if(isset($_SESSION['bid']))
{
  unset($_SESSION['bid']);
}

if(isset($_POST['logout']))

{

    header('location:logout.php');

}
if(isset($_POST['Createblog']))
{
  $url='Createblog.php';
  header('Location: '.$url);
}

if(isset($_REQUEST['delete']))
{
  $url='deleteblog.php';
  header('location: '.$url);
}

if(isset($_POST['search']))
{
   $a=$_POST['text'];
  header("location:search.php?text=".$a);
}

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
  <table width="100%"  class="tableimg" border="0" align="center" cellpadding="0" cellspacing="0" >
<tr>
  <td class="" width="212" height="220"></td>
  <td height="220" colspan="5" class="image"></td>
  <td width="218" height="200" class=""></td>
</tr>

<tr>
  <td height="311" rowspan="2" class="bodyimg"><center></center>    </td>
  <td height="46" colspan="" >
    <div align="center">
  <?php
  echo "<b><font face='Tahoma, Geneva, sans-serif' color='#0033FF' size='+1'>Welcome, &nbsp;</font><font face='Tahoma' color='#0B0B61' size='+3'>".$username."</font></b>";
  ?>
</div>
</td>	

	<td width="162" >

	<div align="center" ><a href="editProfile.php" class="button"><font color="#FFFFFF">Edit Profile</font></a></div>
	</td>
	<td width="161" >
		<div align="center" ><a href="Changepassword.php" class="button"><font color="#FFFFFF">Change Password</font></a> </div>
    </td>
     <td width="161"> 
     <div align="center" ><a href="Allblogs.php" class="button"><font color="#FFFFFF">All Blogs</font></a> </div></td>
	<td width="164"><div align="center" ><a href="logout.php" class="button"><font color="#FFFFFF">Logout</font></div></a></td>

  
<td><font face="ArdleysHand" color="#0033FF"><b></b> </font> <input type="text" name="text" placeholder="search"/><br /><input type="Submit" name="search" class="button1" value="search" /></td>
 
  </tr>

  <tr>
 	 <td width="223" height="209" align="center" valign="top" class="createblog">
  		
  			<p>&nbsp;	    </p>
  			<p>
  		<a href="Createblog.php" class="button"><font color="#FFFFFF">Create Blog</font></a>		
                </p>
	  </td>
  <td colspan="4">
  <?php

  include 'connection.php';

  $result = mysqli_query($con,"SELECT * FROM blog JOIN user_detail ON blog.uid = user_detail.Id WHERE user_detail.Username =  '$username' LIMIT 0 , 30");
  


  echo "<table id='table'>";
  echo "<tr>";
  echo "<th><b>No</b></th>";
  echo "<th><b>Blog Name<b></th>";
  echo "<th><b>Statistics</b></th>";
  echo "<th></th>";
  echo "<th></th>";
  echo "<th></th>";
  echo "</tr>";
  
  
  $i=1;
  While($row=mysqli_fetch_array($result))

  {

  echo "<tr><td>$i</td>";
  echo "<td class='user_edit_panel'>".$row['bname']."</td>";
  echo "<td class='user_edit_panel'>".$row['stats']."</td>";
  echo "<td class='user_edit_panel'><a href=userpanel_new.php?id=".$row['id'].">Edit</a></td>";
  echo "<td class='user_edit_panel'><a href=container.php?id=".$row['id'].">View</a></td>";
  echo "<td class='user_edit_panel'><a href=deleteblog.php?id=".$row['id'].">Delete</a></td>";
  $i++;
  
  }
  echo "</tr>";
  echo "</table>";
  
  ?>
  </td>
  <td width="218" style="margin-top:0px;">
</td>
</tr>

<tr>
  <td height="85" colspan="9" class="footerleft">
  
  </td>
</tr>


</table>
</form>
</body>
</html>
