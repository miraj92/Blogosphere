<?php
include 'function.php';
include 'connection.php';

$obj = new Functions();
$obj->checksession();

//stats coding:
if (isset($_REQUEST['id'])) {
    $id  = $_REQUEST['id'];
    $sql = "select stats from blog where id=$id";
    
    
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $i = $row['stats'];
        $i = $i + 1;
        
        mysqli_query($con, "update blog set stats=$i where id=$id");
        
    }
    
    $ip = $_SERVER["REMOTE_ADDR"];
    
    $query = "insert into stats value('$ip',now(),$id)";
    mysqli_query($con, $query);
    
    $_SESSION['bid'] = $_REQUEST["id"];
}


//abuse coding:

if (isset($_REQUEST['abuse']) & isset($_REQUEST['postid'])) {
    $uid    = $_SESSION['id'];
    $postid = $_REQUEST['postid'];
    $abuse  = $_REQUEST['abuse'];
    $abuse  = $abuse + 1;
    if ($abuse >= 5) {
        $obj = new Functions();
        $obj->abusemail($postid);
    }
    
    
    $sql = "UPDATE `post` set `abuse`=$abuse where `id`=$postid";
    echo $sql;
    
    if (mysqli_query($con, $sql)) {
        $query = "INSERT into abuse values('',$uid,$postid,now())";
        echo $query;
        if (mysqli_query($con, $query)) {
            header('location:container.php');
        }
    }
}

//spam coding..
if (isset($_REQUEST['spam']) & isset($_REQUEST['postid'])) {
    $uid    = $_SESSION['id'];
    $postid = $_REQUEST['postid'];
    $spam   = $_REQUEST['spam'];
    $spam   = $abuse + 1;
    if ($spam >= 10) {
        $sql1 = "DELETE from 'post' where `id`=$postid";
        mysqli_query($con, $sql1);
    }
    
    
    $sql = "UPDATE `post` set `spam`=$spam where `id`=$postid";
    
    
    if (mysqli_query($con, $sql)) {
        $query = "INSERT into spam values('',$uid,$postid,now())";
        //echo $query;
        if (mysqli_query($con, $query)) {
            header('location:container.php');
        }
    }
}


//insert comment coding:

if (isset($_REQUEST['submit'])) {
    $p       = $_POST['postid'];
    $comment = $_POST['comment'];
    $bid     = $_SESSION['bid'];
    $uid     = $_SESSION['id'];
    $user    = $_SESSION['username'];
    
    $query = "SELECT * FROM blog JOIN post ON blog.id = post.bid WHERE post.id =$p";
    
    $result1 = mysqli_query($con, $query);
    
    while ($row1 = mysqli_fetch_array($result1)) {
        $blogname = $row1['bname'];
        $postname = $row1['postname'];
        $sql      = "insert into comment values('',$bid,'$blogname',$p,'$postname','$comment',$uid,'$user',now())";
        
        
        if (mysqli_query($con, $sql)) {
            header('location:container.php');
        } else {
            echo "error";
        }
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blogosphere</title>
</head>
<body>
<div align="center" <?php
$bid      = $_SESSION['bid'];
$query    = "select * from blog where id=$bid";
$blogname = mysqli_query($con, $query);
while ($blogrow = mysqli_fetch_array($blogname)) {
    echo "style=\"background:url(" . $blogrow['bgimg'] . ");background-repeat:repeat;\"";
}
?>  >
  <div align="center" style="margin-left:100px;margin-right:100px;" >
    <b>
    <?php
$bid   = $_SESSION['bid'];
$query = "select * from blog where id=$bid";

$blogname = mysqli_query($con, $query);
while ($blogrow = mysqli_fetch_array($blogname)) {
    
    echo "<font face=\"" . $blogrow['fontface'] . "\" color=\"" . $blogrow['fontcolor'] . "\" size=\"" . $blogrow['fontsize'] . "\"";
    echo "<label>" . $blogrow['bname'] . "</label>";
    echo "</font>";
}
?>
  </b>
  </div>
  <a href="user.php">Back</a>
  <div align="justify" style="margin-left:200px;margin-right:200px;">
<?php
include 'connection.php';
$uid = $_SESSION['id'];
$a   = $_SESSION['bid'];
$sql = "SELECT * FROM post WHERE bid = $a ";

$postresult = mysqli_query($con, $sql);
echo "<table border='0'>";

while ($postrow = mysqli_fetch_array($postresult)) {
    
    echo "<tr>";
    echo "<td>";
    echo "<div align=\"center\" style=\"margin-left:300px;margin-right:300px;\" >";
    echo "<font face=\"" . $postrow['pfontface'] . "\" color=\"" . $postrow['pfontcolor'] . "\" size=\"" . $postrow['pfontsize'] . "\">";
    echo "<label align=\"center\">" . $postrow['postname'] . "</label>";
    echo "</font><br /></div>";
    echo "<fieldset><font face=\"" . $postrow['cfontface'] . "\" color=\"" . $postrow['cfontcolor'] . "\" size=\"" . $postrow['cfontsize'] . "\">";
    echo "" . $postrow['postcontain'] . "<br /><br /><br />";
    echo " at  " . $postrow['datetime'] . "<br />";
    echo " by  " . $postrow['username'] . "</font></fieldset><br />";
    echo "<a href=container.php?abuse=" . $postrow['abuse'] . "&postid=" . $postrow['id'] . ">Report Abuse</a> &nbsp;&nbsp;";
    echo "<a href=container.php?spam=" . $postrow['spam'] . "&postid=" . $postrow['id'] . ">Report spam</a>";
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
        echo "&nbsp; at " . $commentrow['datetime'];
        echo "</td></tr>";
        echo "</table>";
    }
    
    echo "</td></tr>";
    echo "<tr><td>";
    echo "<form action=\"\" method=\"post\">";
    echo "<hr><p>Comment here</p>";
    echo "<textarea name=\"comment\" rows=\"5\" cols=\"75\"></textarea>";
    echo "<br /><br />";
    echo "<input type=\"hidden\" name=\"postid\" value=" . $postrow[0] . " />";
    echo "<input type=\"submit\" name=\"submit\" value=\"Post Comment\" />";
    echo "</form>";
    echo "</table><br /><br /><hr size=\"4\" color=\"#000000 \">";
}
?>
</div>
</div>
</body>
</html>