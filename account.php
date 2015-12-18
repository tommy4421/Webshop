<?php
//index.php
//startscherm van de webwinkel

$page_title = 'Welkom in de WebWinkel';
include ('includes/header.html');

// mysqli_connect.php bevat de inloggegevens voor de database.
// Per server is er een apart inlogbestand - localhost vs. remote server
include ('includes/mysqli_connect_'.$_SERVER['SERVER_NAME'].'.php');

// Page header:
echo '<h1>Uw gegevens</h1>';

//Verbind met de database
$servername = "localhost";
$username = "bimivp2e4";
$password = "Welkom01";
$dbname = "avans_bimivp2e4";


$conn = mysqli_connect($servername, $username, $password, $dbname);

// check connection
if (mysqli_connect_errno()) {
	printf("<p><b>Fout: verbinding met de database mislukt.</b><br/>\n%s</p>\n", mysqli_connect_error());
	include ('includes/footer.html');
	exit();
}

if (empty($_SESSION['klantnr'])) {
	echo "<p>U bent niet ingelogd.</p>\n";
} else {
	$klantnr = $_SESSION['klantnr'];

	$sql = "SELECT `naam`, `adres`, `postcode`, `plaats`, `emailadres` FROM `klant` WHERE `klantnr`='".$klantnr."'";
	// Voer de query uit en sla het resultaat op 

	$result = mysqli_query($conn, $sql) or die (mysqli_error($conn)."<br>Error in file ".__FILE__." on line ".__LINE__);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	echo "<table>\n";
	echo "<tr><td id='links'>Naam</td> <td id='rechts'>".$row["naam"]."</td></tr>\n";
	echo "<tr><td id='links'>Adres</td><td id='rechts'>".$row["adres"]."</td></tr>\n";
	echo "<tr><td id='links'>Postcode</td><td id='rechts'>".$row["postcode"]."</td></tr>\n";
	echo "<tr><td id='links'>Plaats</td><td id='rechts'>".$row["plaats"]."</td></tr>\n";
	echo "<tr><td id='links'>Email</td><td id='rechts'>".$row["emailadres"]."</td></tr>\n";
	echo "<tr><td id='links'>Klantnr</td><td id='rechts'>".$klantnr."</td></tr>\n";
	echo "</table>\n";

}
// Sluit de connection
mysqli_close($conn);
include ('includes/footer.html');
?>