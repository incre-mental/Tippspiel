<?php
include_once 'class/session.php';
include_once 'class/database.php';
include_once 'class/login.php';

$mylogin = new login(session::getSID());
if($mylogin->logged_in()!==true){
	$mylogin->showLogin();
	exit();
}
?>