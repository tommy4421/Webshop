<?php
//
// categorieA.php
// Deze pagina toont de documenten uit een van de categorieën uit de webwinkel.
//

// Zet het niveau van foutmeldingen zo dat warnings niet getoond worden.
error_reporting(E_ERROR | E_PARSE);

// Zet de titel en laad de HTML header uit het externe bestand.
$page_title = 'Welkom in de WebWinkel';
$active = 3;	// Zorgt ervoor dat header.html weet dat dit het actieve menu-item is.
include ('includes/header.html');

echo "<h1>Producten van categorie B</h1>";
echo "<h1><center>Streekpakketten</center></h1>";
echo "<h4><center>Selecteer een provincie</center></h4><br />";
echo "<A HREF=\"friesland.php\" TARGET=\"_blank\">Friesland</A>";
echo "<h4><center>Groningen</center></h4>";

include ('includes/footer.html');
?>
