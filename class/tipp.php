<?php 
  
	include_once 'Superclass.php';
	include_once 'db_tipp.php';
  
  class Tipp extends Superclass {
		private $userId    = 0;
		private $begegnung = NULL;
		private $tore1     = 0;
		private $tore2     = 0;
		private $punkte    = 0;
	
	  public function __construct () {
		  $this->db     = new DB_Tipp ();
			$this->userId = 1;
		}
		
		public function __destruct () {
		  $this->db        = NULL;
			$this->user      = NULL;
			$this->begegnung = NULL;
		}
			
		public function getUserId () {
		  return $this->userId;
		}
		
		public function setUserId ($userId) {
		  $this->userId = $userId;
		}
		
		public function getBegegnung () {
		  return $this->begegnung;
		}
		
		public function setBegegnung (&$begegnung) {
		  $this->begegnung = $begegnung;
		}
		
		public function getTore1 () {
		  return $this->tore1;
		}
		
		public function setTore1 ($tore) {
		  $this->tore1 = $tore;
		}
		
		public function getTore2 () {
		  return $this->tore2;
		}
		
		public function setTore2 ($tore) {
		  $this->tore2 = $tore;
		}
		
		public function getPunkte () {
		  return $this->punkte;
		}
		
		public function setPunkte ($punkte) {
		  $this->punkte = $punkte;
		}
		
		public function save () {
		  if ($this->id < 0)  
			  $this->db->getId ($this);
			
			if ($this->id < 0)
			  $this->db->insert ($this);
			else 
				$this->db->update ($this);		
		}
		
		public function get () {
		  $this->db->get ($this);
		}
		
		public function getTipps (&$begegnungen) {
		  foreach ($begegnungen As &$begegnung) {
				$tipp = new Tipp ();
				$tipp->setBegegnung ($begegnung);
				$tipp->get ();
				$begegnung->setTipp ($tipp);
			}
		}
	}
?>