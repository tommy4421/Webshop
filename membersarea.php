<?php
//
// 
//

ob_start();


session_start();
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {;
} else {
    header("location: login.php");
}

	// Zet het niveau van foutmeldingen zo dat warnings niet getoond worden.
error_reporting(E_ERROR | E_PARSE);

// Zet de titel en laad de HTML header uit het externe bestand.
$page_title = 'Welkom in de WebWinkel';
$active = 7;	// Zorgt ervoor dat header.html weet dat dit het actieve menu-item is.
include ('includes/header.html');

?>
<center><h1>Account overzicht</h1>


<p>
<b>Overzicht</b><br />
<a href="facturen.php">Overzicht facturen</a><br />
<a href="account.php">Overzicht gegevens</a>
</p>

<p>
<b>Instellingen</b><br />
<a href="accountinstellingen.php">Account gegevens</a>
<br /><br />
</p>

</center>		
<?php
include ('includes/footer.html');
?>