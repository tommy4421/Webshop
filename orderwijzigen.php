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

echo "<h1><center>Order bekijken</center></h1>";
echo "<h3><center>Er hoeft slecht één keer geklikt te worden op order voltooid!</center></h3>";

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
 

// check connection
if (mysqli_connect_errno()) {
	printf("<p><b>Fout: verbinding met de database mislukt.</b><br/>\n%s</p>\n", mysqli_connect_error());
	exit();
} 


$orderid = $_POST['OrderID'];
$sql = "SELECT * FROM Order WHERE OrderID ='$orderid'";
$sql2 = "SELECT * FROM Order_Product WHERE Ord_orderID = '$orderid'";


// Voer de query uit en sla het resultaat op 
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
	

// Laat de producten zien in een form, zodat de gebruiker ze kan selecteren.
// Haal een nieuwe regel op uit het resultaat, zolang er nog regels beschikbaar zijn.
// We gebruiken in dit geval een associatief array.

while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) 
{
	echo "<!-- ---------------------------------- -->\n";
	echo "<div id=\"klantgebeuren\">\n<form action=\"ordervoltooid.php\" method=\"post\">\n";
	echo "<center>Product</center><br />";
	echo "<input type=\"hidden\" name=\"klantnr\" value=\"".$klantid."\" />\n";
	echo "OrderID: <input type=\"text\" name=\"Orderidvoltooid\" value=\"".$row["Ord_orderID"]."\" />\n<br />";
	echo "ProductID: <input type=\"text\" name=\"klantnr\" value=\"".$row["Pro_ProductID"]."\" />\n<br />";
	echo "Productnaam: <input type=\"text\" name=\"klantnr\" value=\"".$row["Pro_Naam"]."\" />\n";
	echo "Prijs: <div id=\"Prijs\">&euro;".$row["Product_prijs"]."</div>\n<br />";
	echo "<div id=\"postcode\">Aantal: ".$row["Aantal"]."</div>\n";
	echo "<center><input type=\"submit\" value=\"Order voltooid\" class=\"button\"/></div>\n</center>";
	echo "</form>\n</div>\n";
}




/* maak de resultset leeg */
mysqli_free_result($result);

/* sluit de connection */
mysqli_close($conn);

?>

