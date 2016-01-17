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

echo "<h1><center>Klantgegevens</center></h1>";

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
 
// check connection
if (mysqli_connect_errno()) {
	printf("<p><b>Fout: verbinding met de database mislukt.</b><br/>\n%s</p>\n", mysqli_connect_error());
	exit();
} 

$sql = "SELECT * FROM Klant"; 

// Voer de query uit en sla het resultaat op 
$result = mysqli_query($conn, $sql);
	
if($result === false) {
	echo "<p>Er zijn geen klanten gevonden.</p>\n";
} else {
	$num = 0;
	$num = mysqli_num_rows($result);
	echo "<p>Er zijn ".$num." klanten gevonden.</p>\n";
}



$query1=mysql_connect("localhost","bimivp2e4","Welkom01");
mysql_select_db("avans_bimivp2e4",$query1);

$start=0;
$limit=4;

if(isset($_GET['id']))
{
$id=$_GET['id'];
$start=($id-1)*$limit;
}

$query=mysql_query("select * from Klant LIMIT $start, $limit");
echo "<ul>";
while($query2=mysql_fetch_array($query))
{
	echo "<!-- ---------------------------------- -->\n";
	echo "<div id=\"klantgebeuren\">\n<form action=\"klantwijzigen.php\" method=\"post\">\n";
	echo "KlantNr: <input type=\"text\" name=\"KlantID\" value=\"".$query2["KlantID"]."\" />\n";
	echo "<div id=\"naam\">Naam: ".$query2["Naam"]."</div>\n";
	echo "<div id=\"adres\">Adres: ".$query2["Adres"]."</div>\n";
	echo "<div id=\"postcode\">Postcode: ".$query2["Postcode"]."</div>\n";
	echo "<div id=\"klantplaats\">Plaats: ".$query2["Plaats"]."</div>\n";
	echo "<br /><div id=\"selecteer\">";
	echo "<center><input type=\"submit\" value=\"Gegevens\" class=\"button\"/></div>\n</center>";
	echo "</form>\n</div>\n";
}
echo "</ul><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><center>";
$rows=mysql_num_rows(mysql_query("select * from Klant"));
$total=ceil($rows/$limit);

if($id>1)
{
echo "<a href='?id=".($id-1)."' class='button'>Vorige pagina</a>&nbsp;&nbsp;";
}
if($id!=$total)
{
echo "<a href='?id=".($id+1)."' class='button'>Volgende pagina</a>";
}

echo "<ul class='page'>";
for($i=1;$i<=$total;$i++)
{
if($i==$id) { 

echo "".$i."&nbsp;"; }

else { echo "<a href='?id=".$i."'>".$i."&nbsp;</a>"; }
}
echo "</ul></center>";
?>
