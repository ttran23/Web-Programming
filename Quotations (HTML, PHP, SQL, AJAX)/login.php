<!DOCTYPE html>
<!-- 
Tam Tran
Project 10 - Quotation Service
-->
<html>
<head>
	<title>Login Page</title>
	<style>
		form {
			border: 2px solid black;
			height: 100px;
			width: 300px;
			border-radius: 5px;
			padding: 5px;
		}
		
		input {
			margin: 5px;
		}
		
		p {
		    float: left;
		    clear: left;
		    width: 70px;
		    margin: 5px;
		}
	</style>
</head>
<body>

	<?php
		session_start ();
		include 'DatabaseAdaptor.php';
	?>

	<h3>Login</h3>
	<form name="LoginForm" method="POST">
		<p>Username:</p><input type="text" name="username"> <br>
		<p>Password:</p><input type="password" name="password"> 
		<input type="submit" name="Login" value="Login">
		<input type="button" name="Home" value="Home" onclick="location.href='quotes.php'">
		<br><br>
	</form>
	<?php
 	 	if( isset(  $_POST['Login'])) {
    		$user = $_POST['username'];
    		$pass = $_POST['password'];
    		$exist = $theDBA->checkUser($user);
    		if ($exist == NULL) {
    			echo "<br>Username does not exist";
    		}
    		else {
    			if(strtolower($exist[0]["username"]) === strtolower($user)){
    				if(password_verify($pass, $exist[0]["hash"])){
    					$_SESSION['user'] = $user;
    					header("Location: quotes.php");
    				}
    				else {
    					echo "<br>Password is incorrect, try again";
    				}
    			}
    		}
 	 	}
	?>
</body>
</html>