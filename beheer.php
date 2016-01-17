<?php
//
// beheer.php
//

session_start();
    if(!$_SESSION["Admin"] == 1){
     header("location: index.php");
    exit;
    }

	// Zet het niveau van foutmeldingen zo dat warnings niet getoond worden.
error_reporting(E_ERROR | E_PARSE);

// Zet de titel en laad de HTML header uit het externe bestand.
$page_title = 'Welkom in de WebWinkel';
$active = 4;	// Zorgt ervoor dat header.html weet dat dit het actieve menu-item is.
include ('includes/header.html');

?>
<center><h1>Beheer</h1>


<p><b>Beheer van orders</b><br />
<a href="nieuweorders.php">Nieuwe orders</a><br />
<a href="orderbeheer.php">Orders beheren</a><br />
</p>

<p><b>Beheer van gegevens</b><br />
<a href="klantbeheer.php">Klantgegevens beheren</a><br />
</p>

<p><b>Beheer van producten</b><br />
<a href="productbeheer.php">Producten beheren</a><br />
<a href="afbeeldingupload.php">Afbeeldingen upload</a><br />
<a href="view.php">Afbeeldingen bekijken</a></p>
</center>
		
<?php
include ('includes/footer.html');
?>