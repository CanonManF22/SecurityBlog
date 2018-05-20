<?php
session_start();
$host = "localhost";
$user = "root";
$password ="";
$db="blog";
$con= new mysqli($host, $user, $password);


mysqli_select_db($con,$db);

	$sql="SELECT * FROM posts ORDER BY id DESC";
	
	$result = mysqli_query($con, $sql);
	
	$posts = "";
	if(mysqli_num_rows($result)>=1){
		while($row = mysqli_fetch_assoc($result)) {
			$id = $row['id'];
			
			$title = $row['title'];
			$content = $row['content'];
			$date = $row['date'];

			$admin = "<div>
						<a href = 'del_post.php?pid=$id'>
						Delete
						</a>
						&nbsp;
						<a href = 'edit_post.php?pid=$id'>
						Edit
						</a>
					</div>";
			//alter to prevent XSS
			$output = $content;

			$posts .= "<div>
						<h2>
							<a href ='home.php?pid=$id'>$title</a>
						</h2>
						<h3>$date</h3>
						<p>$content</p>
							
						  </div>"
						  
						  ;
			
		}
			echo $posts;
	}
	else{
			echo "There are no posts to display!";
	}

	if(isset($_SESSION['admin'])&& $_SESSION['admin']==1){
		echo "<a href = 'admin.php'>Admin</a> | <a href = 'index.php'>Logout</a>";
	}
	if(!isset($_SESSION['username'])){
		header("Location: index.php");
	
	}
	if(isset($_SESSION['username']) && $_SESSION['admin']==0){
		echo "<a href = 'index.php'>Logout</a>";
		
	}

	
	
?>
<<!DOCTYPE html>
<html>
<head>

<body>
<a href = "post.php">New Post</a>
</body>
<footer>
  <p>Posted by: Hege Refsnes</p>
  <p>Contact information: <a href="mailto:someone@example.com">
  someone@example.com</a>.</p>
</footer>
</html>



