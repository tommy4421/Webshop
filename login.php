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

session_start();
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { 
	echo "<center><br />U bent al ingelogd!<br /></center>";
} 
else {



?>
    <center>

    <form action="checklogin.php" method="post" class="formulier">
      <fieldset>
        
        <legend><h1>Login</h1></legend>
        <ol>
          <li>
            <label for="email">E-mail</label>
            <input id="email" name="email" placeholder="Email hier" REQUIRED/>
          </li>
		  <li>
            <label for="email">Wachtwoord</label>
            <input id="wachtwoord" name="wachtwoord" type="password" placeholder="Wachtwoord hier" REQUIRED/>
          </li>
        </ol>
        <input type="submit" value="Login" class="button"/>
      </fieldset>
    </form>

      <p>Voer hier uw emailadres in. Nieuwe klant? <a href="registreer.php">Registreer hier</a>.</p><br />
     </center>

<?php	
} 	echo "<br />";
	include ('includes/footer.html');
?>
