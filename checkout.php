<?php
// checkout.php
//
// Dit bestand zorgt ervoor dat de winkelwagen van de klant in een bestelling en één of meer
// bestelregels wordt opgenomen. Als dit gelukt is is de bestelling geregistreerd
// en de winkelwagen geleegd.
//
// Opdracht: op dit moment wordt de actuele prijs van een product én de totaalprijs 
// van de bestelling nog niet bij de bestelling in de database geregistreerd. 
// Zorg ervoor dat deze prijzen worden geregistreerd bij een bestelling.

$page_title = 'de WebWinkel';
include ('includes/header.html');

// mysqli_connect.php bevat de inloggegevens voor de database.
// Per server is er een apart inlogbestand - localhost vs. remote server
//include ('includes/mysqli_connect_'.$_SERVER['SERVER_NAME'].'.php');
include ('includes/mysqli_connect_localhost.php');

 // Google analytics
 include_once("includes/analyticstracking.php");

// Page header:
echo '<h1>Bestelling afronden</h1>';

if (empty($_SESSION['klantnr'])) {
    echo "<p>U ben nog niet ingelogd. <a href=\"login.php\">Log eerst in</a> om uw bestelling af te ronden.</p>\n";
} else {

	// Afsluiten van bestelling en bestelregel opslaan in database

	//connectie maken met database webwinkel
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	 
	// check connection
	if (mysqli_connect_errno()) {
		printf("<p><b>Fout: verbinding met de database mislukt.</b><br/>\n%s</p>\n", mysqli_connect_error());
		include ('includes/footer.html');
		exit();
	}

	// Stap 1, zet de order in de bestelling tabel
	// Een bestelling heeft ook een bestelnummer (autoincrement), besteldatum (huidige datum/tijd), 
	// en status (default: open).
        $datum = date("Y-m-d H:i:s");

	$sql = "INSERT INTO `Order` (`Kla_klant`, `ODatum`) VALUES ('".$_SESSION['klantnr']."', '$datum');"; 
	$result = mysqli_query($conn, $sql) or die (mysqli_error($conn)."<br>in file ".__FILE__." on line ".__LINE__);

	$bestelnr = mysqli_insert_id($conn); // insert_id geeft de id terug van het autoincrement veld - het bestelnr dus.

	// Stap 2, winkelwagen splitsen en de producten in bestelregels in de database zetten
	$cart = explode("|",$_SESSION['cart']);


        // Splits het product in stukjes: $product[x] --> x == 0 -> product id, x == 1 -> hoeveelheid
        //$product = explode(",",$products);

        // Hier willen we productprijs toevoegen aan de productregel. De productprijs is de prijs van het 
        // product. Deze zit nog niet in de sessie, en moet daar dus bij het bestellen (bijvoorbeeld 
        // in index.php) in worden gezet.
        // We tellen hier ook het bedrag per product op (prijs x aantal) en tellen dit op bij de totaalprijs.
        // Je kunt in cart.php kijken hoe je dat kunt doen.
        //$totaalprijs = $prijs * $product[1];
        // Toon de producten in de winkelwagen4
        
    $i = 0;
    foreach($cart as $products) {
      // Splits het product in stukjes: $product[x] --> x == 0 -> product id, x == 1 -> hoeveelheid
      $product = explode(",", $products);

      if (strlen(trim($product[1])) <> 0) {
		  // Get product info
		  $sql = "SELECT *
				  FROM Product
				  WHERE ProductID = ".$product[0];  // Weet je nog, uit die sessie
				  
		  $result = mysqli_query($conn, $sql) or die (mysqli_error($conn)."<br>in file ".__FILE__." on line ".__LINE__);
		  $pro_cart = mysqli_fetch_object($result);
		  $i++;
 
		  
		
                  $prijs = number_format($pro_cart->Prijs_Perstuk, 2, ',', '.') . "<br>";
		  $lineprice = $product[1] * $pro_cart->Prijs_Perstuk . "<br>";    // regelprijs uitrekenen > hoeveelheid * prijs
                  $totaalprijs = $lineprice;
		  // Total
		  //$total = $total + $lineprice;         // Totaal updaten
                  $datum = date("Y-m-d H:i:s");
                
		$sql = "INSERT INTO `Order_Product` (`Ord_orderID`, `Pro_ProductID`, `Aantal`, `Product_prijs`, `Totaalprijs`, `Datum`) VALUES"
                        . "('$bestelnr', '$product[0]', '$product[1]', '$prijs', '$totaalprijs', '$datum');";
                
                //$prijs{$i}
                              
		$result = mysqli_query($conn, $sql) or die (mysqli_error($conn)."<br>in file ".__FILE__." on line ".__LINE__);
                //echo $result;
                
                  }
        
        
              }
        
	// 
	// Op dit moment hebben we de totaalprijs berekend. Deze moeten we nu nog in een aparte
	// query in de bestelling zetten. Je hebt $bestelnr, dus voeg daar de totaalprijs aan toe.
	// 
	
	//Vanaf hier echo van bestelling
	$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db(DB_NAME, $con);

$result = mysql_query("SELECT * FROM Klant,`Order`,`Order_Product`,`Product` WHERE Order_Product.Pro_ProductID = Product.ProductID AND Order_Product.Ord_OrderID = Order.OrderID AND Order.Kla_Klant = Klant.KlantID AND KlantID = '".$_SESSION['klantnr']."' AND OrderID = $bestelnr;");

echo "<p> Uw bestelling is geplaatst met bestelnummer $bestelnr</p>
<table width=\"50%\" border='1'>
<tr>
<th>Product</th>
<th>Prijs per stuk</th>
<th>Aantal</th>
</tr>";

$result2 = mysql_query("SELECT SUM(Totaalprijs) AS value_sum FROM Klant,`Order`,`Order_Product`,`Product` WHERE Order_Product.Pro_ProductID = Product.ProductID AND Order_Product.Ord_OrderID = Order.OrderID AND Order.Kla_Klant = Klant.KlantID AND KlantID = '".$_SESSION['klantnr']."' AND OrderID = $bestelnr;");
$row2 = mysql_fetch_assoc($result2);
$sum = $row2['value_sum'];

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['Naam'] . "</td>";
  echo "<td>" . $row['Prijs_Perstuk'] . "</td>";
  echo "<td>" . $row['Aantal'] . " stuks</td>";
  echo "</tr>";
  }
echo "</table><br />
<table width=\"50%\" border=\"1\">
  <tr>
    <td>Totaalprijs:</td>
    <td>€ ".number_format($sum, 2, ',', '.')."</td>
  </tr>
</table>";
		//Tot hier
		
		//Vanaf hier mail naar klant met bestelling
		$sql3 = "SELECT email FROM Klant WHERE KlantID = '".$_SESSION['klantnr']."'";
		$sql4 = "SELECT naam FROM Klant WHERE KlantID = '".$_SESSION['klantnr']."'";
		
			if ($result3 = mysql_query($sql3)) {
    $row3 = mysql_fetch_assoc($result3);
    $to = $row3['email'];
}
			if ($result4 = mysql_query($sql4)) {
    $row4 = mysql_fetch_assoc($result4);
    $klant = $row4['naam'];
}

			$subject = "Uw bestelling bij Tijdvooreenbox.nl";
			$message = "Beste $klant,
			
Bedankt voor uw bestelling bij Tijdvooreenbox.nl! Hieronder vindt u een overzicht van uw bestelling:
 
------------------------
Het totaalbedrag is € ".number_format($sum, 2, ',', '.')."
------------------------
 
Veel plezier in onze Webshop!

Namens het team van Tijdvooreenbox.nl";
			$from = "noreply@tijdvooreenbox.nl";
			$headers = "From: $from";
			mail($to,$subject,$message,$headers);
		//Tot hier
        
	
	// Bericht naar de gebruiker.
	echo "<p>Bedankt voor uw bestelling bij Tijdvooreenbox.nl! Uw bestelling is succesvol afgerond.</p>";

	// Leeg de winkelwagen door deze uit de sessie te verwijderen.
	// De overige gegevens in de sessie blijven behouden.
	if(isset($_SESSION['cart']))
		unset($_SESSION['cart']);

	// Sluit de connection
	mysqli_close($conn);
}	
include ('includes/footer.html');
?> 
