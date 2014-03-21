<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link type="text/css" rel="stylesheet" href="1.css" />
<link type="text/css" rel="stylesheet" href="../../../Users/dell1/Downloads/2.css" />
<title>Blogosphere</title>
</head>

<body>	
  <form name="frmudsr" method="POST" action="#">
  <table width="1300"  class="tableimg" border="0" align="center" cellpadding="0" cellspacing="0" >
<tr>
  <td class="" width="212" height="220"></td>
  <td height="220" colspan="2" class="image"></td>
  <td width="218" height="220" class=""></td>
</tr>

<tr>
  <td height="110">&nbsp;</td>
  <td align="center" valign="top"><div align="center" style="margin-top:70px"><a href="aboutus.php?file=aboutblogosphere.php" class="submit"><font color="#FFFFFF">About Blogosphere</font>	</a></div>	 </td>
  <td align="center" valign="top"><div align="center" style="margin-top:70px"><a href="aboutus.php?file=aboutdevelopers.php" class="submit"><font color="#FFFFFF">About Developers</font>	</a></div></td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td height="205"><center></center>    </td>
  <td colspan="2" align="center" valign="top"><p><br />
    <?php
	if(isset($_REQUEST['file']))
	{
		include $_REQUEST['file'];
	}
	 
	?><br />
    </p></td>
  <td width="218"><font face="ArdleysHand" color="#0033FF"><b></b> </font></td>
</tr>
  </table>
</form>
</body>
</html>
