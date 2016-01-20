<?php
//
// faq.php
// Dit is de FAQ van de webwinkel.
//

// Zet het niveau van foutmeldingen zo dat warnings niet getoond worden.
error_reporting(E_ERROR | E_PARSE);

// Zet de titel en laad de HTML header uit het externe bestand.
$page_title = 'Vraag en antwoord - FAQ';
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
        <p><i>Klik op de vraag om het antwoord te lezen</i></p>

<table width="100%" border="1">
  <tr>
    <th scope="col" width="50%"><h2><u>Bestellen</u></h2></th>
    <th scope="col" width="50%"><h2><u>Account</u></h2></th>
  </tr>
  <tr>
    <td valign="top">
        <a href="#" onclick="showHide('A1'); return false;"><p><b>Heb ik een account nodig om te kunnen bestellen?</b></p></a>
<div id="A1" style="padding-left:20px; display:none;"><p>Nee. U kan ook zonder account een product bestellen.</p></div>

<a href="#" onclick="showHide('A2'); return false;"><p><b>Kan ik meerdere producten per keer bestellen?</b></p></a>
<div id="A2" style="padding-left:20px; display:none;"><p>Ja, dit kan.</div></p>

<a href="#" onclick="showHide('A3'); return false;"><p><b>Hoe kan ik betalen?</b></p></a>
<div id="A3" style="padding-left:20px; display:none;"><p>Aangezien dit een fictieve webshop is voor een schoolproject, kan u niet echt betalen. Normaliter zou dit kunnen met bijvoorbeeld Ideal en Paypal.</div></p>
</td>

    <td valign="top">
    <a href="#" onclick="showHide('A4'); return false;"><p><b>Hoe kan ik mijn gegevens aanpassen?</b></p></a>
<div id="A4" style="padding-left:20px; display:none;"><p>Als u bent ingelogd klikt u eerst op 'Account Overzicht' in de menu-balk. Hierna klikt u op 'Account gegevens' onder 'Instellingen'. Op deze pagina kan u uw gegevens inzien en eventueel aanpassen.</p>
<p>Kunt u de pagina niet vinden? Klik dan <a href="http://tijdvooreenbox.nl/accountinstellingen.php">HIER</a> om naar de pagina te gaan.</p></div>

<a href="#" onclick="showHide('A5'); return false;"><p><b>Hoe kan ik mijn facturen bekijken?</b></p></a>
<div id="A5" style="padding-left:20px; display:none;"><p>Als u bent ingelogd klikt u eerst op 'Account Overzicht' in de menu-balk. Hierna klikt u op 'Overzicht facturen' onder 'Overzicht'. Op deze pagina kan u uw facturen bekijken.</p>
<p>Kunt u de pagina niet vinden? Klik dan </p><a href="http://tijdvooreenbox.nl/facturen.php">HIER</a> <p>om naar de pagina te gaan.</p>
</div>
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
    <a href="#" onclick="showHide('A6'); return false;"><p><b>Hoe worden de producten geleverd?</b></p></a>
<div id="A6" style="padding-left:20px; display:none;"><p>De producten worden met POSTNL geleverd.</p></div>

<a href="#" onclick="showHide('A7'); return false;"><p><b>Hoe lang duurt het voordat ik mijn bestelling binnen heb?</b></p></a>
<div id="A7" style="padding-left:20px; display:none;"><p>Meestal heeft u uw bestelling binnen 1-2 dagen binnen, feestdagen en het weekend uitgezonderd.</p></div>
</td>

    <td valign="top">
    <a href="#" onclick="showHide('A8'); return false;"><p><b>Wie zijn wij?</b></a>
<div id="A8" style="padding-left:20px; display:none;"><p>Wij zijn 4 studenten; Kevin, Niels, Tom en Mirjam. We studeren Informatica en Businees IT & Management aan de Avans te Breda.</p></div>

    <a href="#" onclick="showHide('A9'); return false;"><p><b>Waarom hebben wij Tijdvooreenbox opgezet?</p></b></a>
<div id="A9" style="padding-left:20px; display:none;"><p>Voor een opdracht in ons eerste jaar, kwartaal twee, hebben wij een webshop mogen opzetten. Na vele dagen brainstormen en ideeën bedenken hebben we gekozen voor ons zelfbedachte concept Tijdvooreenbox.</p></div>

<a href="#" onclick="showHide('A10'); return false;"><p><b>Kan ik echt niet ECHT iets bestellen?</b></p></a>
<div id="A10" style="padding-left:20px; display:none;"><p>Helaas, deze webshop is puur fictief. Enorm bedankt voor uw interesse en enthousiasme!</p></div>
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