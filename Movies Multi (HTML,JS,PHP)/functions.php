<?php
// Tam Tran
// Project 7

// Extract items from info.txt
function getInfo($folderName) {
	//https://www.w3schools.com/php/php_file_open.asp
	$myFile = fopen ( $folderName . '/info.txt', 'r' ) or die ("Unable to open file!");
	$retVal = array (
			fgets ( $myFile),
			fgets ( $myFile),
			fgets ( $myFile)
	);
	fclose($myFile);
	return $retVal;
}

// Get the rotten or fresh image
function determineScore($score) {
	if ($score> 50) {
		return "freshlarge.png";
	} else {
		return "rottenlarge.png";
	}
}

// Get Reviews
function getReview($folderName, $reviewName) {
	//https://www.w3schools.com/php/php_file_open.asp
	$myFile = fopen ( $folderName . '/' . $reviewName, 'r' ) or die ("Unable to open file!");
	$retVal = array (
			fgets ( $myFile),
			fgets ( $myFile),
			fgets ( $myFile),
			fgets ( $myFile)
	);
	fclose($myFile);
	return $retVal;
}

// Print the reviews
function printReviews($folderName, $column) {
	// Get file List
	$fileList = scandir( $folderName );
	$dirSize = count($fileList);
	$listSizeLeft = (int)ceil(($dirSize-5) / 2);
	$listSizeRight = (int)(($dirSize-5)/ 2);
	
	if ($column === 'left') {
		$reviewNum = 1;
		for ($i = 0; $i < $listSizeLeft; $i++) {
			$reviewName = 'review' . $reviewNum . '.txt';
			// [0] = description, [1] = fresh/rotten, [2] = User, [3] = publication
			$reviewInfo = getReview( $folderName, $reviewName );
			
			// Review
			echo '<p class=\'review\'>';
			echo '<img src="images/' . $reviewInfo[1] . '.gif" alt="' . $reviewInfo[1] . '" />';
			echo $reviewInfo[0];
			echo '</p>';
			
			// User
			echo '<p class=\'user\'>';
			echo '<img src="images/critic.gif" alt="Critic" />';
			echo $reviewInfo[2] . '<br>';
			echo '<i>' . $reviewInfo[3] . '</i>';
			echo '</p>';
			
			$reviewNum++;
		}
	}
	else if ($column === 'right') {
		$reviewNum = $listSizeLeft + 1;
		for ($i = 0; $i < $listSizeRight; $i++) {
			$reviewName = 'review' . $reviewNum . '.txt';
			// [0] = description, [1] = fresh/rotten, [2] = User, [3] = publication
			$reviewInfo = getReview( $folderName, $reviewName );
			
			// Review
			echo '<p class=\'review\'>';
			echo '<img src="images/' . $reviewInfo[1] . '.gif" alt="' . $reviewInfo[1] . '" />';
			echo $reviewInfo[0];
			echo '</p>';
			
			// User
			echo '<p class=\'user\'>';
			echo '<img src="images/critic.gif" alt="Critic" />';
			echo $reviewInfo[2] . '<br>';
			echo '<i>' . $reviewInfo[3] . '</i>';
			echo '</p>';
			
			$reviewNum++;
		}
	}
}

function printOverview( $movieFolder ) {
	//https://www.w3schools.com/php/php_file_open.asp
	$myFile = fopen ( $movieFolder. '/overview.txt', 'r' ) or die ("Unable to open file!");
	echo '<dl>';
	while ( $line = fgets( $myFile ) ) {
		echo '<dt class=\'bold\'>' . substr ( $line, 0, strpos ( $line, ':' ) ) . '</dt>';
		echo '<dd>' . substr ( $line, strpos ( $line, ':' ) + 1 ) . '</dd>';
	}
	echo '</dl>';
	fclose($myFile);
}
?>
