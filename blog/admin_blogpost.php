<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<link type="text/css" rel="stylesheet" href="1.css" />-->
<title>Blogosphere</title>
<link type="text/css" rel="stylesheet" href="2.css" />
<link type="text/css" rel="stylesheet" href="1.css" />
</head>

<body>  
  <table>
    <tr>
<td><?php

include 'connection.php';

if (isset($_REQUEST['id'])) {
    $bid = $_REQUEST['id'];
    
    $result = mysqli_query($con, "SELECT * FROM post where bid= $bid");
    $num    = mysqli_num_rows($result);
    
    if ($num > 0) {
        echo "<table border='0' id='table' height='200' width='500'>";
        echo "<tr>";
        echo "<th>No</th>";
        echo "<th>Post Name</th>";
        echo "<th></th>";
        echo "<th></th>";
        echo "</tr>";
        $i = 1;
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr><td>$i</td>";
            echo "<td><b>" . $row['postname'] . "</b></td>";
            echo "<td><a href=admin_postcontainer.php?id=" . $row['id'] . ">View</a></td>";
            echo "<td><a href=admin_deletepost.php?id=" . $row['id'] . ">Delete</a></td>";
            echo "</tr>";
            $i = $i + 1;
        }
        
        echo "</table>";
    } else {
        echo "No Records found";
    }
}
?>
</td>
</tr>
</table>
</body>
</html>