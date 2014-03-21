<?php
include 'function.php';
include 'connection.php';

if(isset($_POST['search']))
{
	 $a=$_POST['text'];
	header("location:admin.php?file=strstr.php&text=".$a);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blogosphere</title>
<link type="text/css" rel="stylesheet" href="1.css" />
<link href="css/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/dropdown/themes/nvidia.com/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
   

	<!-- / END -->
    
		<style>
		.black_overlay{
			display: none;
			position: absolute;
			top: 0%;
			left: 0%;
			width: 100%;
			height: 100%;
			background-color: black;
			z-index:1001;
			-moz-opacity: 0.8;
			opacity:.80;
			filter: alpha(opacity=80);
		}
		.white_content {
			display: none;
			position: absolute;
			top: 5%;
			left: 25%;
			width: 50%;
			height: 50%;
			/*padding: 16px;*/
			border: 16px solid green;
			background-color: white;
			z-index:1002;
			overflow: auto;
		}
	

	</style>
	</head>
<body>
	<font color="#000000">
	<form method="post" action="admin.php">
<table width="1300" border="0" class="tableimg" align="center" cellpadding="0" cellspacing="0" >
<tr>
  <td class="" width="200" height="223"></td>
  <td height="223" width="900" class="image"></td>
  <td class="" width="200" height="223"></td>
</tr>


<tr height="50px"><td width="200"></td><td>
<div style="margin-left:150px;margin-top=5px">
		 <ul class="dropdown dropdown-horizontal">
         	<li><a href="paging.php" class="dir">User Information</a></li>
            <li><a href="#" class="dir">Blogs</a>
         
		 		<ul>
		         <li><a href="admin.php?file=allblog.php">All Blogs</a></li>
        		 <li><a href="admin.php?file=Blogbycategary.php">Blogs By Category</a></li>
		         <li><a href="admin.php?file=admin_blogbyuser.php">Blogs By Users</a></li>
        	    </ul>
		 	</li>
		 
         	<li><a href="#" class="dir">Posts</a>
		 
         		<ul>
		         <li><a href="admin.php?file=allpost.php">All Posts</a></li>
        		 <li><a href="admin.php?file=admin_postbyuser.php">Post by User</a></li>
		         <li><a href="admin.php?file=admin_postbyblog.php">Post by Blogs</a></li>                 
				</ul>
		     </li>
         
         <li><a href="#" class="dir">Comments</a>
			 <ul>
    		     <li><a href="admin.php?file=allcomment.php">All comments</a></li>
         	</ul>
		 </li>
         <li><a href="admin.php?file=stats.php" class="dir">stats</a></li>
         
         <li><a href="adminlogout.php" class="dir">logout</a></li>
		</ul>
</div>

</td>
<td width="200">
search:	<input type="text" name="text" />



<input type="Submit" name="search" value="search" />
<br/>

 
</td>
</tr>

<tr width="1300" height="400px">
<td width="200"></td>
	<td><center>
     <?php

             if(isset($_REQUEST['file'])){
             $file=$_REQUEST['file'];
             include $file;
             } 
      ?></center>
</td>
<td width="200" ></td>
</tr>

<tr>
  <td height="85" colspan="3" class="footerleft">
  <div class="footer-left"> Contact Info:<p class="footerp">shalinchoksi92@gmail.com<br />Micks.9093@gmail.com</p></div>
  <br />
  <div class="footer-right">&copy;Copyright 2013. Design By  </div>
  </td>
</tr>


</table>
</form>
</font>
</body>
</html>