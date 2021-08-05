<?php
    session_start();

	class Login{
		
		private $databaseConnection;
		
		function __construct($databaseConnection){
			$this->databaseConnection = $databaseConnection;
		}
		
		function userLogin($email){
			// I will improve this part later:
			$sql = "SELECT * FROM users WHERE email='$email'";
			
			foreach ($this->databaseConnection->query($sql) as $row) {
				if(($row['email'] == $_POST['email_forLogin']) && (password_verify($_POST['password_forLogin'], $row['password']))){
					// A redirect & what ever will happen after user is logged in will be built later:

                    // I'm creating a random number for this & hash it:
                    $randomNumber = rand(1,1000);
                    $_SESSION['Login.class'] = password_hash($randomNumber, PASSWORD_ARGON2ID);
                    $_SESSION['name'] = $row['username'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['role'] = $row['role'];
					return "Der User.class wurde eingeloggt.";
				}
			}
		}
	}
?>