<?php
//
// Membersarea.php
//

// Zet het niveau van foutmeldingen zo dat warnings niet getoond worden.
error_reporting(E_ERROR | E_PARSE);

// Zet de titel en laad de HTML header uit het externe bestand.
$page_title = 'Welkom in de WebWinkel';
$active = 7;	// Zorgt ervoor dat header.html weet dat dit het actieve menu-item is.
include ('includes/header.html');
// mysqli_connect.php bevat de inloggegevens voor de database.
// Per server is er een apart inlogbestand - localhost vs. remote server
//include ('includes/mysqli_connect_'.$_SERVER['SERVER_NAME'].'.php');
include ('includes/mysqli_connect_localhost.php');
ob_start();


session_start();
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {;
} else {
    header("location: login.php");
}

    
   echo "<h3> PHP List All Session Variables</h3>";
   foreach ($_SESSION as $key=>$val)
    echo $key." ".$val."<br/>";
	

ob_end_flush();
?>

<?php	
	include ('includes/footer.html');
?>
