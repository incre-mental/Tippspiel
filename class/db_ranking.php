<?php
  include_once 'database.php';

  
  class DB_Ranking extends DB_MySQL {
	private $ids = array();
	private $names = array();
	private $punkte = array();
	private $row_tipps = array();
	private $r = array();
	private $ranking = 0;
	private $usernames = "";
	
  	
		public function userrank () { //deprecated! wird nicht mehr genutzt 
		  $sqluser = 'Select ID, Username from users order by ID ASC';
		
			$this->query ($sqluser);
					while ($row = $this->fetchRow ()) {	
       					 $this->setID ($row["ID"]);	
       					 $this->setName($row["Username"]);		
					}
		}
		
		public function aufbauranking ($smarty, $phase="") {
				
	  	$sql = 'Select users.id, users.username, sum(t.Punkte) from tipp as t inner join users on users.id = t.user_id group by users.id';

		  if ($phase!=="") $sql = '
		  	Select users.id, users.username, sum(t.Punkte) from tipp as t 
		  	inner join users on users.id = t.user_id 
		  	WHERE Begegnung_ID in (SELECT ID FROM begegnung WHERE Phasen_ID = '.$phase.') 
		  	group by users.id, users.username';
			$this->query ($sql);
			$this->ranking = $this;
			$this->ausgaberanking($smarty);
		}

		public function ausgaberanking($smarty) 	{			
			$usernames = "";
			global $punkte;
			while ($row = $this->ranking->fetchRow()) {
				$usernames[] = $row["username"];
				$punkte[] = $row["sum(t.Punkte)"];
			}
				$smarty->assign ('usernames', $usernames);
				$smarty->assign ('punkten', $punkte);
		}
		
		public function punktespeichern() {
			
			$sql = 'Select TippM1, TippM2, User_ID, begegnung.timestamp, begegnung.id from tippspiel.tipp 
					inner join begegnung on 
					tipp.begegnung_id = begegnung.id 
					Where begegnung.timestamp < '.(time()-9900);
			//echo $sql;
			
			$ergebnis = $this->query($sql);
			while($re = mysql_fetch_array($ergebnis, MYSQL_NUM)) {
			
				array_push($this->row_tipps,$re);
			
			}
			foreach($this->row_tipps as $rt) {
				$r = array();
				$sql = ' Select Tore_Mannschaft_1, Tore_Mannschaft_2 from tippspiel.begegnung where ID = '.$rt[4];
				$ergebnis = $this->query($sql);
				while($re = mysql_fetch_array($ergebnis, MYSQL_NUM)) {
						
					array_push($r,$re);
						
				}		
				
				
				
				if (($r[0][0]==$rt[0]) AND ($r[0][1]==$rt[1])) {
					$query = 'UPDATE  `tippspiel`.`tipp` SET  `Punkte` =  \'3\' WHERE  `tipp`.`Begegnung_ID` ='.$rt[4].' AND tipp.user_id = '.$rt[2];
						//echo "3 Punkte<br>";
				}
				elseif (($r[0][0]-$r[0][1])==($rt[0]-$rt[1])) {
					$query = 'UPDATE  `tippspiel`.`tipp` SET  `Punkte` =  \'2\' WHERE  `tipp`.`Begegnung_ID` ='.$rt[4].' AND tipp.user_id = '.$rt[2];
						//echo "2 Punkte<br>";
				}
				elseif ((($r[0][0]>$r[0][1]) AND ($rt[0]>$rt[1])) OR (($r[0][0]<$r[0][1]) AND ($rt[0]<$rt[1]))) {
					$query = 'UPDATE  `tippspiel`.`tipp` SET  `Punkte` =  \'1\' WHERE  `tipp`.`Begegnung_ID` ='.$rt[4].' AND tipp.user_id = '.$rt[2];
						echo "1 Punkt<br>";
				}else {
					$query = "";
					//	echo "0 Puntke<br>";
				}
				//echo $query;
			$this->query($query);
			}
			
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