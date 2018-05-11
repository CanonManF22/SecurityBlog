<?php
$host = "localhost";
$user = "root";
$password ="";
$db="blog";
$con= new mysqli($host, $user, $password);

mysqli_select_db($con,$db);

	$sql="select * from posts ";
	
	$result = mysqli_query($con, $sql);
	echo 'blah blah blah';

	$posts = "";
	if(mysqli_num_rows($result)==1){
		while($row = mysqli_fetch_assoc($result)) {
			$id = $row['id'];
			$title = $row['title'];
			$content = $row['content'];
			$date = $row['date'];

			$admin = "<div>
						<a href = 'del_post.php?pid=$id'>
						</a>
					</div>";
			//alter to prevent XSS
			$output = $content;

			$posts .= "<div>
						<h2>
							<a href ='display_post.php?pid=$id'>$title</a>
						</h2>
						<h3>$date</h3>
						<p>$content</p>
							$admin
	 			 		</div>";
			
		}
			echo $posts;
	}
	else{
			echo "There are no posts to display!";
	}
	
?>



