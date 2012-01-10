<?php 
  class Superclass {
	  protected $id = -1;
		protected $db = NULL;
		
		public function getId () {
		  return $this->id;
		}
		
		public function setId ($id) {
		  $this->id = $id;
		}
	}
?>