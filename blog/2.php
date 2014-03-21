<html>
<head>
</head>
<body>
    <textarea name="content1" style="width:100%">
	<?php
	$a=$_POST['content'];
	$sql=INSERT INTO `post`(`id`, `postname`, `postcontain`, `postcontainhtml`, `pageid`, `bid`, `uid`, `username`, `datetime`) VALUES ('','welcome','its welcome post','<p>its welcome post</p>',1,1,1,'micks',)
	?>
</textarea>
</body>
</html>