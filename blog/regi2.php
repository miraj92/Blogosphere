<?php
include 'connection.php';

session_start();


if (isset($_POST['Finish'])) {
    
    
    $email  = $_POST['emailid'];
    $uname  = $_POST['uname'];
    $fname  = $_SESSION['fname'];
    $lname  = $_SESSION['lname'];
    $age    = $_SESSION['age'];
    $dob    = $_SESSION['dob'];
    $gender = $_SESSION['gender'];
    $cno    = $_SESSION['cno'];
    
    
    
    $sql = "insert into user_detail(`id`,`fname`,`lname`,`age`,`dob`,`gender`,`cnum`,`username`,`emailid`,`datetime`) values ('','$fname','$lname','$age','$dob','$gender','$cno','$uname','$email',now())";
    if (mysqli_query($con, $sql)) {
        echo "Inserted successfuly";
        include 'function.php';
        $id     = mysqli_insert_id($con);
        $object = new Functions();
        $object->passmail($id, $email);
        
    } else {
        echo $sql;
        echo "Error";
    }
}

if (isset($_POST['back'])) {
    $newURL = 'regi1.php';
    header('Location: ' . $newURL);
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

<table  cellpadding="0" cellspacing="0" width="100%" border="0" class="tableimg">


<tr>
<td width="223" height="211"></td>
<td height="211" colspan="3" class="image"></td>
<td width="182" height="211"></td>
</tr>

<tr height="400">
<td rowspan="2" height="444"></td>
<td height="382" colspan="3">
<center>
<form  method="post" action="#">
<table  cellpadding="0" cellspacing="0" width="816" height="359" border="0">

  <tr>
    <th>UserName:</th>
    <td><center><input type="text" name="uname" required="" placeholder="UserName"  />*</center></td>
  </tr>
 
  <tr>
    <th>Email Id: </th>
    <td><center><input type="email" placeholder="abc@gmail.com"  required="" name="emailid" />*</center></td>
  </tr>

  <tr>
    <td height="163" colspan="2">
      <label></label><center>
      <input type="submit" name="Finish" class="submit" value="Finish" />
      <input type="submit" name="back" class="submit" value="Back"  />
      </center>
      <label></label></td>
  </tr>
</table>
</Form>
</center>

</td>
<td height="444" rowspan="2" ></td>
</tr>

<tr height="25">
  <td class="otherstep" width="273" height="39"></td>
  <td  class="step" width="304" height="39"><center><strong>Step : 2 >>></strong></center></td>
  <td  class="otherstep" width="311" height="39"></td>
</tr>

<tr>
</tr>

<tr>
<td height="85" colspan="8" class="footerleft"></td>
</tr>

</table>
</body>
</html>