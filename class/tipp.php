<?php 
	include_once 'Superclass.php';
	include_once 'db_tipp.php';
	include_once 'login.php';
  
  class Tipp extends Superclass {
		private $userId    = -1;
		private $begegnung = NULL;
		private $tore1     = -1;
		private $tore2     = -1;
		private $punkte    = 0;
	
	  public function __construct () {
		  $this->db     = new DB_Tipp ();
			
			if (isset ($_SESSION['userid']))
			  $this->userId = $_SESSION['userid'];
			else
			  $this->userId = 0;
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
		
		public function setBegegnung ($begegnung) {
		  $this->begegnung = $begegnung;
		}
		
		public function getTore1 ($show = true) {
		  if ($this->tore1 >= 0 || !$show)
				return $this->tore1;
			else 
			  return "";
		}
		
		public function setTore1 ($tore) {
		  $this->tore1 = $tore;
		}
		
		public function getTore2 ($show = true) {
		  if ($this->tore2 >= 0 || !$show)
		    return $this->tore2;
			else
			  return "";
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
		  return $this->db->get ($this);
		}
		
		public function getTipps (&$begegnungen) {
		  foreach ($begegnungen As &$begegnung) {
				$tipp = new Tipp ();
				$tipp->setBegegnung ($begegnung);
				$tipp->get ();
				$begegnung->setTipp ($tipp);
			}
		}
		
		public function copy (&$tipp) {
		  $tipp->setUserId    ($this->getUserId ());
		  $tipp->setBegegnung ($this->getBegegnung ());
		  $tipp->setTore1     ($this->getTore1 ());
		  $tipp->setTore2     ($this->getTore2 ());
		  $tipp->setPunkte    ($this->getPunkte ());
		}
	}
?>