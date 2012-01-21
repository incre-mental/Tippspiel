<?php
#include_once 'class/dbconfig.php';
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
		}else{
		#echo "Verbindung hat geklappt!<br/>";
		$this->bname = htmlspecialchars(trim($_POST['bname']));
		$this->email = htmlspecialchars(trim($_POST['email']));
		$this->vorname = htmlspecialchars(trim($_POST['vorname']));
		$this->nachname = htmlspecialchars(trim($_POST['nachname']));
		$this->passwort = MD5($_POST['passwort']);
		$this->session = $sessionid;
 		$this->host = htmlspecialchars($_SERVER['HTTP_HOST']);
 		$this->uri = rtrim(dirname(htmlspecialchars($_SERVER["PHP_SELF"])), "/\\");
 		
 		if ( !empty($_POST['nachname']) 	&& !empty($_POST['passwort']) 	&& !empty($_POST['email']) &&
 		     !empty($_POST['passwortw']) 	&& !empty($_POST['bname']) 		&&  filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){	
 						if ($_POST['passwort'] != $_POST['passwortw']){
 						##echo "Passwort Wiederholung stimmt nicht mit dem Passwort Ÿberein!!<br/>";
 						header("location: register.php?fehler=5");
 						}else{			
 			 				if(strlen($_POST['passwort']) < 6){
 			 					#echo "Passwort zu kurz!!<br/>";
 			 					header("location: register.php?fehler=3");
 			 				}else{
 								if ($this->check_email()){
 									#echo "E-Mail schon vergeben!!<br/>";
 									header("location: register.php?fehler=4");
 								}else{
 			 					if ($this->check_bname()){
 			 						#echo "Username schon vergeben!!<br/>";
 			 						header("location: register.php?fehler=2");
 			 					}else{
 			 						#echo "User kann angemeldet werden<br/>";
 			 						$mysqli = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
 			 						$insert = "INSERT INTO users (Username, Passwort, Session, Vorname, Nachname, Email)
 			 						 		   VALUES ('$this->bname', '$this->passwort', '$this->session', '$this->vorname', '$this->nachname', '$this->email');";
 			 						#echo $insert."<br/>";
 			 						if ($ergebnis = $mysqli->query($insert)){
 			 							header("Location: willkommen.php");
 			 						}else{
 			 							#echo "Fehlerhaftes INSERT!! User kann nicht angemeldet werden<br/>";
 			 							#echo $mysqli->error();
 			 							header("location: register.php?fehler=6");
 			 						}
 			 					}
 							}
 						}
 					}
 				}else{ 
 				#echo "User kann nicht angemeldet werden<br/>";
 				header("location: register.php?fehler=1");			
 				}
 		$mysqli->close();
 		#echo "verbindung closed!!";
			}
	}
		
	public  function check_bname(){
		#echo "<br/>bname:".$this->bname."<br/>";
		$mysqli = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
		$ergebnis = $mysqli->query("SELECT count(*) FROM users WHERE Username = '". mysql_real_escape_string($this->bname) ."' LIMIT 1;");		
		$zeile = $ergebnis->fetch_array();
		#print_r($zeile);
		if($zeile[0]==1){
		#echo "dbcheck_positiv";
			$ergebnis->close();
			$mysqli->close();
			return true;
		} else {
		#echo "dbcheck_negativ";
			$ergebnis->close();
			$mysqli->close();
			return false;
		}
		#$ergebnis->close();
		#$mysqli->close();
	}

	public  function check_email(){
		#echo "<br/>bname:".$this->bname."<br/>";
		$mysqli = new mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
		$ergebnis = $mysqli->query("SELECT count(*) FROM users WHERE Email = '". mysql_real_escape_string($this->email) ."' LIMIT 1;");
		$zeile = $ergebnis->fetch_array();
		#print_r($zeile);
		if($zeile[0]==1){
			#echo "dbcheck_positiv";
			$ergebnis->close();
		$mysqli->close();
		return true;
		} else {
			#echo "dbcheck_negativ";
			$ergebnis->close();
		$mysqli->close();
		return false;
		}
		#$ergebnis->close();
		#$mysqli->close();
	}
}

?>
