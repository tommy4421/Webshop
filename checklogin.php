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

// Zet het niveau van foutmeldingen zo dat warnings niet getoond worden.
error_reporting(E_ERROR | E_PARSE);

// Stap 1: maak verbinding met MySQL.
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (mysqli_connect_errno()) {
	printf("<p><b>Fout: verbinding met de database mislukt.</b><br/>\n%s</p>\n", mysqli_connect_error());
	include ('includes/footer.html');
	exit();
}

$email=$_POST['email'];
$wachtwoord=$_POST['wachtwoord'];

// Maak de SQL query die onze bestellingen gaat opleveren.
$sql = "SELECT * FROM `Klant` WHERE `Email`='$email';"; 

$naam1 = mysql_query("SELECT `Naam` FROM `Klant` WHERE `Email`='$email'");"; 
$naam2 = mysql_fetch_array($naam1);
$naam = ($naam2['naam']);

$klantnr1 = mysql_query("SELECT KlantID FROM Klant WHERE Email='$email'");
$klantnr2 = mysql_fetch_array($id1);
$klantnr = ($klantnr2['KlantID']);

$w8woord1 = mysql_query("SELECT Wachtwoord FROM Klant WHERE Email='$email'");
$w8woord2 = mysql_fetch_array($w8woord1);
$w8woord = ($w8woord2['wachtwoord']);

echo "$naam";
/* maak de resultset leeg */
mysqli_free_result($result);

/* sluit de connection */
mysqli_close($conn);

include ('includes/footer.html');
?>
