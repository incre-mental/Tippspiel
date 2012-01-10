<?php 
  
	include_once 'Superclass.php';
	include_once 'db_tipp.php';
  
  class Tipp extends Superclass {
		private $user      = NULL;
		private $begegnung = NULL;
		private $tore1     = 0;
		private $tore2     = 0;
		private $punkte    = 0;
	
	  public function __construct () {
		  $this->db = new DB_Tipp ();
		}
		
		public function __destruct () {
		  $this->db        = NULL;
			$this->user      = NULL;
			$this->begegnung = NULL;
		}
			
		public function getUser () {
		  return $this->user;
		}
		
		public function setUser ($user) {
		  $this->user = $user;
		}
		
		public function getBegegnung () {
		  return $this->begegnung;
		}
		
		public function setBegegnung ($begegnung) {
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
	  
	}
?>