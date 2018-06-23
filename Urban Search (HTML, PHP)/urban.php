<?php
	// Tam Tran
	// Friday Lab
	
	$word = $_GET['word'];
	$dictionary['c'] = "[1]C is for cookie, that's good enough for me.<br>https://www.urbandictionary.com/define.php?term=C";
	$dictionary['cpp'] = "[1]A programming language for Real Men. Most languages try to provide a simplified way to solve specific problems well. C++ makes no such concession and tries to be mediocre at everything.<br>https://www.urbandictionary.com/define.php?term=C%2B%2B";
	$dictionary['java'] = "[2]A programming language commonly used as a solution to everything and anything.<br>https://www.urbandictionary.com/define.php?term=Java";
	$dictionary['python'] = "[2]The best thing to happen to Computer Science students in a data and file structures or algorithms class.<br>https://www.urbandictionary.com/define.php?term=python";
	$dictionary['ruby'] = "[1]The most amazing girl you could ever wish for.<br>https://www.urbandictionary.com/define.php?term=Ruby";
	
	$found = false;
	
	foreach( $dictionary as $x => $x_val) {
		if ($word == $x) {
			$found = true;
			break;
		}
	}
	
	echo '<b>' . $word . ':</b> ';
	if ($found) {
		echo $dictionary[$word];
	}
	else {
		echo 'not found in my small dictionary.<br>';
	}
	
?>