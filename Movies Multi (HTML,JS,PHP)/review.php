<!DOCTYPE html>
<html>
<head>
<!-- Tam Tran -->
	<title>Movie Reviews</title>
	<meta charset="utf-8" />
	<link href="movies.css" type="text/css" rel="stylesheet" />
</head>
<body>
	
	<?php
	include 'functions.php';
	$movieFolder = $_GET['movie'];
	//echo 'info.text, overview.png, and reviews are under the directory "' . $movieFolder . '"';
	$info = getInfo( $movieFolder );
	$movieName = $info [0];
	$movieYear = $info [1];
	$movieScore = $info [2];
	$tomatoImage = 'images/' . determineScore($movieScore);
	$moviePoster = $movieFolder . '/overview.png';
	?>
	
	<div class='mainBanner'>
		<img src="images/rancidbanner.png" alt="Rancid Tomatoes">
	</div>
	
	<h1>
		<?php echo $movieName . '(' . $movieYear . ')'; ?>
	</h1>
	
	<div class='mainBlock'>
		<div class='rottenBanner'>
			<img src="<?php echo $tomatoImage; ?>" alt="Rotten or Fresh" height='84px'/>
			<?php echo $movieScore . '%'; ?>
		</div>
	
		<div class='picOverview'>
			<img src="<?php echo $moviePoster; ?>" alt="Movie Poster" />
		</div>
		
		<div class='reviewColumn'>
			<?php printReviews( $movieFolder, 'left' ); ?>
		</div>
		
		<div class='reviewColumn'>
			<?php printReviews( $movieFolder, 'right' ); ?>
		</div>
		
		<div class='textOverview'>
			<?php printOverview( $movieFolder ); ?>
		</div>
	</div>

</body>
</html>