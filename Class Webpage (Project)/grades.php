<!DOCTYPE html>
<!-- 
Stephanie Marcellin, Tam Tran
Final Project - Mini D2L Class website
-->
<html>
<head>
	<link href="site.css" type="text/css" rel="stylesheet" />
	<title>Course Website</title>
	<meta charset="UTF-8">
</head>
<body class="side">
	<?php
		session_start();
		include 'DatabaseAdaptor.php';
			
		if (isset($_SESSION['user'])) {	
			echo "<h3 class='logged'>Welcome " . $_SESSION['name'] . "</h3>";
			echo "<form name=\"logout\" method=\"post\"><input name=\"logout\" type=\"submit\" class =\"b1\" value=\"Log Out\"></form><br>";
		}
		
		if (isset($_POST['logout'])) {
			unset($_SESSION['user']);
			unset($_SESSION['name']);
			header('Location: grades.php');
		}
	
		if (isset($_SESSION['user'])) {    
		    $arr = $theDBA->getGrades($_SESSION['user']);
		    if ($arr == NULL) {
		    	echo 'No grades found for user: ' . $_SESSION['name'];
		    }
		    else {
		    	//exams
		    	$str = "<table><tr><th>Exams</th></tr><tr><td>Exam 1</td><td>Exam 2</td><td>Final Exam</td></tr>";
		    	$str .= "<tr><td>" . $arr[0]["exam_1"] . "</td><td>" . $arr[0]["exam_2"] .  "</td><td>" . $arr[0]["exam_final"] . "</td></tr>";
		    	$str .= "</table>";
		    	//homework
		    	$str .= "<table><tr><th>Homework</th></tr><tr><td>Homework 1</td><td>Homework 2</td><td>Homework 3</td><td>Homework 4</td><td>Homework 5</td></tr>";
		    	$str .= "<tr><td>" . $arr[0]["homework_1"] . "</td><td>" . $arr[0]["homework_2"] .  "</td><td>" . $arr[0]["homework_3"] .  "</td><td>". $arr[0]["homework_4"] .  "</td><td>" . $arr[0]["homework_5"] . "</td></tr>";
		    	$str .= "</table>";
		    	// labs
		    	$str .= "<table><tr><th>Labs</th></tr><tr><td>Lab 1</td><td>Lab 2</td><td>Lab 3</td><td>Lab 4</td><td>Lab 5</td></tr>";
		    	$str .= "<tr><td>" . $arr[0]["lab_1"] . "</td><td>" . $arr[0]["lab_2"] .  "</td><td>" . $arr[0]["lab_3"] .  "</td><td>". $arr[0]["lab_4"] .  "</td><td>" . $arr[0]["lab_5"] . "</td></tr>";
		    	$str .= "</table>";
		    	echo $str;
		    }
		}
		else{
			$str = 'Please ';
			$str .= '<a href="login.php">log in</a>';
			$str .= ' or ';
			$str .= '<a href="register.php">register</a>';
			$str .= ' to view your grades.<br>';
			echo $str;
		}
	?>
</body>
</html>
