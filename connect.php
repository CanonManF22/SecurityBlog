<?php
session_start();
$host = "localhost";
$user = "root";
$password ="";
$db="blog";
$con= new mysqli($host, $user, $password);
mysqli_select_db($con,$db);

if (isset($_POST['login'])) {

    if(isset($_POST['username'])){

	$uname=$_POST['username'];
	$password = $_POST['password'];
	$_SESSION["username"] = $uname;

	$sql="select * from loginform where user='".$uname."' AND password = '".$password."'";
		
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	$id=$row['id'];
	$password = $row['password'];
	$admin = $row['admin'];


	if(mysqli_num_rows($result)==1){
		//redirect based upon admin or regular user
		if($admin==1){
			$_SESSION['admin'] = 1;
		}
		else{
			$_SESSION['admin']=0;
		}



			header("Location: home.php"); /* Redirect browser */
		exit();
			echo " You have successfully logged in! ";
			exit();
	}
	else{
			echo " You have entered an incorrect username or password";
			header("Location: index.php");
			exit();
	}
	}
 }

  else {
  
	//$username = filter_input(INPUT_POST,'username');
	//$password = filter_input(INPUT_POST,'password');
	$username = 'username';
	$password = 'password';
	
	$sql= "INSERT INTO loginform (User, Password)
	values ('$username', '$password')";

	if($con->query($sql)){
		echo 'New user has been registered';
		header("Location: home.php"); /* Redirect browser */
		exit();
	}
	else{
		echo $username;
		echo $password;

		echo ' there has been an error. #RIP';
	}
}
?>

<html>
<br></br>
<br></br>
<br></br>
<br></br>
<footer>
	<p>Privacy Statement:</p>
  <p>Blog Created by Avi Banerjee - CS 166</p>
  <p>Your information will only be used for maintaining this blog. No information will be shared elsewhere.</p>
</footer>
</html>