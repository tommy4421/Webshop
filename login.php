<?php
//index.php
//startscherm van de webwinkel
// Zet het niveau van foutmeldingen zo dat warnings niet getoond worden.
error_reporting(E_ERROR | E_PARSE);
$page_title = 'Tijdvooreenbox.nl ~ Login';
include ('includes/header.html');
// mysqli_connect.php bevat de inloggegevens voor de database.
// Per server is er een apart inlogbestand - localhost vs. remote server
//include ('includes/mysqli_connect_'.$_SERVER['SERVER_NAME'].'.php');
include ('includes/mysqli_connect_localhost.php');
// Page header:
echo '<h1>Login</h1>';
 
?>
	<p>Voer hier uw emailadres in. Nieuwe klant? <a href="registreer.php">Registreer hier</a>.</p>

    <form action="checklogin.php" method="post" class="formulier">
      <fieldset>
        <legend>Login</legend>
        <ol>
          <li>
            <label for="email">E-mail</label>
            <input id="email" name="email" value="Email"/>
          </li>
		  <li>
            <label for="email">Wachtwoord</label>
            <input id="wachtwoord" name="wachtwoord" value="Wachtwoord"/>
          </li>
        </ol>
        <input type="submit" value="Login" class="button"/>
      </fieldset>
    </form>
<?php	
	include ('includes/footer.html');
?>
