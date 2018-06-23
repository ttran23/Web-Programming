<?php
/*
 * Tam Tran
 * Project 9 - MVC Search
 */

include 'model.php';

if( isset($_GET['actor'])) {
	// Return a JSON version of a PHP array that has all actors matching substring
  	$actor = $_GET ['actor'];
  	$arr = $theDBA->getActors( $actor );
  	echo json_encode ( $arr );
}

if( isset($_GET['role'])) {
	// Return a JSON version of a PHP array that has all roles matching substring
	$role = $_GET ['role'];
	$arr = $theDBA->getRoles( $role );
	echo json_encode ( $arr );
}



?>