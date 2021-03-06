<?php 
  include_once 'Superclass.php';
  include_once 'db_begegnung.php';
	
  class Begegnung extends Superclass {
		private $mannschaft1 = NULL;
		private $mannschaft2 = NULL;
		private $timestamp   = NULL;
		private $tore1       = 0;
		private $tore2       = 0;
		
		public function __construct () {
		  $this->db = new DB_Begegnung ();
		}
		
		public function __destruct () {
		  $this->mannschaft1 = NULL;
      $this->mannschaft2 = NULL;		
      $this->db          = NULL;			
		}	
		
		public function get ($phase) {
		  return $this->db->get ($phase);
		}
				
		public function getMannschaft1 () {
		  return $this->mannschaft1;
		}
		
		public function setMannschaft1 ($mannschaft) {
		  $this->mannschaft1 = $mannschaft;
		}
		
		public function getMannschaft2 () {
		  return $this->mannschaft2;
		}
		
		public function setMannschaft2 ($mannschaft) {
		  $this->mannschaft2 = $mannschaft;
		}
		
		public function getTimestamp () {
		  return $this->zimestamp;
		}
		
		public function setTimestamp ($zimestamp) {
		  $this->zimestamp = $zimestamp;
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
		
		public function getTipp () {
		  return $this->tipp;
		}
		
		public function setTipp (&$tipp) {
		  $this->tipp = $tipp;
		}
	}
?>