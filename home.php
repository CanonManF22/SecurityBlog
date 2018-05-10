<? php
	session_start();
	include_once("db.php");
?>

<!DOCTYPE | !DOCTYPE html>
<html>
<head>
	<title>Blog Home</title>
</head>
	<body>
			<?php
				$sql = "SELECT * FROM posts ORDER BY id DESC";

				$res = msqli_query($db, $sql) or die (mysqli_error());

				$posts = "";

				if(myqli_num_rows($res)>0) {
					while($row = mysqli_fetch_assoc($res)){
						$id = $row['id'];
						$title = $row['title'];
						$content = $row['content'];
						$date = $row['date'];

						$admin = "";

						$output = $content;

						$posts .= "<div><h2><a href ='display_post.php?pid=$id'</h2></div>"
					}
				}
			?>
	</body>

</html>