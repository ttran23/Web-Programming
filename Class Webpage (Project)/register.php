<!DOCTYPE html>
<!-- 
Stephanie Marcellin, Tam Tran
Final Project - Mini D2L Class website
-->
<html>
<?php 
session_start();
?>
<head>
	<meta charset="UTF-8">
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="classSite.css" />
</head>
<body>
<form class = "form" action="" method="post">
<h3>Register</h3>
  	Username  : <input name="user" type="text" /><br><br>
  	First Name: <input name="name" type="text" /><br><br>
  	Password  : <input name="pass" type="password" /><br><br>
  	<input name="submit" type="submit" />
	<input type="button" name="Back" value="Back" onclick="location.href='grades.php'">
</form>
<?php 
include 'DataBaseAdaptor.php';
if(isset($_POST['submit'])){
	$theDBA = new DatabaseAdaptor();
	$username = $_POST["user"];
	$password = $_POST["pass"];
	$first_name = $_POST["name"];
	//security stuff
	$username = htmlspecialchars($username);
	$password = htmlspecialchars($password);
	$first_name = htmlspecialchars($first_name);
	//
	if($theDBA->checkUser($username) == NULL){
				$pass = password_hash($password, PASSWORD_DEFAULT);
				$theDBA->addUser($username, $pass, $first_name);
				$_SESSION['user'] = $user;
				$_SESSION['name'] = $first_name;
				header("Location: grades.php");
			}
	else echo "That username already exists, try another or <a href='login.php'>log in</a>";
}
?>
</body>