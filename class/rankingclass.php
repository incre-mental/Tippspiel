<?php 
  
	include_once 'Superclass.php';
	include_once 'db_ranking.php';
	
	class Ranking extends Superclass {
		private $sqluser=NULL;
		
		public function __construct () {
			$this->db     = new DB_Ranking ();
			
		}
		
		public function __destruct () {
			$this->db        = NULL;
			$this->user      = NULL;
		}

		public function getSQLUser() {
			return $this->db->userrank();
			
		}
		
		
		public function getUserId () {
			return $this->userId;
		}
		
		public function setUserId ($userId) {
			$this->userId = $userId;
		}
		
		
	}
	
	