<?php
	class Registration{		
		// Note: I have to do some verifications before storing data.
	
		private $username;
		private $email;
		private $password;
		private $gender;
		private $age;
		private $imagepath;

		//-----------------------------------------------------
		
		private $databaseConnection;

		function __construct($databaseConnection){
			// After registration formular in HTML is sent & this class instantiated:			
			$this->username = $_POST['username'];
			$this->email = $_POST['email'];
			$this->password = $_POST['password'];
			$this->gender = $_POST['gender'];
            $this->age = $_POST['age'];

			//-----------------------------------------------------	

			$this->databaseConnection = $databaseConnection;
		}
		
		function storeDataInDatabase(){
			$this->storingImageAfterUpload();
			$this->hashingPassword();
			
			// There's no need for escaping, when using PDO. At least, the safest way from SQL injection I know:

			$query = "INSERT INTO users (username, email, password, age, gender, imagepath) VALUES (?, ?, ?, ?, ?, ?)";
            $prepare = $this->databaseConnection->prepare($query);
            $prepare->execute([$this->username, $this->email, $this->password, $this->age, $this->gender, $this->imagepath]);
		}
		
		private function hashingPassword(){
			// I'm using ARGON2ID for hashing:
			$this->password = password_hash($this->password, PASSWORD_ARGON2ID);
		}
		
		private function storingImageAfterUpload(){		
		   /* First step: image will be uploaded in my choosen folder.
			* "$_FILES" is giving information about that uploaded image & I only need "tmp_name":
		    */		
		    $file_location = $_FILES["imagepath"]["tmp_name"];
			
			// "$charakter_vorname" will be the username & profile picture will get the name of that user:
			$file_storing = "Images/Profile_Images/". $this->username . ".jpg";
			
			// Storing image to my " Profile_Images " folder:
			move_uploaded_file($file_location, $file_storing);
			
			// Now, the "path" from new image with its new name will be stored (to store it to db later):
			$this->imagepath = $file_storing;
		}
		
		function checking_CharakterVorname_Username_Availability(){
			// I will seperate database connection stuff later:				
			$sql = "SELECT username FROM users";

			foreach ($this->databaseConnection->query($sql) as $row) {
				if($row['username'] == $_POST['user_name']){
					// I will improve this funny part:
					echo "NO";
				}else{
					echo "YES";
				}				
			}	
		}
	}
?>