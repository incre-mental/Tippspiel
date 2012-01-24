<?php
  include_once 'class/tipp.php';
	include_once 'class/begegnung.php';
	include_once 'class/user.php';
	
	$cnt  = 0;
	$tipp = new Tipp ();
	$currentUser = $tipp->getUserId ();
	$tipp->setUserId (-1);
	$begegnung = new Begegnung ();
	$begegnung->setId ($_GET ['id']);
	
	$tipp->setBegegnung ($begegnung);
	$tipps = $tipp->get ();
	
	foreach ($tipps As $tipp) 
	{
	  if ($tipp->getUserId () != $currentUser)
		{
		  $user = new User ();
			$user->setId ($tipp->getUserId ());
			$user->get ();
	    echo $user->getNickname () . " tippt " . $tipp->getTore1() . ":" . $tipp->getTore2 () . ".</br>"; 
			$cnt++;
			
			$user = NULL;
		}
	}
	
	if (!$cnt)
	  echo "Keine Tipps anderer User vorhanden!";
?>