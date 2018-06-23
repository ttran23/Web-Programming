<?php
// This file is a unit test for the functions you discover
// you will need. Partitioning the system into functions will
// make it much easier to echo the correct HTML code back to the browser
include 'functions.php';

//echo definitionList('princessbride');

$movieFolder = $_GET['movie'];

// Testing getting info for images
$info = getInfo( $movieFolder);
$movieName = $info [0];
$movieYear = $info [1];
$movieScore = $info [2];
echo $movieName . ' ' . $movieYear . ' ' . $movieScore . '<br>';
$tomatoImage = 'images/' . determineScore($movieScore);
echo $tomatoImage . '<br>';
$moviePoster = $movieFolder . '/overview.png';
echo $moviePoster . '<br>';

// Testing directory scanning
$fileList = scandir($movieFolder);
print_r($fileList);
$dirSize= count($fileList);
$listSizeLeft = (int)ceil(($dirSize-5) / 2);
$listSizeRight = (int)(($dirSize-5)/ 2);
echo '<br>' . $fileList[5];
echo '<br>' . $dirSize;
echo '<br>' . $listSizeLeft;
echo '<br>' . $listSizeRight;
echo '<br>';
echo '<br>' . 1;
echo '<br>' . ($listSizeLeft + 1);

$reviewDet = getReview($movieFolder, 'review2.txt');
echo '<br>' . $reviewDet[0];
echo '<br>' . $reviewDet[1];
echo '<br>' . $reviewDet[2];
echo '<br>' . $reviewDet[3];
echo '<img src="images/' . $reviewDet[1] . '.gif" alt="' . $reviewDet[1] . '" />';
?>