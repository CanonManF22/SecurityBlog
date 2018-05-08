<?php

$host = "localhost";
$user = "root";
$password ="";
$db="database";

$con=mysqli_connect($host, $user, $password);
mysqli_select_db($con,$db);

if(isset($_POST['username'])){

	$uname=$_POST['username'];
	$password = $_POST['password'];

	$sql="select * from loginform where user='".$uname."' AND password = '".$password."' limit 1";

	$result = mysqli_query($con, $sql);

	if(mysqli_num_rows($result)==1){
			echo " You have successfully logged in! ";
			exit();
	}
	else{
			echo " You have entered an incorrect username or password";
			exit();
	}
}
?>

