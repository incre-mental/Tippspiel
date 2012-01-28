<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link type="text/css" href="css/le-frog/jquery-ui-1.8.17.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>

<?php
 include_once 'logintemplate.php';
?>
<title>Tippspiel - Start</title>
<body  class="ui-widget">

   <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
    <div class="ui-dialog-buttonset ab-page-top-div" position="absolute" style="margin-left:30%;margin-right:30%;">
    <a class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" type="button" role="button" aria-disabled="false" href="index.php">Home</a>
    <a class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" type="button" role="button" aria-disabled="false" href="#">Tipps</a>
    <a class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" type="button" role="button" aria-disabled="false" href="#">Statistik</a>
    <a class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" type="button" role="button" aria-disabled="false" href="#">Impressum</a>
    </div>
    </div><br/>

<h1>Willkommen <?php echo $mylogin->getUserName();?>!</h1>
<h2>Index Seite</h2>
Die geheime Index-Seite.<br />
<br />
<h3>Navigation</h3>
<ul>
	<li><a href="index.php<?php session::showLink(true);?>">Startseite</a></li>
	<li><a href="tippeingabe.php<?php session::showLink(true);?>">Tippeingabe</a></li>
	<li><?php $mylogin->showLogout();?></li>
</ul>
</body>
</html>


