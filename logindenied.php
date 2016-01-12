<?php

ob_start();
// Zet het niveau van foutmeldingen zo dat warnings niet getoond worden.
error_reporting(E_ERROR | E_PARSE);
$page_title = 'Tijdvooreenbox.nl ~ ';
include ('includes/header.html');
// mysqli_connect.php bevat de inloggegevens voor de database.
// Per server is er een apart inlogbestand - localhost vs. remote server
//include ('includes/mysqli_connect_'.$_SERVER['SERVER_NAME'].'.php');
include ('includes/mysqli_connect_localhost.php');

echo "<center>De ingevulde gegevens kloppen niet!<br />";
echo "U keert automatisch terug na 3 seconden!</center><br />";
header("refresh: 3; url=login.php");

?>

<?php	
	include ('includes/footer.html');
?>
