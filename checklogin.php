<?php
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
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$email=$_POST['email'];
$wachtwoord=$_POST['wachtwoord'];

// Maak de SQL query die onze bestellingen gaat opleveren.
$sql = "SELECT * FROM `Klant` WHERE `Email`='$email' and `Wachtwoord`='$wachtwoord';"; 
$result = $conn->query($sql);
$count=mysql_num_rows($result);
// Voer de query uit en sla het resultaat op 
		// Voer de query uit en vang fouten op 
if (mysql_num_rows($count) > 0 ){
	echo "Test";
				}
else 
				{ echo"Nope";
				}

/* maak de resultset leeg */
mysqli_free_result($result);

/* sluit de connection */
mysqli_close($conn);

include ('includes/footer.html');
?>
