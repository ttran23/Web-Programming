<!DOCTYPE html>
<!-- 
Tam Tran
Project 10 - Quotation Service
-->
<html>
<head>
	<meta charset="UTF-8">
	<title>Quotation Service</title>
	<style>
		h1.title {
			font-family: "Palatino Linotype", "Times New Roman";
			font-style: italic;
			text-align: center;
		}
		
		a {
			background-color: gray;
			color: white;
			display: inline-block;
		    padding: 10px 20px;
		    text-align: center;
		    text-decoration: none;
		    display: inline-block;
		}
		
		.quote {
			border: 2px solid black;
			margin: 20px;
			padding: 5px;
			border-radius: 5px;
		}
		
		.buttons {
			margin: 5px;
		}
	</style>
</head>
<body>
	<?php
		// Include class and start session
		session_start ();
	?>

	<h1 class="title">Quotation Service</h1>
	<a href="register.php">Register</a> 
	<a href="login.php">Login</a> 
	<a href="addQuote.php">Add Quote</a> 

	<?php 
		if (isset($_SESSION['user'])) {
			echo "<br><br><button onclick=\"unflag()\" class=\"buttons\">Unflag All</button>";
			echo "<form name=\"logout\" method=\"post\"><input name=\"logout\" type=\"submit\" value=\"Log Out\"  class=\"buttons\"></form>";
		}
	?>
	<div id="toChange"></div>
	
	
	
	<script>
		window.onload = showAll();	
		var array = [];
		
		// Populate the panel
		function showAll() {
			var ajax = new XMLHttpRequest();
			ajax.open("GET", "controller.php?t=getQuotes", true);
			ajax.send();

			ajax.onreadystatechange = function() {
				if (ajax.readyState == 4 && ajax.status == 200) {
					var divToChange = document.getElementById("toChange");
			        array = JSON.parse(ajax.responseText);
		
			        var str = "";
			        for (var i = 0; i < array.length; i++) {
						if(array[i]['flagged'] == 0){
						str += "<div class=\"quote\"> \"" 
							+ array[i]['quote'] + ".\"<br> -- "
							+ array[i]['author'] + "<br>"
							+ "<input type=\"button\" value=\"+\" class=\"buttons\" onclick=\"addVal(\'" + array[i]['quote'] + "\')\">"
							+ array[i]['rating'] 
							+ "<input type=\"button\" value=\"-\" class=\"buttons\" onclick=\"subVal(\'" + array[i]['quote'] + "\')\">" 
							+ "<input type=\"button\" value=\"flag\" class=\"buttons\" onclick=\"flag(\'" + array[i]['quote'] + "\')\">"
							+ "</div>";
						}
					}

					divToChange.innerHTML = str;
				}
			}
		}

		// Unflag quotes
		function unflag() {
			var ajax = new XMLHttpRequest();
			ajax.open("GET", "controller.php?t=unflag", true);
			ajax.send();

			ajax.onreadystatechange = function () {
		    	if (ajax.readyState == 4 && ajax.status == 200) { 
		    		array = JSON.parse(ajax.responseText);
		    		showAll();
			    }
			}
		}

		// Flag quote
		function flag(quote) {
			var ajax = new XMLHttpRequest();
			ajax.open("GET", "controller.php?t=flag&quote=" + quote, true);
			ajax.send();

			ajax.onreadystatechange = function () {
		    	if (ajax.readyState == 4 && ajax.status == 200) { 
					array = JSON.parse(ajax.responseText);
		    		showAll();
			    }
			}
		}

		// Add value
		function addVal(quote) {
			var ajax = new XMLHttpRequest();
			ajax.open("GET", "controller.php?t=add&quote=" + quote, true);
			ajax.send();
			
			ajax.onreadystatechange = function () {
		    	if (ajax.readyState == 4 && ajax.status == 200) { 
		    		array = JSON.parse(ajax.responseText);
		    		showAll();
			    }
			}
		}
		
		// Subtract value
		function subVal(quote) {
			var ajax = new XMLHttpRequest();
			ajax.open("GET", "controller.php?t=sub&quote=" + quote, true);
			ajax.send();
			
			ajax.onreadystatechange = function () {
		    	if (ajax.readyState == 4 && ajax.status == 200) { 
		    		array = JSON.parse(ajax.responseText);
		    		showAll();
			    }
			}
		}
		
	</script>
	
	<?php 
		if (isset($_POST['logout'])) {
			unset($_SESSION['user']);
			header("Location: quotes.php");
		}
	?>
</body>
</html>