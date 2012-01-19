<?php
  include_once 'class/tipp.php';
	include_once 'class/begegnung.php';
	
	$tipp = new Tipp ();
	$tipp->setUserId (-1);
	$begegnung = new Begegnung ();
	$begegnung->setId ($_GET ['id']);
	
	$tipp->setBegegnung ($begegnung);
	$tipps = $tipp->get ();
	
	foreach ($tipps As $tipp) {
	  echo "User " . $tipp->getUserId () . " tippt " . $tipp->getTore1() . ":" . $tipp->getTore2 () . "</br>"; 
	}
?>