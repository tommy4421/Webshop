<?php
//
// contact.php
// Dit is de contactpagina van de webwinkel.
//

// Zet het niveau van foutmeldingen zo dat warnings niet getoond worden.
error_reporting(E_ERROR | E_PARSE);

// Zet de titel en laad de HTML header uit het externe bestand.
$page_title = 'Welkom op Tijd voor een box! - Contact';
$active = 6;	// Zorgt ervoor dat header.html weet dat dit het actieve menu-item is.
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

session_start(); 
$mail_ontv = $_POST['sendto'];

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (empty($_POST['naam']))
        $naam_fout = 1;
    if (function_exists('filter_var') && !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
            $email_fout = 1;
    if (!empty($_SESSION['antiflood']))
    {
        $seconde = 20;
        $tijd = time() - $_SESSION['antiflood'];
        if($tijd < $seconde)
            $antiflood = 1;
    }
}

if (($_SERVER['REQUEST_METHOD'] == 'POST' && (!empty($antiflood) || empty($_POST['naam']) || !empty($naam_fout) || empty($_POST['mail']) || !empty($email_fout) || empty($_POST['bericht']) || empty($_POST['onderwerp']))) || $_SERVER['REQUEST_METHOD'] == 'GET')
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (!empty($naam_fout))
            echo '<p>Uw naam is niet ingevuld.</p>';
        elseif (!empty($email_fout))
            echo '<p>Uw e-mailadres is niet juist.</p>';
        elseif (!empty($antiflood))
            echo '<p>U mag slechts &eacute;&eacute;n bericht per ' . $seconde . ' seconde versturen.</p>';
        else
            echo '<p>U bent uw naam, e-mailadres, onderwerp of bericht vergeten in te vullen.</p>';
    }
        
  echo '<h1> Contactformulier</h1>
  <form method="post" action="' . $_SERVER['REQUEST_URI'] . '" />
  <p>
  
  <label for="sendto">Verzend naar:</label><br />
  <select name="sendto">
  <option value="contact@tijdvooreenbox.nl" selected="selected">Algemeen</option>
  <option value="kevin@tijdvooreenbox.nl">Kevin</option>
  <option value="tom@tijdvooreenbox.nlt">Tom</option>
  <option value="niels@tijdvooreenbox.nl">Niels</option>
  <option value="mirjam@tijdvooreenbox.nl">Mirjam</option>
</select><br /><br />
  
      <label for="naam">Naam:</label><br />
      <input type="text" id="naam" placeholder="Vul hier uw naam in" name="naam" value="' . (isset($_POST['naam']) ? htmlspecialchars($_POST['naam']) : '') . '" /><br /><br />
      
      <label for="mail">E-mailadres:</label><br />
      <input type="text" id="mail" placeholder="Vul hier uw e-mailadres in" name="mail" value="' . (isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : '') . '" /><br /><br />
      
      <label for="onderwerp">Onderwerp:</label><br />
      <input type="text" id="onderwerp" placeholder="Vul hier het onderwerp in" name="onderwerp" value="' . (isset($_POST['onderwerp']) ? htmlspecialchars($_POST['onderwerp']) : '') . '" /><br /><br />
      
      <label for="bericht">Bericht:</label><br />
      <textarea id="bericht" name="bericht" placeholder="Vul hier uw bericht in" rows="8" style="width: 400px;">' . (isset($_POST['bericht']) ? htmlspecialchars($_POST['bericht']) : '') . '</textarea><br /><br />
      
      <input type="submit" name="submit" value=" Versturen " />
  </p>
  </form>';
}
else
{      
  $datum = date('d/m/Y H:i:s');
    
  $inhoud_mail = "===================================================\n";
  $inhoud_mail .= "Ingevuld contact formulier Tijdvooreenbox.nl " . "\n";
  $inhoud_mail .= "===================================================\n\n";
  
  $inhoud_mail .= "Naam: " . htmlspecialchars($_POST['naam']) . "\n";
  $inhoud_mail .= "E-mail adres: " . htmlspecialchars($_POST['mail']) . "\n\n";
  $inhoud_mail .= "Bericht:\n";
  $inhoud_mail .= htmlspecialchars($_POST['bericht']) . "\n\n";
    
  $inhoud_mail .= "Verstuurd op " . $datum . "\n\n";
    
  $inhoud_mail .= "===================================================\n\n";
 
  
  $headers = 'From: ' . htmlspecialchars($_POST['naam']) . ' <' . $_POST['mail'] . '>';
  
  $headers = stripslashes($headers);
  $headers = str_replace('\n', '', $headers);
  $headers = str_replace('\r', '', $headers);
  $headers = str_replace("\"", "\\\"", str_replace("\\", "\\\\", $headers)); 
  
  $_POST['onderwerp'] = str_replace('\n', '', $_POST['onderwerp']); 
  $_POST['onderwerp'] = str_replace('\r', '', $_POST['onderwerp']); 
  $_POST['onderwerp'] = str_replace("\"", "\\\"", str_replace("\\", "\\\\", $_POST['onderwerp']));
  
  if (mail($mail_ontv, $_POST['onderwerp'], $inhoud_mail, $headers))
  {
      $_SESSION['antiflood'] = time();
      
      echo '<h1>Het contactformulier is verzonden</h1>
      
      <p>Bedankt voor het invullen van het contactformulier. We zullen zo spoedig mogelijk contact met u opnemen.</p>';
  }
  else
  {
      echo '<h1>Het contactformulier is niet verzonden</h1>
      
      <p><b>Onze excuses.</b> Het contactformulier kon niet verzonden worden.</p>';
  }
}

include ('includes/footer.html');



$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
 
// check connection
if (mysqli_connect_errno()) {
	printf("<p><b>Fout: verbinding met de database mislukt.</b><br/>\n%s</p>\n", mysqli_connect_error());
	exit();
}


?>