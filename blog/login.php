<?php

 include 'connection.php';
 include 'function.php';
 
 if(isset($_POST['submit'])) 
 {
  $obj = new Functions();
  $obj -> Login();
 }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="1.css" />
<title>Blog-Makers</title>
</head>

<body>	
<form method="POST">
<table  cellpadding="0" cellspacing="0" class="tableimg" width="100%" border="0" align="center">

<tr>
<td width="204" height="211" class=""></td>
<td height="211" colspan="3" class="image"></td>
<td width="210" height="211" class=""></td>
</tr>

<tr height="200">
<td rowspan="2" height="200" class=""></td>
<td height="430" colspan="3">
<center>

  <table  cellpadding="0" cellspacing="0" width="816" height="457" border="0" >
  <tr>
    <td width="245" height="29">&nbsp;</td>
    <td width="394">&nbsp;</td>
    <td width="177">&nbsp;</td>
  </tr>
  <tr>
    <td height="377">&nbsp;</td>
    <td background="images/login.png">
	
		
	<div align="center"><br />
	<img src="images/username.png" /><br />
	<input name="username" type="text" placeholder="UserName"  style="font-size:20px;">
	</div>
		
	<div align="center">
      <p><br />
            <img src="images/password.png" /><br />
            <input type="password" name="password" placeholder="Password" style="font-size:20px;"/>
      </p>
      </div>
	
			<div align="justify"><center><input type="Submit" class="button1" name="submit" value="Sign in" />
			  <br/>
            <a href="resetpassword.php">Reset Password </a></center>
			</div>


			</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><center>
  <br />
</center></td>
</tr>
</table>

</center>

</td>
<td height="200" rowspan="2" class=""></td>
</tr>



<tr>
</tr>

<tr>
<td height="85" colspan="8" class="footerleft">

</td>
</tr>

</table>
</form>
</body>
</html>