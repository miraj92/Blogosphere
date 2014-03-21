<?php
if(isset($_POST['submit']))
{
	$size=$_POST['size'];
	$face=$_POST['face'];
	$color=$_POST['color'];
	$bid=$_SESSION['id'];
		$sql="UPDATE blog set fontsize='$size',fontcolor='$color',fontface='$face' where id='$bid'";
		echo $sql;
	if(mysqli_query($con,$sql))
	{
		echo "success";
		//header('location:userpanel_new.php');
	}
	else
	{
		echo "error";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<link type="text/css" rel="stylesheet" href="1.css" />-->
<link type="text/css" rel="stylesheet" href="2.css" />
<title>Blogosphere</title>
</head>
<body>  
<center>  

<table>


<tr>
<td colspan="2">
<fieldset>
<legend><font face="akbar" size="+3" color="#0033CC">Blogname</font></legend>
<label><font size="	" face="Accent SF" color="#461254">Font Face:</font></label>
<select name="face">
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
<label><font size="" face="Accent SF" color="#654321">Font Size:</font></label>
<select name="size">
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
<label><font size="" face="Accent SF" color="#123456">Font Color</font></label>
 <input type="color" name="color"  />
</fieldset>
</td>
</tr>


<tr>
<td colspan="2"></td>
</tr>
<tr>
<td colspan="2"><center><input type="submit" value="submit" class="b_createblog" name="submit" /></center></td>
</tr>
</table>

</center>
</body>
</html>