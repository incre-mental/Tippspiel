<?

function query($sql) {
	echo $sql."<br>";
	$fetch = array();
	$dblink = mysql_connect("localhost", "root", "") or die("Keine Verbindung mšglich: " . mysql_error());
	mysql_select_db("tippspiel") or die("Keine Verbindung mit DB1 mšglich!");
	$ergebnis = mysql_query($sql, $dblink) or die("Anfrage fehlgeschlagen: " . mysql_error());
	while($re = mysql_fetch_array($ergebnis, MYSQL_NUM)) {
	
		array_push($fetch,$re);
		
	}
	return $fetch;
};


echo time();

//$anfrage = 'SELECT * FROM `users` WHERE `email` = "'.addslashes($_POST['email']).'"';


$begegnung=1;

$r = query('Select Tore_Mannschaft_1, Tore_Mannschaft_2 from tippspiel.begegnung where ID = '.$begegnung);


//$num_rows = mysql_num_rows($ergebnis);
//$row_ergebnis = 

$row_tipps = query('Select TippM1, TippM2, User_ID from tippspiel.tipp where Begegnung_ID = '.$begegnung);


		foreach($row_tipps as $rt) {
			echo $r[0][0]."  ".$rt[0]."<br>";
			echo $r[0][1]."  ".$rt[1]."<br>";
			if (($r[0][0]==$rt[0]) AND ($r[0][1]==$rt[1])) {
			//	echo "3 Punkte<br>";
			}
			elseif (($r[0][0]-$r[0][1])==($rt[0]-$rt[1])) {
			//	echo "2 Punkte<br>";
			}
			elseif ((($r[0][0]>$r[0][1]) AND ($rt[0]>$rt[1])) OR (($r[0][0]<$r[0][1]) AND ($rt[0]<$rt[1]))) {
			//	echo "1 Punkt<br>";
			}else {
			//	echo "0 Puntke<br>";
			}
		}


