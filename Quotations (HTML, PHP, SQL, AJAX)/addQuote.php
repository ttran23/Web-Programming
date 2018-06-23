<!DOCTYPE html>
<!-- 
Tam Tran
Project 10 - Quotation Service
-->
<html>
<head>
	<title>Add Quote Page</title>
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

	<h3>Add Quote</h3>
	<form name="Add Quote Form" method="POST">
		<p>Quote:</p><input type="text" name="quote"> <br>
		<p>Author:</p><input type="text" name="author"> 
		<input type="submit" name="addQuote" value="Add">
		<input type="button" name="Home" value="Home" onclick="location.href='quotes.php'">
	</form>
	<?php
		if(isset($_POST['addQuote'])){
			$quote = $_POST['quote'];
			$author = $_POST['author'];
			if($quote == NULL){
				echo "<br>The quote box must be filled in to submit a quote";
				if($author == NULL){
					echo "<br>The author box must be filled in to submit a quote";
				}
			} else {
				if($author == NULL){
					echo "<br>The author box must be filled in to submit a quote";
				} else {
					$theDBA->addQuote($quote, $author);
					header("Location: quotes.php");
				}
			}
		}
			
	?>
</body>
</html>