﻿<?php
//index.php
//startscherm van de webwinkel
ob_start();

$page_title = 'Welkom in de WebWinkel';
include ('includes/header.html');

 // Google analytics
 include_once("includes/analyticstracking.php");
 
// mysqli_connect.php bevat de inloggegevens voor de database.
// Per server is er een apart inlogbestand - localhost vs. remote server
//include ('includes/mysqli_connect_'.$_SERVER['SERVER_NAME'].'.php');
include ('includes/mysqli_connect_webpages.avans.nl');
include ('includes/mysqli_connect_localhost.php');

// Page header:
echo '<center><h1>Uw gegevens</h1></center>';

//
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// check connection
if (mysqli_connect_errno()) {
	printf("<p><b>Fout: verbinding met de database mislukt.</b><br/>\n%s</p>\n", mysqli_connect_error());
	include ('includes/footer.html');
	exit();
}

if (empty($_SESSION['klantnr'])) {
	echo "<center><p>U bent niet ingelogd.</p></center>\n";
} else {
	$klantnr = $_SESSION['klantnr'];

	$sql = "SELECT `naam`, `adres`, `postcode`, `plaats`, `email` FROM Klant WHERE `klantID`='".$klantnr."'";
	// Voer de query uit en sla het resultaat op 
	
	$result = mysqli_query($conn, $sql) or die (mysqli_error($conn)."<br>Error in file ".__FILE__." on line ".__LINE__);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	echo "<center><table>\n";
	echo "<tr><td id='links'>Naam</td> <td id='rechts'>".$row["naam"]."</td></tr>\n";
	echo "<tr><td id='links'>Adres</td><td id='rechts'>".$row["adres"]."</td></tr>\n";
	echo "<tr><td id='links'>Postcode</td><td id='rechts'>".$row["postcode"]."</td></tr>\n";
	echo "<tr><td id='links'>Plaats</td><td id='rechts'>".$row["plaats"]."</td></tr>\n";
	echo "<tr><td id='links'>Email</td><td id='rechts'>".$row["email"]."</td></tr>\n";
	echo "<tr><td id='links'>Klantnr</td><td id='rechts'>".$klantnr."</td></tr>\n";
	echo "</table><br />\n";
	echo "<br /><a href=\"javascript:history.go(-1)\">Klik hier om terug te gaan!</a></center><br />";



}
// Sluit de connection
mysqli_close($conn);
include ('includes/footer.html');
?>