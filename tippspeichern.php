<?php 
  include_once 'class/begegnung.php';
	include_once 'class/tipp.php';
	
  session_start ();
	
  $begegnungen       = unserialize ($_SESSION ['tippeingabe_begegnungen']);
	$phase             = $_SESSION ['tippeingabe_phase'];
	$current_timestamp = time();
	
  foreach ($begegnungen As $begegnung) { 		
	  if ($begegnung->getTimestamp () > $current_timestamp) {
			$tipp = $begegnung->getTipp ();
			
			$tipp1 = trim ($_POST [$begegnung->getId () . '1']);
			$tipp2 = trim ($_POST [$begegnung->getId () . '2']);
			
			if (strlen ($tipp1) == 0)
			  $tipp1 = 0;
			
			if (strlen ($tipp2) == 0)
			  $tipp2 = 0;
				
			$Save = is_numeric ($tipp1) && is_numeric ($tipp2);
			
			if ($Save) {
				if ($tipp1 < 0)
					$tipp1 = 0;
				
				if ($tipp1 > 999)
					$tipp1 = 999;
					
				if ($tipp2 < 0)
					$tipp2 = 0;
				
				if ($tipp2 > 999)
					$tipp2 = 999;
					
				$tipp->setTore1 ($tipp1);
				$tipp->setTore2 ($tipp2);
				$tipp->save ();
			}
		}
	}

	header ("Location:tippeingabe.php?phase_id=$phase");
?>