<?php 
  include_once 'class/phase.php';
	include_once 'smarty_config.php';
		
	if (isset ($_SESSION ['phasenmenu'])) {
		$phasen = unserialize ($_SESSION ['phasenmenu']);
	}
	else {
	  $phase = new Phase ();
		$phasen = $phase->get ();
		
		$_SESSION ['phasenmenu'] = serialize ($phasen);
	}
	
	$smarty->assign ('phasen', $phasen);
?>