<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link type="text/css" href="css/le-frog/jquery-ui-1.8.17.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
		
<title>Tippspiel - Registration</title>
</head>

    <body  class="ui-widget">
    
    <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
    <div class="ui-dialog-buttonset ab-page-top-div" position="absolute" style="margin-left:30%;margin-right:30%;">
    <a class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" type="button" role="button" aria-disabled="false" href="index.php">Home</a>
    <a class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" type="button" role="button" aria-disabled="false" href="#">Tipps</a>
    <a class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" type="button" role="button" aria-disabled="false" href="#">Statistik</a>
    <a class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" type="button" role="button" aria-disabled="false" href="#">Impressum</a>
    </div>
    </div><br/>
    
    
    <?php
		if (isset($_GET["fehler"]) && $_GET["fehler"]==1){
			echo "<div class='ui-widget'>
					<div class='ui-state-error ui-corner-all' style='padding: 0 .7em;'> 
						<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span> 
						<strong>Alert:</strong>  Registrierungsdaten nicht korrekt!!
						</p>
					</div>
				</div>";
		}elseif(isset($_GET["fehler"]) && $_GET["fehler"]==2){
			echo "<div class='ui-widget'>
								<div class='ui-state-error ui-corner-all' style='padding: 0 .7em;'> 
									<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span> 
									<strong>Alert:</strong> Benutzername schon vergeben!!
									</p>
								</div>
							</div>";			
		}elseif (isset($_GET["fehler"]) && $_GET["fehler"]==3){
			echo "<div class='ui-widget'>
								<div class='ui-state-error ui-corner-all' style='padding: 0 .7em;'> 
									<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span> 
									<strong>Alert:</strong> Passwort zu kurz!! Das Passwort muss mindestens 6 Zeichen lang sein!!
									</p>
								</div>
							</div>";
		}elseif (isset($_GET["fehler"]) && $_GET["fehler"]==4){
			echo "<div class='ui-widget'>
								<div class='ui-state-error ui-corner-all' style='padding: 0 .7em;'> 
									<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span> 
									<strong>Alert:</strong> E-Mail Account schon vorhanden!!
									</p>
								</div>
							</div>";
		}elseif (isset($_GET["fehler"]) && $_GET["fehler"]==5){
			echo "<div class='ui-widget'>
								<div class='ui-state-error ui-corner-all' style='padding: 0 .7em;'> 
									<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span> 
									<strong>Alert:</strong> Passwort Wiederholung stimmt nicht mit dem Passwort Ÿberein!!
									</p>
								</div>
							</div>";		
		}elseif (isset($_GET["fehler"]) && $_GET["fehler"]==6){
				echo "<div class='ui-widget'>
									<div class='ui-state-error ui-corner-all' style='padding: 0 .7em;'> 
										<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span> 
										<strong>Alert:</strong> Fehler bei der Registrierung!!
										</p>
									</div>
								</div>";
		}
	?>
	
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
	<input class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" type="submit" value="Registrieren" />
	</form>
    </body>
</html>