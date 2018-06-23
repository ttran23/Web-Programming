 <?php
 /*
  * Stephanie Marcellin, Tam Tran
  * Final Project - Mini D2L Class website
  */
	class DatabaseAdaptor {
 		// Taken from Prof. Mercer
		private $DB;
	  	public function __construct() {
	    	$db = 'mysql:dbname=ece220;host=127.0.0.1;charset=utf8';
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
	  	
	  	public function checkUser($username){
	  	    $stmt = $this->DB->prepare("SELECT * FROM users WHERE username= :username;");
	  	    $stmt->bindParam('username', $username);
	  	    $stmt->execute();
	  	    return $stmt->fetchAll( PDO::FETCH_ASSOC );
	  	}
	  	
	  	public function addUser($username, $hash, $first_name){
	  	    $stmt = $this->DB->prepare("INSERT INTO users (username, hash, first_name) values(:username, :hash, :first_name);");
	  	    $stmt->bindParam('username', $username);
	  	    $stmt->bindParam('hash', $hash);
	  	    $stmt->bindParam('first_name', $first_name);
	  	    $stmt->execute();
	  	}
	  	
	  	public function getGrades($user) {
	  	    $stmt = $this->DB->prepare( "SELECT * FROM (SELECT * FROM users JOIN grades ON user_id = grades_id) AS temp WHERE username = :user;");
	  	    $stmt->bindParam('user', $user);
	  	    $stmt->execute();
	  	    return $stmt->fetchAll( PDO::FETCH_ASSOC );
	  	}
	  	
	} // End class DatabaseAdaptor
	
	// Create the instance
	$theDBA = new DatabaseAdaptor ();
?>