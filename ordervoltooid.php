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

$orderid = $_POST['Orderidvoltooid'];
$sql = "UPDATE `Order` SET `Orderstatus` = 'Voltooid' WHERE `OrderID` = '$orderid'";

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
 
// check connection
if (mysqli_connect_errno()) {
	printf("<p><b>Fout: verbinding met de database mislukt.</b><br/>\n%s</p>\n", mysqli_connect_error());
	exit();
} 


$result = mysqli_query($conn, $sql);

?>

<?php	

	include ('includes/footer.html');
?>
