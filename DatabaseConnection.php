<?php
	class DatabaseConnection{
		private $database_name = 'rpg_website';
		private $database_host_name = 'localhost';
		private $database_username = 'root';
		private $database_password = '';
		
		public function getConnectionToDatabase(){
			return new PDO("mysql:host=".$this->database_host_name.";dbname=".$this->database_name."", $this->database_username, $this->database_password);
		}
	}
?>