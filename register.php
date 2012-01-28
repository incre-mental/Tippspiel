<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<style type="text/css">
			.fehler {color:red}
		</style>
<link type="text/css" href="css/custom-theme/jquery-ui-1.8.17.custom.css" rel="Stylesheet" />	
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
<script type="text/javascript">
				$('#bname').datepicker();
</script>
<title>Tippspiel - Registration</title>
</head>

    <body>
    <?php
		if (isset($_GET["fehler"]) && $_GET["fehler"]==1){
			echo "<p class='fehler'> Registrierungsdaten nicht korrekt!!</p>";
		}elseif(isset($_GET["fehler"]) && $_GET["fehler"]==2){
			echo "<p class='fehler'> Benutzername schon vergeben!!</p>";
		}elseif (isset($_GET["fehler"]) && $_GET["fehler"]==3){
			echo "<p class='fehler'> Passwort zu kurz!!<br/>
					Das Passwort muss mindestens 6 Zeichen lang sein!!</p>";
		}elseif (isset($_GET["fehler"]) && $_GET["fehler"]==4){
			echo "<p class='fehler'> E-Mail Account schon vorhanden!!</p>";
		}elseif (isset($_GET["fehler"]) && $_GET["fehler"]==5){
			echo "<p class='fehler'> Passwort Wiederholung stimmt nicht mit dem Passwort Ÿberein!!</p>";
		}elseif (isset($_GET["fehler"]) && $_GET["fehler"]==6){
				echo "<p class='fehler'> Fehler bei der Registrierung!!</p>";
		}
	?>
	<ul id="buttonBar" class="ui-reset ui-clearfix ui-component ui-hover-state">
	<li><a href="#" class="ui-default-state">Home</a></li>
	<li><a href="#" class="ui-default-state">Tipps</a></li>
	<li><a href="#" class="ui-default-state">Statistik</a></li>
	<li><a href="#" class="ui-default-state">Impressum</a></li>
	</ul>
	
	<form method="post" action="regaction.php">
	Benutzername*<br/>
	<input type="text" name="bname" size="30" id="bname"/>
	<br/>
	E-Mail*<br/>
	<input type="text" name="email" size="30" />
	<br/>
	Vorname<br/>
	<input type="text" name="vorname" size="30" />
	<br/>
	Nachname*<br/>
	<input type="text" name="nachname" size="30" />
	<br/>
	Passwort*<br/>
	<input type="password" name="passwort" size="20" />
	<br/>
	Passwort Wiederholung*<br/>
	<input type="password" name="passwortw" size="20" />
	<br/>
	<input class="ui-default-state" type="submit" value="Registrieren" />
	</form>
    </body>
</html>