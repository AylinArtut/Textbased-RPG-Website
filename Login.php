<?php
	class Login{
		
		private $databaseConnection;
		
		function __construct($databaseConnection){
			$this->databaseConnection = $databaseConnection;
		}
		
		function userLogin(){
			// I will seperate database stuff later:	
			$sql = "SELECT Email, Passwort FROM persoenliche_daten";
			
			foreach ($this->databaseConnection->query($sql) as $row) {
				if(($row['Email'] == $_POST['email_forLogin']) && (password_verify($_POST['password_forLogin'], $row['Passwort']))){
					// A redirect & what ever will happen after user is logged in will be built later:

                    // I'm creating a random number for this & hash it:
                    $randomNumber = rand(1,1000);
                    $_SESSION['login'] = password_hash($randomNumber, PASSWORD_ARGON2ID);
					return "Der User wurde eingeloggt.";
				}
			}
		}
	}
?>