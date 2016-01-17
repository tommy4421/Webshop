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
<script type="text/javascript">
$(document).ready(function() {
        $(".text").hide();
        $(".accordeon div:first-child").addClass("expand_first");
        $(".expand").click(function() {
                $(".text").slideUp(500);
                if ($(this).next(".text").is(":visible")) {
                        $(this).next(".text").slideUp(500);
                } else {
                        $(this).next(".text").slideToggle(500);
                }
        });
});
</script>

<div class="accordeon">
        <div class="expand">1. Klik hier om de content open te klappen.</div>
        <div class="text">Lorem ipsum dolor sit amet.</div>

        <div class="expand">2. Klik hier om de content open te klappen.</div>
        <div class="text">Lorem ipsum dolor sit amet.</div>

        <div class="expand">3. Klik hier om de content open te klappen.</div>
        <div class="text">Lorem ipsum dolor sit amet.</div>
</div>

<?php
include ('includes/footer.html');



$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
 
// check connection
if (mysqli_connect_errno()) {
	printf("<p><b>Fout: verbinding met de database mislukt.</b><br/>\n%s</p>\n", mysqli_connect_error());
	exit();
}


?>