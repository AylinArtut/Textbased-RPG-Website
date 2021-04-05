<?php
	class Registration{		
		// Note: I have to do some verifications before storing data.
	
		private $persoenlicheDaten_vorname;
		private $persoenlicheDaten_email;				
		private $persoenlicheDaten_passwort;			
	    private $persoenlicheDaten_geburtstag;			
		private $persoenlicheDaten_geschlecht;				
		private $persoenlicheDaten_beziehungsstatus;			
		private $persoenlicheDaten_hobbys;				
		private $persoenlicheDaten_discord;				
		private $persoenlicheDaten_skype;			
		private $persoenlicheDaten_facebook;				
		private $persoenlicheDaten_instagram;		
		private $persoenlicheDaten_twitter;			
		private $persoenlicheDaten_webseite;				
		private $persoenlicheDaten_github;
		private $persoenlicheDaten_sonstiges;
				
		//-----------------------------------------------------
				
		private $charakter_vorname;
		private $charakter_nachname;
		private $charakter_spitzname;
		private $charakter_altersklasse;
		private $charakter_alter;
		private $charakter_geschlecht;
		private $charakter_rasse;
		private $charakter_persoenlichkeit;
		private $charakter_lebensgeschichte;
		private $charakter_aussehen;
		private $charakter_besondereMerkmale;
		private $charakter_kleidung;
		private $charakter_bildpfad;
		private $charakter_lebensmotto;
		private $charakter_sonstiges;

		//-----------------------------------------------------
		
		private $databaseConnection;

		function __construct($databaseConnection){
			// After registration formular in HTML is sent & this class instantiated:			
			$this->persoenlicheDaten_vorname = $_POST['persoenlicheDaten_vorname'];
			$this->persoenlicheDaten_email = $_POST['persoenlicheDaten_email'];				
			$this->persoenlicheDaten_passwort = $_POST['persoenlicheDaten_passwort'];			
			$this->persoenlicheDaten_geburtstag = $_POST['persoenlicheDaten_geburtstag'];			
			$this->persoenlicheDaten_geschlecht = $_POST['persoenlicheDaten_geschlecht'];				
			$this->persoenlicheDaten_beziehungsstatus = $_POST['persoenlicheDaten_beziehungsstatus'];			
			$this->persoenlicheDaten_hobbys = $_POST['persoenlicheDaten_hobbys'];				
			$this->persoenlicheDaten_discord = $_POST['persoenlicheDaten_discord'];				
			$this->persoenlicheDaten_skype = $_POST['persoenlicheDaten_skype'];			
			$this->persoenlicheDaten_facebook = $_POST['persoenlicheDaten_facebook'];				
			$this->persoenlicheDaten_instagram = $_POST['persoenlicheDaten_instagram'];		
			$this->persoenlicheDaten_twitter = $_POST['persoenlicheDaten_twitter'];			
			$this->persoenlicheDaten_webseite = $_POST['persoenlicheDaten_webseite'];				
			$this->persoenlicheDaten_github = $_POST['persoenlicheDaten_github'];
			$this->persoenlicheDaten_sonstiges = $_POST['persoenlicheDaten_sonstiges'];
				
			//-----------------------------------------------------
				
			$this->charakter_vorname = $_POST['charakter_vorname'];
			$this->charakter_nachname = $_POST['charakter_nachname'];
			$this->charakter_spitzname = $_POST['charakter_spitzname'];
			$this->charakter_altersklasse = $_POST['charakter_altersklasse'];
			$this->charakter_alter = $_POST['charakter_alter'];
			$this->charakter_geschlecht = $_POST['charakter_geschlecht'];
			$this->charakter_rasse = $_POST['charakter_rasse'];
			$this->charakter_persoenlichkeit = $_POST['charakter_persoenlichkeit'];
			$this->charakter_lebensgeschichte = $_POST['charakter_lebensgeschichte'];
			$this->charakter_aussehen = $_POST['charakter_aussehen'];
			$this->charakter_besondereMerkmale = $_POST['charakter_besondereMerkmale'];
			$this->charakter_kleidung = $_POST['charakter_kleidung'];
			$this->charakter_bildpfad = $_POST['charakter_bildpfad'];
			$this->charakter_lebensmotto = $_POST['charakter_lebensmotto'];
			$this->charakter_sonstiges = $_POST['charakter_sonstiges'];		

			//-----------------------------------------------------	

			$this->databaseConnection = $databaseConnection;
		}
		
		function storeDataInDatabase(){
			$this->storingImageAfterUpload();
			$this->hashingPassword();
			
			// There's no need for escaping, when using PDO. At least, the safest way from SQL injection I know:

			$persoenliche_daten_query = "INSERT INTO persoenliche_daten (Vorname, Email, Passwort, Geburtstag, Geschlecht_ID, Beziehungsstatus_ID, Hobbys, Sonstiges) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";			
			$charakter_daten_query = "INSERT INTO charakter_daten (Vorname, Nachname, Spitzname, Altersklasse_ID, Genaues_Alter, Geschlecht_ID, Rasse_ID, Persoenlichkeit, Lebensgeschichte, Aussehen, Besondere_Merkmale, Kleidung, Bildpfad, Lebensmotto, Sonstiges) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			
            $prepare_persoenliche_daten = $this->databaseConnection->prepare($persoenliche_daten_query);	
            $prepare_charakter_daten = $this->databaseConnection->prepare($charakter_daten_query);
			
            $prepare_persoenliche_daten->execute([$this->persoenlicheDaten_vorname, $this->persoenlicheDaten_email, $this->persoenlicheDaten_passwort, $this->persoenlicheDaten_geburtstag, $this->persoenlicheDaten_geschlecht, $this->persoenlicheDaten_beziehungsstatus, $this->persoenlicheDaten_hobbys, $this->persoenlicheDaten_sonstiges]);	
			$prepare_charakter_daten->execute([$this->charakter_vorname, $this->charakter_nachname, $this->charakter_spitzname, $this->charakter_altersklasse, $this->charakter_alter, $this->charakter_geschlecht, $this->charakter_rasse, $this->charakter_persoenlichkeit, $this->charakter_lebensgeschichte, $this->charakter_aussehen, $this->charakter_besondereMerkmale, $this->charakter_kleidung, $this->charakter_bildpfad, $this->charakter_lebensmotto, $this->charakter_sonstiges]);	
		}
		
		private function hashingPassword(){
			// I'm using ARGON2ID for hashing:
			$this->persoenlicheDaten_passwort = password_hash($this->persoenlicheDaten_passwort, PASSWORD_ARGON2ID);
		}
		
		private function storingImageAfterUpload(){		
		   /* First step: image will be uploaded in my choosen folder.
			* "$_FILES" is giving information about that uploaded image & I only need "tmp_name":
		    */		
		    $file_location = $_FILES["charakter_bildpfad"]["tmp_name"];
			
			// "$charakter_vorname" will be the username & profile picture will get the name of that user:
			$file_storing = "Images/Profile_Images/". $this->charakter_vorname . ".jpg";
			
			// Storing image to my " Profile_Images " folder:
			move_uploaded_file($file_location, $file_storing);
			
			// Now, the "path" from new image with its new name will be stored in "$charakter_bildpfad" (to store it to db later):	
			$this->charakter_bildpfad = $file_storing;
		}
		
		function checking_CharakterVorname_Username_Availability(){
			// I will seperate database connection stuff later:				
			$sql = "SELECT Vorname FROM charakter_daten";

			foreach ($this->databaseConnection->query($sql) as $row) {
				if($row['Vorname'] == $_POST['user_name']){
					// I will improve this funny part:
					echo "NO";
				}else{
					echo "YES";
				}				
			}	
		}
	}
?>