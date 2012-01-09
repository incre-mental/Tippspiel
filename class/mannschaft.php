<?php
  include_once 'DB_Mannschaft.php';

  class Mannschaft {
	  private $id   = -1;
		private $name = "";
	  private $db   = NULL;
	
	  public function __construct () {
		  $this->db = new DB_Mannschaft ();
    }
		
		public function __destruct () {
		  $this->db = NULL;
		}
		
		public function get () {
		  return $this->db->get ();
		}
		
		public function getId () {
		  return $this->id;
		}
		
		public function setId ($id) {
		  $this->id = $id;
		}
		
		public function getName () {
		  return $this->name;
		}
		
		public function setName ($name) {
		  $this->name = $name;
		}
	}
?>