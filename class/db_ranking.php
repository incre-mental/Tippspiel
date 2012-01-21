<?php
  include_once 'database.php';

  
  class DB_Ranking extends DB_MySQL {
	private $ids = array();
	private $names = array();
	private $punkte = 0;
  	
		public function userrank () { //deprecated! wird nicht mehr genutzt 
		  $sqluser = 'Select ID, Username from users order by ID ASC';
		
			$this->query ($sqluser);
					while ($row = $this->fetchRow ()) {	
       					 $this->setID ($row["ID"]);	
       					 $this->setName($row["Username"]);		
					}
		}
		
		public function aufbauranking ($phase="") {
				
		  	$sql = 'Select users.id, users.username, sum(t.Punkte) from tipp as t inner join users on users.id = t.user_id group by users.id';

		  if ($phase!=="") $sql = '
		  	Select users.id, users.username, sum(Punkte) from tipp 
		  	inner join users on users.id = tipp.user_id 
		  	WHERE Begegnung_ID in (SELECT ID FROM begegnung WHERE Phasen_ID = '.$phase.') 
		  	group by users.id, users.username';
			$this->query ($sql);
			return $this;
			
		}

		public function ausgaberanking($objekt) 	{			
			echo "<table>";
			while ($row = $objekt->fetchRow()) {
				echo "<tr><td>".$row["username"]."</td><td>".$row["sum(t.Punkte)"]."</td></tr>";
			}
			echo "</table>";
			
			
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