<?php

include_once 'class/dbconfig.php';

class registration{

	private $vname = NULL;
	private $nname = NULL;
	private $bname = NULL;
	private $email = NULL;
	private $passwort = NULL;
	private $passwortw = NULL;
	private $session = NULL;
	private $dbconnection = NULL;
	private $host = NULL;
	private $uri = NULL;
	
	
	public function __construct($sessionid){
		$mysqli = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
		if ($mysqli->connect_error){
			echo "Fehler bei der Verbindung: ".mysqli_connect_error();
			exit();
		}
		#echo "Verbindung hat geklappt!<br/>";
		$this->bname = htmlspecialchars(trim($_POST['bname']));
		$this->email = htmlspecialchars(trim($_POST['email']));
		$this->vorname = htmlspecialchars(trim($_POST['vorname']));
		$this->nachname = htmlspecialchars(trim($_POST['nachname']));
		$this->session = $sessionid;
 		$this->host = htmlspecialchars($_SERVER['HTTP_HOST']);
 		$this->uri = rtrim(dirname(htmlspecialchars($_SERVER["PHP_SELF"])), "/\\");
 		if (isset($_POST['nachname']) && 
             isset($_POST['passwort']) && 
 			isset($_POST['email']) &&
             isset($_POST['passwortw']) &&
 			isset($_POST['bname']) &&
 			$_POST['passwort'] == $_POST['passwortw'] 
             ){	
 				$this->bname = htmlspecialchars(trim($_POST['bname']));
 			 	$this->vname = htmlspecialchars(trim($_POST['vorname']));
 			 	$this->nname = htmlspecialchars(trim($_POST['nachname']));
 			 	$this->passwort = htmlspecialchars(trim($_POST['passwort']));
 			 	$this->email = htmlspecialchars(trim($_POST['email']));
 			 	#echo "User Angaben gültig";
 			 	if (!$this->check_bname()){
 			 		#echo "User kann angemeldet werden<br/>";
 			 		$mysqli = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
 			 		$insert = "INSERT INTO users
 			 					(Username, Passwort, Vorname, Nachname, Email)
 			 					VALUES ('$this->bname', 
 			 							'$this->passwort', 
 			 							'$this->vorname', 
 			 							'$this->nachname',
 			 							'$this->email');";
 			 		#echo $insert."<br/>";
 			 		if ($ergebnis = $mysqli->query($insert)){
 			 			header("Location: willkommen.php");
 			 		}else{
 			 			echo "Fehlerhaftes INSERT!! User kann nicht angemeldet werden<br/>";
 			 			#echo $mysqli->error();
 			 		}
 			 		
 			 	}else{
 			 		#echo "Username schon vergeben!!<br/>";
 			 		header("location: register.php?fehler=2");
 			 		#file_get_contents("http://localhost/Tippspiel/Tippspiel/register.php?f=2");
 			 	}
 			}else{ 
 				echo "User kann nicht angemeldet werden<br/>";
 				header("location: register.php?fehler=1");
 				
 		}
 		$mysqli->close();
 		echo "verbindung closed!!";
	}	
	public  function check_bname(){
		#echo "<br/>bname:".$this->bname."<br/>";
		$mysqli = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
		$ergebnis = $mysqli->query("SELECT count(*) FROM users WHERE Username = '". mysql_real_escape_string($this->bname) ."' LIMIT 1;");		
		$zeile = $ergebnis->fetch_array();
		#print_r($zeile);
		if($zeile[0]==1){
		#echo "dbcheck_positiv";
			return true;
		} else {
		#echo "dbcheck_negativ";
			return false;
		}
		$ergebnis->close();
		$mysqli->close();
	}
}

?>
