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
    if(!$_SESSION["Admin"] == 1){
     header("location: index.php");
    exit;
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

?>
 
 
<center>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="formulier">
      <fieldset>
        
        <legend><h1>Product toevoegen</h1></legend>
        <i><b>Let op!</b> Het plaatje dient hetzelfde ID nummer te hebben als het product.</i><br />
        <ol>
          <li>
            <label for="naam">Naam</label>
            <input id="naam" name="naam" value="" REQUIRED/>
          </li>
		  <li>
            <label for="naam">Beschrijving</label>
            <input id="beschrijving" name="beschrijving" REQUIRED/>
          </li>
		  <li>
            <label for="houdbaarheidsdatum">Houdbaarheidsdatum</label>
            <input id="houdbaarheidsdatum" format="yyyy/MM/dd" type="date" name="houdbaarheidsdatum" REQUIRED/>
          </li>
		  <li>
            <label for="provincie">Provincie</label>
            <input id="provincie" name="provincie" REQUIRED/>
          </li>
		  <li>
            <label for="voorraad">Voorraad aantal</label>
            <input id="voorraad" name="voorraad" REQUIRED/>
          </li>
           <li>
            <label for="prijs">Prijs per stuk</label>
            <input id="prijs" name="prijs" REQUIRED/>
            </li>
            <li>
            <label for="leverbaar">Leverbaar<em>*</em></label><br />
          <label>
            <input type="radio" name="leverbaar" value="Ja" checked="checked" REQUIRED/>
            Ja</label>
          <label>
            <input type="radio" name="leverbaar" value="Nee"/>
            Nee</label>
          </li>
        </ol>
        <input type="submit" value="Voeg product toe" class="button"/>
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
				
				$sql = "UPDATE $tabel SET Naam='$naam', Wachtwoord='$wachtwoord', Plaats='$plaats', Postcode='$postcode', Adres='$adres' Nieuwsbrief='$nieuwsbrief' WHERE KlantID='$idi'";

				if ($conn->query($sql) === TRUE) {
					$pass = $_POST['wachtwoord'];
					$nieuwbrief = $_POST['nieuwsbrief'];
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
Nieuwsbrief ontvangen: $nieuwsbrief
------------------------
 
Veel plezier in onze Webshop!

Namens het team van Tijdvooreenbox.nl";
			$from = "noreply@tijdvooreenbox.nl";
			$headers = "From: $from";
			mail($email,$subject,$message,$headers);
				echo "De gegevens zijn succesvol opgeslagen!";			
				
				} else {
				echo "Er is iets fout gegaan: " . $conn->error;
				}


			}
	
	
	
	
	}

	




	

	?>

<?php	
	
	include ('includes/footer.html');
?>
