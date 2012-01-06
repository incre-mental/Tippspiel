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