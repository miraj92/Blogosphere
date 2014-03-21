<?php
include 'connection.php';
include 'function.php';

$m=new Functions();
$username=$m->checksession();

if(isset($_POST['Home']))
{
	header("location:user.php");
}

if(isset($_POST['Logout']))
{
	header('location:logout.php');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link type="text/css" rel="stylesheet" href="1.css" />
<link type="text/css" rel="stylesheet" href="2.css" />
</head>
<script type="text/javascript" src="../tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea"
 });
</script>
<body><form method="post" action="">
<table width="1317" border="0" align="center" class="tableimg" cellpadding="0" cellspacing="0" >


<tr>
  <td class="" width="208" height="223"></td>
  <td height="223" width="900"  colspan="6" class="image"></td>
  <td class="" width="209" height="223"></td>
</tr>

<tr><td>&nbsp;</td>
	<td colspan="6">
		<div style="margin-top:0px;margin-left:600px;"><input type="submit" name="Home" Value="Home" class="button"/><input class="button" type="submit" name="logout" Value="logout" /> </div>
<div ><label><b>Post Name:</b><label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="postname" placeholder="Enter Post Name" required="" size="30" />
<br />
<fieldset>
<legend>Postname</legend>
<label>Font Face:</label>
<select name="nface">
<option>Times New Roman</option>
<option>Lucida Console</option>
<option>Courier New</option>
<option>ALGERIAN</option>
<option>Geneva</option>
<option>Verdana</option>
<option>Impact</option>
<option>Arial</option>
<option>Arial Black</option>
<option>Comic Sans MS</option>
</select>
<br />
<label>Font Size:</label>
<select name="nsize">
<option>+1</option>
<option>+2</option>
<option>+3</option>
<option>+4</option>
<option>+5</option>
<option>+6</option>
<option>-1</option>
<option>-2</option>
<option>-3</option>
<option>-4</option>
<option>-5</option>
<option>-6</option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
</select>
<br />
<label>Post Name Color</label>
 <input type="color" name="ncolor"  />
 
</fieldset>
<br />
<br />
<fieldset>
<legend>Post Content</legend>
<label>Font Face:</label>
<select name="cface">
<option>Times New Roman</option>
<option>Lucida Console</option>
<option>Courier New</option>
<option>ALGERIAN</option>
<option>Geneva</option>
<option>Verdana</option>
<option>Impact</option>
<option>Arial</option>
<option>Arial Black</option>
<option>Comic Sans MS</option>
</select>
<br />
<label>Font Size:</label>
<select name="csize">
<option>+1</option>
<option>+2</option>
<option>+3</option>
<option>+4</option>
<option>+5</option>
<option>+6</option>
<option>-1</option>
<option>-2</option>
<option>-3</option>
<option>-4</option>
<option>-5</option>
<option>-6</option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
</select>
<br />

<label>Post Content Color</label>
 <input type="color" name="ccolor"  />
</fieldset><br/></div>
<textarea name="content" style="width:100%">
   </textarea>
     <?php
      if(isset($_REQUEST['submit']))
      {
    $b=$_POST['content'];
    $a=htmlspecialchars($_POST['content']);
    $postname=$_POST['postname'];
    $bid=$_SESSION['bid'];
    $uid=$_SESSION['id'];
    $username=$_SESSION['username'];
    $ccolor=$_POST['ccolor'];
    $ncolor=$_POST['ncolor'];
    $nface=$_POST['nface'];
    $nsize=$_POST['nsize'];
     $cface=$_POST['cface'];
    $csize=$_POST['csize'];
    

    
    $sql="insert into post Values('','$postname','$b','$a','$nface','$ncolor','$nsize','$ccolor','$cface','$csize','$bid','$uid','$username','0','0',now())";
    echo $sql;
    if(mysqli_query($con,$sql))
    {
      echo "record inserted ";
      header('location:userpanel_new.php');
    }
    else
    {
      echo "error";
    }
}
   ?>
<input type="submit" name="submit" class="b_createblog" value="submit">
  </td><td>&nbsp;</td>
</tr>

<tr>
  
</tr>


</table>

</form>
</body>
</html>