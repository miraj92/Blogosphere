		<?php
		include 'connection.php';
		include 'function.php';

		$m=new Functions();
		$x=$m->checksession();

		if(isset($_POST['submit']))
		{

			$blogname=$_POST['bname'];
			$uid=$_SESSION['id'];
			$categary=$_POST['bcategory'];
			$size=$_POST['size'];
			$face=$_POST['face'];
			$color=$_POST['color'];

			define ("MAX_SIZE","1000"); 
			function getExtension($str)
			{
			 $i = strrpos($str,".");
			 $cm=strrchr($str,".");
			 return $cm;
			}

			if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
  }
		 
		$errors=0;
		$image=$_FILES['file']['name'];

		if ($image) 
		{
			$filename = stripslashes($_FILES['file']['name']);
			$extension = getExtension($filename);
			$extension = strtolower($extension);
			if (($extension != ".jpg") && ($extension != ".jpeg") && ($extension != ".png") 
				&& ($extension != ".gif")&& ($extension != ".JPG") && ($extension != ".JPEG") 
				&& ($extension != ".PNG") && ($extension != ".GIF")) 
			{
				echo '<h3>Unknown extension!</h3>';
				$errors=1;
			}
			else
			{
				$size=filesize($_FILES['file']['tmp_name']);
		 
				if ($size > MAX_SIZE*1024)
				{
					echo '<h4>You have exceeded the size limit!</h4>';
					$errors=1;
				}
		 
				$image_name=$blogname.$extension;
				$newname="images/".$image_name;
		 
				$copied = copy($_FILES['file']['tmp_name'], $newname);
				if (!$copied) 
				{
					echo '<h3>Copy unsuccessfull!</h3>';
					$errors=1;
				}
				else echo '<h3>uploaded successfull!</h3>';

			$sql="insert into blog values('',$uid,'$blogname','$categary','$size','$face','$color','$newname',now(),0)";

			if(mysqli_query($con,$sql))
			{
				header("location:user.php");
			}
		}	
		}
		}
		?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"> 
	<title>Blogosphere</title>
	<link type="text/css" rel="stylesheet" href="1.css" />
    <style type="text/css">
.button {
	-moz-box-shadow:inset 0px 1px 15px 1px #97c4fe;
	-webkit-box-shadow:inset 0px 1px 15px 1px #97c4fe;
	box-shadow:inset 0px 1px 15px 1px #97c4fe;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #3d94f6), color-stop(1, #1e62d0) );
	background:-moz-linear-gradient( center top, #3d94f6 5%, #1e62d0 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#3d94f6', endColorstr='#1e62d0');
	background-color:#3d94f6;
	-webkit-border-top-left-radius:23px;
	-moz-border-radius-topleft:23px;
	border-top-left-radius:23px;
	-webkit-border-top-right-radius:23px;
	-moz-border-radius-topright:23px;
	border-top-right-radius:23px;
	-webkit-border-bottom-right-radius:23px;
	-moz-border-radius-bottomright:23px;
	border-bottom-right-radius:23px;
	-webkit-border-bottom-left-radius:23px;
	-moz-border-radius-bottomleft:23px;
	border-bottom-left-radius:23px;
	text-indent:0px;
	border:2px solid #337fed;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:14px;
	font-weight:bold;
	font-style:normal;
	height:36px;
	line-height:36px;
	width:150px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 22px #283c4f;
}
.button:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #1e62d0), color-stop(1, #3d94f6) );
	background:-moz-linear-gradient( center top, #1e62d0 5%, #3d94f6 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#1e62d0', endColorstr='#3d94f6');
	background-color:#1e62d0;
	}
.button:active {
	position:relative;
	top:1px;	
	}
.b_createblog {
	-moz-box-shadow:inset 0px 1px 0px 0px #cae3fc;
	-webkit-box-shadow:inset 0px 1px 0px 0px #cae3fc;
	box-shadow:inset 0px 1px 0px 0px #cae3fc;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #4197ee) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #4197ee 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#79bbff', endColorstr='#4197ee');
	background-color:#79bbff;
	-webkit-border-top-left-radius:20px;
	-moz-border-radius-topleft:20px;
	border-top-left-radius:20px;
	-webkit-border-top-right-radius:20px;
	-moz-border-radius-topright:20px;
	border-top-right-radius:20px;
	-webkit-border-bottom-right-radius:20px;
	-moz-border-radius-bottomright:20px;
	border-bottom-right-radius:20px;
	-webkit-border-bottom-left-radius:20px;
	-moz-border-radius-bottomleft:20px;
	border-bottom-left-radius:20px;
	text-indent:-1.31px;
	border:2px solid #469df5;
	display:inline-block;
	color:#ffffff;
	font-family:Trebuchet MS;
	font-size:18px;
	font-weight:normal;
	font-style:italic;
	height:37px;
	line-height:37px;
	width:131px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #287ace;
}
.b_createblog:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #4197ee), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #4197ee 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#4197ee', endColorstr='#79bbff');
	background-color:#4197ee;
}.b_createblog:active {
	position:relative;
	top:1px;
}
}
</style>
 
	</head>

	<body>
		<form method="post" action="#" enctype="multipart/form-data">
	<table width="100%" border="0" align="center" cellpadding="1" cellspacing="1" class="tableimg" >


	<tr>
	  <td width="200" height="223" class=""></td>
	  <td width="900"height="223" class="image"></td>
	  <td width="200" height="223" class=""></td>
	</tr>

	<tr>
		<td  height="400" class=""></td>
		<td><center>
	
	  <div align="center">
		<table>
        <tr>
        <td></td><td><div style="float:right"><a href="logout.php" class="button"><font color="#FFFFFF">logout</font></a> </div></td>
        </tr>
			<tr>
				<td colsspan="2"><center><br /><font size="+3" face="Britannic bold" color="#244">Blog Details</font></center></td>
			</tr>

			<tr>
				<td><br /><font size="+1" face="qtcasual" color="#670">Enter The Blog Name</font></td>
				<td><br /> <input type="text" name="bname" required="required" placeholder="Enter The Blog Name" Size="35" /><td>
			</tr>
			<tr>
				<td><font size="+1" face="qtcasual" color="#655">Enter The Blog Categary</font></td>
				<td><select name="bcategory">
<option>Songs</option>
<option>Movie</option>
<option>Politics</option>
<option>Entertainment</option>
<option>Sports</option>
<option>Education</option>
<option>Mobile</option>
<option>Computers</option>
</select>
<td>
			</tr>
			<tr>
				<td><font size="+1" face="qtcasual" color="#640">Enter The Blog Background Image</font> </td>
				<td><input type="file" name="file" id="file" placeholder="Image"/></td>
				
			</tr>
			<tr>
			<td colspan="2"><br />
				<fieldset>
	<legend><font color="#455" size="+1" face="qtcasual" >Blogname-Style</font></legend>
	<label><font color="#445" size="+1" face="qtcasual" >Font Face:</font></label>
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
	<label><font color="#435" size="+1" face="qtcasual" >Font Size:</font></label>
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
	<label><font color="#425" size="+1" face="qtcasual" >Font Color:</font></label>
	 <input type="color" name="color"  />
	</fieldset>
			</td>
			</tr>
			<tr>	
				<td colspan="2">
				<center><br />
				<input type="submit" name="submit"  class="b_createblog" value="Create" />&nbsp;<a href="user.php" class="b_createblog"><font color="#FFFFFF">Back</font></a> 
				</center> 
				</td>
					
			</tr>
			
		</table></center></div></td>
	  <td class="">&nbsp;</td>
	</tr>

	<tr>
	  
	</tr>


	</table>

	</form>
	</body>
	</html>