<?php
  include_once 'class/tipp.php';
	include_once 'class/begegnung.php';
	
	$tipp = new Tipp ();
	$currentUser = $tipp->getUserId ();
	$tipp->setUserId (-1);
	$begegnung = new Begegnung ();
	$begegnung->setId ($_GET ['id']);
	
	$tipp->setBegegnung ($begegnung);
	$tipps = $tipp->get ();
	
	foreach ($tipps As $tipp) {
	  if ($tipp->getUserId () != $currentUser)
	    echo "User " . $tipp->getUserId () . " tippt " . $tipp->getTore1() . ":" . $tipp->getTore2 () . ".</br>"; 
	}
?>