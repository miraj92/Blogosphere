<?php
include 'connection.php';
include 'function.php';

$m = new Functions();
$username = $m->checksession();

if(isset($_REQUEST['id'])) {
$_SESSION['bid']=$_REQUEST["id"];
} 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blogosphere</title>
<link type="text/css" rel="stylesheet" href="1.css" />
<link type="text/css" rel="stylesheet" href="2.css" />
</head>

<body><form name="" action="#" method="POST">

<table width="100%" border="0" align="center" class="tableimg" cellpadding="0" cellspacing="0" >
<tr>
  <td width="200" height="223" class=""></td>
  <td height="223" width="900" class="image"></td>
  <td width="200" height="223" class=""></td>
</tr>

<tr height="200">
  <td height="400">
    <table cellpadding="20">
     
     <tr> <td width="183" height="50" align="center"class="userpanel_new_1"><a href="userpanel_new.php?file=f_post.php" class="button"><font color="#FFFFFF">Post</font></a></td> </tr>
     <tr> <td height="50" align="center" class="userpanel_new_1"><a href="userpanel_new.php?file=f_Comment.php" class="button"><font color="#FFFFFF">Comment</font></a></td> </tr>
     <tr> <td height="50" align="center" class="userpanel_new_1"><a href="userpanel_new.php?file=templete1.php" class="button"><font color="#FFFFFF">Blogstyle</font></a></td> </tr>
    </table>
  </td>
    <td height="264" width="500">
      <?php

             if(isset($_REQUEST['file'])){
             $file=$_REQUEST['file'];
             include $file;
             } 
      ?>
    </td>
      <td><div style="width=900;float=right;"><a href="user.php" class="button"><font color="#ffffff">Back</font></a></div></td>
</tr>

<tr>
  
 
</tr>

</table>
</form>
</body>
</html>