<?php

class session
{
	private static $instance = NULL;
	private static $sid = NULL;
	#AB
	private static $login = NULL;
	private static $username = NULL;
	private static $userpass = NULL;
	#/AB
	private static $sessionpasswort='';
	
	private  function __construct(){
		if (isset($_GET['sid'])===true){
			self::$sid=$_GET['sid'];
			#AB
			if (isset($_POST['passwort'])){
				self::$login=true;
				self::$username=$_POST['username'];
				#echo self::$username;
				self::$userpass=$_POST['userpass'];
			}
			#/AB
		} else {
			if (isset($_POST['sid'])===true){
				self::$sid=$_POST['sid'];
				#AB
				if (isset($_POST['passwort'])){
				self::$login=true;
				self::$username=$_POST['username'];
				#echo self::$username;
				self::$userpass=$_POST['userpass'];
				}
				#/AB
			}
		}
								
		$testSession = preg_split("/-/",self::$sid,-1);
		$testMD5 = md5($testSession[0].self::$sessionpasswort);
		
		if(sizeof ($testSession) < 2 || $testMD5 !== $testSession[1]){
			self::erzeugeSID();
		}
	}
	
	public static function getInstance(){
     	if (self::$instance === NULL){
          self::$instance = new self;
      	}
      	return self::$instance;
  	}
  	
	private function __clone() {}
	
	public static function getSID(){
		return self::$sid;
	}
	
	#AB
	public static function getUserName(){
		return self::$username;
	}
	#AB
	
	private static function erzeugeSID(){
		  $tmp = md5((string)mt_rand() . $_SERVER['REMOTE_ADDR'] . time());
		  self::$sid=$tmp .'-'.md5($tmp.self::$sessionpasswort) ;
	}
	
	public static function showLink($mitFragezeichen=false){
		echo ($mitFragezeichen!==true) ? '' : '?', 'sid=',self::getSID();
	}
}

$singlesession = session::getInstance();

?>
