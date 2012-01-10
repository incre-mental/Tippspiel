<?php
  include_once 'Superclass.php';
  include_once 'DB_Mannschaft.php';

  class Mannschaft extends Superclass{
		private $name = "";
	
	  public function __construct () {
		  $this->db = new DB_Mannschaft ();
    }
		
		public function __destruct () {
		  $this->db = NULL;
		}
		
		public function get () {
		  return $this->db->get ();
		}
		
		public function getName () {
		  return $this->name;
		}
		
		public function setName ($name) {
		  $this->name = $name;
		}
	}
?>