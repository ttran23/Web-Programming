<!DOCTYPE html>
<!-- 
Tam Tran
Project 10 - Quotation Service
-->
<html>
<head>
	<title>Register Page</title>
	<meta charset="UTF-8">
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

	<h3>Register</h3>
	<form name="RegisterForm" method="POST">
		<p>Username:</p><input type="text" name="username"> <br>
		<p>Password:</p><input type="password" name="password"> 
		<input type="submit" name="Register" value="Register">
		<input type="button" name="Home" value="Home" onclick="location.href='quotes.php'">
		<br><br>
	</form>
	<?php
 	 	if( isset(  $_POST['Register'])) {
    		$user = $_POST['username'];
    		$pass = $_POST['password'];
    		if ($theDBA->checkUser($user) == NULL) {
    			if(strlen($user) >= 3){
    				if(strlen($pass) >= 6){
    					$hash = password_hash($pass, PASSWORD_DEFAULT);
    					$theDBA->addUser($user, $hash);
    					header("Location: quotes.php");
    				}
    				else{
    					echo "Your password is too short, minimum 6.";
    				}
    			}
    			else{
    				echo "Your username is too short, minimum 3.";
    			}
    		}
    		else {
    			echo "Account name already exists.";
    		}
 	 	}
	?>
</body>
</html>