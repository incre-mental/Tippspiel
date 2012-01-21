<?php 

include_once 'class/rankingclass.php';

$rank = new DB_Ranking();
echo "<pre>";
$rank->ausgaberanking($rank->aufbauranking());
echo "</pre>";
?>