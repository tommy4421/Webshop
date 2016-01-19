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

?>

<!-- KIES EEN PROVINCIE -->
<div class="provincie">
    <div class="titel">
        <h1>Kies een Provincie!</h1>
    </div>
    
    <div class="vlaggen">
       <div class="container-fluid">
        
        <div class="col-xs-6 col-sm-4 col-md-3">
            <h1>Friesland</h1>
            <a href="friesland.php">
                <img class="vlag" alt="Orgineel" src="images\home\friesland.gif" width="200px">
            </a>
        </div>
        
        <div class="col-xs-6 col-sm-4 col-md-3">
        <h1>Groningen</h1>
        <a href="groningen.php">
        <img class="vlag" alt="Orgineel" src="images\home\groningen.gif" width="200px">
        </a>
        </div>
        
        <div class="col-xs-6 col-sm-4 col-md-3">
        <h1>Drenthe</h1>
        <a href="drenthe.php">
        <img class="vlag" alt="Orgineel" src="images\home\drenthe.gif" width="200px">
        </a>
        </div>
        
        <div class="col-xs-6 col-sm-4 col-md-3">
        <h1>Overijssel</h1>
        <a href="overijssel.php">
        <img class="vlag" alt="Orgineel" src="images\home\overijssel.gif" width="200px">
        </a>
        </div>
        
        <div class="col-xs-6 col-sm-4 col-md-3">
        <h1>Gelderland</h1>
        <a href="gelderland.php">
        <img class="vlag" alt="Orgineel" src="images\home\gelderland.gif" width="200px">
        </a>
        </div>
        
        <div class="col-xs-6 col-sm-4 col-md-3">
        <h1>Utrecht</h1>
        <a href="utrecht.php">
        <img class="vlag" alt="Orgineel" src="images\home\utrecht-prov.gif" width="200px">
        </a>
        </div>
        
        <div class="col-xs-6 col-sm-4 col-md-3">
        <h1>Noord-Holland</h1>
        <a href="noordholland.php">
        <img class="vlag" alt="Orgineel" src="images\home\noord-holland.gif" width="200px">
        </a>
        </div>
        
        <div class="col-xs-6 col-sm-4 col-md-3">
        <h1>Zuid-Holland</h1>
        <a href="zuidholland.php">
        <img class="vlag" alt="Orgineel" src="images\home\zuid-holland.gif" width="200px">
        </a>
        </div>
        
        <div class="col-xs-6 col-sm-4 col-md-3">
        <h1>Zeeland</h1>
        <a href="zeeland.php">
        <img class="vlag" alt="Orgineel" src="images\home\zeeland.gif" width="200px">
        </a>
        </div>
        
        <div class="col-xs-6 col-sm-4 col-md-3">
        <h1>Noord-Brabant</h1>
        <a href="noordbrabant.php">
        <img class="vlag" alt="Orgineel" src="images\home\noord-brabant.gif" width="200px">
        </a>
        </div>
        
        <div class="col-xs-6 col-sm-4 col-md-3">
        <h1>Limburg</h1>
        <a href="limburg.php">
        <img class="vlag" alt="Orgineel" src="images\home\limburg.gif" width="200px">
        </a>
        </div>
        
        <div class="col-xs-6 col-sm-4 col-md-3">
        <h1>Flevoland</h1>
        <a href="flevoland.php">
        <img class="vlag" alt="Orgineel" src="images\home\flevoland.gif" width="200px">
        </a>
        </div>
     </div>
        </div>
</div>


<?php	
	include ('includes/footer.html');
?>
