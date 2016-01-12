﻿<?php
//
// contact.php
// Dit is de contactpagina van de webwinkel.
//

// Zet het niveau van foutmeldingen zo dat warnings niet getoond worden.
error_reporting(E_ERROR | E_PARSE);

// Zet de titel en laad de HTML header uit het externe bestand.
$page_title = 'Welkom op Tijd voor een box! - Contact';
$active = 6;	// Zorgt ervoor dat header.html weet dat dit het actieve menu-item is.
include ('includes/header.html');

 // Google analytics
 include_once("includes/analyticstracking.php");

// mysqli_connect.php bevat de inloggegevens voor de database.
// Per server is er een apart inlogbestand - localhost vs. remote server
// Dat maakt het gemakkelijk om je bestanden naar een remote server te verplaatsen.
//include ('includes/mysqli_connect_localhost.php');
include ('includes/mysqli_connect_webpages.avans.nl');
include ('includes/mysqli_connect_localhost.php');

//echo '<h1>Welkom op Tijdvooreenbox.nl!';
//echo '<h3>Het orgineelste kado!';

// Print een aangepast welkomstbericht wanneer de gebruiker bekend is.
if (isset($_SESSION['klantnaam'])) 
	echo "Welkom, ".$_SESSION['klantnaam']."</h1>!";
else echo "</h1>\n";	

// 
// Stap 1: maak verbinding met MySQL.
// Zorg ervoor dat MySQL (via XAMPP) gestart is.
//

include ('includes/home.html');

include ('includes/footer.html');



$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
 
// check connection
if (mysqli_connect_errno()) {
	printf("<p><b>Fout: verbinding met de database mislukt.</b><br/>\n%s</p>\n", mysqli_connect_error());
	exit();
}

// Opdracht: Maak de juiste SQL query die hier de informatie over onze producten gaat opleveren.
 
$sql = "SELECT * FROM Product"; 

// Voer de query uit en sla het resultaat op 
$result = mysqli_query($conn, $sql);
	
if($result === false) {
	echo "<p>Er zijn geen producten in de winkel gevonden.</p>\n";
} else {
	$num = 0;
	$num = mysqli_num_rows($result);
	echo "<p>Er zijn ".$num." producten gevonden.</p>\n";
}

// Laat de producten zien in een form, zodat de gebruiker ze kan selecteren.
// Haal een nieuwe regel op uit het resultaat, zolang er nog regels beschikbaar zijn.
// We gebruiken in dit geval een associatief array.
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
{
	echo "<!-- ---------------------------------- -->\n";
	echo "<div id=\"product\">\n<form action=\"add.php\" method=\"post\">\n";
	echo "<input type=\"hidden\" name=\"productnummer\" value=\"".$row["productid"]."\" />\n";
	echo "<input type=\"hidden\" name=\"prijs\" value=\"".$row["prijs"]."\" />\n";
	echo '<p><img id=\'plaatje\' src="showfile.php?image_id='.$row["image_id"].'"></p>';
	echo "<div id=\"prijs\">€ ".number_format($row["Prijs_Perstuk"], 2, ',', '.')."</div>\n";
	echo "<div id=\"prodnaam\">".$row["Naam"]."</div>\n";
	echo "<div id=\"beschrijving\">".$row["beschrijving"]."</div>\n";
	echo "<div id=\"leverbaar\">Leverbaar: ".$row["Leverbaar"]."</div>\n";
	echo "<div id=\"voorraad\">Voorraad: ".$row["Voorraad_aantal"]."</div>\n";
	echo "<div id=\"selecteer\">Aantal: <input type=\"number\" name=\"hoeveelheid\" size=\"2\" maxlength=\"2\" value=\"1\" min=\"1\" max=\"".$row["voorraad"]."\"/>";
	echo "<input type=\"submit\" value=\"Bestel\" class=\"button\"/></div>\n";
	echo "</form>\n</div>\n";
}

/* maak de resultset leeg */
mysqli_free_result($result);

/* sluit de connection */
mysqli_close($conn);


?>