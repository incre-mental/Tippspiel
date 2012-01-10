<?php 
  include_once 'Superclass.php';
	include_once 'DB_Phase.php';
	
  class Phase extends Superclass {
		private $childs = Array ();
		private $parent = NULL;
		private $name   = "";
		
		public function __construct () {
		  $this->db = new DB_Phase ();
		}
		
		public function __destruct () {
		  $this->db = NULL;
		}
		
		public function getParent () {
		  return $this->parent;
		}
		
		public function setParent ($phase) {
		  $this->parent = $phase;
		}
		
		public function &getChilds () {
		  return $this->childs;
		}
		
		public function getName () {
		  return $this->name;
		}
		
		public function setName ($name) {
		  $this->name = $name;
		}
		
		public function get () {
		  return $this->db->get ();
		}
	}

?>