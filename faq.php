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

<h1>CSS + HTML only Accordion Element</h1>
<ul>
  <li>
    <input type="checkbox" checked>
    <i></i>
    <h2>Languages Used</h2>
    <p>This page was written in HTML and CSS. The CSS was compiled from SASS. I used Normalize as my CSS reset and -prefix-free to save myself some headaches. I haven't quite gotten the hang of Slim for compiling into HTML, but someday I'll use it since its syntax compliments that of SASS. Regardless, this could all be done in plain HTML and CSS.</p>
  </li>
  <li>
    <input type="checkbox" checked>
    <i></i>
    <h2>How it Works</h2>
    <p>Using the sibling and checked selectors, we can determine the styling of sibling elements based on the checked state of the checkbox input element. One use, as demonstrated here, is an entirely CSS and HTML accordion element. Media queries are used to make the element responsive to different screen sizes.</p>
  </li>
  <li>
    <input type="checkbox" checked>
    <i></i>
    <h2>Points of Interest</h2>
    <p>By making the open state default for when :checked isn't detected, we can make this system accessable for browsers that don't recognize :checked. The fallback is simply an open accordion. The accordion can be manipulated with Javascript (if needed) by changing the "checked" property of the input element.</p>
  </li>
</ul>

<?php
include ('includes/footer.html');



$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
 
// check connection
if (mysqli_connect_errno()) {
	printf("<p><b>Fout: verbinding met de database mislukt.</b><br/>\n%s</p>\n", mysqli_connect_error());
	exit();
}


?>