<?php
    class UserProfile{

        private $databaseConnection;

        function __construct($databaseConnection){
            $this->databaseConnection = $databaseConnection;
        }

        function getProfileData($id){
            // I will change "Vorname" to something else later:
            $sql = "SELECT * FROM users WHERE id ='$id'";
            return $sql;
        }

        function updateProfileData($value, $id){
            $statement = $this->databaseConnection->prepare("UPDATE users SET username = ? WHERE id = ?");
            $sql = $statement->execute(array($value, $id));
            return $sql;
        }
    }
?>