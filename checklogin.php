﻿<?php
//
// beheer.php
//

// Zet het niveau van foutmeldingen zo dat warnings niet getoond worden.
error_reporting(E_ERROR | E_PARSE);

// Zet de titel en laad de HTML header uit het externe bestand.
$page_title = 'Tijdvooreenbox.nl ~ Login';
include ('includes/header.html');

// mysqli_connect.php bevat de inloggegevens voor de database.
// Per server is er een apart inlogbestand - localhost vs. remote server
//include ('includes/mysqli_connect_'.$_SERVER['SERVER_NAME'].'.php');
include ('includes/mysqli_connect_webpages.avans.nl');
include ('includes/mysqli_connect_localhost.php');

 // Google analytics
 include_once("includes/analyticstracking.php");

// Zet het niveau van foutmeldingen zo dat warnings niet getoond worden.
error_reporting(E_ERROR | E_PARSE);

// Stap 1: maak verbinding met MySQL.
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (mysqli_connect_errno()) {
	printf("<p><b>Fout: verbinding met de database mislukt.</b><br/>\n%s</p>\n", mysqli_connect_error());
	include ('includes/footer.html');
	exit();
}


$email='kjneeter@avans.nl';
// Maak de SQL query die onze bestellingen gaat opleveren.
$sql = "SELECT * FROM `klant` WHERE `email`='$email';"; 

// Voer de query uit en sla het resultaat op 
		// Voer de query uit en vang fouten op 
if( !($result = mysqli_query($conn, $sql)) ) {
	echo "<p>Geen resultaten gevonden.</p>\n";
} else {
	// We zoeken één klant, dus slechts één row is nodig.
	$row = mysqli_fetch_array($result);

	echo "<table>\n" ;
	echo "<tr><td>Naam</td><td>".$row["naam"]."</td></tr>\n" ;
	echo "</table>\n" ;
}


/* maak de resultset leeg */
mysqli_free_result($result);

/* sluit de connection */
mysqli_close($conn);

include ('includes/footer.html');
?>
