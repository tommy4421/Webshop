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

?>

	<html>
	 <head>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!-- JS Bootsrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!--Font awesome-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
     <!-- CSS -->
    <link rel="stylesheet" href="includes/style.css" type="text/css" media="screen" />
	 </head>

<?php

echo "<h1><center>Productbeheer</center></h1>";

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
 
// check connection
if (mysqli_connect_errno()) {
	printf("<p><b>Fout: verbinding met de database mislukt.</b><br/>\n%s</p>\n", mysqli_connect_error());
	exit();
} 

$sql = "SELECT * FROM Product"; 

// Voer de query uit en sla het resultaat op 
$result = mysqli_query($conn, $sql);
	
if($result === false) {
	echo "<p>Er zijn geen producten gevonden.</p>\n";
} else {
	$num = 0;
	$num = mysqli_num_rows($result);
	echo "<p>Er zijn ".$num." producten gevonden.</p>\n";
}



$query1=mysql_connect("localhost","bimivp2e4","Welkom01");
mysql_select_db("avans_bimivp2e4",$query1);

$start=0;
$limit=5;

if(isset($_GET['id']))
{
$id=$_GET['id'];
$start=($id-1)*$limit;
}

$query=mysql_query("select * from Product LIMIT $start, $limit");
echo "<ul>";
while($query2=mysql_fetch_array($query))
{
	echo "<!-- ---------------------------------- -->\n";
	echo "<div id=\"product\">\n<form action=\"productbeheer2.php\" method=\"post\">\n";
	echo "<input type=\"hidden\" name=\"productid\" value=\"".$query2["ProductID"]."\" />\n";
	echo "<input type=\"hidden\" name=\"prijs\" value=\"".$query2["prijs"]."\" />\n";
	echo '<p><center><img id=\'plaatje\' src="showfile.php?ImageID='.$query2["ProductID"].'"></center></p>';
	echo "<div id=\"prijs\">€ ".number_format($query2["Prijs_Perstuk"], 2, ',', '.')."</div>\n";
	echo "<div id=\"prodnaam\">".$query2["Naam"]."</div>\n";
	echo "<div id=\"beschrijving\">".$query2["Beschrijving"]."</div>\n";
	echo "<div id=\"leverbaar\">Leverbaar: ".$query2["Leverbaar"]."</div>\n";
	echo "<div id=\"voorraad\">Voorraad: ".$query2["Voorraad_aantal"]."</div>\n";
	echo "<br /><div id=\"selecteer\">Aantal: <input type=\"number\" name=\"hoeveelheid\" size=\"2\" maxlength=\"2\" value=\"1\" min=\"1\" max=\"".$query2["Voorraad_aantal"]."\"/>";
	echo "<center><input type=\"submit\" value=\"Wijzig product\" class=\"button\"/></div>\n</center>";
	echo "</form>\n</div>\n";
}
echo "</ul><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><center>";
$rows=mysql_num_rows(mysql_query("select * from Product"));
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
