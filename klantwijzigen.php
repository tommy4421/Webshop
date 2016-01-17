<?php
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

$KlantID = $_POST['KlantID'];

echo "<h1><center>Klantbeheer</center></h1>";

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
 
// check connection
if (mysqli_connect_errno()) {
	printf("<p><b>Fout: verbinding met de database mislukt.</b><br/>\n%s</p>\n", mysqli_connect_error());
	exit();
} 
	

$gebruikersnaam = "bimivp2e4";
$wachtwoord2 = "Welkom01";
$host = "localhost";
$database = "avans_bimivp2e4";
$tabel = 'Klant';

mysql_connect("$host", "$gebruikersnaam", "$wachtwoord2")or die("Het is niet gelukt om te verbinden met MYSQL!");
mysql_select_db("$database")or die("De database kan niet worden geselecteerd!");

$naaminstelling1 = mysql_query("SELECT Naam FROM $tabel WHERE KlantID='$KlantID'");
$naaminstelling2 = mysql_fetch_array($naaminstelling1);
$naaminstelling = ($naaminstelling2['Naam']);

$adresinstelling1 = mysql_query("SELECT Adres FROM $tabel WHERE KlantID='$KlantID'");
$adresinstelling2 = mysql_fetch_array($adresinstelling1);
$adresinstelling = ($adresinstelling2['Adres']);

$postcodeinstelling1 = mysql_query("SELECT postcode FROM $tabel WHERE KlantID='$KlantID'");
$postcodeinstelling2 = mysql_fetch_array($postcodeinstelling1);
$postcodeinstelling = ($postcodeinstelling2['postcode']);

$plaatsinstelling1 = mysql_query("SELECT plaats FROM $tabel WHERE KlantID='$KlantID'");
$plaatsinstelling2 = mysql_fetch_array($plaatsinstelling1);
$plaatsinstelling = ($plaatsinstelling2['plaats']);

$wachtwoordinstelling1 = mysql_query("SELECT wachtwoord FROM $tabel WHERE KlantID='$KlantID'");
$wachtwoordinstelling2 = mysql_fetch_array($wachtwoordinstelling1);
$wachtwoordinstelling = ($wachtwoordinstelling2['wachtwoord']);

?>
 
 
<center>

    <form method="post" action="klantopslaan.php" class="formulier">
      <fieldset>
        
        <legend><h1>Account instellingen</h1></legend>
        <ol>
           <li>
            <input id="klantnr" name="klantnr" type="hidden" value="<?php echo "$KlantID"; ?>" />
          </li>
		  <li>
            <label for="naam">KlantNr</label>
            <input id="naam" name="naam" placeholder="<?php echo "$KlantID"; ?>" disabled />
          </li>
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
            <input id="wachtwoord" name="wachtwoord" type="password" value="<?php echo "$wachtwoordinstelling"; ?>" REQUIRED/>
          </li>
        </ol>
        <input type="submit" value="Sla wijzigingen op" class="button"/>
      </fieldset>
    </form>
	
	<form action="klantfacturen.php" method="POST" class="formulier">
		<ul>
            <input id="klantnr" name="klantnr" type="hidden" value="<?php echo "$KlantID"; ?>" />
        </ul>
		<input type="submit" value="Bekijk facturen" class="button"/>
	</form>
	
	<form action="klantverwijderen.php" method="POST" class="formulier">
		<ul>
            <input id="klantnr" name="klantnr" type="hidden" value="<?php echo "$KlantID"; ?>" />
        </ul>
		<input type="submit" value="Verwijder klant" class="button"/>
	</form><br />


<?php
include ('includes/footer.html');
?>

