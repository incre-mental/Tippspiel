<?php
  include_once 'database.php';
	include_once 'tipp.php';
  
  class DB_Tipp extends DB_MySQL {
	  
		public function insert (&$tipp) {
		  $sql = 'INSERT INTO tipp (begegnung_id, user_id, tippm1, tippm2) ' . 
					   'VALUES (' . $tipp->getBegegnung()->getId() . ', ' . 
						 $tipp->getUserId() . ', ' . 
						 $tipp->getTore1() . ', ' .
						 $tipp->getTore2() . ')';
		
			$this->query ($sql);
		}
		
		public function update (&$tipp) {
		  $sql = 'UPDATE tipp ' .
			       'SET begegnung_id = ' . $tipp->getBegegnung()->getId() . ', ' . 
						     'user_id      = ' . $tipp->getUserId()             . ', ' .
								 'tippm1       = ' . $tipp->getTore1()              . ', ' .
								 'tippm2       = ' . $tipp->getTore2()              . ', ' .
								 'punkte       = ' . $tipp->getPunkte ()            . ' '  . 
						 'WHERE id = ' . $tipp->getId (); 
						
			$this->query ($sql);
		}
	
	  public function getId (&$tipp) {
		  $sql = 'SELECT ID FROM tipp ' . $this->getWhereClause ($tipp);
			      
			$this->query ($sql);

      if ($row = $this->fetchRow ()) {	
        $this->setMember ($tipp, $row);			
			}			
		}
		
		public function get (&$tipp) {
		  $sql = 'SELECT * FROM tipp ' . $this->getWhereClause ($tipp);
			      
			$this->query ($sql);  
			
			if ($row = $this->fetchRow ()) {	
        $this->setMember ($tipp, $row);			
			}
		}
		
		private function getWhereClause (&$tipp) {
		  $sql = 'WHERE user_id = ' . $tipp->getUserId () . ' ';
						 
			if ($tipp->getBegegnung () != NULL)
			  $sql = $sql . 'AND begegnung_id = ' . $tipp->getBegegnung ()->getId ();
		
		  return $sql;
		}
		
		private function setMember (&$tipp, &$row) {
      $tipp->setId     ($row ['ID']);
			$tipp->setUserId ($row ['User_ID']);
      $tipp->setTore1  ($row ['TippM1']);
			$tipp->setTore2  ($row ['TippM2']);
			$tipp->setPunkte ($row ['Punkte']);
    }
	}

?>