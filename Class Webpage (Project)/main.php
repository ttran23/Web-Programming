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
<body>
	<?php 
		session_start ();
	?>
	<h1 class="title">
		ECE 220<br>
		Basic Circuits<br>
		Spring 2018
	</h1>
	
	<div class="mainPanel">
		<button class="b1" onclick="show('courseinfo.html')">Course Info</button>
		<button class="b1" onclick="show('contactinfo.html')">Contact Info</button>
		<button class="b1" onclick="show('syllabus.php')">Syllabus</button>
		<button class="b1" onclick="show('grades.php')">Grades</button>
		<button class="b1" onclick="show('resources.php')">Resources</button>
		<hr>
		<iframe id="section" src="courseinfo.html"></iframe>
	</div>
	
	<script>
		function show(page) {
			document.getElementById("section").src = page;
		}
	</script>
	
	
</body>
</html>