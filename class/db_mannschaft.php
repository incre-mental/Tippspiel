<?php 
  include_once 'database.php';
	include_once 'mannschaft.php';

  class DB_Mannschaft extends DB_MySQL {
	
	  public function get () {
		  $return = array ();
		  $sql = "SELECT * FROM mannschaften";
			
			$this->query ($sql);
			
			while ($row = $this->fetchRow ()) {
			  $mannschaft = new Mannschaft ();
				
			  $mannschaft->setId   ($row ['ID']);
				$mannschaft->setName ($row ['team']);
				
				$return [] = $mannschaft;
			}
			
			return $return;
		}
	}
?>