<?php
include_once 'logintemplate.php';
?>

<?php
include_once 'header.php';
?>

<h1>Willkommen <?php echo htmlspecialchars($_GET['username']);?>!</h1>
<h2></h2>Die geheime Willkommen-Seite.</h2><br />
<br />
<h3>Navigation</h3>
<ul>
	<li><a href="index.php<?php session::showLink(true);?>">Startseite</a></li>
	<li><a href="tippeingabe.php<?php session::showLink(true);?>">Tippeingabe</a></li>
	<li><?php $mylogin->showLogout();?></li>
</ul>

