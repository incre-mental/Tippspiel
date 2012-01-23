<?php 
  include_once 'db_user.php';
	include_once 'Superclass.php';
	
  class User extends Superclass {
    private $vorname  = "";
		private $nachname = "";
		private $nickname = "";
		private $email    = "";
		
		public function __construct () {
		  $this->db = new DB_User ();
		}
		
		public function __destruct () {
		  $this->db = NULL;
		}
		
		public function setVorname ($name){
		  $this->vorname = $name;
		}
		
		public function getVorname (){
		  return $this->vorname;
		}
		
		public function setNachname ($name){
		  $this->nachname = $name;
		}
		
		public function getNachname (){
		  return $this->nachname;
		}
		
		public function setNickname ($name){
		  $this->nickname = $name;
		}
		
		public function getNickname (){
		  return $this->nickname;
		}
		
		public function setEMail ($name){
		  $this->email = $name;
		}
		
		public function getEMail (){
		  return $this->email;
		}	
		
		public function get (){
		  $this->db->get ($this);
		}
	}
?>