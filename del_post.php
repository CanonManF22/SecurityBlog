<?php
session_start();
$host = "localhost";
$user = "root";
$password ="";
$db="blog";
$con= new mysqli($host, $user, $password);
mysqli_select_db($con,$db);


if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    return;
}

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
    <?php
    $host = "localhost";
    $user = "root";
    $password ="";
    $db="blog";
    $con= mysqli_connect($host, $user, $password, $db);
    mysqli_select_db($con,$db);
   if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

     $pid = $_GET['pid'];
    echo 'You are making edits to this post!';
    $sql = "DELETE FROM posts WHERE id=$pid";
    //$sql_del = "SELECT * FROM posts WHERE id = $pid LIMIT 1";
    $res = mysqli_query($con, $sql);
    header("Location: home.php");
    ?>
      