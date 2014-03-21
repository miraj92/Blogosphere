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
<div align="center" <?php
$bid      = $_REQUEST['id'];
$query    = "select * from blog where id=$bid";
$blogname = mysqli_query($con, $query);
while ($blogrow = mysqli_fetch_array($blogname)) {
    echo "style=\"background:url(" . $blogrow['bgimg'] . ");background-repeat:repeat;\"";
}
?> style="width:100%;"  >
  <a href="admin.php">back</a>
  <div align="justify" style="margin-left:200px;margin-right:200px">
<?php

if (isset($_REQUEST['id'])) {
    $a = $_REQUEST['id'];
    
    $sql = "SELECT * FROM post  WHERE id = $a ";
    
    $postresult = mysqli_query($con, $sql);
    echo "<table border='0'>";
    
    while ($postrow = mysqli_fetch_array($postresult)) {
        echo "<tr>";
        echo "<td>";
        echo "<div align=\"center\" style=\"margin-left:300px;margin-right:300px;font:'Times New Roman', Times, serif;size:20px\" >";
        echo "<font face=\"" . $postrow['pfontface'] . "\" color=\"" . $postrow['pfontcolor'] . "\" size=\"" . $postrow['pfontsize'] . "\">";
        echo "<label align=\"center\">" . $postrow['postname'] . "</label><br /></div>";
        echo "<fieldset><font face=\"" . $postrow['cfontface'] . "\" color=\"" . $postrow['cfontcolor'] . "\" size=\"" . $postrow['cfontsize'] . "\">";
        echo "" . $postrow['postcontain'] . "<br /><br /><br />";
        echo "at " . $postrow['datetime'] . "<br />";
        echo "by " . $postrow['username'] . "</font></fieldset>";
        echo "</tr>";
        echo "<tr><td>";
        $id = $postrow['id'];
        
        $commentresult = mysqli_query($con, "SELECT * FROM comment JOIN post ON post.id = comment.postid WHERE post.id = $id ");
        while ($commentrow = mysqli_fetch_array($commentresult, MYSQLI_ASSOC)) {
            echo "<table>";
            echo "<tr>";
            echo "<td>";
            echo "" . $commentrow['Comment'] . "<br />";
            echo " By " . $commentrow['commentuser'];
            echo " at " . $commentrow['datetime'];
            echo "</td></tr>";
            echo "</table>";
        }
        
        echo "</td></tr>";
    }
    
    echo "</table>";
} else {
    echo "Error";
}
?>


</div>

</body>
</html>