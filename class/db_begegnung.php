<?php 
  include_once 'database.php';
	include_once 'mannschaft.php';
  
  class DB_Begegnung extends DB_MySQL {
	  
		public function get ($phase) {
		  $return = Array ();
		  $sql    = 'SELECT begegnung.id, mannschafts_id_1, teams1.team AS mannschaft_name_1, mannschafts_id_2, teams2.team AS mannschaft_name_2, ' .
			          'timestamp, tore_mannschaft_1, tore_mannschaft_2 FROM begegnung ' .
                'INNER JOIN mannschaften AS teams1 ON Mannschafts_ID_1=teams1.id ' .
                'INNER JOIN mannschaften AS teams2 ON Mannschafts_ID_2=teams2.id';
			
			if ($phase != NULL) {
			  $sql = $sql . ' WHERE phasen_id=' . (string) $phase->getId ();
			}
				
			$this->query ($sql);
			
			while ($this->count () > 0 && $row = $this->fetchRow ()) {
			  $begegnung = new Begegnung ();
				$this->setMember ($begegnung, $row);
				
				$return [] = $begegnung;
			}
			
			return $return;
		}
		
		private function setMember (&$begegnung, &$row) {
      $begegnung->setId        ($row['id']);
			$begegnung->setTore1     ($row['tore_mannschaft_1']);
      $begegnung->setTore2     ($row['tore_mannschaft_2']);
			$begegnung->setTimestamp ($row['timestamp']);
			
			$mannschaft = new Mannschaft ();
			$mannschaft->setId   ($row ['mannschafts_id_1']);
			$mannschaft->setName ($row ['mannschaft_name_1']);
				
			$begegnung->setMannschaft1 ($mannschaft);
			
			$mannschaft = new Mannschaft ();
			$mannschaft->setId   ($row ['mannschafts_id_2']);
			$mannschaft->setName ($row ['mannschaft_name_2']);
			
			$begegnung->setMannschaft2 ($mannschaft);
    }		
	}

?>