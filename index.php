<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

<?php
 include_once 'logintemplate.php';
?>
<h2>Index Seite</h2>
Die geheime Index-Seite.<br />
<br />
<h3>Navigation</h3>
<ul>
	<li><a href="index.php<?php session::showLink(true);?>">Startseite</a></li>
	<li><a href="verwaltung.php<?php session::showLink(true);?>">Verwaltung</a></li>
	<li><?php $mylogin->showLogout();?></li>
</ul>


