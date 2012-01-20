<?php 

include_once 'class/rankingclass.php';
$userrangliste = array();
echo "Hier";

$rank = new DB_Ranking();
echo "<pre>";
$rank->userrank();
$table = rand(1,100);
foreach ($rank->getIds() as $u) {
	$rank->aufbauranking($u, $table, 2);
	//$userrangliste[$u."ID"] = $u;
	//$userrangliste[$u."Name"]= $rank->getNames($u);
	//$userrangliste[$u."Punkte"] = $rank->aufbauranking($u);
	//array_push($userrangliste,array($u=>($rank->aufbauranking($u))));
	//print_r($userrangliste);
}
$rank->ausgaberanking($table);
//$rank->ausgabephase(2);
//print_r($userrangliste);
//print_r($rank);
//print_r($rank->getIds());
//print_r($rank->getNames());
echo "</pre>";
?>