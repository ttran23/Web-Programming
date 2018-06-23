<?php
/*
 * Tam Tran
 * Project 10 - Quotation Service
 */

	include 'DatabaseAdaptor.php';
	
	$t = $_GET['t'];
	$arr = [];
	
	if ($t === "getQuotes") { 	// Get all quotes
		$arr = $theDBA->getQuotesAsArray ( );
	} else if($t === "unflag"){	// Unflag quotes
		$theDBA->unflag();
	} else if($t === "flag"){	// Flag quote
		$quote = $_GET['quote'];
		$theDBA->flag($quote);
	} else if($t === "add"){	// Add weight to quote
		$quote = $_GET['quote'];
		$theDBA->add($quote);
	} else if($t === "sub"){	// Subtract weight to quote
		$quote = $_GET['quote'];
		$theDBA->sub($quote);
	} else if($t === "checkUser"){	// Check user
		$name = $_GET['name'];
		$arr = $theDBA->checkUser($name);
	} else if($t === "addUser"){	// Add user
		$name = $_GET['name'];
		$pass = $_GET['password'];
		$arr = $theDBA->addUser($name, $pass);
	}
	
	echo json_encode ( $arr );

?>