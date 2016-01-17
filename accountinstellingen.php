<?php
//index.php
//startscherm van de webwinkel
// Zet het niveau van foutmeldingen zo dat warnings niet getoond worden.
error_reporting(E_ERROR | E_PARSE);
$page_title = 'Tijdvooreenbox.nl ~ ';
include ('includes/header.html');
// mysqli_connect.php bevat de inloggegevens voor de database.
// Per server is er een apart inlogbestand - localhost vs. remote server
//include ('includes/mysqli_connect_'.$_SERVER['SERVER_NAME'].'.php');
include ('includes/mysqli_connect_localhost.php');

ob_start();


session_start();
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {;
} else {
    header("location: login.php");
}

?>
 
 <?php

$gebruikersnaam = "bimivp2e4";
$wachtwoord = "Welkom01";
$host = "localhost";
$database = "avans_bimivp2e4";
$tabel = 'Klant';
$idi = "$_SESSION[klantnr]";

mysql_connect("$host", "$gebruikersnaam", "$wachtwoord")or die("Het is niet gelukt om te verbinden met MYSQL!");
mysql_select_db("$database")or die("De database kan niet worden geselecteerd!");

$naaminstelling1 = mysql_query("SELECT Naam FROM $tabel WHERE KlantID='$idi'");
$naaminstelling2 = mysql_fetch_array($naaminstelling1);
$naaminstelling = ($naaminstelling2['Naam']);

$adresinstelling1 = mysql_query("SELECT Adres FROM $tabel WHERE KlantID='$idi'");
$adresinstelling2 = mysql_fetch_array($adresinstelling1);
$adresinstelling = ($adresinstelling2['Adres']);

$postcodeinstelling1 = mysql_query("SELECT postcode FROM $tabel WHERE KlantID='$idi'");
$postcodeinstelling2 = mysql_fetch_array($postcodeinstelling1);
$postcodeinstelling = ($postcodeinstelling2['postcode']);

$plaatsinstelling1 = mysql_query("SELECT plaats FROM $tabel WHERE KlantID='$idi'");
$plaatsinstelling2 = mysql_fetch_array($plaatsinstelling1);
$plaatsinstelling = ($plaatsinstelling2['plaats']);

$wachtwoordinstelling1 = mysql_query("SELECT wachtwoord FROM $tabel WHERE KlantID='$idi'");
$wachtwoordinstelling2 = mysql_fetch_array($wachtwoordinstelling1);
$wachtwoordinstelling = ($wachtwoordinstelling2['wachtwoord']);

$emailinstelling1 = mysql_query("SELECT Email FROM $tabel WHERE KlantID='$idi'");
$emailinstelling2 = mysql_fetch_array($emailinstelling1);
$emailinstelling = ($emailinstelling2['email']);

?>
 
 
<center>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="formulier">
      <fieldset>
        
        <legend><h1>Account instellingen</h1></legend>
        <i><b>Let op!</b> Uw postcode mag geen spatie bevatten, dus 1234AB.</i><br />
        <ol>
          <li>
            <label for="naam">Naam</label>
            <input id="naam" name="naam" value="<?php echo "$naaminstelling"; ?>" REQUIRED/>
          </li>
		  <li>
            <label for="adres">Adres</label>
            <input id="adres" name="adres" value="<?php echo "$adresinstelling"; ?>" REQUIRED/>
          </li>
		  <li>
            <label for="postcode">Postcode</label>
            <input id="postcode" name="postcode" value="<?php echo "$postcodeinstelling"; ?>" REQUIRED/>
          </li>
		  <li>
            <label for="plaats">Plaats</label>
            <input id="plaats" name="plaats" value="<?php echo "$plaatsinstelling"; ?>" REQUIRED/>
          </li>
		  <li>
            <label for="wachtwoord">Wachtwoord</label>
            <input id="wachtwoord" name="wachtwoord" value="<?php echo "$wachtwoordinstelling"; ?>" REQUIRED/>
          </li>
           <li>
            <label for="email">E-mailadres</label>
            <input id="email" name="email" value="<?php echo "$emailinstelling"; ?>" REQUIRED/>
          </li>
        </ol>
        <input type="submit" value="Sla wijzigingen op" class="button"/>
      </fieldset>
    </form>
	
	<?php  
    
	
	if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
	
		$naam = $_POST['naam'];
		$wachtwoord = $_POST['wachtwoord'];
		$plaats = $_POST['plaats'];
		$postcode = $_POST['postcode'];
		$adres = $_POST['adres'];
		$email = $_POST['email'];
	
			if(!isset($naam) || trim($naam) == '' ||!isset($adres) || trim($adres) == '' ||!isset($postcode) || trim($postcode) == '' ||!isset($plaats) || trim($plaats) == '' ||!isset($wachtwoord) || trim($wachtwoord) == '' ||!isset($email) || trim($email) == '') {
				echo "U heeft niet alles ingevuld. De wijzigingen zijn NIET opgeslagen.";
			}
			else
			{
				
				$gebruikersnaam = "bimivp2e4";
				$wachtwoord = "Welkom01";
				$host = "localhost";
				$database = "avans_bimivp2e4";
				$tabel = 'Klant';
				$idi = "$_SESSION[klantnr]";
				
				$conn = new mysqli($host, $gebruikersnaam, $wachtwoord, $database);

				if ($conn->connect_error) {
				die("Kan geen verbinding maken: " . $conn->connect_error);
			} 
				
				$sql = "UPDATE $tabel SET Naam='$naam', Wachtwoord='$wachtwoord', Plaats='$plaats', Postcode='$postcode', Adres='$adres' WHERE KlantID='$idi'";

				if ($conn->query($sql) === TRUE) {
					$pass = $_POST['wachtwoord'];
			$subject = "Uw nieuwe gegevens bij Tijdvooreenbox.nl";
			$message = "Beste $naam,
			
U heeft uw gegevens met succes gewijzigd. Uw gegevens zijn nu:
 
------------------------
Naam: $naam
Adres: $adres
Postcode: $postcode
Plaats: $plaats
Wachtwoord: $pass
E-mailadres: $email
------------------------
 
Veel plezier in onze Webshop!

Namens het team van Tijdvooreenbox.nl";
			$from = "noreply@tijdvooreenbox.nl";
			$headers = "From: $from";
			mail($email,$subject,$message,$headers);
				echo "De gegevens zijn succesvol opgeslagen!";
				header("refresh: 1; url=accountinstellingen.php");			
				
				} else {
				echo "Er is iets fout gegaan: " . $conn->error;
				}


			}
	
	
	
	
	}

	




	

	?>

<?php	
	
	include ('includes/footer.html');
?>
