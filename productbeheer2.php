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

$idi = $_POST['productid'];
$gebruikersnaam = "bimivp2e4";
$wachtwoord = "Welkom01";
$host = "localhost";
$database = "avans_bimivp2e4";
$tabel = "Product";


mysql_connect("$host", "$gebruikersnaam", "$wachtwoord")or die("Het is niet gelukt om te verbinden met MYSQL!");
mysql_select_db("$database")or die("De database kan niet worden geselecteerd!");

$naaminstelling1 = mysql_query("SELECT Naam FROM $tabel WHERE ProductID='$idi'");
$naaminstelling2 = mysql_fetch_array($naaminstelling1);
$naam = ($naaminstelling2['Naam']);

$beschrijvinginstelling1 = mysql_query("SELECT Beschrijving FROM $tabel WHERE ProductID='$idi'");
$beschrijvinginstelling2 = mysql_fetch_array($beschrijvinginstelling1);
$beschrijving = ($beschrijvinginstelling2['Beschrijving']);

$provincieinstelling1 = mysql_query("SELECT Provincie FROM $tabel WHERE ProductID='$idi'");
$provincieinstelling2 = mysql_fetch_array($provincieinstelling1);
$provincie = ($provincieinstelling2['Provincie']);

$voorraadinstelling1 = mysql_query("SELECT Voorraad_aantal FROM $tabel WHERE ProductID='$idi'");
$voorraadinstelling2 = mysql_fetch_array($voorraadinstelling1);
$voorraad = ($voorraadinstelling2['Voorraad_aantal']);

$prijsinstelling1 = mysql_query("SELECT Prijs_Perstuk FROM $tabel WHERE ProductID='$idi'");
$prijsinstelling2 = mysql_fetch_array($prijsinstelling1);
$prijs = ($prijsinstelling2['Prijs_Perstuk']);

?>
 
 
<center>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="formulier">
      <fieldset>
        
        <legend><h1>Product wijzigen</h1></legend><br />
        <ol>
          <li>
            <label for="naam">Naam</label>
            <input id="naam" name="idproduct" type="text" "value="<?php echo "$idi"; ?>" REQUIRED/>
          </li>
          <li>
            <label for="naam">Naam</label>
            <input id="naam" name="naam" value="<?php echo "$naam"; ?>" REQUIRED/>
          </li>
		  <li>
            <label for="naam">Beschrijving</label>
	    <textarea rows="4" cols="50" name="beschrijving"><?php echo "$beschrijving"; ?></textarea>
          </li>
		  <li>
            <label for="naam">Provincie</label>
            <input id="provincie" name="provincie" REQUIRED value="<?php echo "$provincie"; ?>" />
          </li>
		  <li>
            <label for="naam">Voorraad aantal</label>
            <input id="naam" name="voorraad" REQUIRED value="<?php echo "$voorraad"; ?>" />
          </li>
           <li>
            <label for="naam">Prijs per stuk</label>
            <input id="naam" name="prijs" REQUIRED value="<?php echo "$prijs"; ?>" />
            </li>
            <li>
            <label for="leverbaar">Leverbaar<em>*</em></label><br />
          <label>
            <input type="radio" name="leverbaar" value="Ja" checked="checked"/>
            Ja</label>
          <label>
            <input type="radio" name="leverbaar" value="Nee"/>
            Nee</label>
          </li>
        </ol>
        <input type="submit" value="Wijzig product" class="button"/>
      </fieldset>
    </form>
	
	<?php  
    
	
	if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
	
		$naam2 = $_POST['naam'];
		$beschrijving2 = $_POST['beschrijving'];
		$provincie2 = $_POST['provincie'];
		$voorraad2 = $_POST['voorraad'];
		$prijs2 = $_POST['prijs'];
		$leverbaar2 = $_POST['leverbaar'];
		$idi2 = $_POST['idproduct'];
	
			if(!isset($naam2) || trim($naam2) == '' ||!isset($beschrijving2) || trim($beschrijving2) == '' ||!isset($provincie2) || trim($provincie2) == '' ||!isset($voorraad2) || trim($voorraad2) == '' ||!isset($prijs2) || trim($prijs2) == '' ||!isset($leverbaar2) || trim($leverbaar2) == '') {
				echo "U heeft niet alles ingevuld. De wijzigingen zijn NIET opgeslagen.";
			}
			else
			{
				
				$gebruikersnaam = "bimivp2e4";
				$wachtwoord = "Welkom01";
				$host = "localhost";
				$database = "avans_bimivp2e4";
				$tabel = 'Product';
				$naam2 = $_POST['naam'];
				$beschrijving2 = $_POST['beschrijving'];
				$provincie2 = $_POST['provincie'];
				$voorraad2 = $_POST['voorraad'];
				$prijs2 = $_POST['prijs'];
				$leverbaar2 = $_POST['leverbaar'];
				$idi2 = $_POST['idproduct'];
				
				$conn = new mysqli($host, $gebruikersnaam, $wachtwoord, $database);

				if ($conn->connect_error) {
				die("Kan geen verbinding maken: " . $conn->connect_error);
			} 
				$sql = "UPDATE `Product` SET Naam='$naam2', Beschrijving='$beschrijving2', Provincie='$provincie2', Voorrraad_aantal='$voorraad2', Prijs_Perstuk='$prijs2' Leverbaar='$leverbaar2' WHERE `ProductID`='$idi2'";
				
					
					if ($conn->query($sql) === TRUE) {
					echo "Product succesvol gewijzigd!";
					}
					else 
					{
						echo "Product NIET gewijzigd! (Foutmelding?)";
						echo "$idi2";
					}
	
	
	
	
	}
	}





	

	?>

		<form action="productverwijderen.php" method="POST" class="formulier">
		<ul>
            <input id="productid" name="productid" type="hidden" value="<?php echo "$ProductID"; ?>" />
        </ul>
		<input type="submit" value="Verwijder product" class="button"/>
	</form><br />
	
	
<?php	
	
	include ('includes/footer.html');
?>
