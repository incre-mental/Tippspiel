<?php
include_once 'logintemplate.php';
?>

<?php
include_once 'header.php';
?>
<div style="margin-left:95%"><?php $mylogin->showLogout();?></div>
<h1>Willkommen <?php echo htmlspecialchars($_GET['username']);?>!</h1>
<h2>Tippspiel AG</h2><br />
Wetten, dass...<br />
<br />
<h3>Navigation</h3>
<ul>
	<li><a href="index.php<?php session::showLink(true);?>">Startseite</a></li>
	<li><a href="tippeingabe.php<?php session::showLink(true);?>">Tippeingabe</a></li>
	<li><a href="ranking.php<?php session::showLink(true);?>">Statistik</a></li>
</ul>

