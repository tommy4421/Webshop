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
    if(!$_SESSION["Admin"] == 1){
     header("location: index.php");
    exit;
    }
?>
    
<?php

$productid = $_POST['productid'];
$sql = "DELETE FROM `Product` WHERE `ProductID` = '$productid'";
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
 
// check connection
if (mysqli_connect_errno()) {
	printf("<p><b>Fout: verbinding met de database mislukt.</b><br/>\n%s</p>\n", mysqli_connect_error());
	exit();
} 
$result = mysqli_query($conn, $sql);
echo "<center>Product succesvol verwijderd!</center>";





?>
    
<?php	
	include ('includes/footer.html');
?>
