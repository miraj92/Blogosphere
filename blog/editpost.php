<?php
include 'function.php';
include 'connection.php';


$m=new Functions();
$username=$m->checksession();

if(isset($_REQUEST['submit']))
{
    $id=$_REQUEST['id'];
	$b=$_POST['content'];
    $a=htmlspecialchars($_POST['content']);
    $postname=$_POST['postname'];
    $bid=$_SESSION['bid'];
    $uid=$_SESSION['id'];
    $uname=$_SESSION['username'];
    $postname=$_POST['postname'];
    $ccolor=$_POST['ccolor'];
    $ncolor=$_POST['ncolor'];
    $nface=$_POST['nface'];
    $nsize=$_POST['nsize'];
     $cface=$_POST['cface'];
    $csize=$_POST['csize'];
	$sql=" update `post` set postname='$postname',postcontain='$b',postcontainhtml='$a',pfontsize='$nsize' ,pfontface='$nface' ,pfontcolor='$ncolor',cfontsize='$csize' ,cfontface='$cface' ,cfontcolor='$ccolor' ,bid='$bid',uid='$uid',username='$uname' where id='$id'";
 $sql1="update comment set postname='$postname' where postid=$id";
    echo $sql1;
	 
    if(mysqli_query($con,$sql)&&mysqli_query($con,$sql1))
    {
        echo "inserted";
        header('location:userpanel_new.php');
    }	
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blogosphere</title>
<script type="text/javascript" src="../tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({ selector: "textarea" });
</script>
<link type="text/css" rel="stylesheet" href="1.css" />
</head>

<body>
<table width="1300" border="0" align="center" class="tableimg" cellpadding="0" cellspacing="0" >
<tr>
  <td width="200" height="223" class=""></td>
  <td height="223" width="900" class="image"></td>
  <td width="200" height="223" class=""></td>
</tr>


<tr height="200">
  <td></td>
    <td height="200">
      <form method="post" action="#">
         <label>Post Name:</label>
         <?php
         $id=$_REQUEST['id'];
         $sql="select postname from post where id=$id";
         if($result=mysqli_query($con,$sql))
         {
            while($row=mysqli_fetch_array($result))
            {
            echo "<input type=\"text\" name=\"postname\" value=".$row['postname']." />";
            
         echo "
        <br/><br/>
<fieldset>
<legend>Postname</legend>
<label>Font Face:</label>
<select name=\"nface\">
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
<select name=\"nsize\">
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
 <input type=\"color\" name=\"ncolor\" value=".$row['pfontcolor']."/>";
 }
}
?>
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
</fieldset>

<br />
<textarea name="content" style="width:100%">
<?php

    $postid=$_REQUEST['id'];
 
            $sql="select postcontain from post where id=$postid";
            if($result=mysqli_query($con,$sql))
            {
                while($row=mysqli_fetch_array($result))
                {
                    echo $row['postcontain'];
                }
            }
        ?>
    </textarea>
<input type="submit" name="submit" value="submit">
</form>

    </td>
      <td></td>
</tr>

<tr>
  <td height="85" colspan="8" class="footerleft">
 
  </td>
</tr>


</table>


</body>
</html>






