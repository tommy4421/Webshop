<?php

ob_start();
//startscherm van de webwinkel
// Zet het niveau van foutmeldingen zo dat warnings niet getoond worden.
error_reporting(E_ERROR | E_PARSE);
$page_title = 'Tijdvooreenbox.nl ~ Membersarea';
include ('includes/header.html');
// mysqli_connect.php bevat de inloggegevens voor de database.
// Per server is er een apart inlogbestand - localhost vs. remote server
//include ('includes/mysqli_connect_'.$_SERVER['SERVER_NAME'].'.php');
include ('includes/mysqli_connect_localhost.php');

session_start();
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {;
} else {
    header("location: login.php");
}
session_start();
echo "Favorite animal is " . $_SESSION['naam'] . ".";




ob_end_flush();
?>

<?php	
	include ('includes/footer.html');
?>
