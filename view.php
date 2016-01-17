<?php
// Zet het niveau van foutmeldingen zo dat warnings niet getoond worden.
error_reporting(E_ERROR | E_PARSE);
$page_title = 'Tijdvooreenbox.nl ~ ';
include ('includes/header.html');
// mysqli_connect.php bevat de inloggegevens voor de database.
// Per server is er een apart inlogbestand - localhost vs. remote server
//include ('includes/mysqli_connect_'.$_SERVER['SERVER_NAME'].'.php');
include ('includes/mysqli_connect_localhost.php');
ob_start();

session_start();
    if(!$_SESSION["Admin"] == 1){
     header("location: index.php");
    exit;
    }

ob_start();	
	?>

<html>
<head>
<title>Images uit database voorbeeld</title>	
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
<center><h1>Images uit database</h1>
<p>
Klik op de naam van een image om het uit de database te halen. Klik <a href="afbeeldingupload.php">hier om een image toe te voegen</a>.
</p>
<?php
// Dit bestand toont de images uit de database in een HTML pagina.
// In view.php wordt de informatie over de images opgahaald uit de database. Het image
// zelf wordt hier niet opgehaald, dat gebeurt in showfile.php, die aangeroepen wordt
// als source van de <img> tag.
//

$DBServer = 'localhost'; 	// e.g 'localhost' or '192.168.1.100'
$DBUser   = 'bimivp2e4';			// database username
$DBPass   = 'Welkom01';				// password voor database user
$DBName   = 'avans_bimivp2e4';			// database die je wilt gebruiken

error_reporting(E_ERROR | E_PARSE);

// Stap 1: maak verbinding met MySQL.
$conn = mysqli_connect($DBServer, $DBUser, $DBPass, $DBName);
// check connection
if (mysqli_connect_errno()) {
	trigger_error('Database connection failed: '  . mysqli_connect_error(), E_USER_ERROR);
}

// Stap 2: Stel de query op, en voer deze uit.
// We halen het image zelf hier nog niet op; alleen de beschrijvende informatie.
$sql = "SELECT * FROM Afbeelding ORDER BY ImageID ASC;" ;

// Query uitvoeren
$result = mysqli_query($conn, $sql);
if($result === false) {
	echo "<center><p>Er zijn geen images gevonden.</p></center>\n";
} else {
	$num = mysqli_num_rows($result);
}

// Stap 3: Verwerk het resultaat tot HTML.
$result->data_seek(0);	// Terug naar het begin van de resultaten
?>
<p>
<table>
<thead>
<center>
<tr>
	<th>ImageID</th>
	<th>image_type</th>
	<th>image_size</th>
	<th>image_naam</th>
	<th>&nbsp;</th>
</tr>

</thead>
<tbody>
<?php
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	$i = $row["ImageID"];
	print "<tr>";
	print "<td>".$row["ImageID"]."</td>" ;
	print "<td>".$row["Image_type"]."</td>" ;
	print "<td>".$row["ImageSize"]."</td>" ;
	print "<td><a href=\"view.php?ImageID=$i\">".$row["ImageName"]."</a></td>" ;
	print "<td><a href=\"deletefile.php?ImageID=$i\"><img src=\"delete.png\"/></a></td>" ;
	print "</tr>\n" ;
}
?>
</tbody>
</table>
</form>
</center>
<p>

<?php
$ImageID = 0;
// De ID van het image dat we willen afbeelden wordt in de URL meegegeven. 
// Hier testen we of deze aanwezig is.
if (isset($_GET["ImageID"]))
{
	$ImageID = $_GET["ImageID"];

	$sql = "SELECT Image_type, ImageSize, ImageName FROM Afbeelding WHERE ImageID=".$ImageID;

	/* maak de resultset leeg */
	mysqli_free_result($result);

	/*** exceute the query ***/
	$result = mysqli_query($conn, $sql);
	if($result === false) {
		echo "<p>Er zijn geen resultaten gevonden.</p>\n";
	}

	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	/*** the size of the array should be 3 (1 for each field) ***/
	if(sizeof($row) === 3) {
		echo '<center><p>Dit is de afbeelding \''.$row['ImageName'].'\' uit de database</p>';
		echo '<p><img id=\'plaatje\' '.$row['ImageSize'].' src="showfile.php?ImageID='.$ImageID.'"></center></p>';
	}

	/* maak de resultset leeg */
	mysqli_free_result($result);

	/* sluit de connection */
	mysqli_close($conn);
}
?>
</center>
<?php	
	include ('includes/footer.html');
?>

