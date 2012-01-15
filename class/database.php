<?php
include "dbconfig.php";

class DB_MySQL {
  private $connection = NULL;
  private $result = NULL;
  private $counter=NULL;
  
  private $dbconfig = array(
			'server' => DBHOST,
			'user' => DBUSER,
			'password' => DBPWD,
			'database' => DBNAME,
			);
  
  public function __construct(){
	  $this->connect (); 
  }
	
	private function connect () {
	  $this->connection = mysql_connect($this->dbconfig['server'],
                                      $this->dbconfig['user'],
                                      $this->dbconfig['password'],
                                      TRUE);	
  	mysql_select_db($this->dbconfig['database'], $this->connection);
	}
 
  public function disconnect() {
    if (is_resource($this->connection===true))
        mysql_close($this->connection);
  }
 
  public function query($query) {
  	$this->result=mysql_query($query,$this->connection);
  	$this->counter=NULL;
  }
    
  public function fetchRow() {
  	return mysql_fetch_assoc($this->result);
  }
  
 
  public function count() {
  	if($this->counter===NULL && is_resource($this->result)===true) {
  		$this->counter=mysql_num_rows($this->result);
  	}
 
	  return $this->counter;
  }
	
	public function __wakeup() {
    $this->connect ();  
  }
}

?>
