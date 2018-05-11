<?php

$host = "localhost";
$user = "root";
$password ="";
$db="blog";

//$db = msyqli_connect("localhost", "root", "", "blog");
  $db =  new mysqli($host, $user, $password);
?>