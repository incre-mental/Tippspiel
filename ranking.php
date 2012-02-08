<?php 

include_once 'class/rankingclass.php';
include_once 'logintemplate.php';
include_once 'class/login.php';
include_once 'smarty_config.php';
include_once 'header.php';

	echo '<div style="margin-left:95%">';
	$mylogin->showLogout();
	echo '</div>';

include_once 'phasenmenu.php';

$begegnung_array = Array ();
//$tipp  = new Tipp ();
$phase = new Phase ();

if (!isset ($_GET ['phase_id']))
$_GET ['phase_id'] = 0;

$phase->setId ($_GET ['phase_id']);
$phase->get ();
$smarty->assign ('phase', $phase);



$smarty->assign ('aktuser', $mylogin->getUserName());

$rank = new DB_Ranking();
$rank->aufbauranking($smarty, $_GET["phase_id"]);
//$rank->ausgaberanking();

$smarty->display ('ranking.tpl');
$rank->punktespeichern();

?>