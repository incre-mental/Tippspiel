<?php
  include_once 'database.php';
	include_once 'user.php';
  
  class DB_User extends DB_MySQL {
	  
		public function get (&$user) {
		  $sql = 'SELECT * FROM users WHERE id=' . $user->getId ();
		
			$this->query ($sql);
			
			if ($row = $this->fetchRow ()){
			  $user->setVorname  ($row['Vorname']);
				$user->setNachname ($row['Nachname']);
				$user->setNickname ($row['Username']);
				$user->setEMail    ($row['EMail']);
			}
		}
	}
?>