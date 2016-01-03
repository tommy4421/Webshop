<?php

error_reporting(E_ERROR | E_PARSE);
$page_title = 'Tijdvooreenbox.nl ~ Login';

include ('includes/mysqli_connect_localhost.php');
include ('includes/mysqli_connect_webpages.avans.nl');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (mysqli_connect_errno()) {
	printf("<p><b>Fout: verbinding met de database mislukt.</b><br/>\n%s</p>\n", mysqli_connect_error());
	exit();
}

session_start();
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header("location: membersarea.php");
} else {
    header("location: index.php");
}
	
/* maak de resultset leeg */
mysqli_free_result($result);

/* sluit de connection */
mysqli_close($conn);

?>
