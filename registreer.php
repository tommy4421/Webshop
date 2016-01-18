<?php
//index.php
//startscherm van de webwinkel
ob_start();
$page_title = 'Tijdvooreenbox.nl Registratie';
include ('includes/header.html');

// mysqli_connect.php bevat de inloggegevens voor de database.
// Per server is er een apart inlogbestand - localhost vs. remote server
//include ('includes/mysqli_connect_'.$_SERVER['SERVER_NAME'].'.php');
include ('includes/mysqli_connect_localhost.php');

// Page header:
echo '<h1>Registreren</h1>';

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
	isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['adres'], $_POST['towncity'], $_POST['postcode']) )
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

	//  Een adres heeft letters, cijfers, spaties (minimaal 5)
	if ( !isset($_POST['adres']) or !preg_match( '~^[\w\d ]{5,}$~', $_POST['adres'] ) ) {
		$aErrors['adres'] = 'Het adres is onjuist.';
	}

	//  Een plaatsnaam heeft letters, spaties en misschien een apostrof
	if ( !isset($_POST['towncity']) or !preg_match( '~^[\w\d\' ]*$~', $_POST['towncity'] ) ) {
		$aErrors['towncity'] = 'De stad is onjuist';
	}

	//  Een postcode heeft vier cijfers, eventueel een spatie, en twee cijfers
	if ( !isset($_POST['postcode']) or !preg_match( '~^\d{4} ?[a-zA-Z]{2}$~', $_POST['postcode'] ) ) {
		$aErrors['postcode'] = 'De postcode is onjuist';
	}

	// wachtwoord (minimaal 3)
	if ( !isset($_POST['password']) or !preg_match( '~^[\w ]{3,}$~', $_POST['password'] ) ) {
	$aErrors['password'] = 'Geen wachtwoord ingevuld.';
	}

	if ( count($aErrors) == 0 ) 
	{
		// Gebruiker in database registreren.
		$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
		}

		$sql = "INSERT INTO Klant (`naam`, `adres`, `postcode`, `plaats`, `email`, `wachtwoord`, `nieuwsbrief`) VALUES ".
				"('".$_POST['name']."', '".$_POST['adres']."', '".$_POST['postcode']."', '".$_POST['towncity']."', '".$_POST['email']."', '".$_POST['password']."', '".$_POST['nieuwsbrief']."');";

		// Voer de query uit en vang fouten op 
		
		$emailvariabele = $_POST['email'];
		$sql2=mysql_query("SELECT * FROM Klant WHERE Email='$emailvariabele'");
 		if(mysql_num_rows($sql2)>=1)
   		{
	 	echo"Dit emailadres is al geregistreerd.";
   		}
 		else
    		{
   		
		 
		
		
		if( !mysqli_query($conn, $sql) ) {
			$aErrors['email'] = 'Registratie mislukt, email adres bestaat al.';
		} else {
			$klant = $_POST['name'];
			$to = $_POST['email'];
			$pass = $_POST['password'];
			$subject = "Registratie Tijdvooreenbox.nl";
			$message = "Beste $klant,
			
Bedankt voor het registreren bij Tijdvooreenbox.nl! U kunt inloggen met onderstaande gegevens:
 
------------------------
E-mailadres: $to
Wachtwoord: $pass
------------------------
 
Veel plezier in onze Webshop!

Namens het team van Tijdvooreenbox.nl";
			$from = "noreply@tijdvooreenbox.nl";
			$headers = "From: $from";
			mail($to,$subject,$message,$headers);
			
			// Met myslqi_insert_id krijg je de id van het autoincrement veld terug - het klantnr.
			$klantnr = mysqli_insert_id($conn); 
			
			$_SESSION['klantnr'] = $klantnr;
			$_SESSION['klantnaam'] = $_POST["name"];
		
			// Sluit de connection
			mysqli_close($conn);

			header('Location: account.php');
			exit();
		}
	}
}
?>
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>
<form action="registreer.php" method="post" class="formulier">
  <?php
  if ( isset($aErrors) and count($aErrors) > 0 ) {
		print '<ul class="errorlist">';
		foreach ( $aErrors as $error ) {
			print '<li>' . $error . '</li>';
		}
		print '</ul>';
  }
  ?>
  <p>Vul het onderstaande formulier in. De velden met een <em>*</em> zijn verplicht.</p>

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
	  <?php echo isset($aErrors['adres']) ? '<li class="error">' : '<li>' ?>
		<label for="adres">Adres<em>*</em></label>
		<input id="adres" name="adres" placeholder="Mijn staat 101" value="<?php echo isset($_POST['adres']) ? htmlspecialchars($_POST['adres']) : '' ?>" REQUIRED/>
	  </li>
	  <?php echo isset($aErrors['postcode']) ? '<li class="error">' : '<li>' ?>
		<label for="postcode">Postcode<em>*</em></label>
		<input id="postcode" name="postcode" placeholder="1234AB" value="<?php echo isset($_POST['postcode']) ? htmlspecialchars($_POST['postcode']) : '' ?>" REQUIRED/>
	  </li>
	  <?php echo isset($aErrors['towncity']) ? '<li class="error">' : '<li>' ?>
		<label for="towncity">Plaats<em>*</em></label>
		<input id="towncity" name="towncity" placeholder="Mijnplaats" value="<?php echo isset($_POST['towncity']) ? htmlspecialchars($_POST['towncity']) : '' ?>" REQUIRED/>
	  </li>
	  <?php echo isset($aErrors['password']) ? '<li class="error">' : '<li>' ?>
		<label for="password">Wachtwoord<em>*</em></label>
		<input id="password" name="password" type="password" placeholder="wachtwoord" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '' ?>" REQUIRED/>
        <label for="nieuwsbrief">Nieuwsbrief<em>*</em></label><br />
          <label>
            <input type="radio" name="nieuwsbrief" value="ja" checked="checked" REQUIRED/>
            ja</label>
          <label>
            <input type="radio" name="nieuwsbrief" value="nee"/>
            nee</label>
          <br />
          <i>Let op: De postcode mag geen spatie bevatten, dus 1234AB.</i>
          <br />
</li>
	</ol>
	<input type="submit" value="Verstuur" class="button"/>
  </fieldset>
</form>
<?php	
	}
include ('includes/footer.html');
?>
