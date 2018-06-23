 <?php
 /*
  * Tam Tran
  * Project 10 - Quotation Service
  */
	class DatabaseAdaptor {
 		// Taken from Prof. Mercer
		private $DB;
	  	public function __construct() {
	    	$db = 'mysql:dbname=quotes;host=127.0.0.1;charset=utf8';
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
	  	
	  	// Add a quote
	  	public function addQuote($quote, $author){
	  		$stmt = $this->DB->prepare ( 'INSERT into quotations(added, quote, author, rating, flagged) values(NOW(), "' . $quote . '", "' . $author . '", 0, 0)');
	  		$stmt->execute();
	  	}
	  	
	  	// Get all quotes
	  	public function getQuotesAsArray(){
	  		$stmt = $this->DB->prepare ( 'SELECT * FROM quotations ORDER BY rating DESC');
	  		$stmt->execute ();
	  		return $stmt->fetchAll ( PDO::FETCH_ASSOC );
	  	}
	  	
	  	// Unflag the quotes
	  	public function unflag(){
	  		$stmt = $this->DB->prepare ('UPDATE quotations SET flagged = 0');
	  		$stmt->execute ();
	  	}
	  	
	  	// Flag the quote
	  	public function flag($quote){
	  		$stmt = $this->DB->prepare ('UPDATE quotations SET flagged = 1 WHERE quote = "' . $quote . '"');
	  		$stmt->execute ();
	  	}
	  	
	  	// Add to rating
	  	public function add($quote){
	  		$stmt = $this->DB->prepare ('UPDATE quotations SET rating = rating+1 WHERE quote = "' . $quote . '"');
	  		$stmt->execute ();
	  	}
	  	
	  	// Subtract from rating
	  	public function sub($quote){
	  		$stmt = $this->DB->prepare ('UPDATE quotations SET rating = rating-1 WHERE quote = "' . $quote . '"');
	  		$stmt->execute ();
	  	}
	  	
	  	// Check from usernames
	  	public function checkUser($name){
	  		$stmt = $this->DB->prepare ( 'SELECT * FROM users WHERE username = "' . $name . '"');
	  		$stmt->execute ();
	  		return $stmt->fetchAll ( PDO::FETCH_ASSOC );
	  	}
	  	
	  	// Add user
	  	public function addUser($name, $pass){
	  		$stmt = $this->DB->prepare ( 'INSERT into users(username, hash) values("' . $name . '", "' . $pass . '")');
	  		$stmt->execute ();
	  	}
	  	
	} // End class DatabaseAdaptor

	// Create the instance
	$theDBA = new DatabaseAdaptor ();
?>