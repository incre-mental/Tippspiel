<?php

class login{

	private $id = NULL;
	private $name = NULL;
	private $passwort = NULL;
	private $email = NULL;
	private $session = NULL;
	private $dbconnection = NULL;
	
	public function __construct($sessionid){
		$this->dbconnection = new DB_MySQL();
		
		$this->session = $sessionid;
		
		if (isset($_POST['login'])===true && 
            isset($_POST['username'])===true && 
            isset($_POST['userpass'])===true){
			
			 $this->name = $_POST['username'];
			 $this->passwort = $_POST['userpass'];
			 $this->login();
			 return true;
		}
		
		if (isset($_GET['logout'])===true && $_GET['logout']==='1'){
			 	$this->logout();
		}
	}
	
	private  function login(){
		$query = 'SELECT * FROM users
				  WHERE  
					Username     = \''. mysql_real_escape_string($this->name) .'\' AND
					Passwort = \''. mysql_real_escape_string(MD5($this->passwort)) .'\'
				  LIMIT 1;';
		
		$this->dbconnection->query($query);
		
		if($this->dbconnection->count()!==1){
			return false;
		} else {
			$row = $this->dbconnection->fetchRow();
			$this->email = $row['EMail'];
			$this->id    = $row['ID'];
			
			$this->logout();
			
			$query = 'UPDATE  
					  	users
					  SET  
						Session = \''. mysql_real_escape_string($this->session) .'\' 
					  WHERE 
					  	ID =  '. $this->id .' 
					  LIMIT 1;';
			
			$this->dbconnection->query($query);			
			
			return true;
		}
	}
	
	public function logged_in(){
		$query = 'SELECT * 
				  	FROM users
				  WHERE  
					Session = \''. mysql_real_escape_string($this->session) .'\' 
				  LIMIT 1;';
		
		$this->dbconnection->query($query);
		
		return ($this->dbconnection->count()!==1) ? false : true;
	}
	
	public function showLogin(){
		echo '		
<form method="post" action="">
<fieldset style="width:300px;text-align:right;position:absolute; left:20%; top:20%;">
 <legend>Benutzeranmeldung</legend>
	<br />
    <label for="textinput1">Benutzername</label>
    <input type="text" name="username">
    <br />
    <label>Passwort</label>
    <input type="password" name="userpass" id="textinput2">
    <br /><br />
  <button name="login" type="submit">Anmelden</button> 

</fieldset>
</form>
			
';
	}
	
	public function showLogout($text='Logout'){
		echo '<a href="?logout=1&sid=',$this->session,'">',$text,'</a>';
	}

	
	private function logout(){
		$query = 'UPDATE  
				  	users
				  SET  
					Session = NULL 
				  WHERE 
				  	Session = \''. mysql_real_escape_string($this->session) .'\'
				  LIMIT 1;';
		
		$this->dbconnection->query($query);
	}
}

?>
