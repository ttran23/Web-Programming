<?php
// CSC 337 Project Best Reads
// Tam Tran

$book = $_GET['book'];
if ($book == 'all') {
	$urls = array();
	if (!is_dir ( './books')) {
		exit ( 'Invalid directory path' );
	}
	$books = scandir('./books');
	foreach( $books as $x) {
		if ($x !== '.' && $x !== '..') {
			$urls[] = './books/' . $x;
		}
	}
	echo json_encode($urls);
	
} else { // Individual book
	// Getting text files
	$myInfoFile = fopen ( './books/' . $book . '/info.txt', 'r' ) or die ("Unable to open file!");
	$myDescFile = fopen ( './books/' . $book . '/description.txt', 'r' ) or die ("Unable to open file!");
	$myReviFile = fopen ( './books/' . $book . '/review.txt', 'r' ) or die ("Unable to open file!");
	
	// Populating array
	$urls = array(
		fgets($myInfoFile), // Title
		fgets($myInfoFile), // Author
		fgets($myDescFile), // Description
		fgets($myReviFile), // Reviewer
		fgets($myReviFile), // Stars
		fgets($myReviFile) 	// Review	
	);
	
	$fullString = '<div class=onereview>';
	$fullString .= '<img src=./books/' . $book . '/cover.jpg>';
	$fullString .= '<div class=thedetails>';
	$fullString .= '<b>' . $urls[0] . '</b>';
	$fullString .= '<br>' . $urls[1] . '<br>';
	$fullString .= '<br>' . $urls[2] . '<br>';
	$fullString .= '<b>' . $urls[3] . '</b> ';
	for ($i = 0; $i < (int)$urls[4]; $i++) {
		$fullString .= '*';
	}
	$fullString .= '<br>' . $urls[5] . '<br>';
	$fullString .= '</div></div>';
	echo json_encode($fullString);
	
	// Close files
	fclose($myInfoFile);
	fclose($myDescFile);
	fclose($myReviFile);
}

// 2) Use a different query parameter to echo back the html for one information
// page containing the book cover, title, author, ...

?>