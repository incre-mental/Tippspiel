<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Tippspiel - Registration</title>
</head>
<style type="text/css">
.fehler {color:red}
</style>
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
	<form method="post" action="regaction.php">
	Benutzername*<br/>
	<input type="text" name="bname" size="30" />
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
	<input type="submit" value="Registrieren" />
	</form>
    </body>
</html>