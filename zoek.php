<?php
//index.php
//startscherm van de webwinkel
// Zet het niveau van foutmeldingen zo dat warnings niet getoond worden.
error_reporting(E_ERROR | E_PARSE);
$page_title = 'Tijdvooreenbox.nl ';
include ('includes/header.html');
// mysqli_connect.php bevat de inloggegevens voor de database.
// Per server is er een apart inlogbestand - localhost vs. remote server
//include ('includes/mysqli_connect_'.$_SERVER['SERVER_NAME'].'.php');
include ('includes/mysqli_connect_localhost.php');

?>


<?php

$gebruikersnaam = "bimivp2e4";
$wachtwoord = "Welkom01";
$host = "localhost";
$database = "avans_bimivp2e4";
$tabel = 'Klant';

mysql_connect("$host", "$gebruikersnaam", "$wachtwoord")or die("Het is niet gelukt om te verbinden met MYSQL!");
mysql_select_db("$database")or die("De database kan niet worden geselecteerd!");

$zoekterm = $_POST['zoekveld'];
$sql = "SELECT * FROM Product WHERE Naam LIKE '%".$zoekterm."%'";
$result = mysqli_query($conn, $sql);
	
if($result === false) {
	echo "<p>Er zijn geen producten gevonden.</p>\n";
} else {
	$num = 0;
	$num = mysqli_num_rows($result);
	echo "<p>Er zijn ".$num." producten gevonden.</p>\n";
}

if(!isset($zoekterm) || trim($zoekterm) == '') {
				echo "<h1><center>U heeft geen zoekterm ingevuld.</h1></center>";
			}
			else
			{
				echo "<center><h1>U heeft gezocht naar: $zoekterm </h1></center>";
			   
			 			   
$sql = "SELECT * FROM Product WHERE Naam LIKE '%".$zoekterm."%'";
$r_query = mysql_query($sql);

while($query2=mysql_fetch_array($r_query))
{
	echo "<!-- ---------------------------------- -->\n";
	echo "<!-- ---------------------------------- -->\n";
	echo "<div id=\"product\">\n<form action=\"add.php\" method=\"post\">\n";
	echo "<input type=\"hidden\" name=\"productid\" value=\"".$query2["ProductID"]."\" />\n";
	echo "<input type=\"hidden\" name=\"prijs\" value=\"".$query2["prijs"]."\" />\n";
	echo '<p><center><img id=\'plaatje\' src="showfile.php?ImageID='.$query2["ProductID"].'"></center></p>';
	echo "<div id=\"prijs\">€ ".number_format($query2["Prijs_Perstuk"], 2, ',', '.')."</div>\n";
	echo "<div id=\"prodnaam\">".$query2["Naam"]."</div>\n";
	echo "<div id=\"beschrijving\"><p>".$query2["Beschrijving"]."</p></div>\n";
	echo "<div id=\"leverbaar\"><p>Leverbaar: <b>".$query2["Leverbaar"]."</b></p></div>\n";
	echo "<div id=\"voorraad\"><p>Voorraad: <b>".$query2["Voorraad_aantal"]."</b></p></div><br />\n";
	echo "<br /><br /><div id=\"selecteer\"><p>Aantal: <input type=\"number\" name=\"hoeveelheid\" size=\"2\" maxlength=\"2\" value=\"1\" min=\"1\" max=\"".$query2["Voorraad_aantal"]."\"/></p>";
	echo "<center><input type=\"submit\" value=\"Bestel\" class=\"button\"/></div>\n</center>";
	echo "</form>\n</div>\n";
}


}
			
			
			
			





?>


