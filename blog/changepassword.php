 <?php

include 'connection.php';
include 'function.php';

$m        = new Functions();
$username = $m->checksession();

if (isset($_POST['change'])) {
    
    
    $op = $_POST['oldpassword'];
    $np = $_POST['newpassword'];
    $rp = $_POST['repassword'];
    
    
    $sql = "select * from user_detail where Username='$username' and password='$op'";
    echo $sql;
    
    $result = mysqli_query($con, $sql);
    $row    = mysqli_num_rows($result);
    
    if ($row == 1) {
        
        if ($np == $rp) {
            $sql = "Update user_detail set password='$np',force_new_pw='1' where Username='$username' and password='$op'";
            echo $sql;
            mysqli_query($con, $sql);
            print "alert('Password changed successfully')";
            $obj = new Functions();
            $obj->changepassmail($username);
            $newURL = 'login.php';
            header('Location: ' . $newURL);
            
            
            session_destroy();
        } else {
            print "<script type=\"text/javascript\">";
            print "alert('The password doesn't match ')";
            print "</script>";
            
        }
        
    }
}
if (isset($_POST['cancel'])) {
    
    header('Location:user.php');
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="1.css" />
<title>Blogosphere</title>
</head>

<body>  

<table border="0" cellpadding="0"  class="tableimg" cellspacing="0" width="1330 ">

<tr>
<td class="" width="200" height="211"></td>
<td height="211" width="900" colspan="" class="image"></td>
<td class="" width="200" height="211"></td>
</tr>

<tr height="200">
<td rowspan="2" width="200" height="200" class=""></td>
<td height="426" colspan="" width="900">
<center>

  <form action="#" method="post"> 
  <fieldset> 
  <legend ><font color="#009900" size="+3">Change Password</font></legend> 
  <input type="hidden" value="'.$_SESSION['username'].'" name="username"> 
  <dl> 
    <dt><center> <label for="oldpassword" style="font-family:Accent SF">Current Password:</label></center></dt> 
    <dd><center> <input name="oldpassword" required="" type="password" maxlength="15"></center></dd> 
  </dl> 
  <dl> 
    <dt><center> <label for="password" style="font-family:Accent SF">New Password:</label></center> </dt> 
    <dd><center> <input name="newpassword" type="password" required=""  maxlength="15"></center> </dd> 
  </dl> 
  <dl> 
    <dt><center> <label for="repassword"  style="font-family:Accent SF">Re-type new password:</label> </center></dt> 
    <dd><center><input name="repassword" type="password" required="" maxlength="15"></center> </dd> 
  </dl> 
  <p> 
    <center> <input name="change" type="submit" value="Change password" class="submit"> 
    <input name="cancel" type="submit" value="Cancel" class="submit"> </center>
  </p> 
  </fieldset> 
</form>
</center>
</td>

<td height="200" rowspan="2" width="200" class=""></td>
</tr>


<tr></tr>

<tr>
<td height="85" colspan="3" class="footerleft">

</td>
</tr>

</table>
</body>
</html>