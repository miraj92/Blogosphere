<?php
include 'function.php';
include 'connection.php';
$m        = new Functions();
$username = $m->checksession();
$id       = $_SESSION['id'];

if (isset($_POST['update'])) {
    $email = $_POST['email'];
    
    $fname  = $_POST['fname'];
    $lname  = $_POST['lname'];
    $age    = $_POST['age'];
    $dob    = $_POST['dob'];
    $gender = $_POST['gender'];
    $cno    = $_POST['cno'];
    
    $sql = "update user_detail set fname='$fname',lname='$lname',age='$age',dob='$dob',gender='$gender',cnum=$cno,emailid='$email' where Id=$id";
    echo $sql;
    if (mysqli_query($con, $sql)) {
        echo "record updated";
        $newURL = 'user.php';
        header("Location:" . $newURL . "");
    } else {
        echo "error";
    }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blogosphere</title>
<link type="text/css" rel="stylesheet" href="1.css" />

</head>

<body>
<form name="" method="POST" action="#">
  <table width="100%"  class="tableimg" border="0" align="center" cellpadding="0" cellspacing="0" >
<tr>
  <td class="" width="198" height="220"></td>
  <td height="220" width="889" colspan="" class="image"></td>
  <td width="206" height="220" class=""></td>
</tr>

<tr>
  <td class="" width="198" height=""></td>
  <td height="" width="889" colspan=""></td>
  <td width="206" height="" class=""></td>
</tr>

<tr>
<td width="198" height="400"></td>

<td width="889"><center>

<table >
<tr><td colspan="2"><font size="+3" face="Accent SF" color="#123456"><center>Edit Profile</center></font></td></tr>
<?php
$id = $_SESSION['id'];

$sql = "select * from user_detail where Id='$id'";

$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)) {
    echo "<tr><td><font size=\"+1\" face=\"batavin\" color=\"#800\">First name:</font> </td><td><input type=\"text\" name=\"fname\" required=\"\" value=\"" . $row['fname'] . "\" /></td><br /></tr>";
    echo "<tr><td><font size=\"+1\" face=\"batavin\" color=\"#790\">Last name: </font></td><td><input type=\"text\" name=\"lname\" required=\"\" value=\"" . $row['lname'] . "\" /></td></tr>";
    echo "<tr><td><font size=\"+1\" face=\"batavin\" color=\"#780\">Age: </font></td><td><input type=\"text\" name=\"age\" pattern=\"[1-9]{9}\" required=\"\" value=\"" . $row['age'] . "\" /></td></tr>";
    echo "<tr><td><font size=\"+1\" face=\"batavin\" color=\"#770\">D.O.B.:</font> </td><td><input type=\"date\" name=\"dob\" required=\"\" value=\"" . $row['dob'] . "\" /></td></tr>";
    echo "<tr><td><font size=\"+1\" face=\"batavin\" color=\"#760\">Gender:</font> </td><td><center>
  <label>";
        
        if($row['gender'] == 'Male') {
                 echo '<input type="radio"  name="gender" value="Male" checked="checked" />Male';
                 echo '<input type="radio"  name="gender" value="female"  />Female';
         }
        else {
                 echo '<input type="radio"  name="gender" value="Male"  />Male';
                 echo '<input type="radio"  name="gender" value="female" checked="checked" />Female';
          }
 
         
    echo  "</center></td></tr>";
    echo "<tr><td><font size=\"+1\" face=\"batavin\" color=\"#750\">contact number: </font></td><td><input type=\"text\" required=\"\" pattern=\"[1-9]{1}[0-9]{9}\" name=\"cno\" value=\"" . $row['cnum'] . "\" /></td></tr>";
    echo "<tr><td><font size=\"+1\" face=\"batavin\" color=\"#740\">email id:</font> </td><td><input type=\"email\" name=\"email\" required=\"\" value=\"" . $row['emailid'] . "\" /></td></tr>";
}

?>
<tr>
<td colspan="2"><center><input type="submit" name="update" value="Update" class="submit" /><a href="user.php" class="submit"><font color="#FFFFFF">Back</font></a></center></td>
</tr> 
</table>
</center>

</td>
<td width="206"></td>
</tr>

<tr>

</tr>
</table>
</form>
</body>
</html>
