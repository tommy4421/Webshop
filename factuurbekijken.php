<?php
//startscherm van de webwinkel
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

?>
 
 
<?php 

echo "<h1><center>Factuur bekijken</center></h1>";

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
 

// check connection
if (mysqli_connect_errno()) {
	printf("<p><b>Fout: verbinding met de database mislukt.</b><br/>\n%s</p>\n", mysqli_connect_error());
	exit();
} 


$factuurid = $_POST['FactuurID'];
$sql = "SELECT * FROM Factuur WHERE FactuurID ='$factuurid'";
$sql2 = "SELECT * FROM Factuur_Product";


// Voer de query uit en sla het resultaat op 
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
	
if($result === false) {
	echo "<p>Er zijn geen facturen gevonden.</p>\n";
} else {
	$num = 0;
	$num = mysqli_num_rows($result);
	echo "<p>Er zijn ".$num." facturen gevonden.</p>\n";
}

// Laat de producten zien in een form, zodat de gebruiker ze kan selecteren.
// Haal een nieuwe regel op uit het resultaat, zolang er nog regels beschikbaar zijn.
// We gebruiken in dit geval een associatief array.
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
{
	echo "<!-- ---------------------------------- -->\n";
	echo "<div id=\"klantgebeuren\">\n<form action=\"factuurbekijken.php\" method=\"post\">\n";
	echo "<center>Factuur overzicht</center><br />";
	echo "<input type=\"hidden\" name=\"klantnr\" value=\"".$klantid."\" />\n";
	echo "FactuurID: <input type=\"text\" name=\"FactuurID\" value=\"".$row["FactuurID"]."\" />\n";
	echo "Totaal bedrag: <div id=\"Prijs\">&euro;".$row["Totaalbedrag"]."</div>\n<br />";
	echo "<div id=\"postcode\">Datum: ".$row["Datum"]."</div>\n";
	echo "</form>\n</div>\n";
}

while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) 
{
	echo "<!-- ---------------------------------- -->\n";
	echo "<div id=\"klantgebeuren\">\n<form action=\"factuurbekijken.php\" method=\"post\">\n";
	echo "<center>Product</center><br />";
	echo "<input type=\"hidden\" name=\"klantnr\" value=\"".$klantid."\" />\n";
	echo " $product = "".$row["Pro_ProductID"].""\n";
	echo "ProductID: <input type=\"text\" name=\"FactuurID\" value=\"".$row["Pro_ProductID"]."\" />\n";
	echo "Aantal: <div id=\"Prijs\">&euro;".$row["Prijs"]."</div>\n<br />";
	echo "<div id=\"postcode\">Aantal: ".$row["Aantal"]."</div>\n";
	echo "</form>\n</div>\n";
}

$sql3 = "SELECT * FROM Product WHERE ProductID = $product";
$result3 = mysqli_query($conn, $sql3);

while($row = mysqli_fetch_array($result3, MYSQLI_ASSOC)) 
{
	echo "<!-- ---------------------------------- -->\n";
	echo "<div id=\"klantgebeuren\">\n<form action=\"factuurbekijken.php\" method=\"post\">\n";
	echo "<center>Product</center><br />";
	echo "<input type=\"hidden\" name=\"klantnr\" value=\"".$klantid."\" />\n";
	echo "Product naam: <input type=\"text\" name=\"FactuurID\" value=\"".$row["Naam"]."\" />\n";
	echo "</form>\n</div>\n";
}


/* maak de resultset leeg */
mysqli_free_result($result);

/* sluit de connection */
mysqli_close($conn);

?>

