<?php
//
// beheer.php
//
ob_start();
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

$email=$_POST['email'];
$wachtwoord=$_POST['wachtwoord'];

if(!isset($email) || trim($email) == '')
{
   echo "U bent vergeten uw email in te vullen.";
}

if(!isset($wachtwoord) || trim($wachtwoord) == '')
{
   echo "U bent vergeten uw wachtwoord in te vullen.";
}

// Stap 1: maak verbinding met MySQL.
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (mysqli_connect_errno()) {
	printf("<p><b>Fout: verbinding met de database mislukt.</b><br/>\n%s</p>\n", mysqli_connect_error());
	include ('includes/footer.html');
	exit();
}

$host = 'localhost';
$username = 'bimivp2e4';
$password = 'Welkom01';
$db_name = 'avans_bimivp2e4';

mysql_connect("$host", "$username", "$password")or die("Kan niet verbinden met de database!"); 
mysql_select_db("$db_name")or die("Kan geen database selecteren!");

$email = stripslashes($email);
$wachtwoord = stripslashes($wachtwoord);
$email = mysql_real_escape_string($email);
$wachtwoord = mysql_real_escape_string($wachtwoord);

// Maak de SQL query die onze bestellingen gaat opleveren.

$query="SELECT * FROM Klant WHERE Email='$email' and Wachtwoord='$wachtwoord'";
$resultaat=mysql_query($query);

if (mysql_num_rows($resultaat) <= 0 ){

header("Location: logindenied.php");

}
elseif (mysql_num_rows($resultaat) > 0 ){

	
header("Location: login_success.php");

}

/* maak de resultset leeg */
mysqli_free_result($result);

/* sluit de connection */
mysqli_close($conn);

?>


