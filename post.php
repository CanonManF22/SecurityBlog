<?php
session_start();
$host = "localhost";
$user = "root";
$password ="";
$db="blog";
$con= new mysqli($host, $user, $password);
mysqli_select_db($con,$db);

//include_once("db.php");

if(isset($_POST['post'])) {
   // $title = strip_tags($_POST['title']);
    //$content = strip_tags($_POST['content']);
    //$title = $_POST['title'];
    //$content = $_POST['content'];
    //$title = mysqli_real_escape_string($db, $title);
    //$content = mysqli_real_escape_string($db, $content);

    $date = date('l jS \of F Y h:i:s A');

    $title = filter_input(INPUT_POST,'title');
	$content = filter_input(INPUT_POST,'content');
    
    //$sql= "INSERT INTO loginform (User, Password)
    //values ('uh', 'oh')";
    
   // $sql = "INSERT INTO posts (title, content, date) VALUES ($title,$content,$date)";
   $sql = "INSERT INTO posts SET title= '$title', content = '$content', date = '$date'";
    if($title == ""|| $content == ""){
        echo "Please complete your post!";  
        
        return;
    }
    else if(mysqli_query($con, $sql)){
        echo'mysqli worked';
        echo $title;
        echo $content;
        header("Location: home.php");
    }
   
    else{
        echo 'error updating making post';
        echo $title;
        echo $content;
        echo $date;
    }
    
   // mysqli_query($db, $sql);
    header("Location: home.php");
}

?>


<!DOCTYPE | !DOCTYPE html>
<html>
	<head>
		<title>Blog - Post</title>
</head>
<body>
    <form action= "post.php" method = "post" enctype = "multipart/form-data">
        <input placeholder = "Title" name = "title" type = "text" autofocus size = "48"><br /><br />
        <textarea placeholder = "Content" name = "content" rows = "20" cols = "50"></textarea><br />
        <input name = "post" type = "submit" value = "Post">
    </form>
</body>
</html>