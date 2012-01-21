<?php
  include_once 'database.php';

  
  class DB_Ranking extends DB_MySQL {
	private $ids = array();
	private $names = array();
	private $punkte = 0;
  	
		public function userrank () {
		  $sqluser = 'Select ID, Username from users order by ID ASC';
		
			$this->query ($sqluser);
					while ($row = $this->fetchRow ()) {	
						//print_r($row);
       					 $this->setID ($row["ID"]);	
       					 $this->setName($row["Username"]);		
					}
		}
		
		public function aufbauranking ($user, $table, $phase="") {
			
			
		  	$sql = 'Select sum(Punkte) from tipp where User_ID = '.$user;	
		  	

		  	if ($phase!=="")  $sql= 'SELECT sum(Punkte) FROM `tipp` WHERE Begegnung_ID in (SELECT ID FROM `begegnung` WHERE Phasen_ID = '.$phase.') AND User_ID = '.$user;
		  	echo $sql;
			$this->query ($sql);
			//echo $sql;
			
			$row = $this->fetchRow();
			return $row["Punkte"];
			/*
		  	$punkte = 0;
		  	$sql="";
		  	while ($row = $this->fetchRow ()) {
		  		$punkte = $punkte + intval($row["Punkte"]);
		    }
		    $this->query('CREATE TABLE IF NOT EXISTS `'.$table.'` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `gesamtpunkte` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
)');
		  	$sql= 'INSERT INTO `'.$table.'` (user_id, gesamtpunkte) ' .
		  					   'VALUES (' . $user . ', ' . $punkte . '); ';
		  
		  	
		  	$this->query($sql);*/
		}

		public function ausgaberanking($table) {
			$sql = 'Select `'.$table.'`.user_id, `'.$table.'`.gesamtpunkte, users.username from `'.$table.'` inner join users on `'.$table.'`.user_id = users.id order by gesamtpunkte DESC';
			$this->query($sql);
			echo "<table>";
			while ($row = $this->fetchRow ()) {
				echo "<tr><td>".$row["username"]."</td><td>".$row["gesamtpunkte"]."</td></tr>";
			}
			echo "</table>";
			$this->query('Drop Table `'.$table.'`');
			
		}
		
		
	  public function getIds () {
		  return($this->ids);
			      
		}
		
		public function getNames ($id) {
			return $this->names[array_search($id, $this->names)];
		//return($this->names);
		}
		
		private function setID($id) {
			
			$this->ids[] = $id;
		
		}
		
		private function setName($name) {
			$this->names[] = $name;
	}
		
	}

?>