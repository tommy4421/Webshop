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

$ProductID = $_POST['ProductID'];
$gebruikersnaam = "bimivp2e4";
$wachtwoord = "Welkom01";
$host = "localhost";
$database = "avans_bimivp2e4";

mysql_connect("$host", "$gebruikersnaam", "$wachtwoord")or die("Het is niet gelukt om te verbinden met MYSQL!");
mysql_select_db("$database")or die("De database kan niet worden geselecteerd!");

?>
 
 
<center>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="formulier">
      <fieldset>
        
        <legend><h1>Product toevoegen</h1></legend><br />
        <ol>
          <li>
            <label for="naam">Naam</label>
            <input id="naam" name="naam" value="" REQUIRED/>
          </li>
		  <li>
            <label for="naam">Beschrijving</label>
	    <textarea rows="4" cols="50" name="beschrijving" REQUIRED></textarea>
          </li>
		  <li>
            <label for="naam">Provincie</label>
            <input id="provincie" name="provincie" REQUIRED/>
          </li>
		  <li>
            <label for="naam">Voorraad aantal</label>
            <input id="naam" name="voorraad" REQUIRED/>
          </li>
           <li>
            <label for="naam">Prijs per stuk</label>
            <input id="naam" name="prijs" REQUIRED/>
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
		$beschrijving = $_POST['beschrijving'];
		$provincie = $_POST['provincie'];
		$voorraad = $_POST['voorraad'];
		$prijs = $_POST['prijs'];
		$leverbaar = $_POST['leverbaar'];
	
			if(!isset($naam) || trim($naam) == '' ||!isset($beschrijving) || trim($beschrijving) == '' ||!isset($provincie) || trim($provincie) == '' ||!isset($voorraad) || trim($voorraad) == '' ||!isset($prijs) || trim($prijs) == '' ||!isset($leverbaar) || trim($leverbaar) == '') {
				echo "U heeft niet alles ingevuld. De wijzigingen zijn NIET opgeslagen.";
			}
			else
			{
				
				$gebruikersnaam = "bimivp2e4";
				$wachtwoord = "Welkom01";
				$host = "localhost";
				$database = "avans_bimivp2e4";
				$tabel = 'Product';
				
				$conn = new mysqli($host, $gebruikersnaam, $wachtwoord, $database);

				if ($conn->connect_error) {
				die("Kan geen verbinding maken: " . $conn->connect_error);
			} 
				$sql = "INSERT INTO $tabel (Naam, Beschrijving, Provincie, Voorraad_aantal, Prijs_Perstuk, Leverbaar)
				VALUES ('$naam', '$beschrijving', '$provincie', '$voorraad', '$prijs', '$leverbaar')";

					if ($conn->query($sql) === TRUE) {
					echo "Product succesvol gewijzigd!";
					}
					else 
					{
						echo "Product NIET gewijzigd! (Foutmelding?)";
					}
	
	
	
	
	}
	}

	<form action="productverwijderen.php" method="POST" class="formulier">
		<ul>
            <input id="productid" name="productid" type="hidden" value="<?php echo "$ProductID"; ?>" />
        </ul>
		<input type="submit" value="Verwijder product" class="button"/>
	</form><br />




	

	?>

<?php	
	
	include ('includes/footer.html');
?>
