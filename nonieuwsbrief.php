<?php
//
// nonieuwsbrief.php
// Dit is de pagina waar uitgeschreven kan worden voor de nieuwsbrief.
//

// Zet het niveau van foutmeldingen zo dat warnings niet getoond worden.
error_reporting(E_ERROR | E_PARSE);

// Zet de titel en laad de HTML header uit het externe bestand.
$page_title = 'Welkom op Tijd voor een box! - Nieuwsbrief uitschrijving';
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
	isset($_POST['email']) )
{
	// We gaan de errors in een array bijhouden
	// We kunnen dan alle foutmeldingen in een keer afdrukken.
	$aErrors = array();
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
		$email = "$_POST['email']";

		$sql = "DELETE FROM Nieuwsbrief WHERE email = ".$email;

		// Voer de query uit en vang fouten op 
		if( !mysqli_query($conn, $sql) ) {
			$aErrors['email'] = 'Dit e-mailadres is al uitgeschreven of is nooit ingeschreven geweest.';
		} else {
			// Sluit de connection
			mysqli_close($conn);

			echo 'U bent uitgeschreven voor de nieuwsbrief. U kunt ten alle tijde weer opnieuw inschrijven.<br />';
			include ('includes/footer.html');
			exit();
		}
	}
}
?>
<form action="nonieuwsbrief.php" method="post" class="formulier">
  <?php
  if ( isset($aErrors) and count($aErrors) > 0 ) {
		print '<ul class="errorlist">';
		foreach ( $aErrors as $error ) {
			print '<li>' . $error . '</li>';
		}
		print '</ul>';
  }
  ?>
  <p>Meld u hier af voor de nieuwsbrief.</p>
  <p><i>Indien u een account heeft, graag inloggen en bij accountoverzicht -> instellingen uw voorkeur aangeven.</i></p>
  <p><b>LET OP!</b> Op het moment dat u op 'Uitschrijven' klikt, zal u niet langer onze nieuwsbrief ontvangen. U kunt ten alle tijde weer opnieuw inschrijven. U krijgt geen bevestiging van uw uitschrijving per mail.</p>

  <fieldset>
	<legend>Uw gegevens</legend>
	<ol>
	   <?php echo isset($aErrors['email']) ? '<li class="error">' : '<li>' ?>
		<label for="email">E-mail<em>*</em></label>
		<input id="email" name="email" placeholder="mijnemail@site.nl" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" REQUIRED/>
	</ol>
	<input type="submit" value="Uitschrijven" class="button"/>
  </fieldset>
</form>
<?php	
include ('includes/footer.html');
?>