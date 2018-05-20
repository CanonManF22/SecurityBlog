<?php
session_start();
$host = "localhost";
$user = "root";
$password ="";
$db="blog";
$con= new mysqli($host, $user, $password);
mysqli_select_db($con,$db);

if(!isset($_SESSION['admin'])&& $_SESSION['admin']!=1) {
    header("Location: index.php");
    return;
}

?>

<?php

	$sql="SELECT * FROM posts ORDER BY id DESC";
	
	$result = mysqli_query($con, $sql);
	
	$posts = "";
	if(mysqli_num_rows($result)>=1){
		while($row = mysqli_fetch_assoc($result)) {
			$id = $row['id'];
			
			$title = $row['title'];
            $content = $row['content'];
			$date = $row['date'];

			$admin = "<div>	<a href = 'del_post.php?pid=$id'>Delete</a>&nbsp;<a href = 'edit_post.php?pid=$id'>	Edit</a></div>";
			
			

            $posts .= "<div><h2><a href ='home.php?pid=$id' target='_blank'>$title</a></h2> <h3>$date</h3><p>$content</p> $admin</div>";
            
			
		}
            echo $posts;
            
	}
	else{
			echo "There are no posts to display!";
	}
	
?>

<html>

<body>
    <br></br>
    <br></br>
<a href = 'index.php'> Logout</a>
</body>
</html>




