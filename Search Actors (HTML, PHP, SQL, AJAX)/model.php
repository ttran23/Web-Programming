 <?php
 /*
  * Tam Tran
  * Project 9 - MVC Search
  */
class DatabaseAdaptor {
  	private $DB;
  	public function __construct() {
    	$db = 'mysql:dbname=imdb_small;host=127.0.0.1;charset=utf8';
    	$user = 'root';
    	$password = '';
    
    	try {
      		$this->DB = new PDO ( $db, $user, $password );
      		$this->DB->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    	} catch ( PDOException $e ) {
      		echo ('Error establishing Connection');
      		exit ();
    	}
  	}
  
  	// Return all actors matching substring
  	public function getActors($actor) {
    	$stmt = $this->DB->prepare( "SELECT * FROM actors where first_name like '%" . $actor . "%' OR last_name like '%" . $actor . "%'" );
    	$stmt->execute ();
    	return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  	}
  
  	// Return all roles matching substring
  	public function getRoles($role) {
  		$stmt = $this->DB->prepare( "SELECT * FROM roles where role like '%" . $role . "%'" );
  		$stmt->execute ();
  		return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  	}
  
} // End class DatabaseAdaptor

$theDBA = new DatabaseAdaptor ();

// Testing code
// $arr = $theDBA->getActors("ar");
// print_r($arr);

// $arr = $theDBA->getRoles("eb");
// print_r($arr);

 
?>