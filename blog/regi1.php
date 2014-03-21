<?php
session_start();
include 'connection.php';

	if(isset($_POST['Next'])){
		
		$_SESSION['fname']=$_POST['fname'];
    
	  $_SESSION['lname']=$_POST['lname'];

		$_SESSION['age']=$_POST['age'];
 
	  $_SESSION['dob']=$_POST['dob'];
 
	  $_SESSION['gender']=$_POST['gender'];
 
		$_SESSION['cno']=$_POST['cno'];
    
     $newURL='regi2.php';
    header('Location: '.$newURL);
		
	}
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="1.css" />
<title>Blogoshere</title>
</head>

<body>	
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="tableimg">

<tr>
<td class="" width="200" height="211"></td>
<td height="211" colspan="3" width="900" class="image"></td>
<td class="" width="200" height="211"></td>
</tr>

<tr height="200">
<td rowspan="3" height="200" class=""></td>
<td height="426" colspan="3">
<center>
<form  method="post" action="#">
<table width="816" height="400" border="0">
  <tr>
    <th colspan="2"><div align="center"><font face="cursive" color="#006600"><h2><b><u>Registration Form </u></b></h2></font>
    </div></th>
  </tr>
  
  <tr>
    <th width="475"><font face="cursive" color="#006600">First Name : </font></th>
    <td width="331">
      <center>             
        <input type="text" placeholder="First Name"  required="" name="fname"  value=<?php if (isset($_SESSION['fname'])) {echo $_SESSION['fname'];} ?>>
      </center></input>
    </td>
  </tr>
  
  <tr>
    <th><font face="cursive" color="#006600">Last Name :</font> </th>
    <td><center><input type="text" placeholder="Last Name" name="lname" value=<?php if (isset($_SESSION['lname'])) {echo $_SESSION['lname'];} ?>></center></input></td>
  </tr>
  <tr>
    <th><font face="cursive" color="#006600">Age : </font></th>
    <td><center><input type="text" name="age" required="" placeholder="Age" pattern="[0-9]*"value=<?php if (isset($_SESSION['age'])) {echo $_SESSION['age'];} ?> ></center></input></td>
  </tr>
  <tr>
    <th><font face="cursive" color="#006600">Birthday: </font></th>
    <td><center><input type="date" name="dob" required="" value=<?php if (isset($_SESSION['dob'])) {echo $_SESSION['dob'];} ?>  /></center>
      </td>
  </tr>
  <tr>
    <th><font face="cursive" color="#006600">Gender : </font></th>
    <td><center>
	<label>
        <input name="gender" type="radio" value="Male" selected="" />
        Male
        </label>
      <label>
      <input name="gender" type="radio" value="Female" />
      Female</label>
      </center>
    
    </td>
  </tr>
  <tr>
    <th><font face="cursive" color="#006600">Contact No: </font></th>
    <td><center><input type="text" placeholder="Mobile No." required=""  name="cno" pattern="[1-9]{1}[0-9]{9}" value=<?php if (isset($_SESSION['cno'])) {echo $_SESSION['cno'];} ?> ></center></td>
  </tr>

  <tr>
    <td align="center" colspan="2">
  
      <input type="submit" name="Next" class="submit" value="Next" />
     	
      <label>
     
      </label>
     </td>
  </tr>
 
</table>
</Form>
</center>
</td>
<td height="200" rowspan="2" class=""></td>
</tr>

<tr height="25">
  <td class="step" width="267" height="48"><center><strong>Step : 1 >>></strong></center></td>
  <td  class="otherstep" width="279" height="48"></td>
  <td  class="otherstep" width="263" height="48"></td>
</tr>

<tr>
</tr>

<tr>

</tr>

</table>
</body>
</html>