<?php
include_once 'logintemplate.php';
?>
<h2>Verwaltung</h2>
Die geheime Verwaltung.<br />
<br />
<h3>Navigation</h3>
<ul>
	<li><a href="index.php<?php session::showLink(true);?>">Startseite</a></li>
	<li><a href="verwaltung.php<?php session::showLink(true);?>">Verwaltung</a></li>
	<li><?php $mylogin->showLogout();?></li>
</ul>

<?php

$options = array('encoding'           => 'UTF-8',
                 'connection_timeout' => 5,
                 'exceptions'         => 1,
                 );

$location = 'http://www.OpenLigaDB.de/Webservices/Sportsdata.asmx?WSDL';

try
{
    $client = new SoapClient($location, $options);
    $params = new stdClass;
    $params->MatchID = 626;
    $response = $client->GetMatchByMatchID($params);
}
catch (SoapFault $e)
{
    die($e->faultcode . ': ' . $e->faultstring);
}
catch (Exception $e)
{
    die($e->getCode() . ': ' . $e->getMessage());
}
echo "<pre>";
print_r($response->GetMatchByMatchIDResult);
echo "</pre>";

echo '<img src="'.$response->GetMatchByMatchIDResult->iconUrlTeam1.'"> '.$response->GetMatchByMatchIDResult->pointsTeam1.' : '.$response->GetMatchByMatchIDResult->pointsTeam2.' <img src="'.$response->GetMatchByMatchIDResult->iconUrlTeam2.'">';

