<?php
include 'function.php';
include 'connection.php';


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="2.css" />
<link type="text/css" rel="stylesheet" href="1.css" />
<title>Blogosphere</title>
</head>
<body>
<div align="center"0 <?php
$bid      = $_REQUEST['id'];
$query    = "select * from blog where id=$bid";
$blogname = mysqli_query($con, $query);
while ($blogrow = mysqli_fetch_array($blogname)) {
    echo "style=\"width:100%;background:url(" . $blogrow['bgimg'] . ");background-repeat:repeat;\"";
}
?>  >
  <div align="center" style="margin-left:100px;margin-right:100px" >
    <B>
    <?php
$bid   = $_REQUEST['id'];
$query = "select * from blog where id=$bid";

$blogname = mysqli_query($con, $query);
while ($blogrow = mysqli_fetch_array($blogname)) {
    
    echo "<font face=\"" . $blogrow['fontface'] . "\" color=\"" . $blogrow['fontcolor'] . "\" size=\"" . $blogrow['fontsize'] . "\"";
    echo "<label>" . $blogrow['bname'] . "</label>";
    echo "</font>";
}
?>
  </div>
   <a href="admin.php">Back</a>
  <div align="justify" style="margin-left:200px;margin-right:200px">
<?php
include 'connection.php';
//$uid=$_SESSION['id'];
$bid = $_REQUEST['id'];
$sql = "SELECT * FROM post WHERE bid = $bid ";

$postresult = mysqli_query($con, $sql);
echo "<table border='0'>";

while ($postrow = mysqli_fetch_array($postresult)) {
    
    echo "<tr>";
    echo "<td>";
    echo "<div align=\"center\" style=\"margin-left:300px;margin-right:300px\" >";
    echo "<font face=\"" . $postrow['pfontface'] . "\" color=\"" . $postrow['pfontcolor'] . "\" size=\"" . $postrow['pfontsize'] . "\">";
    echo "<label align=\"center\">" . $postrow['postname'] . "</label>";
    echo "</font><br /></div>";
    echo "<fieldset><font face=\"" . $postrow['cfontface'] . "\" color=\"" . $postrow['cfontcolor'] . "\" size=\"" . $postrow['cfontsize'] . "\">";
    echo "" . $postrow['postcontain'] . "<br /><br /><br />";
    echo "at" . $postrow['datetime'] . "<br />";
    echo "by" . $postrow['username'] . "</font></fieldset><br />";
    echo "<a href=container.php?abuse=" . $postrow['abuse'] . "&postid=" . $postrow['id'] . ">Report Abuse</a>";
    echo "</tr>";
    echo "<tr><td>";
    $id            = $postrow[0];
    $commentresult = mysqli_query($con, "SELECT * FROM comment JOIN post ON post.id = comment.postid WHERE post.id = $id ");
    While ($commentrow = mysqli_fetch_array($commentresult, MYSQLI_ASSOC)) {
        echo "<table>";
        echo "<tr>";
        echo "<td>";
        echo "<hr>" . $commentrow['Comment'] . "<br />";
        echo "By " . $commentrow['commentuser'];
        echo "at " . $commentrow['datetime'];
        echo "</td></tr>";
        echo "</table>";
    }
    
    echo "</td></tr>";
    echo "<tr><td>";
    
    echo "</table><br /><br /><hr size=\"4\" color=\"#000000 \">";
}
?>
</div>
</div>
</body>
</html>