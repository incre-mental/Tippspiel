<?php 
  include_once 'class/phase.php';
	include_once 'class/begegnung.php';
	include_once 'class/tipp.php';
	include_once 'smarty_config.php';
	
	include_once 'phasenmenu.php';
	
	$begegnung_array = Array ();
	$tipp  = new Tipp ();
  $phase = new Phase ();
	
	if (!isset ($_GET ['phase_id']))
	  $_GET ['phase_id'] = 0;
		
	$phase->setId ($_GET ['phase_id']);
	$phase->get ();
	
	$smarty->assign ('phase', $phase);
	
	if (sizeof ($phase->getChilds ()) > 0) {
		foreach ($phase->getChilds () As $childphase) {
			$begegnung  = new Begegnung ();
			$begegnungen = $begegnung->get ($childphase);

			$tipp->getTipps ($begegnungen);
			
			$begegnung_array = array_merge ($begegnung_array, $begegnungen);
		}
	}
	else {
	  $begegnung   = new Begegnung ();
		$begegnungen = $begegnung->get ($phase);
    $tipp->getTipps ($begegnungen);
		
		$begegnung_array = $begegnungen;
	}
	
	$smarty->assign ('begegnungen', $begegnung_array);
	
	$_SESSION ['tippeingabe_begegnungen'] = serialize ($begegnung_array);
	$_SESSION ['tippeingabe_phase']       = $phase->getId ();
	
	$smarty->display ('tippeingabe.tpl');
?>