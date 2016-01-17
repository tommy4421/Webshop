<?php  
ob_start();  

session_start();
    if(!$_SESSION["Admin"] == 1){
     header("location: index.php");
    exit;
    }

		$naam = $_POST['naam'];
		$wachtwoord = $_POST['wachtwoord'];
		$plaats = $_POST['plaats'];
		$postcode = $_POST['postcode'];
		$adres = $_POST['adres'];
		$KlantID = $_POST['klantnr'];
	
			if(!isset($naam) || trim($naam) == '' ||!isset($wachtwoord) || trim($wachtwoord) == '') {
				echo "U heeft niet alles ingevuld. De wijzigingen zijn NIET opgeslagen.";
			}
			else
			{
				
				$gebruikersnaam = "bimivp2e4";
				$wachtwoord2 = "Welkom01";
				$host = "localhost";
				$database = "avans_bimivp2e4";
				$tabel = 'Klant';
				
				$conn = new mysqli($host, $gebruikersnaam, $wachtwoord2, $database);

				if ($conn->connect_error) {
				die("Kan geen verbinding maken: " . $conn->connect_error);
			} 
				
				$sql = "UPDATE Klant SET Naam='$naam', Wachtwoord='$wachtwoord', Plaats='$plaats', Postcode='$postcode', Adres='$adres' WHERE KlantID='$KlantID'";

				if ($conn->query($sql) === TRUE) {
				echo "De gegevens zijn succesvol opgeslagen!";
				header("refresh: 1; url=klantwijzigen.php");
				} else {
				echo "Er is iets fout gegaan: " . $conn->error;
				}


			}
	
	
	
	
	

	




	

	?>