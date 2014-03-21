<?php
include 'connection.php';
include 'function.php';
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$email=$_POST['email'];
	
	$sql="select * from user_detail where Username='$username' and emailid='$email'";
	$result=mysqli_query($con,$sql);
	
	$row=mysqli_num_rows($result);
     //         printf("Result set has %d rows.\n",$row);
              if($row==1)
              {
				  $obj= new  Functions();
				  $obj->resetpassmail($username,$email);
			  }
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link type="text/css" rel="stylesheet" href="1.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Forget Password</title>
</head>
<body>
<form method="POST" action="#">
<table  cellpadding="0" cellspacing="0" class="tableimg" width="1300" border="0" align="center">

<tr>
<td class="" width="200" height="211"></td>
<td height="211" width="900" colspan="" class="image"></td>
<td class="" width="200" height="211"></td>
</tr>

<tr height="200">
<td rowspan="2" height="200" width="200" class=""></td>
<td height="430" width="900" colspan="" bgcolor="">
<center>
<fieldset>
  <legend>Reset Password</legend>
  <table  cellpadding="0" cellspacing="0" width="300" height="" border="0">
  <tr><center>
    <td width="">Username:</td>
    <td width=""><input type="text" placeholder="Username" required="required" name="username"  /></td>
     </center>
  </tr>
  
  <tr><center>
  <td width="">Email id:</td>
  <td width="" ><input type="email" placeholder="Email" required="required" name="email" /></td>
</center></tr>   
  
  <tr>
  <center>
  <td align="right"><input type="submit" name="submit" value="ResetPassword" required="required"  align="right" /></td>
  <td><input type="reset" name="Reset" value="Clear" />
  </center>
  </tr>
</table>
</fieldset>
</center>

</td>
<td height="200" rowspan="2" width="200" class=""></td>
</tr>



<tr>
</tr>

<tr>
<td height="85" colspan="3" class="footerleft">
<div class="footer-left"> Contact Info:<p class="footerp">shalinchoksi92@gmail.com<br />micks.9093@gmail.com</p></div>
<br />
<div class="footer-right">&copy;Copyright 2013. Design By  </div>
</td>
</tr>

</table>
</form>


</body>
</html>