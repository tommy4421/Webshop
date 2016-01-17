﻿<?php
//
// nieuwsbrief.php
// Dit is de pagina waar ingeschreven kan worden voor de nieuwsbrief.
//

// Zet het niveau van foutmeldingen zo dat warnings niet getoond worden.
error_reporting(E_ERROR | E_PARSE);

// Zet de titel en laad de HTML header uit het externe bestand.
$page_title = 'Welkom op Tijd voor een box! - Nieuwsbrief inschrijving';
$active = 1;	// Zorgt ervoor dat header.html weet dat dit het actieve menu-item is.
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
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
 
// check connection
if (mysqli_connect_errno()) {
	printf("<p><b>Fout: verbinding met de database mislukt.</b><br/>\n%s</p>\n", mysqli_connect_error());
	include ('includes/footer.html');
	exit();
}

// Deze pagina toont zelf de foutmeldingen wanneer een van de velden
// in het formulier niet juist is ingevuld. De volgende code
// toont deze meldingen.
if ( $_SERVER['REQUEST_METHOD'] == 'POST' &&
	isset($_POST['name'], $_POST['email']) )
{
	// We gaan de errors in een array bijhouden
	// We kunnen dan alle foutmeldingen in een keer afdrukken.
	$aErrors = array();

	//  Een naam bevat letters en spaties (minimaal 3)
	if ( !isset($_POST['name']) or !preg_match( '~^[\w ]{3,}$~', $_POST['name'] ) ) {
		$aErrors['name'] = 'Uw naam is niet juist ingevuld';
	}

	//  Een email-adres is wat ingewikkelder
	if ( !isset($_POST['email']) or !preg_match( '~^[a-z0-9][a-z0-9_.\-]*@([a-z0-9]+\.)*[a-z0-9][a-z0-9\-]+\.([a-z]{2,6})$~i', $_POST['email'] ) ) {
		$aErrors['email'] = 'Het e-mail adres is onjuist.';
	}

	if ( count($aErrors) == 0 ) 
	{
		// Gebruiker in database registreren.
		$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
		}

		$sql = "INSERT INTO Nieuwsbrief (`naam`, `email`) VALUES ".
				"('".$_POST['name']."', '".$_POST['email']."');";

		// Voer de query uit en vang fouten op 
		if( !mysqli_query($conn, $sql) ) {
			$aErrors['email'] = 'Registratie mislukt, email adres bestaat al.';
		} else {
			$klant = $_POST['name'];
			$to = $_POST['email'];
			$subject = "Nieuwsbriefaanmelding Tijdvooreenbox.nl";
			$message = "Beste $klant,
			
Bedankt voor het het inschrijven voor de nieuwsbrief van Tijdvooreenbox.nl!

Is deze inschrijving niet door u zelf gedaan of heeft u toch besloten dat u de nieuwsbrief niet wilt ontvangen? Klik dan op onderstaande link:
http://www.tijdvooreenbox.nl/nonieuwsbrief.php.
 
Veel plezier in onze Webshop!

Namens het team van Tijdvooreenbox.nl";
			$from = "noreply@tijdvooreenbox.nl";
			$headers = "From: $from";
			mail($to,$subject,$message,$headers);
			
		
			// Sluit de connection
			mysqli_close($conn);

			echo 'Bedankt voor uw inschrijving!<br />';
			include ('includes/footer.html');
			exit();
		}
	}
}
?>
<form action="nieuwsbrief.php" method="post" class="formulier">
  <?php
  if ( isset($aErrors) and count($aErrors) > 0 ) {
		print '<ul class="errorlist">';
		foreach ( $aErrors as $error ) {
			print '<li>' . $error . '</li>';
		}
		print '</ul>';
  }
  ?>
  <p>Meld u hier aan voor de nieuwsbrief.</p><br />
  <i>Indien u een account heeft, graag inloggen en bij accountoverzicht -> instellingen uw voorkeur aangeven.</i><br /><br />

  <fieldset>
	<legend>Uw gegevens</legend>
	<ol>
	  <?php echo isset($aErrors['name']) ? '<li class="error">' : '<li>' ?>
		<label for="name">Volledige naam<em>*</em></label>
		<input id="name" name="name" placeholder="Jan Klaassen" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>" REQUIRED/>
	  </li>
	  <?php echo isset($aErrors['email']) ? '<li class="error">' : '<li>' ?>
		<label for="email">E-mail<em>*</em></label>
		<input id="email" name="email" placeholder="mijnemail@site.nl" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" REQUIRED/>
	  </li>
	</ol>
	<input type="submit" value="Verstuur" class="button"/>
  </fieldset>
</form>
<?php	
include ('includes/footer.html');
?>
