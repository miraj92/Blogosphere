<?php
include 'connection.php';
include 'function.php';

//$m=new Functions();
//$x=$m->checksession();

if(isset($_POST['submit']))
{
	$pagename=$_POST['pagename'];
	$uid=$_SESSION['id'];

	$sql="insert into page values('',$bid,'$pagename',$uid,now());";

	if(mysqli_query($con,$sql))
	{
		header("location:user.php");
	}
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link type="text/css" rel="stylesheet" href="1.css" />
</head>

<body>
	<form method="post">
<table width="1317" border="1" align="center" cellpadding="1" cellspacing="1" >
<tr >
<td width="204" height="82" class="header"></td>
<td height="82" class="header"><font style="font-family:'Comic Sans MS', cursive" color="#FFFFFF" size="+3">BlogMakerS</font></td>
<td width="207" height="82" class="header"></td>
</tr>


<tr>
  <td class="sideimage" height="223"></td>
  <td height="223" class="image"></td>
  <td class="sideimage" height="223"></td>
</tr>

<tr>
	<td  height="200" class="sidepane"></td>
	<td>
	<div>
		<div style="margin-top:0px;margin-left:800px;"><input type="submit" name="logout" Value="logout" /> </div>
	<table>
		<center>
		<tr>
			<td colsspan="2" align="center"><h2>Page Details</h2></td>
		</tr>

		<tr>
			<td>Enter The Page Name</td>
			<td><input type="text" name="pagename" placeholder="Enter The Page Name" Size="35" /><td>
		</tr>
		
		<tr>	
			<td colspan="2">
			<center>
			<input type="submit" name="submit" value="Create" />
			</center> 
			</td>
				
		</tr>
		</center>
	</table></div></td>
  <td class="sidepane">&nbsp;</td>
</tr>

<tr>
  <td height="85" colspan="3" class="footerleft">
  <div class="footer-left"> Contact Info:<p class="footerp">Shalinchoksi92@gmail.com<br />Micks.9093@gmail.com</p></div>
  <br />
  <div class="footer-right">&copy;Copyright 2013. Design By  </div>
  </td>
</tr>


</table>

</form>
</body>
</html>