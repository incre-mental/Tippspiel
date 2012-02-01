<?php 
  include_once 'class/begegnung.php';
	include_once 'class/tipp.php';
		
  $begegnungen       = unserialize ($_SESSION ['tippeingabe_begegnungen']);
	$phase             = $_SESSION ['tippeingabe_phase'];
	$current_timestamp = time();
		
  foreach ($begegnungen As $begegnung) 
	{ 				
	  if ($begegnung->getTimestamp () > $current_timestamp) 
		{
			$tipp = $begegnung->getTipp ();
			
			$tipp1 = strip_tags (trim ($_POST [$begegnung->getId () . '1']));
			$tipp2 = strip_tags (trim ($_POST [$begegnung->getId () . '2']));
			
			$Save = $tipp1 >= 0 && $tipp2 >= 0;
			
			if (strlen ($tipp1) == 0)
			  $tipp1 = -1;
			
			if (strlen ($tipp2) == 0)
			  $tipp2 = -1;
				
			$Save &= is_numeric ($tipp1) && is_numeric ($tipp2);
		
			if ($Save) {
				if ($tipp1 > 99)
					$tipp1 = 99;
				
				if ($tipp2 > 99)
					$tipp2 = 99;
					
				$tipp->setTore1 ($tipp1);
				$tipp->setTore2 ($tipp2);
				$tipp->setBegegnung ($begegnung);
				$tipp->save ();
			}
		}
	}
	
	header ("Location:tippeingabe.php?phase_id=$phase" . "&sid=" . $_GET['sid']);
?>