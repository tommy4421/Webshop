<?php
//index.php
//startscherm van de webwinkel
// Zet het niveau van foutmeldingen zo dat warnings niet getoond worden.
error_reporting(E_ERROR | E_PARSE);
$page_title = 'Tijdvooreenbox.nl ~ Login';
include ('includes/header.html');
// mysqli_connect.php bevat de inloggegevens voor de database.
// Per server is er een apart inlogbestand - localhost vs. remote server
//include ('includes/mysqli_connect_'.$_SERVER['SERVER_NAME'].'.php');
include ('includes/mysqli_connect_localhost.php');
include ('includes/mysqli_connect_webpages.avans.nl');

?>
<?php

// Deze code zorgt ervoor dat de ingevulde gegevens worden gebruikt als variabele email en wachtwoord

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (mysqli_connect_errno()) {
	printf("<p><b>Fout: verbinding met de database mislukt.</b><br/>\n%s</p>\n", mysqli_connect_error());
	include ('includes/footer.html');
	exit();
}

$email=$_POST['email'];
$wachtwoord=$_POST['wachtwoord'];

// Deze code selecteert het ledennummer dat bij de ingevulde gebruikersnaam hoort.
// De fetch array zorgt ervoor dat er als uitkomst van de query niet uitkomt 'resource id blabla', maar juist 
// de letterlijke uitkomst, dus het ledennnummer.

$naam1 = mysql_query("SELECT Naam FROM Klant where Email='$email'");
$naam2 = mysql_fetch_array($naam1);
$naam = ($naam2['naam']);

$klantid1 = mysql_query("SELECT KlantID FROM Klant WHERE Email='$email'");
$klantid2 = mysql_fetch_array($id1);
$klantid = ($klantid2['KlantID']);

$w8woord1 = mysql_query("SELECT Wachtwoord FROM Klant WHERE Email='$email'");
$w8woord2 = mysql_fetch_array($w8woord1);
$w8woord = ($w8woord2['wachtwoord']);

// Deze code is er om SQL Injections tegen te gaan. Zo kan 'vijandelijke' invoer geweigerd worden.
$email = stripslashes($email);
$wachtwoord = stripslashes($wachtwoord);
$email = mysql_real_escape_string($email);
$wachtwoord = mysql_real_escape_string($wachtwoord);

// Deze code tel de rijen die er uit de query komen. Als de uitkomst precies 1 is, betekent dit dat de
// ingevulde gebruikersnaam en wachtwoord de juiste combinatie zijn, en dus dat de gegevens kloppen
$sql="SELECT * FROM Klant WHERE Email='$email' and Wachtwoord='$wachtwoord'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);

$adminquery="SELECT * FROM Klant WHERE Email='$email' and Wachtwoord='$wachtwoord'";
$resultaat=mysql_query($adminquery);


// Deze code checkt of de ingevulde gegevens kloppen, en hij checkt of de gebruiker een admin is.
// Als de gebruiker een admin is, wordt dit opgeslagen met Session['admin'].
// De gebruikersnaam en het lidnummer van de gebruiker worden ook in de sessie opgeslagen
// Mocht er iets niet kloppen, dan wordt de gebruiker terug gestuurd naar het inlogscherm
  if (mysql_num_rows($resultaat) > 0 ){
        $admin=mysql_fetch_array($resultaat);

		session_start();
		$_SESSION['klantnr'] = $klantid;
		$_SESSION['Naam'] = $naam;
		$_SESSION['Email'] = $email;
		$_SESSION['loggedin'] = true;
		
        if ($admin['Admin'] == 1) {
            $_SESSION['Admin'] = 1;
			
			header ("Location:beheer.php");
        } else  {
            header ("Location:login_success.php");
            $_SESSION['Admin'] = 0;
        } 
		
		} else  {
		header("refresh: 0; url=logindenied.php");
		
        }

?>

<?php



include ('includes/footer.html');

?>
