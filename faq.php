<?php
//
// faq.php
// Dit is de FAQ van de webwinkel.
//

// Zet het niveau van foutmeldingen zo dat warnings niet getoond worden.
error_reporting(E_ERROR | E_PARSE);

// Zet de titel en laad de HTML header uit het externe bestand.
$page_title = 'Welkom op Tijd voor een box! - Contact';
$active = 5;	// Zorgt ervoor dat header.html weet dat dit het actieve menu-item is.
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
?>

<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
function showHide(id) {
var elm = document.getElementById(id);
elm.style.display = (elm.style.display=='none'?'block':'none');
}
</SCRIPT>
<h1> FAQ (Veel Gestelde Vragen)<h1>
<small><i>Klik op de vraag om het antwoord te zien</i></small><br /><br />

<table width="100%" border="1">
  <tr>
    <th scope="col" width="50%"><h2><u>Bestellen</u></h2></th>
    <th scope="col" width="50%"><h2><u>Account</u></h2></th>
  </tr>
  <tr>
    <td valign="top">
    <a href="#" onclick="showHide('A1'); return false;"><b>Heb ik een account nodig om te kunnen bestellen?</b></a>
<div id="A1" style="padding-left:20px; display:none;">Nee. U kan ook zonder account een product bestellen.</div><br /><br />

<a href="#" onclick="showHide('A2'); return false;"><b>Kan ik meerdere producten per keer bestellen?</b></a>
<div id="A2" style="padding-left:20px; display:none;">Ja, dit kan.</div><br /><br />

<a href="#" onclick="showHide('A3'); return false;"><b>Hoe kan ik betalen?</b></a>
<div id="A3" style="padding-left:20px; display:none;">Aangezien dit een fictieve webshop is voor een schoolproject, kan u niet echt betalen. Normaliter zou dit kunnen met bijvoorbeeld Ideal en Paypal.</div><br /><br />
</td>

    <td valign="top">
    <a href="#" onclick="showHide('A4'); return false;"><b>Hoe kan ik mijn gegevens aanpassen?</b></a>
<div id="A4" style="padding-left:20px; display:none;">Als u bent ingelogd klikt u eerst op 'Account Overzicht' in de menu-balk. Hierna klikt u op 'Account gegevens' onder 'Instellingen'. Op deze pagina kan u uw gegevens inzien en eventueel aanpassen.<br />
Kunt u de pagina niet vinden? Klik dan <a href="http://tijdvooreenbox.nl/accountinstellingen.php">HIER</a> om naar de pagina te gaan.</div><br /><br />

<a href="#" onclick="showHide('A5'); return false;"><b>Hoe kan ik mijn facturen bekijken?</b></a>
<div id="A5" style="padding-left:20px; display:none;">Als u bent ingelogd klikt u eerst op 'Account Overzicht' in de menu-balk. Hierna klikt u op 'Overzicht facturen' onder 'Overzicht'. Op deze pagina kan u uw facturen bekijken.<br />
Kunt u de pagina niet vinden? Klik dan <a href="http://tijdvooreenbox.nl/facturen.php">HIER</a> om naar de pagina te gaan.
</div><br /><br />
    </td>
  </tr>
</table>

<table width="100%" border="1">
  <tr>
    <th scope="col" width="50%"><h2><u>Levering</u></h2></th>
    <th scope="col" width="50%"><h2><u>Over ons</u></h2></th>
  </tr>
  <tr>
    <td valign="top">
    <a href="#" onclick="showHide('A6'); return false;"><b>Hoe worden de producten geleverd?</b></a>
<div id="A6" style="padding-left:20px; display:none;">De producten worden met POSTNL geleverd.</div><br /><br />

<a href="#" onclick="showHide('A7'); return false;"><b>Hoe lang duurt het voordat ik mijn bestelling binnen heb?</b></a>
<div id="A7" style="padding-left:20px; display:none;">Meestal heeft u uw bestelling binnen 1-2 dagen binnen, feestdagen en het weekend uitgezonderd.</div><br /><br />
</td>

    <td valign="top">
    <a href="#" onclick="showHide('A8'); return false;"><b>Wie zijn wij?</b></a>
<div id="A8" style="padding-left:20px; display:none;">Wij zijn 4 studenten; Kevin, Niels, Tom en Mirjam. We studeren Informatica en Businees IT & Management aan de Avans te Breda.</div><br /><br />

    <a href="#" onclick="showHide('A9'); return false;"><b>Waarom hebben jullie Tijdvooreenbox opgezet?</b></a>
<div id="A9" style="padding-left:20px; display:none;">Voor een opdracht in ons eerste jaar, kwartaal twee, hebben wij een webshop mogen opzetten. Na vele dagen brainstormen en ideeën bedenken hebben we gekozen voor ons zelfbedachte concept Tijdvooreenbox.</div><br /><br />

<a href="#" onclick="showHide('A10'); return false;"><b>Kan ik echt niet ECHT iets bestellen?</b></a>
<div id="A10" style="padding-left:20px; display:none;">Helaas, deze webshop is puur fictief. Enorm bedankt voor uw interesse en enthousiasme!</div><br /><br />
    </td>
  </tr>
</table>

<?php
include ('includes/footer.html');



$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
 
// check connection
if (mysqli_connect_errno()) {
	printf("<p><b>Fout: verbinding met de database mislukt.</b><br/>\n%s</p>\n", mysqli_connect_error());
	exit();
}


?>